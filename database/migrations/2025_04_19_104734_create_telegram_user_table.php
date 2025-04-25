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
        Schema::create('telegram_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unique('user_user_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('role', 10);
            $table->foreignId('login_id')->nullable()->constrained()->nullOnDelete();
            $table->boolean('is_register')->default(false);
            $table->string('full_name')->nullable();
            $table->integer('age')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegram_users');
    }
};
