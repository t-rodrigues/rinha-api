<?php

namespace App\Services;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Collection;

class PessoaService
{
    /**
     * @param array<string, mixed> $dadosPessoa
     * @return Pessoa
     */
    public function store(array $dadosPessoa): Pessoa
    {
        return Pessoa::create($dadosPessoa);
    }

    /**
     * @param string $term
     * @return Collection<int, Pessoa>
     */
    public function search(string $term): Collection
    {
        return Pessoa::where('apelido', 'LIKE', "%{$term}%")
            ->orWhere('nome', 'LIKE', "%{$term}%")
            ->orWhere('stack', 'LIKE', "%{$term}%")
            ->limit(50)
            ->get();
    }
}
