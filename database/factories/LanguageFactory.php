<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\LanguageTitle;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Language>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'resume_id' => Resume::factory(),
            'language_title_id' => LanguageTitle::factory(),
            'language_level_id' => LanguageLevel::factory(),
        ];
    }
}
