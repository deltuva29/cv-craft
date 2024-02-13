<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\Experience;
use App\Models\JobTitle;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraphs(3, true),
            'current' => $current = $this->faker->boolean,
            'resume_id' => Resume::factory(),
            'job_title_id' => JobTitle::factory(),
            'company_id' => Company::factory(),
            'started_at' => $started = now()->subMonths($this->faker->numberBetween(1, 18)),
            'ended_at' => $current ? $started->addMonths($this->faker->numberBetween(1, 12)) : null,
        ];
    }
}
