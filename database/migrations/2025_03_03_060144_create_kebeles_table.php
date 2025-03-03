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
        Schema::create('kebeles', function (Blueprint $table) {
            $table->id();
            $table->string('kebele')->unique();
            $table->foreignId('woreda_id')->constrained();
            $table->foreignId('sub_city_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebeles');
    }
};
