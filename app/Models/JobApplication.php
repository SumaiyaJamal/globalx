<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    protected $table = 'job_applications';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'experience',
        'cv_path',
        'cover_letter_path',
        'notes',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Get full name
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function jobPost(): BelongsTo
    {
        return $this->belongsTo(JobPost::class, 'job_post_id', 'id');
    }
}
