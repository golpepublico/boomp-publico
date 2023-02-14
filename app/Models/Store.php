<?php

namespace App\Models;

use App\Enums\StatusType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'store',
        'slug',
        'url',
        'nomefatura',
        'dominioshopify',
        'apikeyapp',
        'passwordapp',
        'checkoutshopify',
        'pulacarrinhoshopify',
        'email',
        'emailvalidado',
        'permiteenvio',
        'logo',
        'mostralogocheckout'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
