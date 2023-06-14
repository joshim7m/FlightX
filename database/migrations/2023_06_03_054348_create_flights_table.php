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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('from_city');
            $table->string('from_airport');
            $table->string('to_city');
            $table->string('to_airport');
            $table->timestamp('departure_on')->useCurrent();
            $table->timestamp('arrival_on')->useCurrent();
            $table->double('duration');
            $table->tinyInteger('stops');
            $table->double('ticket_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
