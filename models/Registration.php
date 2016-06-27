<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\ErrorException;
use yii\captcha\Captcha;

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

    public function rules()
    {
        return [
            ['surName', 'required', 'message' => 'Введите фамилию'],
            ['surName', 'match', 'pattern' =>  '/^[а-яё\'-]+$/iu', 'message' => 'Используйте символы русского алфавита, а также символы - и \''],

            ['firstName', 'required', 'message' => 'Введите имя'],
            ['firstName', 'match', 'pattern' =>  '/^[а-яё\'-]+$/iu', 'message' => 'Используйте символы русского алфавита, а также символы - и \''],

            ['secondName', 'required', 'message' => 'Введите имя'],
            ['secondName', 'match', 'pattern' =>  '/^[а-яё\'-]+$/iu', 'message' => 'Используйте символы русского алфавита, а также символы - и \''],

            ['email', 'required', 'message' => 'Введите email'],
            ['email', 'email', 'message' => 'Невалидный e-mail'],
            ['email', 'unique', 'message' => 'Пользователь с таким адресом электронной почты уже зарегистрирован',
            ],

            ['phone', 'required', 'message' => 'Введите номер телефона'],
            ['phone', 'match', 'pattern' => '/\(\d{3}\)-\d{3}-\d{2}-\d{2}/', 'message' => 'Введите номер телефона в формате (ххх)-ххх-хх-хх'],

            ['pass', 'required', 'message' => 'Введите пароль'],
            ['pass', 'string', 'min' => 8, 'tooShort' => 'Минимальная длина пароля 8 символов'],
            ['pass', 'match', 'pattern' => '/([A-Za-zА-Яа-яЁё0-9])(`~!№@#$%^&*()_-+={}[]\|:;"<>,.?)/', 'message' => 'Допускаются комбинации из строчных и прописных русских и английских букв, цифр и спецсимволов'],

            ['pass2', 'required', 'message' => 'Введите подтверждение пароля'],
            ['pass2', 'string', 'min' => 8, 'tooShort' => 'Минимальная длина пароля 8 символов'],
            ['pass2', 'compare', 'compareAttribute' => 'pass', 'message' => 'Пароль и подтверждение должны совпадать'],

            [['verifyCode'], 'required',  'message' => 'Требуется ввести текст с картинки выше'],
            [['verifyCode'], 'captcha',  'message' => 'Требуется правильно ввести текст с картинки выше'],

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
        ];
    }

    public function signup()
    {
        if ($this->validate())
        {
            $user = new User();
            $user->fname = $this->surName;
            $user->name = $this->firstName;
            $user->lname = $this->secondName;
            $user->email = $this->email;
            $user->telephone = $this->phone;
            $user->datecreate = new CDbExpression('NOW()');
            $user->active = User::STATUS_WAIT;

            $user->setPassword($this->pass);
            $user->generateAuthKey();
            $user->generateEmailConfirmToken();

            if ($user->save(false))
            {
                //Yii::$app->session->setFlash('success', 'На указанный адрес электронной почты отправлено письмо. Для завершения регистрации перейдите по ссылке в письме.');
                //return true;
                try
                {
                    $role = new UserRole();
                    $role->user_id = $user->user_id;
                    $role->role_id = 1; ///////////////////////////////////////////////////////////
                    $role->date = time();
                    $role->save();


                    Yii::$app->mailer->compose('emailConfirm', ['user' => $user])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                        ->setTo($this->email)
                        ->setSubject('Автосервис - Подтверждение регистрации')
                        ->send();
                    //Yii::$app->session->setFlash('success', 'На указанный адрес электронной почты отправлено письмо. Для завершения регистрации перейдите по ссылке в письме.');
                }
                catch (Exception $e)
                {
                    Yii::$app->session->setFlash('error', 'Что то не срослось');
                    return false;
                }
            }
            else
            {
                Yii::$app->session->setFlash('error', 'Возникли проблемы с записью в БД');
            }
            return true;
        }
        return null;
    }
}