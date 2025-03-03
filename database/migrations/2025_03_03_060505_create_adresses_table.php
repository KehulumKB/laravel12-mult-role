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
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->string('house_number')->unique();
            $table->foreignId('kebele_id')->constrained();
            $table->foreignId('sub_city_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('woreda_id')->constrained();
            $table->foreignId('zone_id')->constrained();
            $table->foreignId('region_id')->constrained();
            $table->foreignId('country_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
