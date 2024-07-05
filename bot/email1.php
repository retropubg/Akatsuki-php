<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$email11 = $msg['text'];
$email1 = substr($email11, 5);

$proxy = "🇺🇸 - Live!";
$gate = "𝙀𝙢𝙖𝙞𝙡 𝙈𝙨𝙜";

$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/em1', '/Em1', '/eM1', '/EM1', '!em1', '!Em1', '!eM1', '!EM1', '.em1', '.EM1', '.eM1', '.EM1'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	$cBin = cBin($eMsg[1]);
	$antiSpam = TRUE;
	include('accs-as.php');
	
if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "".$gate." ♻️ \n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/em1 email81@gmail.com</code>",
'reply_to_message_id' => $msg['message_id']
]);
	}
else{
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩...",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://api.internal.temp-mail.io/api/v3/email/$email1/messages");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.internal.temp-mail.io',
'user-agent: '.$rnd_ua.'',
'accept: application/json, text/plain, */*',
'referer: https://temp-mail.io/'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$r2 = curl_exec($ch);
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";
curl_close($ch);

if($r2 == "[]
"){
$status = "F ❌";
$status1 = "nobody texted you xD";
$status2 = "
朱 𝙈𝙨𝙜 -» <code>".$status1."</code>
";
}
elseif(strpos($r2, 'Email not found')){
$status = "F ❌";
$status1 = "Email not found";
$status2 = "
朱 𝙈𝙨𝙜 -» <code>".$status1."</code>
";
}
else{
$status = ":D ✅";
$status1 = "if they remembered you :D";
$status2 = $r2;
}

$rChk = "
零 𝙀𝙢𝙖𝙞𝙡 -» <code>".$email1."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>".$status."</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$status1."</code>
".$status2."
南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝙀𝙢𝙖𝙞𝙡 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>";
}
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => $rChk
]);