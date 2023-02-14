<?php


namespace App\Repositories;

use App\Enums\StatusOrderType;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class OrderRepository extends AbstractRepository
{
    public $filtersAvailable = [
        'email',
        'status'
    ];

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function getCartByProductAndStore(int $idProduto, int $idStore, int $idCustomer)
    {
        return $this->model
            ->where('store_id', $idStore)
            ->where('customer_id', $idCustomer)
            ->where('product_id', $idProduto)
            ->where('status', '=', StatusOrderType::PRECART())
            ->first();
    }

    public function getSummaryOrders() {
        $query = $this->getQuerySummaryOrders();
        return $query->first();
    }

    public function getSummaryOrdersToday() {
        $query = $this->getQuerySummaryOrders();
        $query = $query->whereDate('created_at', '=', Carbon::today());
        return $query->first();
    }

    public function getSummaryOrdersYesterday() {
        $query = $this->getQuerySummaryOrders();
        $query = $query->whereDate('created_at', '=', Carbon::yesterday());
        return $query->first();
    }

    public function getSummaryOrdersGroupByHourToday(): Collection {
        $query = $this->getQuerySummaryOrdersGroupByHour();
        $query = $query->whereDate('created_at', '=', Carbon::today());
        return $query->get();
    }

    public function getSummaryOrdersGroupByHourYesterday(): Collection
    {
        $query = $this->getQuerySummaryOrdersGroupByHour();
        $query = $query->whereDate('created_at', '=', Carbon::yesterday());
        return $query->get();
    }

    private function getQuerySummaryOrdersGroupByHour(): Builder {
        $query = $this->getQuerySummaryOrders(true);
        $query = $query->groupBy(DB::raw('hour(created_at)'));
        return $query->orderBy(DB::raw('hour(created_at)'));
    }

    public function getQtyOrdersChargeBackToday(): int
    {
        $query = $this->getQuerySummaryOrdersChargeBack();
        $query = $query->whereDate('created_at', '=', Carbon::today());
        return $query->count();
    }

    public function getQtyOrdersChargeBackYesterday(): int
    {
        $query = $this->getQuerySummaryOrdersChargeBack();
        $query = $query->whereDate('created_at', '=', Carbon::yesterday());
        return $query->count();
    }

    public function getQtyOrdersChargeBackTotal(): int
    {
        return $this->getQuerySummaryOrdersChargeBack()->count();
    }

    private function getQuerySummaryOrdersChargeBack()
    {
        return $this->model
            ->where('store_id', '=', Auth::user()->store->id)
            ->where('status', '=', StatusOrderType::ESTORNADO());
    }

    private function getQuerySummaryOrders(bool $perHour = false): Builder
    {
        $select = "sum(value) total, count(id) qtde, avg(value) media";
        if ($perHour) {
            $select .= ", hour(created_at) hora";
        }

        return DB::table($this->model->getTable())
            ->select(DB::raw($select))
            ->where('store_id', '=', Auth::user()->store->id)
            ->where('status', '=', StatusOrderType::PAGO());
    }

    public function getOrderByIdPayment(string $idPay)
    {
        return $this->model
            ->with(['customer', 'user'])
            ->where('payment_id_asaas', $idPay)
            ->orWhere('payment_id_moip', $idPay)
            ->first();
    }

    public function getOrder(array $filters, array $orderBy = [], int $perPage = 10)
    {
        $query = $this->model->with(['customer', 'product', 'store']);
        $query = $query->select('*', 'orders.created_at as created_at_order');
        $query = $query->join('customers', 'customers.id', 'orders.customer_id');
        $query = $query->join('products', 'products.id', 'orders.product_id');

        $query = $query->where('orders.store_id', Auth::user()->store->id);

        if (isset($filters['email']) && !is_null($filters['email'])) {
            $query = $query->where('customers.email', 'LIKE', "{$filters['email']}%");
        }

        if (isset($filters['status']) && !is_null($filters['status'])) {
            $query = $query->where('orders.status', $filters['status']);
        } else {
            $query = $query->whereIn('orders.status', [
                StatusOrderType::PENDENTE,
                StatusOrderType::PAGO,
                StatusOrderType::ANALISE,
                StatusOrderType::CANCELADO,
                StatusOrderType::ESTORNADO,
            ]);
        }

        if (count($orderBy) > 0) {
            $query->orderBy($orderBy['field'], $orderBy['sort']);
        }

        return $query->paginate($perPage);
    }

    public function getCustomerByUuidOrder(string $uuid)
    {
        return $this->model
            ->with(['customer', 'product'])
            ->where('orders.uuid', $uuid)
            ->first();
    }

    public function getAllDataByOrderIdPay(string $idPay)
    {
        $model = $this->model->select('users.*', 'products.name as produto', 'orders.value', 'customers.name as cliente')
            ->join('stores', 'stores.id', '=', 'orders.store_id')
            ->join('users', 'users.id', 'stores.user_id')
            ->join('customers', 'customers.id', 'orders.customer_id')
            ->join('products', 'products.id', 'orders.product_id')
            ->where('orders.payment_id_asaas', '=', $idPay);

        return $model->first();
    }
}
