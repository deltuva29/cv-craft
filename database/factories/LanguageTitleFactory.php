<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\LanguageTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LanguageTitle>
 */
class LanguageTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['English', 'Spanish', 'French', 'German', 'Italian', 'Portuguese', 'Russian', 'Chinese', 'Japanese', 'Korean']),
        ];
    }
}
