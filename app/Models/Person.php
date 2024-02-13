<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Person extends Model implements HasMedia
{
    use HasUuid;
    use HasFactory;
    use InteractsWithMedia;

    /**
     * @var string
     */
    protected $table = 'persons';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'bio',
        'position',
        'location',
        'phone',
        'linkedin',
        'website',
        'resume_id',
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
     * @return string<string, string>
     */
    public function getAvatar(): string
    {
        return $this->hasMedia('avatar') ?
            $this->getFirstMediaUrl('avatar', 'thumb') :
            asset('images/default-avatar.png');
    }
}
