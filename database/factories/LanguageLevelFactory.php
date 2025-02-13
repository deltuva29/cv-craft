<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LanguageLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LanguageLevel>
 */
class LanguageLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['A1', 'A2', 'B1', 'B2', 'C1', 'C2']),
        ];
    }
}
