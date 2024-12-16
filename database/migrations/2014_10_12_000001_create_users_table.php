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
        Schema::create('users', function (Blueprint $table) {
            $table->id('u_id');
            $table->string('u_code')->nullable()->unique();
            $table->string('u_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('acc_name');
            $table->boolean('is_deleted')->default(false);
            $table->string('u_type')->default("customer");  // Ensure this matches user_types' u_type_id
            // $table->unsignedBigInteger('u_type_id');  // Ensure this matches user_types' u_type_id
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('u_type_id')
            //     ->references('u_type_id')
            //     ->on('user_types')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};