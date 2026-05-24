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
        Schema::table('lease_agreements', function (Blueprint $table) {

            if (!Schema::hasColumn('lease_agreements', 'property_id')) {

                $table->foreignId('property_id')
                    ->after('id')
                    ->constrained()
                    ->onDelete('cascade');

            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lease_agreements', function (Blueprint $table) {

            if (Schema::hasColumn('lease_agreements', 'property_id')) {

                $table->dropForeign(['property_id']);
                $table->dropColumn('property_id');

            }

        });
    }
};
