<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UFs extends Model
{
    use HasFactory;

    protected $table = "ufs";

    protected $fillable = [
        'nome',
        'sigla',
        'regiao',
    ];

    public static function getGroupingByRegion()
    {
        return self::orderBy('regiao')
            ->orderBy('nome')
            ->get()
            ->groupBy('regiao');
    }
}
