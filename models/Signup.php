<?php
/**
 * Created by PhpStorm.
 * User: saha
 * Date: 07.09.2018
 * Time: 16:14
 */

namespace app\models;
use mdm\admin\models\form\Signup as MainSignup;
use yii\helpers\ArrayHelper;


class Signup extends MainSignup
{
    public $regulations;
    public $email_confirm_token;


    public function rules()
    {

        return ArrayHelper::merge(parent::rules(),
            [

                ['regulations', 'compare', 'compareValue' => 1, 'message' => 'Необходимо согласиться с правилами сервиса!'],
                ['username', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'Этот логин уже занят.'],
                ['email', 'unique', 'targetClass' => 'mdm\admin\models\User', 'message' => 'Этот почтовый ящик уже зарегистрирован на сервисе.'],
//                [['regulations'], 'safe'],
//                [['regulations'], 'default', 'value' => '0'],
            ]
        );
    }


    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->email_confirm_token = $this->email_confirm_token;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Контактное лицо',
            'email' => 'Электронная почта',
            'password' => 'Пароль',
            'regulations' => 'Выствите чебокс, иначе форма не отправится!',

        ];
    }
}