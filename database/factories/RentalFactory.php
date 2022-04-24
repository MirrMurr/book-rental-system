<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reader_id' => $this->faker->uuid(),
        	'book_id' => $this->faker->uuid(),
        	'status' => $this->faker->randomElement(['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED']),
        	'requestProcessedAt' => $this->faker->date,
        	'requestManagedBy' => $this->faker->uuid(),
        	'deadline' => $this->faker->date,
        	'returnedAt' => $this->faker->date,
        	'returnManagedBy' => $this->faker->uuid()
        ];
    }
}
