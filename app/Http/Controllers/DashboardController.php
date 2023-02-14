<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
//        $validator = Validator::make($request->all(),
//            [
//                'datainicial' => 'required'
//            ],
//            [
//                'datainicial.required' => 'Informe a data inicial',
//            ]
//        );
//
//        if ($validator->fails()) {
//            return redirect()
//                ->route('dashboard.index')
//                ->withErrors($validator)
//                ->withInput();
//        }

//        $dataInicial = null;
//        if ($request->has('datainicial')) {
//            $dataInicial = Carbon::createFromFormat('d/m/Y', $request->get('datainicial'));
//        } else {
//            $dataInicial = Carbon::now()->subMonth(1);
//        }
//
//        $dataFinal = null;
//        if ($request->has('datafinal')) {
//            $dataFinal = Carbon::createFromFormat('d/m/Y', $request->get('datafinal'));
//        } else {
//            $dataFinal = Carbon::now();
//        }

        $indicators = $this->orderService->getIndicators();

        $indicators->qtdeVendasByHourToday = array_values($this->mountHours($indicators->ordersByHourToday));
        $indicators->qtdeVendasByHourYesterday = array_values($this->mountHours($indicators->ordersByHourYesterday));
        $indicators->hours = array_keys($this->getHours());

        return view('pages.dashboard.index', compact(['indicators']));
    }

    private function getHours()
    {
        return [
            '12am' => 0,
            '2am' => 2,
            '4am' => 4,
            '6am' => 6,
            '8am' => 8,
            '10am' => 10,
            '12pm' => 12,
            '2pm' => 14,
            '4pm' => 16,
            '6pm' => 18,
            '8pm' => 20,
            '10pm' => 22,
            '11pm' => 23
        ];
    }

    private function mountHours($summaryOrdersByHour)
    {
        $hours = $this->getHours();

        $qtdeOrdersByHour = [];
        foreach ($hours as $labelHour => $hour) {
            $qtde = 0;
            foreach ($summaryOrdersByHour as $summaryOrder) {
                if ($hour > $summaryOrder->hora) {
                    continue;
                }

                if ($hour == $summaryOrder->hora || $hour == ($summaryOrder->hora - 1)) {
                    $qtde += $summaryOrder->qtde;
                }
            }
            array_push($qtdeOrdersByHour, $qtde);
        }
        return $qtdeOrdersByHour;
    }
}
