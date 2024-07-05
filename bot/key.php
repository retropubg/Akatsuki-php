<?php

if(cCmd($msg['text'], ['/gkey', '!gkey', '.gkey']) && $isAdmin){
$eMsg = explode(' ', $msg['text']);
 $cEMsg = count($eMsg);
 
 function generateRandomString($length = 24) {
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, strlen($characters) - 1)];
}
return $randomString;
}

$akatsuki = "Akatsuki";
$aktz = "Aktz";
$key = "Key";

// Cargamos las claves existentes del archivo JSON en un array
$keys = json_decode(file_get_contents('keys.json'), true);

$random1 = generateRandomString(26);
$random2 = generateRandomString(26);
$random3 = generateRandomString(26);

// Creamos la nueva clave y la agregamos al array
$keypro = "$akatsuki -» $random1 -» $aktz -» $random2 -» $key -» $random3";
$keys[] = $keypro;

// Escribimos el array completo con la nueva clave en el archivo JSON
file_put_contents('keys.json', json_encode($keys));
 
if($cEMsg == 1){
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙆𝙚𝙮 -» <code>".$keypro."</code>",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

$msgId_bot = output('sendMessage', [
'chat_id' => 1205717709,
'text' => "
𝙆𝙚𝙮 -» <code>".$keypro."</code>
by -» ".$user['id']."",
]);
}
}