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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['member', 'non-member']);
            $table->string('membership_no');
            $table->string('name');
            $table->string('guest')->nullable();
            $table->string('contact',13);
            $table->string('email',50);
            $table->string('destination');
            $table->tinyInteger('number_of_rooms');
            $table->tinyInteger('adults')->nullable();
            $table->tinyInteger('child_below_6_years')->nullable();
            $table->date('check_in');
            $table->date('check_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
