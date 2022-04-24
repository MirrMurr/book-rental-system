<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'authors' => $this->faker->words(4, true),
            'releasedAt' => $this->faker->date,
            'pages' => $this->faker->numberBetween(0, 700),
            'isbn' => $this->faker->numerify('#############'),
            'description' => $this->faker->optional()->paragraphs(3, true),
            'inStock' => $this->faker->numberBetween(0, 15),
            'coverImage' => $this->faker->imageUrl(480, 640, 'book cover')
        ];
    }
}
