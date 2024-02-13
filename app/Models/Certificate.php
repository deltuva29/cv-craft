<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'started_at',
        'resume_id',
        'received_at',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'started_at' => 'date',
        'received_at' => 'date',
    ];
}
