<?php

declare(strict_types=1);

namespace App\Http\Controllers\Profile\Shares;

use App\Http\Controllers\Controller;
use App\Models\Share;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request, Share $share)
    {
        return view("profile.shares.templates.{$share->template}", [
            'share' => $share->load('resume.owner'),
        ]);
    }
}
