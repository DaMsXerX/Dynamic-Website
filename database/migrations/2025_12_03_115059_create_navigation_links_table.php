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
           Schema::create('navigation_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('settings_id')->nullable()->constrained('settings')->onDelete('set null');
            $table->string('label');
            $table->string('url');
            $table->integer('order')->default(0);
            $table->boolean('is_primary')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_links');
    }
};
