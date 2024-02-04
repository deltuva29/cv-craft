<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasUuid;
    use HasFactory;

    protected $fillable = [
        'uuid',
        'bio',
        'position',
        'location',
        'image',
        'linkedin',
        'website',
        'user_id',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany<Skill>
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'profile_id');
    }

    /**
     * @return HasMany<Experience>
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'profile_id');
    }

    /**
     * @return HasMany<Education>
     */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'profile_id');
    }

    /**
     * @return HasMany<Language>
     */
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class, 'profile_id');
    }

    /**
     * @return HasMany<Share>
     */
    public function shares(): HasMany
    {
        return $this->hasMany(Share::class, 'profile_id');
    }
}
