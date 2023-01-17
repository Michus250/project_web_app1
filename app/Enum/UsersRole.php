<?php

namespace App\Enum;

class UsersRole{
    const ADMIN = 'admin';
    const USER = 'user';
    const EMPLOYEE = 'employee';
    const DOCTOR = 'doctor';
    

    const TYPES =[
        self::USER,
        self::ADMIN,
        self::EMPLOYEE,
        self::DOCTOR,
    ];
}