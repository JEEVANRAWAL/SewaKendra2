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
             // Drop the existing foreign key constraint
             $table->dropForeign(['user_id']);

             // Set the new foreign key constraint with 'cascade' onDelete behavior
             $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade');

             $table->dropForeign(['service_id']);
            

             $table->foreign('service_id')
                 ->references('id')
                 ->on('services')
                 ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['service_id']);
        });
    }
};
