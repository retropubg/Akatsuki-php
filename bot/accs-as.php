<?php

if($cEMsg != 1 && !$isAdmin){
	$accs = $onliP ? !$isPremiun : !$isPremiun && !$isGAppd;
	$rMsg = $chat['type'] == 'private'
? "🚫 𝘼𝙘𝙘𝙚𝙨𝙨 𝙙𝙚𝙣𝙞𝙚𝙙 🚫\n<code>𝙊𝙣𝙡𝙮 𝙋𝙍𝙀𝙈𝙄𝙐𝙈 𝙪𝙨𝙚𝙧𝙨.</code>" : ($accs && $onliP
	? "🚫 𝘼𝙘𝙘𝙚𝙨𝙨 𝙙𝙚𝙣𝙞𝙚𝙙 🚫\n<code>𝙊𝙣𝙡𝙮 𝙋𝙍𝙀𝙈𝙄𝙐𝙈 𝙪𝙨𝙚𝙧𝙨 𝙝𝙖𝙫𝙚 𝙖𝙘𝙘𝙚𝙨𝙨 𝙩𝙤 𝙩𝙝𝙞𝙨 𝙘𝙤𝙢𝙢𝙖𝙣𝙙.</code>"
	: "🚫 𝘼𝙘𝙘𝙚𝙨𝙨 𝙙𝙚𝙣𝙞𝙚𝙙 🚫\n<code>𝙏𝙝𝙞𝙨 𝙜𝙧𝙤𝙪𝙥 𝙞𝙨 𝙣𝙤𝙩 𝙖𝙥𝙥𝙧𝙤𝙫𝙚𝙙 𝙩𝙤 𝙪𝙨𝙚 𝙩𝙝𝙞𝙨 𝙗𝙤𝙩.</code>");
	
	if($accs){
output('sendMessage', [
	'chat_id' => $chat['id'],
	'text' => $rMsg,
	'reply_to_message_id' => $msg['message_id']
]);

exit();
	}
	
	if($antiSpam){
$timeAS = in_array($user['id'], $f_data['premiuns']) ? 25 : 60;
$aSpam = antiSpam($user['id'], $timeAS);

if(!$aSpam[0]){
	output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» ".$aSpam[1]."'s",
'reply_to_message_id' => $msg['message_id']
	]);
	
	exit();
}
	}
}