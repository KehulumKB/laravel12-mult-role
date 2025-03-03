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
        Schema::create('share_holders', function (Blueprint $table) {
            $table->id();
            $table->string('residency_status')->default('RESIDENT');
            $table->string('country_of_residence')->default('Ethiopia');
            $table->string('bank_of_the_client')->nullable();
            $table->string('cash_account')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nuique();
            $table->foreignId('adress_id')->constrained();
            $table->foreignId('economic_sector_id')->constrained();
            $table->foreignId('share_holder_type_id')->constrained();
            $table->foreignId('share_holder_category_id')->constrained();
            $table->integer('total_shares');
            $table->float('total_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('share_holders');
    }
};
