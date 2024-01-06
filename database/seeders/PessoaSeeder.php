<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    public function run(): void
    {
        Pessoa::factory(5000)->create();
    }
}
