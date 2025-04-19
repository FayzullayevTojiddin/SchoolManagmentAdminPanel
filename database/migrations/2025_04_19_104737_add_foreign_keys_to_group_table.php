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
        Schema::table('group', function (Blueprint $table) {
            $table->foreign(['teacher_id'], 'group_ibfk_1')->references(['id'])->on('teacher')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['course_id'], 'group_ibfk_2')->references(['id'])->on('course')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('group', function (Blueprint $table) {
            $table->dropForeign('group_ibfk_1');
            $table->dropForeign('group_ibfk_2');
        });
    }
};
