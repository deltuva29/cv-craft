<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'skill_title_id',
    ];

    /**
     * @return BelongsTo<SkillTitle>
     */
    public function skillTitle(): BelongsTo
    {
        return $this->belongsTo(SkillTitle::class, 'skill_title_id');
    }
}
