<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SkillTitle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

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
                foreach ($skillsData['skills'] as $skill) {
                    SkillTitle::query()->create([
                        'title' => $skill,
                    ]);
                }
                $addedSkills = count($skillsData['skills']) ?? 0;
                
                $this->command->info("Skills seeded successfully. {$addedSkills} skills added.");
            } else {
                $this->command->error("The skills data is empty.");
            }
        } else {
            $this->command->error("Skills JSON file not found at ".$filePath);
        }
    }
}
