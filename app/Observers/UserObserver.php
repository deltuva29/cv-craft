<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * @param  User  $user
     * @return void
     */
    public function created(User $user): void
    {
        $user->profile()->create([
            'bio' => 'I am a web developer',
            'position' => 'Web Developer',
            'location' => 'Jakarta, Indonesia',
            'linkedin' => 'https://www.linkedin.com/in/desoftlab/',
            'website' => 'https://desoftlab.com',
        ]);
    }
}
