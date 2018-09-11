<?php

namespace app\models;
use mdm\admin\models\User as UserModel;

class User extends UserModel
{
    /**
     * Переопределяем статус юзера по умолчанию - делаем при регистрации неактивным (пока не подтвердил по мейлу)
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
        ];
    }
}
