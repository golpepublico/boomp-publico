<?php

namespace App\Helpers;

class Number
{
    public static function formatToCurrency(float $value = null, int $decimals = 2): string
    {
        return empty($value) ? 0 : number_format($value, $decimals, ',', '');
    }
}
