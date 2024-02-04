<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Share;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Share>
 */
class ShareFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => Str::random(20),
            'email' => $this->faker->safeEmail(),
            'template' => 'default',
            'profile_id' => Profile::factory(),
        ];
    }
}
