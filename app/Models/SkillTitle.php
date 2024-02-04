<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillTitle extends Model
{
    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'slug',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
