<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraphs(3, true),
            'founded' => $this->faker->year,
            'size' => $this->faker->numberBetween(1, 10000),
            'industry' => $this->faker->word,
            'revenue' => $this->faker->numberBetween(100000, 1000000000),
            'headquarters' => $this->faker->address,
            'type' => $this->faker->word,
            'specialties' => $this->faker->words(3, true),
            'linkedin' => $this->faker->url,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'instagram' => $this->faker->url,
            'verified' => $this->faker->boolean,
        ];
    }
}
