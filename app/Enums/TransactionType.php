<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CREDITO()
 * @method static static DEBITO()
 */
final class TransactionType extends Enum
{
    const CREDITO = 1;
    const DEBITO = 2;
}
