<?php

namespace App\Models;

use App\Enums\BillingType;
use App\Enums\StatusOrderType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_id',
        'customer_id',
        'product_id',
        'status',
        'invoiceUrl',
        'payment_id_asaas',
        'payment_id_moip',
        'installment',
        'billingType',
        'installmentCount',
        'value',
        'netValue',
        'installmentValue',
        'path_file',
        'uuid',
    ];

    protected $casts = [
        'billingType' => BillingType::class,
        'status' => StatusOrderType::class
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function customer()
    {
        return $this->hasOne(Customers::class, 'id', 'customer_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }

    public function pixel()
    {
        return $this->hasOne(Pixel::class, 'store_id', 'store_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'store_id');
    }

    public function enderecos()
    {
        return $this->morphMany(Enderecos::class, 'enderecostable');
    }
}
