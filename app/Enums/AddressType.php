<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Entrega()
 * @method static static Cobranca()
 */
final class AddressType extends Enum
{
    const Entrega =   0;
    const Cobranca =   1;
}
