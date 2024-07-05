<?php

// Definir las constantes para los comandos y países disponibles
define('COMMANDS', ['.rnd', '!rnd', '/rnd', '/Rnd', '/rNd', '/rnD', '/RNd', '/RNd', '/RnD', '!Rnd', '!rNd', '!rnD', '!RNd', '!RNd', '!RnD', '.Rnd', '.rNd', '.rnD', '.RNd', '.RNd', '.RnD']);
define('COUNTRIES', ['mx', 'us', 'ca', 'tr', 'no', 'rs', 'fi', 'de', 'ua', 'ch', 'br', 'dk', 'nl', 'ir', 'ie', 'gb', 'es', 'au', 'fr', 'in', 'nz']);

// Determinar el nivel de acceso del usuario
if ($isAdmin) {
$pChkU = "Owner";
} elseif (in_array($user['id'], $f_data['premiuns'])) {
$pChkU = "Premium";
} else {
$pChkU = "Free";
}

// Verificar si el usuario es un vendedor
if (in_array($user['id'], $sellers)) {
$pChkU = "Seller";
}

// Obtener el país del comando rnd
$rnd1 = $msg['text'];
$rnd = substr($rnd1, 5);

// Verificar si el comando rnd se ha enviado
if (cCmd($msg['text'], COMMANDS)) {
$eMsg = explode(' ', $msg['text']);
$cEMsg = count($eMsg);

// Verificar si se ha proporcionado un país válido
if ($cEMsg == 1) {
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "
𝙐𝙣𝙞𝙩𝙚𝙙 𝙎𝙩𝙖𝙩𝙚𝙨 -» 𝙪𝙨 🇺🇸
𝘾𝙖𝙣𝙖𝙙𝙖 -» 𝙘𝙖 🇨🇦
𝙏𝙪𝙧𝙠𝙚𝙮 -» 𝙩𝙧 🇹🇷
𝙉𝙤𝙧𝙬𝙖𝙮 -» 𝙣𝙤 🇳🇴
𝙎𝙚𝙧𝙗𝙞𝙖 -» 𝙧𝙨 🇷🇸
𝙁𝙞𝙣𝙡𝙖𝙣𝙙 -» 𝙛𝙞 🇫🇮
𝙂𝙚𝙧𝙢𝙖𝙣𝙮 -» 𝙙𝙚 🇩🇪
𝙐𝙠𝙧𝙖𝙞𝙣𝙚 -» 𝙪𝙖 🇺🇦
𝙎𝙬𝙞𝙩𝙯𝙚𝙧𝙡𝙖𝙣𝙙 -» 𝙘𝙝 🇨🇭
𝘽𝙧𝙖𝙨𝙞𝙡 -» 𝙗𝙧 🇧🇷
𝘿𝙚𝙣𝙢𝙖𝙧𝙠 -» 𝙙𝙠 🇩🇰
𝙈𝙚𝙭𝙞𝙘𝙤 -» 𝙢𝙭 🇲🇽
𝙉𝙚𝙩𝙝𝙚𝙧𝙡𝙖𝙣𝙙𝙨 -» 𝙣𝙡 🇳🇱
𝙄𝙧𝙖𝙣 -» 𝙞𝙧 🇮🇷
𝙄𝙧𝙡𝙖𝙣𝙙𝙖 -» 𝙞𝙚 🇮🇪
𝙐𝙣𝙞𝙩𝙚𝙙 𝙆𝙞𝙣𝙜𝙙𝙤𝙢 -» 𝙜𝙗 🇬🇧
𝙎𝙥𝙖𝙞𝙣 -» 𝙚𝙨 🇪🇸
𝘼𝙪𝙨𝙩𝙧𝙖𝙡𝙞𝙖 -» 𝙖𝙪 🇦🇺
𝙁𝙧𝙖𝙣𝙘𝙚 -» 𝙛𝙧 🇫🇷
𝙄𝙣𝙙𝙞𝙖 -» 𝙞𝙣 🇮🇳
𝙉𝙚𝙬 𝙕𝙚𝙖𝙡𝙖𝙣𝙙 -» 𝙣𝙯 🇳🇿",
'reply_to_message_id' => $msg['message_id']
]);
} elseif ($cEMsg == 2 && in_array(strtolower($eMsg[1]), COUNTRIES)) {
// Enviar un mensaje de espera mientras se procesa la solicitud
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "Procesando tu solicitud...",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

// Obtener los datos aleatorios del país seleccionado
$Rndus = file_get_contents("$hosting/rnd/rnd.php?nat=$rnd");
$status = capture($Rndus, '"status":',',');
$gender = capture($Rndus, '"gender":"','"');
$title = capture($Rndus, '"name":{"title":"','"');
$firts = capture($Rndus, '"first":"','"');
$last = capture($Rndus, '"last":"','"');
$country = capture($Rndus, '"country":"','"');
$state = capture($Rndus, '"state":"','"');
$city = capture($Rndus, '"city":"','"');
$street = capture($Rndus, '"street":"','",');
$nat_emoji = capture($Rndus, '"nat_emoji":"','"');
$nat = capture($Rndus, '"nat":"','"');
$ssn = capture($Rndus, '"SSN":"','"');
$phone = capture($Rndus, '"phone":"','"');
$zip = capture($Rndus, '"zip":',',');
$email = capture($Rndus, '"email":"','"');

if (empty($ssn)) {
$ssn = 'UNAVAILABLE';
}

// Verificar si se han obtenido los datos aleatorios correctamente
if($status == 'true') {
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "
零 𝙂𝙚𝙣𝙙𝙚𝙧 -» <code>".$gender."</code>
青 𝙏𝙞𝙩𝙡𝙚 -» <code>".$title."</code>
白 𝙁𝙞𝙧𝙩𝙨 -» <code>".$firts."</code>
白 𝙇𝙖𝙨𝙩 -» <code>".$last."</code>

朱 𝙎𝙩𝙖𝙩𝙚 -» <code>".$state."</code>
亥 𝘾𝙞𝙩𝙮 -» <code>".$city."</code>
亥 𝙎𝙩𝙧𝙚𝙚𝙩 -» <code>".$street."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$country." ".$nat_emoji."</code>

南 𝙎𝙨𝙣 -» <code>".$ssn."</code>
栗 𝙋𝙝𝙤𝙣𝙚 -» <code>".$phone."</code>
北 𝙕𝙞𝙥 -» <code>".$zip."</code>
北 𝙀𝙢𝙖𝙞𝙡 -» <code>".$email."</code>
"
]);
}
}
}