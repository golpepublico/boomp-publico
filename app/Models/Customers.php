<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id_asaas',
        'customer_id_moip',
        'name',
        'cpfCnpj',
        'email',
        'mobilePhone'
    ];

    public function enderecos()
    {
        return $this->morphMany(Enderecos::class, 'enderecostable');
    }
}
