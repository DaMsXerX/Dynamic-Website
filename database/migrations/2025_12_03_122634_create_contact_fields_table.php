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
        Schema::create('contact_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_form_id')->constrained('contact_forms')->onDelete('cascade');
            $table->string('label');
            $table->string('type')->default('text'); // text, textarea, email, phone, select, etc.
            $table->boolean('is_required')->default(true);
            $table->integer('order')->default(0);
            $table->text('options')->nullable(); // json or comma-separated for selects
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_fields');
    }
};
