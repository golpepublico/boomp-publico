<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'wallet_id',
        'title',
        'description',
        'transaction_type',
        'value',
        'balance',
        'blocked',
        'blocked',
        'billingType',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

}
