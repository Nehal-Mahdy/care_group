<?php

namespace App\Enum;


class Roles extends Enum
{
    public const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    public const ROLE_MERCHANT = 'ROLE_MERCHANT';
    public const ROLE_CUSTOMER = 'ROLE_CUSTOMER';
    public const ROLE_USER = 'ROLE_USER';
}
