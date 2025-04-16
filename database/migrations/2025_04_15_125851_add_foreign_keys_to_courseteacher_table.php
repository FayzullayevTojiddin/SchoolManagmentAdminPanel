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
        Schema::table('courseteacher', function (Blueprint $table) {
            $table->foreign(['course_id'], 'courseteacher_ibfk_1')->references(['id'])->on('course')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['teacher_id'], 'courseteacher_ibfk_2')->references(['id'])->on('teacher')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courseteacher', function (Blueprint $table) {
            $table->dropForeign('courseteacher_ibfk_1');
            $table->dropForeign('courseteacher_ibfk_2');
        });
    }
};
