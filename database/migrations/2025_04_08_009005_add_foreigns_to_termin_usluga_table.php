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
        Schema::table('termin_usluga', function (Blueprint $table) {
            $table
                ->foreign('usluga_id')
                ->references('id')
                ->on('uslugas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('termin_id')
                ->references('id')
                ->on('termins')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('termin_usluga', function (Blueprint $table) {
            $table->dropForeign(['usluga_id']);
            $table->dropForeign(['termin_id']);
        });
    }
};
