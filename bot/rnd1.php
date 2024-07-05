<?php

// Definir las constantes para los comandos y países disponibles
define('randc', ['.rand', '!rand', '/rand', '/Rand', '/rAnd', '/raNd', '/ranD', '/RAnd', '/RaN', '/rAnD', '!Rand', '!rAnd', '!raNd', '!rAND', '!RANd', '.Rand', '.rAnd', '.raNd', '.RANd', '.RAnd', '.rAND']);

define('randcou', ['vn', 'ug', 'th', 'se', 'kr', 'za', 'sg', 'sa', 'ru', 'ro', 'pt', 'pl', 'ph', 'pe', 'ng', 'np', 'my', 'jp', 'it', 'be', 'ar', 'bd', 'cn', 'cz', 'gr', 'hu', 'id', 'nz']);

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
$rnd11 = substr($rnd1, 6);

// Verificar si el comando rnd se ha enviado
if (cCmd($msg['text'], randc)) {
$eMsg = explode(' ', $msg['text']);
$cEMsg = count($eMsg);

// Verificar si se ha proporcionado un país válido
if ($cEMsg == 1) {
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "
𝘽𝙖𝙣𝙜𝙡𝙖𝙙𝙚𝙨𝙝 -» 𝙗𝙙 🇧🇩
𝘽𝙚𝙡𝙜𝙞𝙪𝙢 -» 𝙗𝙚 🇧🇪
𝘾𝙝𝙞𝙣𝙖 -» 𝙘𝙣 🇨🇳
𝘾𝙯𝙚𝙘𝙝 𝙍𝙚𝙥𝙪𝙗𝙡𝙞𝙘 -» 𝙘𝙯 🇨🇿
𝙂𝙧𝙚𝙚𝙘𝙚 -» 𝙜𝙧 🇬🇷
𝙃𝙪𝙣𝙜𝙖𝙧𝙮 -» 𝙝𝙪 🇭🇺
𝙄𝙣𝙙𝙤𝙣𝙚𝙨𝙞𝙖 -» 𝙞𝙙 🇮🇩
𝙄𝙩𝙖𝙡𝙮 -» 𝙞𝙩 🇮🇹
𝙅𝙖𝙥𝙖𝙣 -» 𝙟𝙥 🇯🇵
𝙈𝙖𝙡𝙖𝙮𝙨𝙞𝙖 -» 𝙢𝙮 🇲🇾
𝙉𝙚𝙥𝙖𝙡 -» 𝙣𝙥 🇳🇵
𝙉𝙞𝙜𝙚𝙧𝙞𝙖 -» 𝙣𝙜 🇳🇬
𝙋𝙚𝙧𝙪 -» 𝙥𝙚 🇵🇪
𝙋𝙝𝙞𝙡𝙞𝙥𝙥𝙞𝙣𝙚𝙨 -» 𝙥𝙝 🇵🇭
𝙋𝙤𝙡𝙖𝙣𝙙 -» 𝙥𝙡 🇵🇱
𝙋𝙤𝙧𝙩𝙪𝙜𝙖𝙡 -» 𝙥𝙩 🇵🇹
𝙍𝙤𝙢𝙖𝙣𝙞𝙖 -» 𝙧𝙤 🇷🇴
𝙍𝙪𝙨𝙨𝙞𝙖 -» 𝙧𝙪 🇷🇺
𝙎𝙖𝙪𝙙𝙞 𝘼𝙧𝙖𝙗𝙞𝙖 -» 𝙨𝙖 🇸🇦
𝙎𝙞𝙣𝙜𝙖𝙥𝙤𝙧𝙚 -» 𝙨𝙜 🇸🇬
𝙎𝙤𝙪𝙩𝙝 𝘼𝙛𝙧𝙞𝙘𝙖 -» 𝙯𝙖 🇿🇦
𝙎𝙤𝙪𝙩𝙝 𝙆𝙤𝙧𝙚𝙖 -» 𝙠𝙧 🇰🇷
𝙎𝙬𝙚𝙙𝙚𝙣 -» 𝙨𝙚 🇸🇪
𝙏𝙝𝙖𝙞𝙡𝙖𝙣𝙙 -» 𝙩𝙝 🇹🇭
𝙐𝙜𝙖𝙣𝙙𝙖 -» 𝙪𝙜 🇺🇬
𝙑𝙞𝙚𝙩𝙣𝙖𝙢 -» 𝙫𝙣 🇻🇳
𝘼𝙧𝙜𝙚𝙣𝙩𝙞𝙣𝙖 -» 𝙖𝙧 🇦🇷",
'reply_to_message_id' => $msg['message_id']
]);
} elseif ($cEMsg == 2 && in_array(strtolower($eMsg[1]), randcou)) {
// Enviar un mensaje de espera mientras se procesa la solicitud
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "Procesando tu solicitud...",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

// Obtener los datos aleatorios del país seleccionado
$Rndus1 = file_get_contents("$hosting/rnd/rnd1.php?rnd=$rnd11");
$status = capture($Rndus1, '"status":',',');
$gender = capture($Rndus1, '"gender":"','"');
$title = capture($Rndus1, '"name":{"title":"','"');
$firts = capture($Rndus1, '"first":"','"');
$last = capture($Rndus1, '"last":"','"');
$country = capture($Rndus1, '"Country":"','"');
$state = capture($Rndus1, '"State":"','"');
$city = capture($Rndus1, '"City":"','"');
$street = capture($Rndus1, '"Street":"','"');
$nat_emoji1 = capture($Rndus1, '"emoji":"','"');
$ssn = capture($Rndus1, '"SSN":"','"');
$phone = capture($Rndus1, '"Phone":"','"');
$zip = capture($Rndus1, '"Zip":"','"');
$email = capture($Rndus1, '"email":"','"');

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
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$country." ".$nat_emoji1."</code>

南 𝙎𝙨𝙣 -» <code>".$ssn."</code>
栗 𝙋𝙝𝙤𝙣𝙚 -» <code>".$phone."</code>
北 𝙕𝙞𝙥 -» <code>".$zip."</code>
北 𝙀𝙢𝙖𝙞𝙡 -» <code>".$email."</code>
"
]);
}
else{
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "msg:".$rnd11.""
]);
}
}
}