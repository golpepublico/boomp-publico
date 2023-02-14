<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enderecos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'endereco',
        'cidade',
        'bairro',
        'cep',
        'numero',
        'complemento',
        'uf'
    ];

    /**
     * Get all of the models that own comments.
     */
    public function enderecostable()
    {
        return $this->morphTo();
    }
}
