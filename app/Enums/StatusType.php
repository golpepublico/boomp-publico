<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static INATIVO()
 * @method static static ATIVO()
 */
final class StatusType extends Enum
{
    const INATIVO = 0;
    const ATIVO = 1;
}
