<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Graduation;
use App\Models\JobTitle;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\LanguageTitle;
use App\Models\Skill;
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

        JobTitle::factory(20)->create();
        Company::factory(10)->create();
        Graduation::factory(5)->create();
        LanguageTitle::factory(10)->create();
        LanguageLevel::factory(4)->create();

        Skill::factory(10)->create([
            'profile_id' => $user->id,
        ]);

        Experience::factory(3)->create([
            'profile_id' => $user->id,
        ]);
        Education::factory(2)->create([
            'profile_id' => $user->id,
        ]);
        Language::factory(1)->create([
            'profile_id' => $user->id,
        ]);

//        Share::factory(305)->create([
//            'profile_id' => $user->id,
//        ]);

//        $this->call([
//            SkillSeeder::class,
//        ]);
    }
}
