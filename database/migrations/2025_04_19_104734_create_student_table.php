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
        Schema::create('student', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('created_at')->useCurrent();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('father_name', 100);
            $table->date('birthday');
            $table->text('description')->nullable();
            $table->integer('login_id')->nullable()->index('student_login_id');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
