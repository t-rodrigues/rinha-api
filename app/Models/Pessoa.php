<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'nascimento' => 'date:Y-m-d',
        'stack'      => 'array',
    ];

    public function search(string $term): LengthAwarePaginator
    {
        return static::where('apelido', 'LIKE', "%{$term}%")
            ->orWhere('nome', 'LIKE', "%{$term}%")
            ->orWhere('stack', 'LIKE', "%{$term}%")
            ->orderBy('nascimento', 'desc')
            ->paginate(50);
    }
}
