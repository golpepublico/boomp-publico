<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BOLETO()
 * @method static static CREDIT_CARD()
 * @method static static PIX()
 */
final class BillingType extends Enum
{
    const BOLETO = 0;
    const CREDIT_CARD = 1;
    const PIX = 2;

    public static function getDescription($value): string
    {
        if ($value === self::CREDIT_CARD) {
            return 'Cartão de crédito';
        }

        return parent::getDescription($value);
    }
}
