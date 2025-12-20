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
        Schema::table('mentors', function (Blueprint $table) {
            $table->integer('years_of_experience')->default(0)->after('availability');
            $table->string('industry')->nullable()->after('years_of_experience');
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->string('company_size')->nullable()->after('website');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mentors', function (Blueprint $table) {
            $table->dropColumn(['years_of_experience', 'industry']);
        });

        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('company_size');
        });
    }
};
