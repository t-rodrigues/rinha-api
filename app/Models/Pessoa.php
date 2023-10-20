<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'apelido',
        'nome',
        'nascimento',
        'stack',
    ];

    protected $casts = [
        'stack' => 'array',
    ];
}
