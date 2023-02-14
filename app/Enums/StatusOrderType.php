<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CANCELADO()
 * @method static static PRECART()
 * @method static static PENDENTE()
 * @method static static PAGO()
 * @method static static ESTORNADO()
 * @method static static ANALISE()
 */
final class StatusOrderType extends Enum
{
    const CANCELADO = 0;
    const PRECART = 1;
    const PENDENTE = 2;
    const PAGO = 3;
    const ESTORNADO = 4;
    const ANALISE = 5;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::PRECART:
                return 'Abandono de carrinho';
            case self::PENDENTE:
                return 'Aguardando Pagamento';
            case self::PAGO:
                return 'Pagamento Aprovado';
            case self::ESTORNADO:
                return 'Chargeback';
            case self::CANCELADO:
                return 'Cancelado';
            case self::ANALISE:
                return 'Análise';
        }

        return parent::getDescription($value);
    }
}
