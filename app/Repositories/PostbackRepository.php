<?php


namespace App\Repositories;

use App\Models\Postback;
use Illuminate\Support\Facades\Auth;

class PostbackRepository extends AbstractRepository
{
    public function __construct(Postback $postback)
    {
        $this->model = $postback;
    }

    public function getAllByStore(array $filters)
    {
        $query = $this->model
            ->select('postbacks.*')
            ->with('product')
            ->join('products', 'products.id', 'postbacks.product_id');

        $query = $query->where('postbacks.store_id', Auth::user()->store->id);

        if (isset($filters['product'])) {
            $query = $query->where('products.name', 'like', '%' . $filters['product'] . '%');
        }

        if (isset($filters['code'])) {
            $query = $query->where('postbacks.code', $filters['code']);
        }

        return $query->get();
    }
}
