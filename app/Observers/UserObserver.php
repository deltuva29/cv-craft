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
            'bio' => 'I am a Software Engineer',
            'position' => 'Software Engineer',
            'location' => 'Lithuania, Ukmerge',
            'linkedin' => 'https://www.linkedin.com/in/desoftlab/',
            'website' => 'https://desoftlab.com',
        ]);
    }
}
