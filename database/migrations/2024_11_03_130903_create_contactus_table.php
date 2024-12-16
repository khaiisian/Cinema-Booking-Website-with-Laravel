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
        Schema::create('contactus', function (Blueprint $table) {
            $table->id('contact_id');
            $table->string('contact_title');
            $table->string('contact_msg');
            $table->unsignedBigInteger('u_id');
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
            $table->foreign('u_id')->references('u_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};