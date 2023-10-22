<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = fake()->name();

        return [
            'apelido'    => Str::slug($nome),
            'nome'       => $nome,
            'nascimento' => fake()->date(),
            'stack'      => $this->gerarStack(),
        ];
    }

    private function gerarStack(): array
    {
        $quantidade = fake()->numberBetween(0, 5);
        $stack      = [];

        for ($i = 0; $i < $quantidade; $i++) {
            $stack[] = fake()->word();
        }

        return $stack;
    }
}
