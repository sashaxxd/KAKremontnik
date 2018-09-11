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


    public function rules()
    {

        return ArrayHelper::merge(parent::rules(),
            [

                ['regulations', 'compare', 'compareValue' => 1, 'message' => 'Необходимо согласиться с правилами сервиса!'],


//                [['regulations'], 'safe'],
//                [['regulations'], 'default', 'value' => '0'],
            ]
        );
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