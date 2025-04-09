<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('termins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datum');
            $table->time('vreme');
            $table->enum('status',['potvrdjen','nepotvrdjen','otkazan','zavrsen','propusten'])->default('nepotvrdjen');
            $table->unsignedBigInteger('frizer_id');
            $table->unsignedBigInteger('klijent_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termins');
    }
};
