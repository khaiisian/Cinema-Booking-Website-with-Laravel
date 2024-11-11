<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id');
            $table->time('booking_time');
            $table->date('booking_date');
            $table->string('booking_status');
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('session_id');
            $table->foreign('u_id')->references('u_id')->on('users')->onDelete('cascade');
            $table->foreign('session_id')->references('session_id')->on('sessions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};