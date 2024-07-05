<?php

//INFO
if(in_array($msg['text'], ['/info', '!info', '.info', '/my', '!my', '.my'])){
	$cType = $chat['type'];	
	$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}
	
	$getUPhoto = output('getUserProfilePhotos', [
'user_id' => $user['id']
	])['result']['photos']['0']['0']['file_unique_id'];

	$rInfo = "- - - - - - - -『𝙐𝙨𝙚𝙧』- - - - - - - -\n𝙄𝙙 -» <code>".$user['id']."</code>\n𝙉𝙖𝙢𝙚 -» <code>".$user['first_name']."</code>\n𝙐𝙨𝙚𝙧 -» <code>".$user['username']."</code>\n𝙋𝙡𝙖𝙣 -» <code>".$pChkU."</code>";
	
if(strpos($cType, 'group') !== false){
$pChkG = in_array($chat['id'], $f_data['groups']) ? "Authorized" : "Denied";

$rInfo .= "\n- - - - - - - -『𝙂𝙧𝙤𝙪𝙥』- - - - - - - -\n𝙄𝙙 -» <code>".$chat['id']."</code>\n𝙉𝙖𝙢𝙚 -» <code>".$chat['title']."</code>\n𝙋𝙡𝙖𝙣 -» <code>".$pChkG."</code>\n𝙏𝙮𝙥𝙚 -» <code>".$cType."</code>";
}
	
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => $rInfo,
'reply_to_message_id' => $msg['message_id']
	]);
}

//BIN
if(cCmd($msg['text'], ['/bin', '!bin', '.bin'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);

	include('accs-as.php');
	
	if($cEMsg == 1){
output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => "𝘽𝙞𝙣 ♻️\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/bin 400002</code>",
	'reply_to_message_id' => $msg['message_id']
]);
	}
	else{
$msgId_bot = output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩...",
	'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

$cBin = cBin($eMsg[1]);

$rBin = empty($cBin) || !in_array($eMsg[1][0], ['3', '4', '5', '6'])
	? "𝙄𝙣𝙫𝙖𝙡𝙞𝙙 𝘽𝙞𝙣 ⚠️"
	: "𝘽𝙞𝙣 -» <code>".$cBin['bin']."</code>\n- - - - - - - - - - - - - - - - - - - - -\n𝙄𝙣𝙛𝙤 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>\n𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>\n𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>\n- - - - - - - - - - - - - - - - - - - - -\n𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['username']."</code>\n𝙊𝙬𝙣𝙚𝙧 -» <code>@SachioYT ❤️‍🔥</code>";

output('editMessageText', [
	'chat_id' => $chat['id'],
	'message_id' => $msgId_bot,
	'text' => $rBin
]);
	}
}

