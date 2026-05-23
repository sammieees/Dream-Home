<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->foreignId('branch_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');

        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {

            $table->dropForeign(['branch_id']);

            $table->dropColumn('branch_id');

        });
    }
};