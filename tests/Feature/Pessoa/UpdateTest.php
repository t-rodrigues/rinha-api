<?php

use App\Models\Pessoa;

use function Pest\Laravel\putJson;

it('should return 404 when invalid apelido was provided', function () {
    putJson(route('pessoas.update', ['pessoa', 'invalid']))->assertNotFound();
});

it('should return 422 when invalid data was provided', function () {
    $pessoa      = Pessoa::factory()->create();
    $requestData = [
        'nome'       => str_repeat('A', 101),
        'nascimento' => '2023-02-30',
        'stack'      => [str_repeat('s', 33)],
    ];
    putJson(route('pessoas.update', ['pessoa' => $pessoa->apelido]), $requestData)
        ->assertUnprocessable()
        ->assertInvalid(['nome', 'nascimento', 'stack.0']);
});

it('should return updated pessoa when valid data was provided', function () {
    $pessoa = Pessoa::factory()->create()->fresh();

    putJson(route('pessoas.update', ['pessoa' => $pessoa->apelido]), [
        'nome'       => 'Updated',
        'nascimento' => $pessoa->nascimento,
        'stack'      => ["Stack Updated"],
    ])
        ->assertOk()
        ->assertJsonFragment([
            'nome' => 'Updated',
        ])
        ->assertJsonFragment([
            'stack' => ['Stack Updated'],
        ]);
});
