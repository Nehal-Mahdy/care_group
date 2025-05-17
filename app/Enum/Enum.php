<?php

declare(strict_types=1);

namespace App\Enum;

use Illuminate\Support\Arr;
use InvalidArgumentException;
use ReflectionClass;

/** @SuppressWarnings(PHPMD.NumberOfChildren) */
class Enum
{
    private const IDENTIFIER = 'id';

    private const DEFAULT_KEY = 'name';

    private const ARRAY_DELIMITER = ',';

    public static function asArray(): array
    {
        $class = get_called_class();

        return (new ReflectionClass(new $class()))->getConstants();
    }
}