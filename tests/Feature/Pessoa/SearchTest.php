<?php

use App\Models\Pessoa;

use function Pest\Laravel\get;

it('should return 400 when query param is not provided', function () {
    get(route('pessoas.search'))
        ->assertBadRequest()
        ->assertJsonFragment(['error' => 'Query string "t" is required.']);
});

it('should return an empty array when term is not found', function () {
    get(route('pessoas.search', ['t' => 'Java']))
        ->assertJsonIsArray()
        ->assertJsonCount(0)
        ->assertOk();
});

it('should return an array with one result when apelido matches', function () {
    Pessoa::factory(10)->create();
    $pessoa = Pessoa::all()->random();

    get(route('pessoas.search', ['t' => $pessoa->apelido]))
        ->assertJsonIsArray()
        ->assertJsonCount(1)
        ->assertOk();
});

it('should return an array with more than 1 when nomes matches', function () {
    $searchTerm = 'José do Egito';
    Pessoa::factory(2, ['nome' => $searchTerm])->create();
    Pessoa::factory(5)->create();

    get(route('pessoas.search', ['t' => $searchTerm]))
        ->assertJsonIsArray()
        ->assertJsonCount(2)
        ->assertOk();
});

it('should return an array when stack contains the search term', function () {
    $searchTerm = 'Java';
    Pessoa::factory(5, ['stack' => [$searchTerm]])->create();
    Pessoa::factory(5)->create();

    get(route('pessoas.search', ['t' => $searchTerm]))
        ->assertJsonIsArray()
        ->assertJsonCount(5)
        ->assertJsonFragment(['stack' => [$searchTerm]])
        ->assertOk();
});

it('should return an array when term is found in multiple fields', function () {
    $searchTerm = 'A';

    for ($i = 0; $i < 3; $i++) {
        Pessoa::factory([
            'apelido' => substr($searchTerm . fake()->word(), 0, 32),
            'nome'    => $searchTerm . fake()->firstName(),
            'stack'   => [$searchTerm . fake()->word()],
        ])->create();
    }

    Pessoa::factory([
        'apelido' => 'B',
        'nome'    => 'B',
        'stack'   => [],
    ])->create();

    get(route('pessoas.search', ['t' => $searchTerm]))
        ->assertJsonIsArray()
        ->assertJsonCount(3)
        ->assertOk();
});
