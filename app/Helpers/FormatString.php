<?php

namespace App\Helpers;

class FormatString
{
    public static function onlyNumbers(string $value): string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}
