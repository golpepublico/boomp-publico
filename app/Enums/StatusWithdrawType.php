<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CANCELADO()
 * @method static static PENDENTE()
 * @method static static PAGO()
 */
final class StatusWithdrawType extends Enum
{
    const CANCELADO = 1;
    const PENDENTE = 2;
    const PAGO = 3;
}
