<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bio' => $this->faker->paragraph(4),
            'position' => $this->faker->jobTitle(),
            'location' => $this->faker->city(),
            'image' => $this->faker->imageUrl(),
            'linkedin' => $this->faker->url(),
            'website' => $this->faker->url(),
            'user_id' => User::factory(),
        ];
    }
}
