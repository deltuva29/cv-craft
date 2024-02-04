<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Graduation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Graduation>
 */
class GraduationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
        ];
    }
}
