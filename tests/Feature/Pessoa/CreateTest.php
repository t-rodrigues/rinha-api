<?php

use App\Models\Pessoa;

use function Pest\Laravel\postJson;

describe('Validation', function () {
    it('should return 422 when apelido validation fail', function () {
        $pessoa          = Pessoa::factory()->makeOne();
        $pessoa->apelido = null;

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when apelido has more than 32 characters', function () {
        $pessoa          = Pessoa::factory()->makeOne();
        $pessoa->apelido = str_repeat('a', 33);

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when apelido already taken', function () {
        $pessoa = Pessoa::factory()->create();

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when nome validation fail', function () {
        $pessoa       = Pessoa::factory()->makeOne();
        $pessoa->nome = null;

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when nome has more than 100 characters', function () {
        $pessoa       = Pessoa::factory()->makeOne();
        $pessoa->nome = str_repeat("a", 101);

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when nascimento validation fail', function () {
        $pessoa             = Pessoa::factory()->makeOne();
        $pessoa->nascimento = null;

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when invalid date (nascimento) was provided validation fail', function () {
        $pessoa             = Pessoa::factory()->makeOne();
        $pessoa->nascimento = "2023-02-30";

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });

    it('should return 422 when stack validation fail', function () {
        $pessoa        = Pessoa::factory()->makeOne();
        $pessoa->stack = [""];

        postJson(route('pessoas.store', $pessoa->toArray()))->assertUnprocessable();
    });
});

it('should be able to store a new person when data is valid', function () {
    $pessoa = Pessoa::factory()->makeOne();

    postJson(route('pessoas.store', $pessoa->toArray()))->assertCreated();
});
