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
        if (!Schema::hasColumn('property_viewings', 'viewing_time')) {

            Schema::table('property_viewings', function (Blueprint $table) {

                $table->time('viewing_time');

            });

        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('property_viewings', 'viewing_time')) {

            Schema::table('property_viewings', function (Blueprint $table) {

                $table->dropColumn('viewing_time');

            });

        }
    }
};