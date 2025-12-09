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
        Schema::create('p_m_subsidies', function (Blueprint $table) {
        $table->id();
        $table->string('capacity');   // e.g. "1 kW"
        $table->string('amount');     // e.g. "₹30,000"
        $table->string('note')->nullable();  // e.g. "State Subsidy"
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_m_subsidies');
    }
};
