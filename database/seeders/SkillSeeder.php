<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

// Replace with the actual Skill model namespace

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = public_path('data/skills.json');

        if (File::exists($filePath)) {
            $skillsData = json_decode(File::get($filePath), true);

            if (!empty($skillsData)) {
                Skill::upsert($skillsData, ['name'], ['description']);
                $this->command->info('Skills seeded successfully.');
            } else {
                $this->command->error('The skills data is empty.');
            }
        } else {
            $this->command->error('Skills JSON file not found at '.$filePath);
        }
    }
}
