<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Language extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'profile_id',
        'language_title_id',
        'language_level_id',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * @return BelongsTo<LanguageTitle>
     */
    public function languageTitle(): BelongsTo
    {
        return $this->belongsTo(LanguageTitle::class, 'language_title_id');
    }

    /**
     * @return BelongsTo<LanguageLevel>
     */
    public function languageLevel(): BelongsTo
    {
        return $this->belongsTo(LanguageLevel::class, 'language_level_id');
    }
}
