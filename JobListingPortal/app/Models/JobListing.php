<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobListing extends Model
{
    protected $table = 'job_listings';

    protected $fillable = [
        'user_id', 'title', 'company', 'location', 'job_type', 'salary', 'description',
    ];

    public const TYPES = ['Internship', 'Full-time', 'Part-time', 'Remote'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
