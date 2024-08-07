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
        Schema::table('bookings', function (Blueprint $table) {

            $table->unsignedBigInteger('provider_id')->nullable()->after('service_id');

            // Set the new foreign key constraint with 'cascade' onDelete behavior
            $table->foreign('provider_id')
                ->references('id')
                ->on('service_providers')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['provider_id']);
        });
    }
};
