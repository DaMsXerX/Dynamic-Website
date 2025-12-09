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
        Schema::create('subsidy_rows', function (Blueprint $table) {
            $table->id();
            $table->string('section_slug')->nullable(); // e.g. pm_surya_ghar
            $table->string('capacity')->nullable();
            $table->string('central_subsidy')->nullable();
            $table->string('state_subsidy')->nullable();
            $table->string('total_subsidy')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsidy_rows');
    }
};
