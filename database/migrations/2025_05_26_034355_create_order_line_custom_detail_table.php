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
        Schema::create('order_line_custom_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_line_id')->constrained('order_lines')->cascadeOnDelete();
            $table->string('client_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('faceplate_l')->nullable();
            $table->string('faceplate_r')->nullable();
            $table->string('shell_l')->nullable();
            $table->string('shell_r')->nullable();
            $table->string('logo_l')->nullable();
            $table->string('logo_r')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_line_custom_detail');
    }
};
