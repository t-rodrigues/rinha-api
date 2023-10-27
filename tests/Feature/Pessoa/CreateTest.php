<?php

use App\Models\Pessoa;

use function Pest\Laravel\postJson;

describe('Validation', function () {
    it('should return 422 when apelido validation fail', function () {
        $pessoa = Pessoa::factory(['apelido' => null])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid(['apelido']);
    });

    it('should return 422 when apelido has more than 32 characters', function () {
        $pessoa = Pessoa::factory(['apelido' => str_repeat('a', 33)])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid(['apelido']);
    });

    it('should return 422 when apelido already taken', function () {
        $pessoa = Pessoa::factory()->create();

        postJson(route('pessoas.store', $pessoa->toArray()))
            ->assertUnprocessable()
            ->assertInvalid(['apelido']);
    });

    it('should return 422 when nome validation fail', function () {
        $pessoa = Pessoa::factory(['nome' => null])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid('nome');
    });

    it('should return 422 when nome has more than 100 characters', function () {
        $pessoa = Pessoa::factory(['nome' => str_repeat("a", 101)])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid(['nome']);
    });

    it('should return 422 when nascimento validation fail', function () {
        $pessoa = Pessoa::factory(['nascimento' => null])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid(['nascimento']);
    });

    it('should return 422 when invalid date (nascimento) was provided validation fail', function () {
        $pessoa = Pessoa::factory(['nascimento' => '2023-02-30'])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid(['nascimento']);
    });

    it('should return 422 when stack validation fail', function () {
        $pessoa = Pessoa::factory(['stack' => ["", "Valid"]])->raw();

        postJson(route('pessoas.store', $pessoa))
            ->assertUnprocessable()
            ->assertInvalid(['stack.0']);
    });
});

it('should be able to store a new person when data is valid', function () {
    $pessoa = Pessoa::factory()->raw();

    postJson(route('pessoas.store', $pessoa))
        ->assertCreated()
        ->assertHeader('Location')
        ->assertJsonStructure([
            'id',
            'apelido',
            'nome',
            'nascimento',
            'stack',
        ]);
});
