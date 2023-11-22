<?php

namespace App\Services;

use App\Models\Pessoa;

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
     * @param Pessoa $pessoa
     * @param array<string, mixed> $dadosPessoa
     * @return Pessoa
     */
    public function update(Pessoa $pessoa, array $dadosPessoa): Pessoa
    {
        $pessoa->fill($dadosPessoa);
        $pessoa->save();

        return $pessoa->refresh();
    }

    public function delete(Pessoa $pessoa): void
    {
        $pessoa->delete();
    }
}
