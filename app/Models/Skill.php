<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'level',
        'profile_id',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [];
}
