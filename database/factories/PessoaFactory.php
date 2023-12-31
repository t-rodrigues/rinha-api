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
        $nome = fake()->unique()->name();

        return [
            'apelido'    => Str::slug(Str::limit($nome, 32, '')),
            'nome'       => $nome,
            'nascimento' => fake()->dateTimeThisCentury('-10 years')->format('Y-m-d H:i:s'),
            'stack'      => $this->generateStack(),
        ];
    }

    private function generateStack(): array
    {
        $quantity = fake()->numberBetween(0, 5);

        return fake()->randomElements($this->programmingLanguages, $quantity);
    }
}
