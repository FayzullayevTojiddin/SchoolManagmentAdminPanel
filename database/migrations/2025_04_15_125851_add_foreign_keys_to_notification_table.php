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
        Schema::table('notification', function (Blueprint $table) {
            $table->foreign(['from_in_id'], 'notification_ibfk_1')->references(['id'])->on('login')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['to_id'], 'notification_ibfk_2')->references(['id'])->on('login')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notification', function (Blueprint $table) {
            $table->dropForeign('notification_ibfk_1');
            $table->dropForeign('notification_ibfk_2');
        });
    }
};
