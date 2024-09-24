<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyncJob extends Model
{
    use HasFactory;


    protected $fillable = [
        'email_origem',
        'email_destino',
        'servidor_origem',
        'servidor_destino',
        'status',
        'inicio',
        'final',
        'command_executed',
        'log_execucao',
        'return_code',
        'attempts',
        'ip',
        'emails_migrated',
        'size_migrated',
        'folders_migrated',
    ];
}
