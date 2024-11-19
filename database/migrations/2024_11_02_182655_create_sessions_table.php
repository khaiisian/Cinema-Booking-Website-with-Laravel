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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger(column: 'theater_id');
            $table->time('session_start');
            $table->time('session_end');
            $table->date('session_date');
            $table->timestamps();
            $table->foreign('movie_id')->references('movie_id')->on('movies')->onDelete('cascade');
            $table->foreign('theater_id')->references('theater_id')->on('theaters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};