<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Resume;

class ResumeObserver
{
    /**
     * @param  Resume  $resume
     * @return void
     */
    public function created(Resume $resume): void
    {
        $resume->person()->create();
    }
}
