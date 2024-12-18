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
            $table->softDeletes();
            $table->id('booking_id');
            $table->string('booking_code')->nullable()->unique();
            $table->string('booking_status');
            $table->decimal('total_price');
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('showtime_id');
            $table->foreign('u_id')->references('u_id')->on('users')->onDelete('cascade');
            $table->foreign('showtime_id')->references('showtime_id')->on('showtimes')->onDelete('cascade');
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