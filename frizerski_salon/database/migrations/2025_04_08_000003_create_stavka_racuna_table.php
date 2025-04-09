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
        Schema::create('stavka_racuna', function (Blueprint $table) {
            $table->unsignedBigInteger('usluga_id');
            $table->unsignedBigInteger('racun_id');
            $table->decimal('cena');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stavka_racuna');
    }
};
