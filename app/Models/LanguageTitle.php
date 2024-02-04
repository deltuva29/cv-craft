<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageTitle extends Model
{
    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'title',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
