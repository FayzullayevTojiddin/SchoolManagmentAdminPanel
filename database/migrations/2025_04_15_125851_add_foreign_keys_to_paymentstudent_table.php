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
        Schema::table('paymentstudent', function (Blueprint $table) {
            $table->foreign(['login_id'], 'paymentstudent_ibfk_1')->references(['id'])->on('student')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paymentstudent', function (Blueprint $table) {
            $table->dropForeign('paymentstudent_ibfk_1');
        });
    }
};
