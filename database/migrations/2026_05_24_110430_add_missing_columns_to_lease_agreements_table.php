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

            if (!Schema::hasColumn('lease_agreements', 'start_date')) {
                $table->date('start_date')->nullable();
            }

            if (!Schema::hasColumn('lease_agreements', 'end_date')) {
                $table->date('end_date')->nullable();
            }

            if (!Schema::hasColumn('lease_agreements', 'monthly_rent')) {
                $table->decimal('monthly_rent', 10, 2)->nullable();
            }

            if (!Schema::hasColumn('lease_agreements', 'terms')) {
                $table->text('terms')->nullable();
            }

            if (!Schema::hasColumn('lease_agreements', 'status')) {
                $table->string('status')->default('Active');
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lease_agreements', function (Blueprint $table) {

            $table->dropColumn([
                'start_date',
                'end_date',
                'monthly_rent',
                'terms',
                'status',
            ]);

        });
    }
};