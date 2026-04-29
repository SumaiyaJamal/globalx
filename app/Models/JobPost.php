<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class JobPost extends Model
{
    private static ?bool $hasSlugColumn = null;

    protected $fillable = [
        'title',
        'slug',
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

    protected static function booted(): void
    {
        static::creating(function (self $jobPost): void {
            if (!static::hasSlugColumn()) {
                return;
            }
            if (!$jobPost->slug) {
                $jobPost->slug = static::generateUniqueSlug($jobPost->title);
            }
        });

        static::updating(function (self $jobPost): void {
            if (!static::hasSlugColumn()) {
                return;
            }
            if ($jobPost->isDirty('title') && !$jobPost->isDirty('slug')) {
                $jobPost->slug = static::generateUniqueSlug($jobPost->title, $jobPost->id);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    private static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title) ?: 'job';
        $slug = $baseSlug;
        $counter = 2;

        while (
            static::query()
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }

    private static function hasSlugColumn(): bool
    {
        if (self::$hasSlugColumn === null) {
            self::$hasSlugColumn = Schema::hasColumn('job_posts', 'slug');
        }

        return self::$hasSlugColumn;
    }
}
