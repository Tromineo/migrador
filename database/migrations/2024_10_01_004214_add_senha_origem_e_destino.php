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
        Schema::table('sync_jobs', function(Blueprint $table){
            $table->string('senha_origem');
            $table->string('senha_destino');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sync_jobs', function(Blueprint $table){
            $table->dropColumn('senha_origem');
            $table->dropColumn('senha_destino');
        });
    }
};
