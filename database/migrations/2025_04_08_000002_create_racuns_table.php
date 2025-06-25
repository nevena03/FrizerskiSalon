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
        Schema::create('racuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('ukupna_cena');
            $table->string('nacin_placanja');
            $table->date('datum_izdavanja');
            $table->unsignedBigInteger('termin_id')->unique();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racuns');
    }
};
