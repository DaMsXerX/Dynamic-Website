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
        Schema::create('section_headings', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug');
            $table->string('section_slug');
            $table->string('heading');
            $table->string('highlight_text')->nullable();
            $table->string('extra_heading')->nullable();   // NEW FIELD
            $table->string('subheading')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_headings');
    }
};
