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
        Schema::create('seats', function (Blueprint $table) {
            $table->softDeletes();
            $table->id('seat_id');
            $table->string('seat_code', 50);
            $table->string('seat_status', 50);
            $table->unsignedBigInteger('seat_type_id');
            $table->unsignedBigInteger('theater_id');
            $table->foreign('seat_type_id')->references('seat_type_id')->on('seat_types')->onDelete('cascade');
            $table->foreign('theater_id')->references('theater_id')->on('theaters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};