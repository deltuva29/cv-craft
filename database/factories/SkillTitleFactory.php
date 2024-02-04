<?php

namespace Database\Factories;

use App\Models\SkillTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SkillTitle>
 */
class SkillTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $title = $this->faker->sentence(2),
            'slug' => $title,
        ];
    }
}
