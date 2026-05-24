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
        Schema::create('lease_agreements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    
    Schema::create('lease_agreements', function (Blueprint $table) {

    $table->id();

    /*
    |--------------------------------------------------------------------------
    | PROPERTY
    |--------------------------------------------------------------------------
    */

    $table->foreignId('property_id')
          ->constrained()
          ->onDelete('cascade');

    /*
    |--------------------------------------------------------------------------
    | TENANT
    |--------------------------------------------------------------------------
    */

    $table->foreignId('tenant_id')
          ->constrained()
          ->onDelete('cascade');

    /*
    |--------------------------------------------------------------------------
    | LEASE DETAILS
    |--------------------------------------------------------------------------
    */

    $table->date('start_date');

    $table->date('end_date');

    $table->decimal('monthly_rent', 10, 2);

    $table->text('terms')->nullable();

    /*
    |--------------------------------------------------------------------------
    | STATUS
    |--------------------------------------------------------------------------
    */

    $table->string('status')
          ->default('Active');

    $table->timestamps();
    });
}
};
