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
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
        $table->text('description')->nullable();

        $table->string('phone_heading')->default('Phone');
        $table->string('phone_value')->nullable();

        $table->string('email_heading')->default('Email');
        $table->string('email_value')->nullable();

        $table->string('address_heading')->default('Address');
        $table->text('address_value')->nullable();

        $table->text('map_embed_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_details');
    }
};
