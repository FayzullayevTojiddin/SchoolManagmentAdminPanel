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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 13);
            $table->string('telegram', 50);
            $table->string('full_name', 100);
            $table->string('subject', 50);
            $table->string('experience', 100);
            $table->string('school', 50);
            $table->string('achievements', 200);
            $table->string('feedback', 100);
            $table->string('description', 1000);
            $table->foreignId('login_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
