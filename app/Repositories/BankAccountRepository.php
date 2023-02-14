<?php


namespace App\Repositories;

use App\Models\BankAccount;
use App\Repositories\AbstractRepository;

class BankAccountRepository extends AbstractRepository
{
    public function __construct(BankAccount $bankAccount)
    {
        $this->model = $bankAccount;
    }

    public function getBankAccountById(int $idBankAccount)
    {
        return $this->model
            ->with(['bank'])
            ->where('bank_accounts.id', $idBankAccount)
            ->first();
    }
}
