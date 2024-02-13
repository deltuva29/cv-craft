<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasUuid;
    use HasFactory;

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
}
