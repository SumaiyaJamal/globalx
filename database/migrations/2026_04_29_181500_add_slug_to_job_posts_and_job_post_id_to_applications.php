<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
        });

        $existingJobs = DB::table('job_posts')->select('id', 'title')->orderBy('id')->get();
        foreach ($existingJobs as $job) {
            $baseSlug = Str::slug($job->title) ?: 'job';
            $slug = $baseSlug;
            $counter = 2;

            while (DB::table('job_posts')->where('slug', $slug)->exists()) {
                $slug = "{$baseSlug}-{$counter}";
                $counter++;
            }

            DB::table('job_posts')->where('id', $job->id)->update(['slug' => $slug]);
        }

        Schema::table('job_applications', function (Blueprint $table) {
            $table->foreignId('job_post_id')->nullable()->after('position')->constrained('job_posts')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('job_post_id');
        });

        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
