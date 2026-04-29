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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 160);
            $table->string('location', 120)->nullable();
            $table->string('job_type', 60)->nullable(); // e.g. Full-time, Part-time, Contract, Remote
            $table->string('department', 120)->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
