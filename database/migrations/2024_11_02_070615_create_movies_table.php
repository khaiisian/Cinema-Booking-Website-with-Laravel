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
        Schema::create('movies', function (Blueprint $table) {
            $table->softDeletes();
            $table->id('movie_id');
            $table->string('movie_title', 150);
            $table->string('movie_content', 500);
            $table->string('movie_image')->nullable();
            $table->date('release_date');
            $table->decimal('movie_duration', 6, 2);
            $table->string('movie_status', 20);
            $table->string('age_rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};