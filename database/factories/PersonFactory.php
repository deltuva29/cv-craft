<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Person;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => $this->faker->sentence(),
            'position' => $this->faker->sentence(),
            'location' => $this->faker->sentence(),
            'phone' => $this->faker->phoneNumber(),
            'linkedin' => $this->faker->url(),
            'website' => $this->faker->url(),
            'resume_id' => Resume::factory(),
        ];
    }
}
