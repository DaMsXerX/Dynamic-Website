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
        Schema::create('intro_sections', function (Blueprint $table) {
            $table->id();
            // LEFT SIDE
            $table->string('heading')->nullable();          // main heading
            $table->string('highlight_text')->nullable();   // "Leading" in your example
            $table->text('paragraph1')->nullable();
            $table->text('paragraph2')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button_bg_color')->default('#004b92');
            $table->string('button_text_color')->default('#004b92');

            // RIGHT SIDE
            $table->string('image')->nullable();           // image URL
            $table->string('footer_text')->nullable();     // gradient footer text (optional)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intro_sections');
    }
};
