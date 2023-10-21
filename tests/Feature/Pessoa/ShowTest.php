<?php

use App\Models\Pessoa;
use Illuminate\Support\Str;

use function Pest\Laravel\{get, getJson};

it('should return 404 when invalid id', function () {
    getJson(route('pessoas.show', ['pessoa' => Str::uuid()]))->assertNotFound();
});

it('should return PessoaResource when valid id', function () {
    $pessoa = Pessoa::factory()->create();
    get(route('pessoas.show', ['pessoa' => $pessoa->id]))
        ->assertOk()
        ->assertJsonStructure(['data' => [
            'id',
            'apelido',
            'nome',
            'nascimento',
            'stack',
        ]])
        ->assertJson(['data' => $pessoa->toArray()]);
});
