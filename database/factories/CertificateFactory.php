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
            'received_year' => $this->faker->year,
            'profile_id' => Profile::factory(),
        ];
    }
}
