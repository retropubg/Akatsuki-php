<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$proxy = "🇺🇸 - Live!";
$gate = "𝙀𝙢𝙖𝙞𝙡";

$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/em', '/Em', '/eM', '/EM', '!em', '!Em', '!eM', '!EM', '.em', '.EM', '.eM', '.EM'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	$cBin = cBin($eMsg[1]);
	$antiSpam = TRUE;
	include('accs-as.php');
	
if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "".$gate." ♻️ \n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/em a</code>",
'reply_to_message_id' => $msg['message_id']
]);
	}
else{
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩...",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];
start:
/*=====  Gate  ======*/
$num = rand(1000, 9999);
$coki = uniqid();
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://api.internal.temp-mail.io/api/v3/email/new");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.internal.temp-mail.io',
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"min_name_length":10,"max_name_length":10}');
$r1 = curl_exec($ch);
$email = capture($r1, '"email":"','"');
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";

$rChk = "
零 𝙀𝙢𝙖𝙞𝙡 -» <code>".$email."</code>

三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>

玉 𝙀𝙢𝙖𝙞𝙡 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>";
}
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => $rChk
]);