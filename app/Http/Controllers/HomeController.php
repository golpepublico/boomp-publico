<?php

namespace App\Http\Controllers;

use App\Enums\StatusOrderType;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 5);

        $orderBy = [
            'field' => 'orders.created_at',
            'sort' => 'desc'
        ];
        $filters['status'] = StatusOrderType::PRECART;

        $orders = $this->orderRepository
            ->getOrder($filters, $orderBy, $perPage);

        $indicators = $this->orderRepository->getSummaryOrdersToday();

        return view('pages.home', compact(['indicators', 'orders']));
    }
}
