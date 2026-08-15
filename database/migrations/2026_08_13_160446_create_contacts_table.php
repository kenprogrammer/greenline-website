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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('email');
            $table->string('email_2')->nullable();
            $table->string('email_3')->nullable();
            $table->string('postal_address');
            $table->string('office_location')->comment("Organisation's office location");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
