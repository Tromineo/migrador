<?php

namespace App\Helpers;

class GeradorComandoImapSync {

    public static function getComando(array $params) 
    {   
        $contaOrigem        = $params['email_origem'];
        $senhaOrigem        = $params['password_origem'];
        $servidorOrigem     = $params['servidor_origem'];
        $contaDestino       = $params['conta_destino'];
        $senhaDestino       = $params['senha_destino'];
        $servidorDestino    = $params['servidorDestino'];

        $dry = true; 
        
        $cmd = "imapsync --host1 {} --user1 conta1@tromineo.com.br --password1 'Abc12!34' --host2 imap.kinghost.net --user2 conta2@tromineo.com.br --password2 'Abc12!34' --sep1 . --prefix1 INBOX. --regextrans2 s,^Inbox$,INBOX, --regextrans2 s,/,.,g --authmech1 LOGIN --timeout1 90 --authmech2 LOGIN --timeout 90 --sep2 . --prefix2 INBOX. --subscribe_all --showpasswords --errorsmax 1000 --dry --delete2duplicates --exclude 'Todos os e-mails|ALL|spam'";


        return sprintf(
            'docker exec %s imapsync --host1 source.imap.server --user1 %s --pass1 source_password --host2 destination.imap.server --user2 %s --pass2 destination_password',
            escapeshellarg($dockerContainer),
            escapeshellarg($sourceEmail),
            escapeshellarg($destinationEmail)
        );
    }
}