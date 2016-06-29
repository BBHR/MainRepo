<?php
namespace app\models;

use app\models\User;
use app\models\Activate;
use Yii;
use yii\base\Model;
use yii\db\Expression;

/**
 * Password reset request form
 */
class ResetPassword extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\app\models\User',
                'targetAttribute' => 'user_email',
                'filter' => ['user_status' => User::STATUS_ACTIVE],
                'message' => 'Такая почта не найден.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = Users::find()->where(['user_status' => User::STATUS_ACTIVE,
            'user_email' => $this->email,])->one();

        if (!$user) {
            return false;
        }else{
            $activate=new Activate();
            $activate->userId=$user->idUser;
            $activate->hash_activation=Yii::$app->security->generateRandomString().time();
            $activate->typeActivation=2;
            $activate->datecreate=new Expression('NOW()');
            $activate->status=0;
            if($activate->save(false)){
                Yii::$app->session['uname']=$user->user_name;
                Yii::$app->session['hash']=$activate->hash_activation;
                return Yii::$app
                    ->mail
                    ->compose(['html'=>'passwordResetToken-html'])
                    ->setFrom([\Yii::$app->params['adminEmail'] => 'Восстановления пароля'])
                    ->setTo($this->email)
                    ->setSubject('Восстановления паролья для ' . \Yii::$app->name)
                    ->send();
            }
        }




    }
}
