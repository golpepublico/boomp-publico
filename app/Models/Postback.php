<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postback extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'callbackurl',
        'methodtype',
        'code',
        'events',
        'store_id',
        'active'
    ];

    protected $casts = [
        'events' => 'array'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
