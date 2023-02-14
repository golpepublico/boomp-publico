<?php


namespace App\Repositories;

use App\Models\Product;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class ProductRepository extends AbstractRepository
{
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getAllByStore()
    {
        return $this->model
            ->where('store_id', Auth::user()->store->id)
            ->get();
    }

    public function getByProductAndStoreSlug(string $productSlug, string $storeSlug)
    {
        $model = $this->model->select('products.*')
            ->join('stores', 'stores.id', '=', 'products.store_id')
            ->where('stores.slug', '=', $storeSlug)
            ->where('products.slug', '=', $productSlug);

        return $model->first();
    }
}