//GEN
if(cCmd($msg['text'], ['/gen', '!gen', '.gen'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	
	include('accs-as.php');
	
	if($cEMsg == 1){
output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => "𝘾𝘾 𝙂𝙚𝙣 ♻️\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/gen 400002</code>",
	'reply_to_message_id' => $msg['message_id']
]);
	}
	else{
$msgId_bot = output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩...",
	'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

$eGen = mltExplode(ltrim(str_replace($eMsg[0], '', $msg['text'])));
$eGen = explode('|', preg_replace('/[^0-9\|]/', 'x', implode('|', $eGen)));

$ccD = $eGen[0][0] == '3' ? [15, ['4', 0000, 9999]] : [16, ['3', 000, 999]];

$binL = strlen($eGen[0]);
$bin = cBin($eGen[0]) !== null && rChk($eGen[0][0], 3, 6) && (strpos($eGen[0], 'x') || $binL < $ccD[0])
	? substr($eGen[0], 0, $ccD[0])
	: (isset($eGen[0]) && ctype_digit($eGen[0]) && $binL >= $ccD[0] && $eGen[0][0] != '0'
? substr($eGen[0], 0, ($ccD[0] - 4))
: false);

$monthI = isset($eGen[1]);
$month = $monthI && rChk(ltrim($eGen[1], 0), 1, 12)
	? $eGen[1]
	: ($monthI && preg_match('/\d/', $eGen[1])
? false
: 'rnd');

$yearI = isset($eGen[2]);
$year = $yearI && ctype_digit($eGen[2]) && (rChk($eGen[2], 24, 32) || rChk($eGen[2], 2024, 2032))
	? $eGen[2]
	: ($yearI && preg_match('/\d/', $eGen[2])
? false
: "rnd");

$cvvI = isset($eGen[3]);
$cvv = $cvvI && ctype_digit($eGen[3]) && rChk($eGen[3], $ccD[1][1], $ccD[1][2], $ccD[1][0])
	? $eGen[3]
	: ($cvvI && preg_match('/\d/', $eGen[3])
? false
: "rnd");

if($bin == false || $month == false || $year == false || $cvv == false){
	if($bin == false){
$rGen[] = "𝘽𝙞𝙣 -» <code>Invalid! ⚠</code>";
	}
	if($month == false){
$rGen[] = "𝙈𝙤𝙣𝙩𝙝 -» <code>Invalid! ⚠</code>";
	}
	if($year == false){
$rGen[] = "𝙔𝙚𝙖𝙧 -» <code>Invalid! ⚠</code>";
	}
	if($cvv == false){
$rGen[] = "𝘾𝙑𝙑 -» <code>Invalid! ⚠</code>";
	}
	
	$rGen = [
	'text' => "<b>System Akatsuki -»>_</b>\n\n".implode("\n", $rGen)."\n\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>.gen 400002xxxxxxxxxx|10|2024|xxx</code>"
];
}
else{
	$rCGen = ccG($bin, $month, $year, $cvv);
	
	$cBin = cBin($bin);
	
	$rGen = [
'text' => "𝘽𝙞𝙣 -» <code>".$bin."|".$month."|".$year."|".$cvv."</code>\n- - - - - - - - - - - - - - - - - - - - -\n".implode("\n", $rCGen)."\n- - - - - - - - - - - - - - - - - - - - -\n𝙄𝙣𝙛𝙤 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>\n𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>\n𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>\n- - - - - - - - - - - - - - - - - - - - -\n𝙂𝙚𝙣 𝙗𝙮 -» <code>".$user['username']."</code>\n𝙊𝙬𝙣𝙚𝙧 -» <code>@SachioYT ❤️‍🔥</code>",
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
	[
'text' => "𝙍𝙚-𝙂𝙚𝙣 🔄",
'callback_data' => 'RG'
	]
],
[
	[
'text' => "𝙀𝙭𝙞𝙩 ⚠",
'callback_data' => 'EX'
	]
]
	]
])
	];
}

output('editMessageText', array_merge([
	'chat_id' => $chat['id'],
	'message_id' => $msgId_bot,
], $rGen));
	}
}

//GBIN
if(cCmd($msg['text'], ['/gbin', '!gbin', '.gbin'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	
	include('accs-as.php');
	
	if($cEMsg == 1){
output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => "𝙂𝙗𝙞𝙣 ♻️\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/gbin 4</code>",
	'reply_to_message_id' => $msg['message_id']
]);
	}
	else{
$gbinL = strlen($eMsg[1]);

$msgId_bot = output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩...",
	'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

if(rChk($eMsg[1][0], 3, 6) && count($eMsg) == 2 && ctype_digit($eMsg[1]) && $gbinL <= 4){
	$xGen = str_repeat('x', (6 - $gbinL));
	
	$rGbin = [
'text' => "𝙎𝙚𝙚𝙙 -» <code>".$eMsg[1].$xGen."</code>\n- - - - - - - - - - - - - - - - - - - - -\n".bGen($eMsg[1])."\n𝙂𝙚𝙣 𝙗𝙮 -» <code>".$user['username']."</code>\n𝙊𝙬𝙣𝙚𝙧 -» <code>@SachioYT ❤️‍🔥</code>",
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
	[
'text' => "𝙍𝙚-𝙂𝙚𝙣 🔄",
'callback_data' => 'RG-B'
	]
],
[
	[
'text' => "𝙀𝙭𝙞𝙩 ⚠",
'callback_data' => 'EX'
	]
]
	]
])
	];
}
else{	
	$rGbin = ['text' => "
	System Akatsuki -»>_

𝙎𝙚𝙚𝙙 -» <code>Invalid! ⚠️ </code>"];
}

output('editMessageText', array_merge([
	'chat_id' => $chat['id'],
	'message_id' => $msgId_bot,
], $rGbin));
	}
}