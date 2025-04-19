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
        Schema::create('paymentstudent', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('created_at')->useCurrent();
            $table->integer('login_id')->nullable()->index('paymentstudent_login_id');
            $table->integer('price');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentstudent');
    }
};
