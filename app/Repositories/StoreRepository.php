<?php


namespace App\Repositories;

use App\Models\Store;
use App\Repositories\AbstractRepository;

class StoreRepository extends AbstractRepository
{
    public function __construct(Store $store)
    {
        $this->model = $store;
    }

    public function getByUserID(int $idUsuario)
    {
        return $this->model->where('user_id', $idUsuario)->first();
    }

    public function getBySlug(string $storeSlug)
    {
        return $this->model->where('slug', $storeSlug)->first();
    }
}
