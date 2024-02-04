<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Education;
use App\Models\Graduation;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::factory(),
            'graduation_id' => Graduation::factory(),
            'ended_year' => $this->faker->year,
            'specialty' => $this->faker->sentence,
            'institution' => $this->faker->company,
            'achievements' => $this->faker->paragraph,
        ];
    }
}
