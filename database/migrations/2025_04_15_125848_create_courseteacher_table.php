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
        Schema::create('courseteacher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('created_at');
            $table->integer('course_id')->index('courseteacher_course_id');
            $table->integer('teacher_id')->index('courseteacher_teacher_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courseteacher');
    }
};
