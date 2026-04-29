<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            if (Schema::hasColumn('job_posts', 'sort_order')) {
                $table->dropColumn('sort_order');
            }

            if (Schema::hasColumn('job_posts', 'published_at')) {
                $table->dropColumn('published_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            if (! Schema::hasColumn('job_posts', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0);
            }

            if (! Schema::hasColumn('job_posts', 'published_at')) {
                $table->timestamp('published_at')->nullable();
            }
        });
    }
};
