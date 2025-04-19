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
        Schema::create('homework', function (Blueprint $table) {
            $table->integer('id', true);
            $table->dateTime('created_at')->useCurrent();
            $table->integer('group_id')->index('homework_group_id');
            $table->boolean('completed');
            $table->string('title', 100);
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homework');
    }
};
