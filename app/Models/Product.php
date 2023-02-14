<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'store_id',
        'category_id',
        'image',
        'name',
        'slug',
        'description',
        'price',
        'url',
        'variation',
        'weight',
        'width',
        'length',
        'height',
    ];

    /**
     * Get the store record associated with the product.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Get the category record associated with the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function postback()
    {
        return $this->hasOne(Postback::class, 'product_id', 'id');
    }
}
