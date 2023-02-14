<?php

namespace App\Http\Controllers;

use App\Enums\MethodPaymentType;
use App\Enums\StatusOrderType;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $statusOrder = [
            StatusOrderType::PAGO => StatusOrderType::PAGO()->description,
            StatusOrderType::PENDENTE => StatusOrderType::PENDENTE()->description,
            StatusOrderType::CANCELADO => StatusOrderType::CANCELADO()->description,
            StatusOrderType::ESTORNADO => StatusOrderType::ESTORNADO()->description,
            StatusOrderType::ANALISE => StatusOrderType::ANALISE()->description,
        ];

        $perPage = $request->get('perPage', 5);
        $filters = $request->only($this->orderRepository->filtersAvailable);

        $orderBy = [
            'field' => 'orders.created_at',
            'sort' => 'desc'
        ];

        $orders = $this->orderRepository
            ->getOrder($filters, $orderBy, $perPage);

        return view('pages.orders.index', compact(['orders', 'statusOrder', 'perPage']));
    }

    public function preCart(Request $request)
    {
        $perPage = $request->get('perPage', 5);
        $filters = $request->only($this->orderRepository->filtersAvailable);
        $filters['status'] = StatusOrderType::PRECART;

        $orderBy = [
            'field' => 'orders.created_at',
            'sort' => 'desc'
        ];

        $orders = $this->orderRepository
            ->getOrder($filters, $orderBy, $perPage);

        return view('pages.orders.precart', compact(['orders']));
    }
}
