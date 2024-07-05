<?php

$kb_s = [
	'caption' => "𝙒𝙚𝙡𝙘𝙤𝙢𝙚 𝙩𝙤 𝘼𝙠𝙖𝙩𝙨𝙪𝙠𝙞 -» >_\n<code>This bot promises you fast and safe checkups with different gateways and perfect tools for your use! ✨</code>",
	'reply_markup' => json_encode([
'inline_keyboard' => [
[
[
	'text' => "𝙂𝙖𝙩𝙚𝙨 ♻️",
	'callback_data' => 'GT'
],
[
	'text' => "𝙏𝙤𝙤𝙡𝙨 🛠",
	'callback_data' => 'TL'
],
],
[
[
	'text' => "𝘾𝙝𝙖𝙣𝙣𝙚𝙡 💫",
	'url' => 'https://t.me/akatsukichk'
]
],
[
[
	'text' => "𝙀𝙭𝙞𝙩 ⚠️",
	'callback_data' => 'EX'
]
]
]
	])
];

if(isset($input['callback_query'])){
	$user = $input['callback_query']['from'];
	$userReply = $input['callback_query']['message']['reply_to_message']['from'];
	
	$chat = $input['callback_query']['message']['chat'];
	$chatReply = $input['callback_query']['message']['reply_to_message']['chat'];
	
	$msg = $input['callback_query']['message'];
	
	$cBackQ = $input['callback_query'];
	
	$kbs_i = [
'GT' => [
'editMessageCaption',
[
'chat_id' => $chat['id'],
'message_id' => $msg['message_id'],
'caption' => "
𝙒𝙚𝙡𝙘𝙤𝙢𝙚 𝙩𝙤 𝘼𝙠𝙖𝙩𝙨𝙪𝙠𝙞 -» >_

𝙂𝙖𝙩𝙚𝙨 𝙊𝙣 -» <code>17 ✅</code>
𝙂𝙖𝙩𝙚𝙨 𝙊𝙛𝙛 -» <code>0 ❌</code>

𝘼𝙪𝙩𝙝 -» <code>2</code>
𝘾𝙝𝙖𝙧𝙜𝙚𝙙 -» <code>6</code>
𝙎𝙥𝙚𝙘𝙞𝙖𝙡 -» <code>9</code>

<code>𝙎𝙚𝙡𝙚𝙘𝙩 𝙩𝙝𝙚 𝙩𝙮𝙥𝙚 𝙤𝙛 𝙜𝙖𝙩𝙚 𝙮𝙤𝙪 𝙬𝙖𝙣𝙩 𝙛𝙤𝙧 𝙮𝙤𝙪𝙧 𝙪𝙨𝙚!</code>",
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
[
'text' => "𝘼𝙪𝙩𝙝 🥷",
'callback_data' => 'AU'
],
[
'text' => "𝘾𝙝𝙖𝙧𝙜𝙚𝙙 🤑",
'callback_data' => 'CHG'
]
],
[
[
'text' => "𝙎𝙥𝙚𝙘𝙞𝙖𝙡 ✨",
'callback_data' => 'SP'
]
],
[
[
'text' => "𝙍𝙚𝙩𝙪𝙧𝙣 🔄",
'callback_data' => 'RT_S'
]
],
[
[
'text' => "𝙀𝙭𝙞𝙩 ⚠️",
'callback_data' => 'EX'
]
]
	]
])
]
],

'AU' => [
'editMessageCaption',
[
'chat_id' => $chat['id'],
'message_id' => $msg['message_id'],
'caption' => "
𝙂𝙖𝙩𝙚𝙬𝙖𝙮𝙨 𝘼𝙪𝙩𝙝

<code>朱 𝙆𝙤𝙣𝙖𝙣</code> -» <code>Auth</code> -» <code>Stripe</code> -» <code>.ko</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝘿𝙚𝙞𝙙𝙖𝙧𝙖</code> -» <code>Auth</code> -» <code>Shopify</code> -» <code>.de</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>
",
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
[
'text' => "𝙍𝙚𝙩𝙪𝙧𝙣 🔄",
'callback_data' => 'GT'
]
],
[
[
'text' => "𝙀𝙭𝙞𝙩 ⚠️",
'callback_data' => 'EX'
]
]
	]
])
]
],

'CHG' => [
'editMessageCaption',
[
'chat_id' => $chat['id'],
'message_id' => $msg['message_id'],
'caption' => "
𝙂𝙖𝙩𝙚𝙬𝙖𝙮𝙨 𝘾𝙝𝙖𝙧𝙜𝙚𝙙

<code>朱 𝘼𝙠𝙩𝙯</code> -» <code>Shopify</code> -» <code>.at</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙋𝙖𝙞𝙣</code> -» <code>$4.36</code> -» <code>Shopify Avs</code> -» <code>.pa</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙕𝙚𝙩𝙨𝙪</code> -» <code>$18.93</code> -» <code>Shopify</code> -» <code>.ze</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙠𝙖𝙠𝙪𝙯𝙪</code> -» <code>$9</code> -» <code>Shopify + Chase</code> -» <code>.ka</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙋𝙖𝙮𝙋𝙖𝙡</code> -» <code>$0.01</code> -» <code>Paypal</code> -» <code>.pp</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙋𝙖𝙮𝙋𝙖𝙡</code> -» <code>$1</code> -» <code>Paypal</code> -» <code>.pp1</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>
"
,
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
[
'text' => "𝙍𝙚𝙩𝙪𝙧𝙣 🔄",
'callback_data' => 'GT'
]
],
[
[
'text' => "𝙀𝙭𝙞𝙩 ⚠️",
'callback_data' => 'EX'
]
]
	]
])
]
],

