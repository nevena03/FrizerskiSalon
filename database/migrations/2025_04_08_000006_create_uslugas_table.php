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
        Schema::create('uslugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv')->unique();
            $table->decimal('cena');
            $table->unsignedBigInteger('administrator_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uslugas');
    }
};
