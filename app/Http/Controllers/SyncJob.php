<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SyncJob extends Controller
{
    public function index()
    {
        return 1;
    }

    public function store(Request $request)
    {
        $dry = true;
        $request->validate(
            [
                'email_origem'          =>'email:rfc,filter',
                'password_origem'       =>'required|min:6',
                'servidor_origem'       =>'required|min:6',
                'email_destino'         =>'email:rfc,filter',
                'password_destino'      =>'required|min:6',
                'servidor_destino'      =>'required|min:6',
            ]);

        $prefixo = date('Y-m-d')."_".$request->email_origem;

        $options = [
            'host1' => $request->servidor_origem,
            'user1' => $request->email_origem,
            'password1' => $request->password_origem,
            'host2' => $request->servidor_destino,
            'user2' => $request->email_destino,
            'password2' => $request->password_destino,
            'sep1' => '.',
            'prefix1' => 'INBOX.',
            'regextrans2' => ['s,^Inbox$,INBOX,', 's,/,.,g'],
            'authmech1' => 'LOGIN',
            'timeout1' => 90,
            'authmech2' => 'LOGIN',
            'timeout2' => 90,
            'sep2' => '.',
            'prefix2' => 'INBOX.',
            'subscribe_all' => true,
            'showpasswords' => true,
            'errorsmax' => 1000,
            'dry' => $dry,
            'delete2duplicates' => true,
        ];

        $imapsync = new \ImapSync\ImapSync($options);

        $res = $imapsync->execute();
        file_put_contents($prefixo, $res);
        return 12;
    }

}

 