'SP' => [
'editMessageCaption',
[
'chat_id' => $chat['id'],
'message_id' => $msg['message_id'],
'caption' => "
𝙂𝙖𝙩𝙚𝙬𝙖𝙮𝙨 𝙎𝙥𝙚𝙘𝙞𝙖𝙡

<code>only premium can use!</code>

<code>朱 𝙄𝙩𝙖𝙘𝙝𝙞</code> -» <code>$4</code> -» <code>Braintree</code> -» <code>.it</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙊𝙗𝙞𝙩𝙤</code> -» <code>Shopify + Moneris</code> -» <code>.ob</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙔𝙖𝙝𝙞𝙠𝙤</code> -» <code>Shopify + Moneris</code> -» <code>.ya</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙃𝙞𝙙𝙖𝙣</code> -» <code>Shopify + Braintree</code> -» <code>.hi</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙆𝙮𝙪𝙨𝙪𝙠𝙚</code> -» <code>Shopify + Chase Orbital Gateway</code> -» <code>.ky</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝘿𝙖𝙞𝙗𝙪𝙩𝙨𝙪</code> -» <code>Shopify + Adyen</code> -» <code>.da</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙏𝙤𝙗𝙞</code> -» <code>Shopify + Braintree</code> -» <code>.to</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙎𝙖𝙨𝙤𝙧𝙞</code> -» <code>Shopify + Payeezy</code> -» <code>.sa</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙆𝙞𝙚</code> -» <code>Shopify + Payeezy</code> -» <code>.ki</code> -» <code>Ccn Charged</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>
"
,
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
[
'text' => "𝙍𝙚𝙩𝙪𝙧𝙣 🔄",
'callback_data' => 'GT'
]
],
[
[
'text' => "𝙀𝙭𝙞𝙩 ⚠️",
'callback_data' => 'EX'
]
]
	]
])
]
],

'TL' => [
'editMessageCaption',
[
'chat_id' => $chat['id'],
'message_id' => $msg['message_id'],
'caption' => "
𝙏𝙤𝙤𝙡𝙨 🛠

<code>朱 𝘽𝙞𝙣</code> -» <code>.bin</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙂𝙚𝙣 𝘽𝙞𝙣</code> -» <code>.gbin</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝘾𝙘 𝙜𝙚𝙣</code> -» <code>.gen</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙎𝙠 𝙇𝙞𝙫𝙚</code> -» <code>.sk</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙈𝙮</code> -» <code>.my</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙍𝙣𝙙</code> -» <code>.rnd</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙍𝙣𝙙𝙥</code> -» <code>.rndp</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙍𝙖𝙣𝙙</code> -» <code>.rand</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙀𝙢𝙖𝙞𝙡</code> -» <code>.email</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝙀𝙢𝙖𝙞𝙡 𝙈𝙨𝙜</code> -» <code>.email1</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>

<code>朱 𝘼𝙪𝙩𝙤 🚗 ♻️</code> -» <code>.au</code>
𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>On ✅</code>
",
'reply_markup' => json_encode([
	'inline_keyboard' => [
[
[
'text' => "𝙍𝙚𝙩𝙪𝙧𝙣 🔄",
'callback_data' => 'RT_S'
]
],
[
[
'text' => "𝙀𝙭𝙞𝙩 ⚠️",
'callback_data' => 'EX'
]
]
	]
])
]
],

'RT_S' => [
'editMessageCaption',
array_merge([
'chat_id' => $chat['id'],
'message_id' => $msg['message_id']
], $kb_s)
],

'EX' => [
'deleteMessage',
[
'chat_id' => $chat['id'],
'message_id' => $msg['message_id']
]
]
	];
	
	if($cBackQ['data'] == 'RG'){
$eGen = explode('|', trim(capture($msg['text'], '𝘽𝙞𝙣 -» ', '-')));

$rCGen = ccG($eGen[0], $eGen[1], $eGen[2], $eGen[3]);

$cBin = cBin($eGen[0]);

$kbs_i = [
'RG' => [
'editMessageText',
[
	'chat_id' => $chat['id'],
	'message_id' => $msg['message_id'],
	'text' => "𝘽𝙞𝙣 -» <code>".$eGen[0]."|".$eGen[1]."|".$eGen[2]."|".$eGen[3]."</code>\n- - - - - - - - - - - - - - - - - - - - -\n".implode("\n", $rCGen)."\n- - - - - - - - - - - - - - - - - - - - -\n𝙄𝙣𝙛𝙤 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>\n𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>\n𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>\n- - - - - - - - - - - - - - - - - - - - -\n𝙂𝙚𝙣 𝙗𝙮 -» <code>".$user['username']."</code>\n𝙊𝙬𝙣𝙚𝙧 -» <code>@SachioYT ❤️‍🔥</code>",
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
]
]
];
}
	
	if($cBackQ['data'] == 'RG-B'){
$seed = trim(capture($msg['text'], '𝙎𝙚𝙚𝙙 -» ', '-'));

$kbs_i = [
'RG-B' => [
'editMessageText',
[
	'chat_id' => $chat['id'],
	'message_id' => $msg['message_id'],
	'text' => "𝙎𝙚𝙚𝙙 -» <code>".$seed."</code>\n- - - - - - - - - - - - - - - - - - - - -\n".bGen(rtrim($seed, 'x'))."\n𝙂𝙚𝙣 𝙗𝙮 -» <code>".$user['username']."</code>\n𝙊𝙬𝙣𝙚𝙧 -» <code>@SachioYT ❤️‍🔥</code>",
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
]
]
];
}
	
	if($user['id'] == $userReply['id']){
output($kbs_i[$cBackQ['data']][0], $kbs_i[$cBackQ['data']][1]);
	}
	
	exit();
}