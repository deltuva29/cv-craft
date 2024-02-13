<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Graduation;
use App\Models\JobTitle;
use App\Models\LanguageLevel;
use App\Models\LanguageTitle;
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

//        $resumes = Resume::factory(5)->create([
//            'profile_id' => $user->id,
//        ]);
//
//        foreach ($resumes as $resume) {
//            Person::factory(5)->create([
//                'resume_id' => $resume->id,
//            ]);
//        }

        JobTitle::factory(20)->create();
        Company::factory(10)->create();
        Graduation::factory(5)->create();
        LanguageTitle::factory(10)->create();
        LanguageLevel::factory(4)->create();

        $this->call([
            SkillSeeder::class,
        ]);
    }
}
