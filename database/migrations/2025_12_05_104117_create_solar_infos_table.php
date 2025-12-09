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
        Schema::create('solar_infos', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique(); // example: "contact", "home"
            $table->longText('title')->nullable();
            $table->longText('description')->nullable(); // rich text
            $table->string('call_heading')->nullable();  // example: "Call Us:"
            $table->string('call_number')->nullable();   // example: "+91..."
            $table->string('icon_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solar_infos');
    }
};
