<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasToken;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Share extends Model
{
    use HasToken;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'token',
        'email',
        'template',
        'resume_id',
        'profile_id',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'resume',
    ];

    /**
     * @return BelongsTo<Resume>
     */
    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class, 'resume_id');
    }

    /**
     * @return BelongsTo<Profile>
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
