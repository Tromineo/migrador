<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\GeradorComandoImapSync;
use App\Models\SyncJob as Model;

class SyncJob extends Controller
{
    public function index()
    {
        return '1';
    }
    public function store(Request $request)
    {
        $attemps = 1;
        $request->validate([
            'email_origem'    =>'required|email:rfc,filter',
            'email_destino'   =>'required|email:rfc,filter',
            'senha_origem'    =>'required|min:6',
            'senha_destino'   =>'required|min:6',
            'servidor_origem' =>'required|min:6',
            'servidor_destino'=>'required|min:6',
        ]);
        $options = [
            'servidor_origem' => $request->servidor_origem,
            'email_origem' => $request->email_origem,
            'senha_origem' => $request->senha_origem,
            'servidor_destino' => $request->servidor_destino,
            'email_destino' => $request->email_destino,
            'senha_destino' => $request->senha_destino,
        ];
        $cmd = GeradorComandoImapSync::getComando($options);
        Model::create([
            'email_origem'    => $request->email_origem,
            'email_destino'   => $request->email_destino,
            'servidor_origem' => $request->servidor_origem,
            'servidor_destino'=> $request->servidor_destino,
            'attempts'        => $attemps,
            'ip'              => $request->ip(),
            'command_executed'=> $cmd
        ]);
        return $cmd;
    }
}

 
