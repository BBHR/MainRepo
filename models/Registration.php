<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\base\ErrorException;
use yii\captcha\Captcha;
use JPhpMailer;
use yii\db\Expression;
use yii\helpers\Html;

class Registration extends Model
{
    public $surName;
    public $firstName;
    public $secondName;
    public $email;
    public $phone;
    public $pass;
    public $pass2;
    public $verifyCode;

    public $subject="Активация аккаунта";
    public $body;
    public $check;



    public function rules()
    {
        return [
            ['surName', 'required', 'message' => 'Введите фамилию'],
            ['surName', 'match', 'pattern' =>  '/^[а-яё\'-]+$/iu', 'message' => 'Используйте символы русского алфавита, а также символы - и \''],

            ['firstName', 'required', 'message' => 'Введите имя'],
            ['firstName', 'match', 'pattern' =>  '/^[а-яё\'-]+$/iu', 'message' => 'Используйте символы русского алфавита, а также символы - и \''],

            ['secondName', 'match', 'pattern' =>  '/^[а-яё\'-]+$/iu', 'message' => 'Используйте символы русского алфавита, а также символы - и \''],

            ['email', 'required', 'message' => 'Введите email'],
            ['email', 'email', 'message' => 'Невалидный e-mail'],
            ['email', 'checkEmail'],

            ['phone', 'required', 'message' => 'Введите номер телефона'],
            ['phone', 'match', 'pattern' => '/\(\d{3}\)-\d{3}-\d{2}-\d{2}/', 'message' => 'Введите номер телефона в формате (ххх)-ххх-хх-хх'],

            ['pass', 'required', 'message' => 'Введите пароль'],
            ['pass', 'string', 'min' => 8, 'tooShort' => 'Минимальная длина пароля 8 символов'],
            ['pass', 'match', 'pattern' => '/([A-Za-zА-Яа-яЁё0-9])/', 'message' => 'Допускаются комбинации из строчных и прописных русских и английских букв, цифр и спецсимволов'],

            ['pass2', 'required', 'message' => 'Введите подтверждение пароля'],
            ['pass2', 'string', 'min' => 8, 'tooShort' => 'Минимальная длина пароля 8 символов'],
            ['pass2', 'compare', 'compareAttribute' => 'pass', 'message' => 'Пароль и подтверждение должны совпадать'],

            [['verifyCode'], 'required',  'message' => 'Требуется ввести текст с картинки выше'],
            [['verifyCode'], 'captcha',  'message' => 'Требуется правильно ввести текст с картинки выше'],

            ['check','required', 'requiredValue' => 1, 'message'=>'Вы не согласны с правилами?'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'surName' => 'Фамилия',
            'firstName' => 'Имя',
            'secondName' => 'Отчество',
            'email' => 'Электронная почта',
            'phone' => 'Номер телефона',
            'pass' => 'Пароль',
            'pass2' => 'Подтвердите пароль',
            'verifyCode' => 'Введите текст с картинки',
            'check'=>''
        ];
    }

    public function signup()
    {
        if ($this->validate())
        {
            $user = new Users();
            $user->auth_key=Yii::$app->security->generateRandomString();
            $user->user_surname = $this->surName;
            $user->user_name = $this->firstName;
            if(!$this->secondName==="")
            $user->user_patronymic = $this->secondName;
            $user->user_email = $this->email;
            $user->user_phone_number = $this->phone;
            $user->user_status = User::STATUS_BLOCKED;
            $user->user_signup_at= new Expression('NOW()');
            $user->user_lastupdate = new Expression('NOW()');
            $user->user_password=md5(md5($this->pass));

            if ($user->save())
            {
                //Yii::$app->session->setFlash('success', 'На указанный адрес электронной почты отправлено письмо. Для завершения регистрации перейдите по ссылке в письме.');
                //return true;
                try
                {
                    $hash_generated=Yii::$app->security->generateRandomString();

                    $role = new Activate();
                    $role->userId = $user->idUser;
                    $role->hash_activation = $hash_generated; ///////////////////////////////////////////////////////////
                    $role->typeActivation = Activate::TYPE_EMAIL;
                    $role->datecreate=new Expression('NOW()');
                    $role->status=User::STATUS_BLOCKED;
                    $role->save();

                    Yii::$app->session['hash']=$role->hash_activation;
                    Yii::$app->session['surname']=$this->surName;
                    Yii::$app->mailer->compose(['html'=>'emailSender-html','text'=>'emailSender-text'])
                        ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name])
                        ->setTo($this->email)
                        ->setSubject('Автосервис - Подтверждение регистрации')
                        ->setHtmlBody($this->body)
                        ->send();

                    return true;

                }
                catch (Exception $e)
                {
                    Yii::$app->session->setFlash('success', 'Что то не срослось');
                    return false;
                }
            }
            else
            {
                Yii::$app->session->setFlash('success', 'Возникли проблемы с записью в БД');
            }
            return true;
        }
        //return null;
    }

    public function checkEmail(){
         $check=Users::find()->where(['user_email'=>$this->email])->one();

        if($check){
            $this->addError('email', 'Такой Email зарегистрирован!');
        }
    }
}