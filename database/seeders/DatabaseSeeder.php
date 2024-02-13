<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Graduation;
use App\Models\JobTitle;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\LanguageTitle;
use App\Models\Person;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Mindaugas Deltuva',
            'email' => 'mindaugas@desoftlab.com',
        ]);

        $resumes = Resume::factory(5)->create([
            'profile_id' => $user->id,
        ]);

        foreach ($resumes as $resume) {
            Person::factory(5)->create([
                'resume_id' => $resume->id,
            ]);
        }

        JobTitle::factory(20)->create();
        Company::factory(10)->create();
        Graduation::factory(5)->create();
        LanguageTitle::factory(10)->create();
        LanguageLevel::factory(4)->create();

        Experience::factory(3)->create([
            'resume_id' => $resumes[0]->id,
        ]);
        Education::factory(2)->create([
            'resume_id' => $resumes[0]->id,
        ]);
        Language::factory(1)->create([
            'resume_id' => $resumes[0]->id,
        ]);
        Certificate::factory(2)->create([
            'resume_id' => $resumes[0]->id,
        ]);

        $this->call([
            SkillSeeder::class,
        ]);
    }
}
