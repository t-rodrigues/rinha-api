<?php

use App\Models\Pessoa;

use function Pest\Laravel\deleteJson;

it('should return 404 when invalid apelido', function () {
    deleteJson(route('pessoas.destroy', ['pessoa' => 'invalid']))->assertNotFound();
});

it('should return 204 when valid data', function () {
    $pessoa = Pessoa::factory()->create();
    deleteJson(route('pessoas.destroy', ['pessoa' => $pessoa->apelido]))->assertNoContent();
});
