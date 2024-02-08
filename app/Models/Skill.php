<?php

declare(strict_types=1);

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
        'level',
        'profile_id',
        'title',
        'custom',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'custom' => 'boolean',
    ];


    public function isCustom(): bool
    {
        return $this->custom;
    }
}
