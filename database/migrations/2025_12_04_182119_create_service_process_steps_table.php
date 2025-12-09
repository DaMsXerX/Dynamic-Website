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
        Schema::create('service_process_steps', function (Blueprint $table) {
            $table->id();
             $table->string('title');            // Step title
            $table->text('description')->nullable(); // Step description
            $table->integer('order')->default(0);    // For ordering steps
            $table->string('page_slug')->default('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_process_steps');
    }
};
