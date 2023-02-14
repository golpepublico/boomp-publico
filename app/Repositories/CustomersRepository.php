<?php


namespace App\Repositories;

use App\Exceptions\NoDataFoundException;
use App\Models\Customers;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\DB;

class CustomersRepository extends AbstractRepository
{
    public function __construct(Customers $customers)
    {
        $this->model = $customers;
    }

    public function getByDocumento(string $cpfCnpj)
    {
        $filters = [
            'cpfCnpj' => $cpfCnpj
        ];

        $customer = $this->findBy($filters)->first();

        if (!$customer) {
            return [];
        }

        return $customer->get()->toArray();
    }

    public function getByDoc(string $cpfCnpj)
    {
        return $this->model
            ->where('cpfCnpj', $cpfCnpj)
            ->first();
    }
}
