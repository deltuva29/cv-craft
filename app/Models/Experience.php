<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'description',
        'current',
        'profile_id',
        'job_title_id',
        'company_id',
        'started_at',
        'ended_at',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'current' => 'boolean',
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    /**
     * @return BelongsTo<User>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo<JobTitle>
     */
    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }

    /**
     * @return BelongsTo<Company>
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
