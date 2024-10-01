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
            $table->enum('status',['em_andamento','finalizado', 'falha', 'cancelado', 'comando_gerado'])->nullable()->default('comando_gerado')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sync_jobs',function(Blueprint $table){
            $table->enum('status',['em_andamento','finalizado', 'falha', 'cancelado'])->nullable()->default(null)->change();
        });
    }
};
