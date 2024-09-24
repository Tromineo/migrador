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
        Schema::create('sync_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('email_origem');
            $table->string('email_destino');
            $table->string('servidor_origem');
            $table->string('servidor_destino');
            $table->enum('status', ['em_andamento', 'finalizado', 'falha', 'cancelado']);
            $table->timestamp('inicio')->nullable();
            $table->timestamp('final')->nullable();
            $table->text('command_executed');
            $table->text('log_execucao')->nullable();
            $table->integer('return_code')->nullable();
            $table->integer('attempts')->default(0);
            $table->ipAddress('ip')->nullable();
            $table->integer('emails_migrated')->nullable();
            $table->bigInteger('size_migrated')->nullable();
            $table->text('folders_migrated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sync_jobs');
    }
};
