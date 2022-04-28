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
        	'status' => $this->faker->randomElement(['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED']),
        	'requestProcessedAt' => $this->faker->date,
        	'deadline' => $this->faker->date,
        	'returnedAt' => $this->faker->date,
            // 'readerId' => $this->faker->uuid(),
        	// 'book_id' => $this->faker->uuid(),
        	// 'requestManagedBy' => $this->faker->uuid(),
        	// 'returnManagedBy' => $this->faker->uuid()
        ];
    }
}
