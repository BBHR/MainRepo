<?php
namespace app\models;

use app\models\User;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class ConfirmEmail extends Model
{
    /**
     * @var User
     */
    private $email;

    /**
     * Creates a form model given a token.
     *
     * @param  string $token
     * @param  array $config
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Отсутствует код подтверждения.');
        }
        $this->email = User::confirmEmailToken($token);
        if (!$this->email) {
            Yii::$app->controller->redirect(['site/confirm']);
        }
        parent::__construct($config);
    }

    /**
     * Confirm email.
     *
     * @return boolean if email was confirmed.
     */
    public function confirmEmail()
    {
        $activ = $this->email;
        $activ->status = 1;
        $user=Users::findOne($activ->userId);
        Yii::$app->session['user']=$user;
        $user->user_status=1;
        $user->update();
        return $activ->update();
    }
}
