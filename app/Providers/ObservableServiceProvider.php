<?php

namespace App\Providers;

use App\Models\Resume;
use App\Models\User;
use App\Observers\ResumeObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObservableServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Resume::observe(ResumeObserver::class);
    }
}
