<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'title',
        'location',
        'job_type',
        'department',
        'is_active',
        'short_description',
        'description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
