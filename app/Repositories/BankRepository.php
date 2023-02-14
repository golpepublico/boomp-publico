<?php


namespace App\Repositories;

use App\Models\Bank;
use App\Repositories\AbstractRepository;

class BankRepository extends AbstractRepository
{
    public function __construct(Bank $bank)
    {
        $this->model = $bank;
    }
}
