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
        Schema::table('stavka_racuna', function (Blueprint $table) {
            $table
                ->foreign('usluga_id')
                ->references('id')
                ->on('uslugas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('racun_id')
                ->references('id')
                ->on('racuns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stavka_racuna', function (Blueprint $table) {
            $table->dropForeign(['usluga_id']);
            $table->dropForeign(['racun_id']);
        });
    }
};
