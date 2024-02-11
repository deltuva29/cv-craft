<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Resume>
 */
class ResumeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'public' => $this->faker->boolean(),
            'language' => $this->faker->languageCode(),
            'profile_id' => Profile::factory(),
        ];
    }
}
