<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pessoa>
 */
class PessoaFactory extends Factory
{
    private array $programmingLanguages = [
        "JavaScript",
        "Python",
        "Java",
        "C#",
        "C++",
        "TypeScript",
        "PHP",
        "Swift",
        "Ruby",
        "Go",
        "Kotlin",
        "Rust",
        "Objective-C",
        "Dart",
        "Shell Script (Bash)",
        "Scala",
        "Perl",
        "HTML/CSS",
        "SQL",
        "R",
        "MATLAB",
        "Vue.js",
        "React.js",
        "Angular",
        "Node.js",
        "Express.js",
        "Django",
        "Flask",
        "Spring Boot",
        "ASP.NET",
        "Ruby on Rails",
        "Laravel",
        "Symfony",
        "ASP.NET Core",
        "Flutter",
        "React Native",
        "Xamarin",
        "SwiftUI",
        "Qt",
        "Electron",
        "Bootstrap",
        "Tailwind CSS",
        "Sass",
        "Redux",
        "GraphQL",
        "RESTful API",
        "TensorFlow",
        "PyTorch",
        "Unity",
        "Arduino",
    ];

    public function definition(): array
    {
        $nome = fake()->name();

        return [
            'apelido'    => Str::slug($nome),
            'nome'       => $nome,
            'nascimento' => fake()->date(),
            'stack'      => $this->generateStack(),
        ];
    }

    private function generateStack(): array
    {
        $quantity = fake()->numberBetween(0, 5);

        return fake()->randomElements($this->programmingLanguages, $quantity);
    }
}
