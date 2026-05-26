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
    if (!Schema::hasTable('property_viewings')) {

        Schema::create('property_viewings', function (Blueprint $table) {

            $table->id();

            $table->foreignId('tenant_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('property_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('staff_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->date('viewing_date');

            $table->text('feedback')->nullable();

            $table->string('status')
                  ->default('Pending');

            $table->timestamps();
        });

    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_viewings');
    }
};