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
        Schema::create('telegram_user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('created_at')->useCurrent();
            $table->bigInteger('user_id')->unique('user_user_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('role', 10);
            $table->integer('login_id')->nullable()->index('user_login_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telegram_user');
    }
};
