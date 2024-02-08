<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\SkillTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level' => $this->faker->numberBetween(0, 5),
            'profile_id' => Profile::factory(),
            'title' => SkillTitle::factory(),
            'custom' => $this->faker->boolean,
            'custom_title' => $this->faker->sentence(),
        ];
    }
}
