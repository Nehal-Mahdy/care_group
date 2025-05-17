<?php

namespace App\Enum;


class Permissions extends Enum
{
  // permissions for dashboard
  public const DASHBOARD = 'dashboard';

  // permissions for users
  public const USERS_LIST = 'users.list';
  public const USERS_SHOW = 'users.show';
  public const USERS_CREATE = 'users.create';
  public const USERS_UPDATE = 'users.update';
  public const USERS_DELETE = 'users.delete';

  // permissions for roles
  public const ROLES_LIST = 'roles.list';
  public const ROLES_SHOW = 'roles.show';
  public const ROLES_CREATE = 'roles.create';
  public const ROLES_UPDATE = 'roles.update';
  public const ROLES_DELETE = 'roles.delete';
  // products permissions
  public const PRODUCTS_LIST = 'products.list';
  public const PRODUCTS_SHOW = 'products.show';
  public const PRODUCTS_CREATE = 'products.create';
  public const PRODUCTS_UPDATE = 'products.update';
  public const PRODUCTS_DELETE = 'products.delete';
  // productcategory  permissions
  public const PRODUCT_CATEGORIES_LIST = 'product_categories.list';
  public const PRODUCT_CATEGORIES_SHOW = 'product_categories.show';
  public const PRODUCT_CATEGORIES_CREATE = 'product_categories.create';
  public const PRODUCT_CATEGORIES_UPDATE = 'product_categories.update';
  public const PRODUCT_CATEGORIES_DELETE = 'product_categories.delete';

  // order permissions
  public const ORDERS_LIST = 'orders.list';
  public const ORDERS_SHOW = 'orders.show';
  public const ORDERS_CREATE = 'orders.create';
  public const ORDERS_UPDATE = 'orders.update';
  public const ORDERS_DELETE = 'orders.delete';

  // activity log permissions
  const ACTIVITY_LOG_LIST = 'activity log list';
  const ACTIVITY_LOG_SHOW = 'activity log show';
  const ACTIVITY_LOG_CREATE = 'activity log create';
  const ACTIVITY_LOG_UPDATE = 'activity log update';
  const ACTIVITY_LOG_DELETE = 'activity log delete';




}
