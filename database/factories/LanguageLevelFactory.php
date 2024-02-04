<?php

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
            'title' => $this->faker->sentence(),
        ];
    }
}
