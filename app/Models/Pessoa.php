<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Collection, Model};

class Pessoa extends Model
{
    use HasFactory;
    use HasUuids;

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

    public function search(string $term): Collection
    {
        return Pessoa::where('apelido', 'LIKE', "%{$term}%")
            ->orWhere('nome', 'LIKE', "%{$term}%")
            ->orWhere('stack', 'LIKE', "%{$term}%")
            ->limit(50)
            ->get();
    }
}
