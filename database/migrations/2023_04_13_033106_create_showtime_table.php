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
        Schema::create('showtimes', function (Blueprint $table) {
            
           $table->increments('showtimeId');
         $table->integer('movieId', autoIncrement: false);
         $table->integer('hallId', autoIncrement: false);
          $table->string('startTime', 100);
          $table->string('endTime', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtime');
    }
};
