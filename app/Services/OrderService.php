<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use stdClass;

class OrderService
{
    protected $orderRepository;

    private $ordersSummary;
    private $todaySummaryOrders;
    private $yesterdaySummaryOrders;
    private $ordersByHourToday;
    private $ordersByHourYesterday;
    private $chargeBackTotal;
    private $chargeBackToday;
    private $chargeBackYesterday;
    private $percentChargeBackYesterdayXToday;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getIndicators(): stdClass
    {
        $this->getSummary();

        $indicators = new StdClass();
        $indicators->store = Auth::user()->store;
        $indicators->valorTotalPedidos = $this->ordersSummary->total;
        $indicators->percentTotalYesterdayXToday = $this->getPercentTotalYesterdayXToday();

        $indicators->qtdeVendas = $this->ordersSummary->qtde;
        $indicators->percentQtdeVendasYesterdayXToday = $this->getPercentQtdeVendasYesterdayXToday();

        $indicators->ticketMedio = $this->ordersSummary->media;
        $indicators->percentTicketMedioYesterdayXToday = $this->getPercentTicketMedioYesterdayXToday();

        $indicators->chargeBack = $this->chargeBackTotal * 100 / ($this->ordersSummary->qtde > 0 ? $this->ordersSummary->qtde : 1);
        $indicators->percentChargeBackYesterdayXToday = $this->getPercentChargeBackYesterdayXToday();

        $indicators->ordersByHourToday = $this->ordersByHourToday->toArray();
        $indicators->ordersByHourYesterday = $this->ordersByHourYesterday->toArray();

        return $indicators;
    }

    private function getPercentTotalYesterdayXToday()
    {
        return $this->getPercentYesterdayXToday($this->yesterdaySummaryOrders->total, $this->todaySummaryOrders->total);
    }

    private function getPercentQtdeVendasYesterdayXToday()
    {
        return $this->getPercentYesterdayXToday($this->yesterdaySummaryOrders->qtde, $this->todaySummaryOrders->qtde);
    }

    private function getPercentTicketMedioYesterdayXToday()
    {
        return $this->getPercentYesterdayXToday($this->yesterdaySummaryOrders->media, $this->todaySummaryOrders->media);
    }

    private function getPercentChargeBackYesterdayXToday()
    {
        return $this->getPercentYesterdayXToday($this->chargeBackYesterday, $this->chargeBackToday);
    }

    private function getPercentYesterdayXToday($valueYesterday, $valueToday)
    {
        if ($valueYesterday < 1) {
            return 0;
        }
        return (($valueToday * 100) / $valueYesterday) - 100;
    }

    private function getSummary()
    {
        $this->ordersSummary = $this->orderRepository->getSummaryOrders();

        $this->todaySummaryOrders = $this->orderRepository->getSummaryOrdersToday();
        $this->yesterdaySummaryOrders = $this->orderRepository->getSummaryOrdersYesterday();

        $this->ordersByHourToday = $this->orderRepository->getSummaryOrdersGroupByHourToday();
        $this->ordersByHourYesterday = $this->orderRepository->getSummaryOrdersGroupByHourYesterday();

        $this->chargeBackTotal = $this->orderRepository->getQtyOrdersChargeBackTotal();
        $this->chargeBackToday = $this->orderRepository->getQtyOrdersChargeBackToday();
        $this->chargeBackYesterday = $this->orderRepository->getQtyOrdersChargeBackYesterday();
    }
}
