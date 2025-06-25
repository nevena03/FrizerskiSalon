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
        Schema::table('obavestenjas', function (Blueprint $table) {
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
        Schema::table('obavestenjas', function (Blueprint $table) {
            $table->dropForeign(['termin_id']);
        });
    }
};
