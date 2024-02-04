<?php

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
            'skill_title_id' => SkillTitle::factory(),
        ];
    }
}
