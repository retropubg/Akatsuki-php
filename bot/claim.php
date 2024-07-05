<?php

if (cCmd($msg['text'], ['/claim', '!claim', '.claim'])) {
$eMsg = explode(' ', $msg['text']);
$cEMsg = count($eMsg);

if($cEMsg == 12) {
$key_to_check = trim($eMsg[1]);

$json_file = file_get_contents('keys.json');
$keys = json_decode($json_file, true);

// Verificar si la clave proporcionada existe en el array de keys
$key_exists = false;

foreach ($keys as $key) {
if (strpos($key, $key_to_check) !== false) {
$key_exists = true;
// Eliminar la clave del array
unset($keys[array_search($key, $keys)]);
break;
}
}

// Si la clave existe, guardar el nuevo array sin la clave en el archivo JSON
if ($key_exists) {
file_put_contents('keys.json', json_encode(array_values($keys)));
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙆𝙚𝙮 -» <code>".$key."</code>\n\n𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Succes! ✅</code>",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

$f_data['premiuns'][] = $user['id'];
file_put_contents('data.json', json_encode($f_data));

$msgId_bot = output('sendMessage', [
'chat_id' => 1205717709,
'text' => "
𝙆𝙚𝙮 -» <code>".$key."</code>
canjeada by -» ".$user['id']."
canjeada by -» ".$user['username']."",
]);
}
else{
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙆𝙚𝙮 -» <code>Invalid! ⚠️</code>",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];
}
} else {
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙆𝙚𝙮 -» <code>Invalid! ⚠️</code>",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];
}
}
