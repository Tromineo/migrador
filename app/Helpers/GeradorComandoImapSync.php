<?php

namespace App\Helpers;

class GeradorComandoImapSync {

    const IMAPSYNC = 'imapsync_container';

    public static function getComando(array $params) 
    {   
        $contaOrigem        = $params['email_origem'];
        $senhaOrigem        = $params['senha_origem'];
        $servidorOrigem     = $params['servidor_origem'];
        $contaDestino       = $params['email_destino'];
        $senhaDestino       = $params['senha_destino'];
        $servidorDestino    = $params['servidor_destino'];

        $dry = true; 
        
        $cmd = "imapsync --host1 {$servidorOrigem} --user1 {$contaOrigem} --password1 '{$senhaOrigem}' --host2 {$servidorDestino} --user2 {$contaDestino} --password2 '{$senhaDestino}' --sep1 . --prefix1 INBOX. --regextrans2 s,^Inbox$,INBOX, --regextrans2 s,/,.,g --authmech1 LOGIN --timeout1 90 --authmech2 LOGIN --timeout 90 --sep2 . --prefix2 INBOX. --subscribe_all --showpasswords --errorsmax 1000 --dry --delete2duplicates --exclude 'Todos os e-mails|ALL|spam'";
        $cmd = "docker exec ".self::IMAPSYNC." ".$cmd;
        return $cmd;
    }
}