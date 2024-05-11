<?php

namespace App\Enums;

class UserRole
{
    const USER = 'user';
    const ADMIN = 'admin';

    public static function getAllRoles()
    {
        return [
            self::USER,
            self::ADMIN,
        ];
    }
}