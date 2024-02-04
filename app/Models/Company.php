<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'website',
        'industry',
        'logo',
        'description',
        'founded',
        'size',
        'revenue',
        'headquarters',
        'type',
        'specialties',
        'linkedin',
        'facebook',
        'twitter',
        'instagram',
        'verified',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'verified' => 'boolean',
    ];

    /**
     * @return HasMany<Experience>
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}
