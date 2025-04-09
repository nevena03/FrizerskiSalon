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
        Schema::create('obavestenjas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('poruka');
            $table->dateTime('datum');
            $table->unsignedBigInteger('termin_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obavestenjas');
    }
};
