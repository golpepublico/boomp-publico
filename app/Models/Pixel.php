<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pixel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_id',
        'descricao',
        'pixel_key',
        'fl_pixel_pix',
        'fl_pixel_cred',
        'fl_pixel_boleto',
    ];

     /**
     * Get the store record associated with the store.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
