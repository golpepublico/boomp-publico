<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bank_id',
        'account_holder',
        'agency',
        'account',
        'cpfCnpj',
    ];

    /**
     * Get the user record associated with the bank account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
