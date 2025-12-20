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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->text('biography')->nullable();
            $table->json('expertise_areas')->nullable();
            $table->boolean('availability')->default(true);
            $table->string('linkedin_url')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->string('industry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};