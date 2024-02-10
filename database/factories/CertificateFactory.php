<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'started_at' => $this->faker->date,
            'received_at' => $this->faker->date,
            'profile_id' => Profile::factory(),
        ];
    }
}
