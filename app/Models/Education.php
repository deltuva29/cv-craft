<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'educations';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'resume_id',
        'graduation_id',
        'ended_year',
        'specialty',
        'institution',
        'achievements',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'ended_year' => 'string',
    ];

    /**
     * @return BelongsTo<Graduation>
     */
    public function graduation(): BelongsTo
    {
        return $this->belongsTo(Graduation::class, 'graduation_id');
    }
}
