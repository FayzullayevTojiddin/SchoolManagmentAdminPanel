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
        Schema::create('groupstudent', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id')->index('groupstudent_student_id');
            $table->integer('group_id')->index('groupstudent_group_id');
            $table->bigInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groupstudent');
    }
};
