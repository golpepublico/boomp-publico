<?php


namespace App\Repositories;

use App\Models\Wallet;
use App\Repositories\AbstractRepository;

class WalletRepository extends AbstractRepository
{
    public function __construct(Wallet $wallet)
    {
        $this->model = $wallet;
    }
}
