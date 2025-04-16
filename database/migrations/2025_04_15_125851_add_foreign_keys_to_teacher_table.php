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
        Schema::table('teacher', function (Blueprint $table) {
            $table->foreign(['login_id'], 'teacher_ibfk_1')->references(['id'])->on('login')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teacher', function (Blueprint $table) {
            $table->dropForeign('teacher_ibfk_1');
        });
    }
};
