<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static AUTOMATICO()
 * @method static static MANUAL()
 */
final class PaymentType extends Enum
{
    const AUTOMATICO = 1;
    const MANUAL = 2;
}
