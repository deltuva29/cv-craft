<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Resume extends Model
{
    use HasUuid;
    use HasFactory;
    use InteractsWithMedia;

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

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->performOnCollections('avatar');
    }

    /**
     * @return HasOne<Profile>
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'profile_id');
    }

    /**
     * @return BelongsTo<User>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'profile_id');
    }

    /**
     * @return HasOne<Person>
     */
    public function person(): HasOne
    {
        return $this->hasOne(Person::class, 'resume_id');
    }

    /**
     * @return HasMany<Skill>
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'resume_id');
    }

    /**
     * @return HasMany<Experience>
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'resume_id');
    }

    /**
     * @return HasMany<Education>
     */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'resume_id');
    }

    /**
     * @return HasMany<Language>
     */
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class, 'resume_id');
    }

    /**
     * @return HasMany<Share>
     */
    public function shares(): HasMany
    {
        return $this->hasMany(Share::class, 'profile_id');
    }

    /**
     * @return HasMany<Certificate>
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'resume_id');
    }
}
