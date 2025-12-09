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
       Schema::create('hero_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_id')->constrained('heroes')->onDelete('cascade');
            $table->string('capacity')->nullable();
            $table->string('central')->nullable();
            $table->string('state')->nullable();
            $table->string('total')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_tables');
    }
};
