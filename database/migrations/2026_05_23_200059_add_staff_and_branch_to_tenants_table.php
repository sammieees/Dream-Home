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
        Schema::table('tenants', function (Blueprint $table) {

            $table->foreignId('staff_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            $table->foreignId('branch_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {

            $table->dropForeign(['staff_id']);
            $table->dropColumn('staff_id');

            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');

        });
    }
};