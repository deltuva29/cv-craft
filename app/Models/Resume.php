<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'public',
        'language',
        'profile_id',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'public' => 'boolean',
    ];
}
