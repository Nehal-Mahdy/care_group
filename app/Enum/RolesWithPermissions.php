<?php

namespace App\Enum;

use Spatie\Permission\Contracts\Permission;

class RolesWithPermissions extends Enum
{
    public const ROLE_SUPER_ADMIN = [
        Permissions::DASHBOARD,
        Permissions::USERS_LIST,
        Permissions::USERS_SHOW,
        Permissions::USERS_CREATE,
        Permissions::USERS_UPDATE,
        Permissions::USERS_DELETE,
        Permissions::ROLES_LIST,
        Permissions::ROLES_SHOW,
        Permissions::ROLES_CREATE,
        Permissions::ROLES_UPDATE,
        Permissions::ROLES_DELETE,
        Permissions::PRODUCTS_LIST,
        Permissions::PRODUCTS_SHOW,
        Permissions::PRODUCTS_CREATE,
        Permissions::PRODUCTS_UPDATE,
        Permissions::PRODUCTS_DELETE,
        Permissions::PRODUCT_CATEGORIES_LIST,
        Permissions::PRODUCT_CATEGORIES_SHOW,
        Permissions::PRODUCT_CATEGORIES_CREATE,
        Permissions::PRODUCT_CATEGORIES_UPDATE,
        Permissions::PRODUCT_CATEGORIES_DELETE,
        Permissions::ORDERS_LIST,
        Permissions::ORDERS_SHOW,
        Permissions::ORDERS_CREATE,
        Permissions::ORDERS_UPDATE,
        Permissions::ORDERS_DELETE,



    ];

    public const ROLE_ADMIN = [
        Permissions::DASHBOARD,
        Permissions::PRODUCTS_LIST,
        Permissions::PRODUCTS_SHOW,
        Permissions::PRODUCTS_CREATE,
        Permissions::PRODUCTS_UPDATE,
        Permissions::PRODUCTS_DELETE,
        Permissions::PRODUCT_CATEGORIES_LIST,
        Permissions::PRODUCT_CATEGORIES_SHOW,
        Permissions::PRODUCT_CATEGORIES_CREATE,
        Permissions::PRODUCT_CATEGORIES_UPDATE,
        Permissions::PRODUCT_CATEGORIES_DELETE,
        Permissions::ORDERS_LIST,
        Permissions::ORDERS_SHOW,
        Permissions::ORDERS_CREATE,
        Permissions::ORDERS_UPDATE,
        Permissions::ORDERS_DELETE,
        Permissions::ACTIVITY_LOG_LIST,
        Permissions::ACTIVITY_LOG_SHOW,
        Permissions::ACTIVITY_LOG_CREATE,
        Permissions::ACTIVITY_LOG_UPDATE,
        Permissions::ACTIVITY_LOG_DELETE,


    ];
}
