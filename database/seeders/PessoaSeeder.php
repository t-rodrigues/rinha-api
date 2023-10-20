<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoa::truncate();

        for ($i=0; $i < 20; $i++) {
            $randomNome = fake()->firstName();
            Pessoa::created([
                'apelido' => Str::slug($randomNome),
                'nome' => $randomNome,
                'nascimento' => fake()->date(),
                // 'stack' => fake()
            ])
        }
    }
}
