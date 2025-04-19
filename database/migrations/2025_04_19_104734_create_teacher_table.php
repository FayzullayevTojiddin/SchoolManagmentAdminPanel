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
        Schema::create('teacher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('created_at')->useCurrent();
            $table->string('phone_number', 13);
            $table->string('telegram', 50);
            $table->string('full_name', 100);
            $table->string('subject', 50);
            $table->string('experience', 100);
            $table->string('school', 50);
            $table->string('achievements', 200);
            $table->string('feedback', 100);
            $table->string('description', 1000);
            $table->integer('login_id')->nullable()->index('teacher_login_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
