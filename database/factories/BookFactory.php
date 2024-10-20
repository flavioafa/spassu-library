<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => substr(fake()->word(), 0, 40),
            'publisher' => substr(fake()->company(), 0, 40),
            'price' => fake()->randomFloat(2, 1, 200),
            'edition' => fake()->randomNumber(),
            'publication_year' => Carbon::now()->subYears(rand(1, 50))->year,
        ];
    }
}
