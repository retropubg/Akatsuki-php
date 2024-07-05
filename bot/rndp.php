<?php

// Definir las constantes para los comandos y países disponibles
define('randc1', ['.rndp', '!rndp', '/rndp', '/Rndp', '/rNdp', '/rnDp', '/RNdp', '/RNdp', '/RnDp', '!Rndp', '!rNdp', '!rnDp', '!RNdp', '!RNdp', '!RnDp', '.Rndp', '.rNdp', '.rnDp', '.RNdp', '.RNdp', '.RnDp']);

define('randc1ou', ['kg', 'zw', 'zm', 'ye', 'vn', 've', 'uz', 'uy', 'us', 'uk', 'ua', 'ug', 'tr', 'tn', 'tt', 'is', 'cz', 'th', 'tz', 'tw', 'ch', 'se', 'sr', 'lk', 'es', 'za', 'si', 'sk', 'sg', 'sn', 'sa', 'rw', 'ru', 'ro', 'qa', 'pr', 'pt', 'pl', 'ph', 'pe', 'py', 'pg', 'pa', 'pk', 'om', 'no', 'ng', 'ni', 'nz', 'nl', 'np', 'na', 'mm', 'ma', 'md', 'mx', 'mu', 'mt', 'ml', 'my', 'mw', 'mg', 'lu', 'lt', 'ly', 'ls', 'lb', 'lv', 'kw', 'ko', 'ke', 'kz', 'jo', 'jp', 'jm', 'kt', 'it', 'il', 'ir', 'ie', 'id', 'in', 'hu', 'hk', 'hn', 'gt', 'gh', 'fr', 'fi', 'fj', 'et', 'ee', 'ae', 'sv', 'eg', 'ec', 'cd', 'do', 'dk', 'cy', 'cu', 'hr', 'cr', 'cn', 'co', 'cl', 'ca', 'cm', 'kh', 'bn', 'br', 'bw', 'bol', 'be', 'by', 'bb', 'bd', 'bh', 'bs', 'az', 'at', 'au', 'am', 'ar', 'dz', 'al']);

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
if (cCmd($msg['text'], randc1)) {
$eMsg = explode(' ', $msg['text']);
$cEMsg = count($eMsg);

// Verificar si se ha proporcionado un país válido
if ($cEMsg == 1) {
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "
Albania -» al 🇦🇱
Algeria -» dz 🇩🇿
Argentina -» ar 🇦🇷
Armenia -»am 🇦🇲
Australia-» au 🇦🇺
Austria -» at 🇦🇹
Azerbaijan -» az 🇦🇿
Bahamas -» bs 🇧🇸
Bahrain -» bh 🇧🇭
Bangladesh -» bd 🇧🇩
Barbados -» bb 🇧🇧
Belarus -» by 🇧🇾
Belgium -» be 🇧🇪
Bolivia -» bol 🇧🇴
Botswana -» bsw 🇧🇼
Brazil -» br 🇧🇷
Brunei -» bn 🇧🇳
Cambodia -» kh 🇰🇭
Cameroun -» cm 🇨🇲
Canada -» ca 🇨🇦
Chile -» cl 🇨🇱
Colombia -» co 🇨🇴
China -» cn 🇨🇳
Costa Rica -» cr 🇨🇷
Croatia -» hr  🇭🇷
Cuba -» cu 🇨🇺
Cyprus -» cy 🇨🇾
Denmark -» dk 🇩🇰 
Dominican Republic -» do 🇩🇴
DR Congo -» cd 🇨🇩
Ecuador -» ec 🇪🇨
Egypt -» eg 🇪🇬
El Salvador -» sv 🇸🇻
Emirates -» ae 🇦🇪
Estonia -» ee 🇪🇪
Ethiopia -» et 🇪🇹
Fiji -» fj 🇫🇯
Finland -» fi 🇫🇮
France -» fr 🇫🇷
Ghana -» gh 🇬🇭
Guatemala -» gt 🇬🇹
Honduras -» hn 🇭🇳
Hong Kong -» hk 🇭🇰
Hungary -» hu 🇭🇺
India -» in 🇮🇳
Indonesia -» id 🇮🇩
Iran -» ir 🇮🇷
Ireland -» ie 🇮🇪
Israel -» il 🇮🇱
Italy -» it 🇮🇹
Ivory Coast -» kt 🇨🇮
Jamaica -» jm 🇯🇲
Japan -» jp 🇯🇵
Jordan -» jo 🇯🇴
Kazakhstan -» kz 🇰🇿
Kenya -» ke 🇰🇪
Korea -» ko 🇰🇷
Kuwait -» kw 🇰🇼
Latvia -» lv 🇱🇻
Lebanon -» lb 🇱🇧
Lesotho -» ls 🇱🇸
Libya -» ly 🇱🇾
Lithuania -» lt 🇱🇹
Luxembourg -» lu 🇱🇺
Madagascar -» mg 🇲🇬
Malawi -» mw 🇲🇼
Malaysia -» my 🇲🇾
Mali -» ml 🇲🇱
Malta -» mt 🇲🇹
Mauritius -» mu 🇲🇺
México -» mx 🇲🇽
Moldova -» md 🇲🇩
Morocco -» ma 🇲🇦
Myanmar -» mm 🇲🇲
Namibia -» na 🇳🇦
Nepal -» np🇳🇵
Netherlands -» nl 🇳🇱
New Zealand -» nz 🇹🇰
Nicaragua -» ni 🇳🇮
Nigeria -» ng 🇳🇬
Norway -» no 🇳🇴
Oman -» om 🇴🇲
Pakistan -» pk 🇵🇰
Panamá -» pa 🇵🇦
Papua New Guinea -» pg 🇵🇬
Paraguay -» py 🇵🇾
Perú -» pe 🇵🇪
Philippines -» ph 🇵🇭
Poland -» pl 🇵🇱
Portuguese -» pt 🇵🇹
Puerto Rico -» pr 🇵🇷
Qatar -» qa 🇶🇦
Romania -» ro 🇷🇴
Russia -» ru 🇷🇺
Rwanda -» rw 🇷🇼
Saudi Arabia -» sa 🇸🇦
Senegal -» sn 🇸🇳
Singapore -» sg 🇸🇬
Slovakia -» sk 🇪🇺
Slovenia -» si 🇸🇮 
South Africa -» za 🇿🇦
Spain -» es 🇪🇦
Sri Lanka -» lk 🇱🇰
Suriname -» sr 🇸🇷
Sweden -» se 🇸🇪
Switzerland -» ch 🇨🇭
Taiwan(China) -» tw 🇨🇳
Tanzania -» tz 🇹🇿
Thailand -» th 🇹🇭
The Czech Republic -» cz 🇨🇿
The Republic of Iceland -» is 🇮🇸
Trinidad and Tobago -» tt 🇹🇹
Tunisia -» tn 🇹🇳
Turkey -» tr 🇹🇲
Uganda-» ug 🇺🇬
Ukraine -» ua 🇺🇦
United Kingdom -» uk 🇬🇧
United States -» us 🇺🇲
Uruguay -» uy 🇺🇾
Uzbekistan -» uz 🇺🇿
Venezuela -» ve 🇻🇪
Vietnam -» vn 🇻🇳
Yemen -» ye 🇾🇪
Zambia -» zm 🇿🇲
Zimbabwe -» zw 🇿🇼
Киргизия -» kg 🇰🇬
",
'reply_to_message_id' => $msg['message_id']
]);
} elseif ($cEMsg == 2 && in_array(strtolower($eMsg[1]), randc1ou)) {
// Enviar un mensaje de espera mientras se procesa la solicitud
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "Procesando tu solicitud...",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

// Obtener los datos aleatorios del país seleccionado
$Rndus1 = file_get_contents("$hosting/rnd/rndpro.php?domain=$rnd11");
$status = capture($Rndus1, '"status":',',');
$country = capture($Rndus1, '"country":"','"');
$state = capture($Rndus1, '"state":"','"');
$city = capture($Rndus1, '"city":"','"');
$street = capture($Rndus1, '"street":"','"');
$nat_emoji1 = capture($Rndus1, '"emoji":"','"');
$phone = capture($Rndus1, '"phone":"','"');
$zip = capture($Rndus1, '"zip":"','"');

// Verificar si se han obtenido los datos aleatorios correctamente
if($status == 'true') {
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "
朱 𝙎𝙩𝙖𝙩𝙚 -» <code>".$state."</code>
亥 𝘾𝙞𝙩𝙮 -» <code>".$city."</code>
亥 𝙎𝙩𝙧𝙚𝙚𝙩 -» <code>".$street."</code>

空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$country." ".$nat_emoji1."</code>
栗 𝙋𝙝𝙤𝙣𝙚 -» <code>".$phone."</code>
北 𝙕𝙞𝙥 -» <code>".$zip."</code>
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