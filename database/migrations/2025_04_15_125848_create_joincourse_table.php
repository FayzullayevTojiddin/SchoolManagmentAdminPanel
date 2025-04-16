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
        Schema::create('joincourse', function (Blueprint $table) {
            $table->integer('id', true);
            $table->bigInteger('created_at');
            $table->bigInteger('user_id')->index('joincourse_user_id');
            $table->integer('course_id')->index('joincourse_course_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joincourse');
    }
};
