<?php

$pro = isset($_GET['domain']) ? strtolower($_GET['domain']) : 'us';

$nationalities = array(
"al" => "🇦🇱",
"dz" => "🇩🇿",
"ar" => "🇦🇷",
"am" => "🇦🇲",
"au" => "🇦🇺",
"at" => "🇦🇹",
"az" => "🇦🇿",
"bs" => "🇧🇸",
"bh" => "🇧🇭",
"bd" => "🇧🇩",
"bb" => "🇧🇧",
"by" => "🇧🇾",
"be" => "🇧🇪",
"bol" => "🇧🇴",
"bw" => "🇧🇼",
"br" => "🇧🇷",
"bn" => "🇧🇳",
"kh" => "🇰🇭",
"cm" => "🇨🇲",
"ca" => "🇨🇦",
"cl" => "🇨🇱",
"co" => "🇨🇴",
"cn" => "🇨🇳",
"cr" => "🇨🇷",
"hr" => "🇭🇷",
"cu" => "🇨🇺",
"cy" => "🇨🇾",
"dk" => "🇩🇰",
"do" => "🇩🇴",
"cd" => "🇨🇩",
"ec" => "🇪🇨",
"eg" => "🇪🇬",
"sv" => "🇸🇻",
"ae" => "🇦🇪",
"ee" => "🇪🇪",
"et" => "🇪🇹",
"fj" => "🇫🇯",
"fi" => "🇫🇮",
"fr" => "🇫🇷",
"gh" => "🇬🇭",
"gt" => "🇬🇹",
"hn" => "🇭🇳",
"hk" => "🇭🇰",
"hu" => "🇭🇺",
"in" => "🇮🇳",
"id" => "🇮🇩",
"ir" => "🇮🇷",
"ie" => "🇮🇪",
"il" => "🇮🇱",
"it" => "🇮🇹",
"kt" => "🇨🇮",
"jm" => "🇯🇲",
"jp" => "🇯🇵",
"jo" => "🇯🇴",
"kz" => "🇰🇿",
"ke" => "🇰🇪",
"ko" => "🇰🇷",
"kw" => "🇰🇼",
"lv" => "🇱🇻",
"lb" => "🇱🇧",
"ls" => "🇱🇸",
"ly" => "🇱🇾",
"lt" => "🇱🇹",
"lu" => "🇱🇺",
"mg" => "🇲🇬",
"mw" => "🇲🇼",
"my" => "🇲🇾",
"ml" => "🇲🇱",
"mt" => "🇲🇹",
"mu" => "🇲🇺",
"mx" => "🇲🇽",
"md" => "🇲🇩",
"ma" => "🇲🇦",
"mm" => "🇲🇲",
"na" => "🇳🇦",
"np" => "🇳🇵",
"nl" => "🇳🇱",
"nz" => "🇹🇰",
"ni" => "🇳🇮",
"ng" => "🇳🇬",
"no" => "🇳🇴",
"om" => "🇴🇲",
"pk" => "🇵🇰",
"pa" => "🇵🇦",
"pg" => "🇵🇬",
"py" => "🇵🇾",
"pe" => "🇵🇪",
"ph" => "🇵🇭",
"pl" => "🇵🇱",
"pt" => "🇵🇹",
"pr" => "🇵🇷",
"qa" => "🇶🇦",
"ro" => "🇷🇴",
"ru" => "🇷🇺",
"rw" => "🇷🇼",
"sa" => "🇸🇦",
"sn" => "🇸🇳",
"sg" => "🇸🇬",
"sk" => "🇪🇺",
"si" => "🇸🇮",
"za" => "🇿🇦",
"es" => "🇪🇦",
"lk" => "🇱🇰",
"sr" => "🇸🇷",
"se" => "🇸🇪",
"ch" => "🇨🇭",
"tw" => "🇨🇳",
"tz" => "🇹🇿",
"th" => "🇹🇭",
"cz" => "🇨🇿",
"is" => "🇮🇸",
"tt" => "🇹🇹",
"tn" => "🇹🇳",
"tr" => "🇹🇲",
"ug" => "🇺🇬",
"ua" => "🇺🇦",
"uk" => "🇬🇧",
"us" => "🇺🇲",
"uy" => "🇺🇾",
"uz" => "🇺🇿",
"ve" => "🇻🇪",
"vn" => "🇻🇳",
"ye" => "🇾🇪",
"zm" => "🇿🇲",
"zw" => "🇿🇼",
"kg" => "🇰🇬",
);

function capture($str, $start, $end){	
	return strpos($str, $start) === false || strpos($str, $end) === false
? NULL : explode($end, explode($start, $str)[1])[0];
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

$num = rand(1000, 999999);
$coki = uniqid($num);

if (!array_key_exists($pro, $nationalities)) {
$err = array(
'status' => false,
'message' => 'Invalid parameter!'
);
header('Content-Type: application/json');
echo json_encode($err, JSON_UNESCAPED_UNICODE);
exit;
}

/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $proxypro);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $up3); 
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
curl_setopt($ch, CURLOPT_URL, "https://www.bestrandoms.com/random-address-in-$pro");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.bestrandoms.com',
'user-agent: '.$rnd_ua.'',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
$r1 = curl_exec($ch);
$street = capture($r1, '<b>Street:</b>&nbsp;&nbsp;','</span>');
$city = capture($r1, '<b>City:</b>&nbsp;&nbsp;','</span>');
$state = capture($r1, '<b>State/province/area: </b>&nbsp;&nbsp;','</span>');
$phone1 = capture($r1, '<b>Phone number</b>&nbsp;&nbsp;','</span>');
$zip = capture($r1, '<b>Zip code</b>&nbsp;&nbsp;','</span>');
$a = capture($r1, '<b>Country calling code</b>&nbsp;&nbsp;','</span>');
$country = capture($r1, '<b>Country</b>&nbsp;&nbsp;','</span>');

$phone = "$a $phone1";

$nat_emoji = isset($nationalities[$pro]) ? $nationalities[$pro] : '';

if($state=="Alabama"){ 
$state1="AL";
}
elseif($state=="alaska"){
$state1="AK";
}
elseif($state=="arizona"){
$state1="AR";
}
elseif($state=="california"){ $state1="CA";
}elseif($state=="olorado"){ $state1="CO";
}elseif($state=="connecticut"){ $state1="CT";
}elseif($state=="delaware"){ $state1="DE";
}elseif($state=="district of columbia"){ $state1="DC";
}elseif($state=="florida"){ $state1="FL";
}elseif($state=="georgia"){ $state1="GA";
}elseif($state=="hawaii"){ $state1="HI";
}elseif($state=="idaho"){ $state1="ID";
}elseif($state=="illinois"){ $state1="IL";
}elseif($state=="indiana"){ $state1="IN";
}elseif($state=="iowa"){ $state1="IA";
}elseif($state=="kansas"){ $state1="KS";
}elseif($state=="kentucky"){ $state1="KY";
}elseif($state=="louisiana"){ $state1="LA";
}elseif($state=="maine"){ $state1="ME";
}elseif($state=="maryland"){ $state1="MD";
}elseif($state=="massachusetts"){ $state1="MA";
}elseif($state=="michigan"){ $state1="MI";
}elseif($state=="minnesota"){ $state1="MN";
}elseif($state=="mississippi"){ $state1="MS";
}elseif($state=="missouri"){ $state1="MO";
}elseif($state=="montana"){ $state1="MT";
}elseif($state=="nebraska"){ $state1="NE";
}elseif($state=="nevada"){ $state1="NV";
}elseif($state=="new hampshire"){ $state1="NH";
}elseif($state=="new jersey"){ $state1="NJ";
}elseif($state=="new mexico"){ $state1="NM";
}elseif($state=="new york"){ $state1="LA";
}elseif($state=="north carolina"){ $state1="NC";
}elseif($state=="north dakota"){ $state1="ND";
}elseif($state=="Ohio"){ $state1="OH";
}elseif($state=="oklahoma"){ $state1="OK";
}elseif($state=="oregon"){ $state1="OR";
}elseif($state=="pennsylvania"){ $state1="PA";
}elseif($state=="rhode Island"){ $state1="RI";
}elseif($state=="south carolina"){ $state1="SC";
}elseif($state=="south carolina"){ $state1="SC";
}elseif($state=="south carolina"){ $state1="SC";
}elseif($state=="tennessee"){ $state1="TN";
}elseif($state=="texas"){ $state1="TX";
}elseif($state=="utah"){ $state1="UT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="vermont"){ $state1="VT";
}elseif($state=="virginia"){ $state1="VA";
}elseif($state=="washington"){
$state1="WA";
}
elseif($state=="west virginia"){
$state1="WV";
}
elseif($state=="wisconsin"){
$state1="WI";
}
elseif($state=="wyoming"){
$state1="WY";
}
else{
$state1="KY";
}

if(empty($phone)){
$phone = "UNAVAILABLE";
}
elseif(empty($country)){
$country = "UNAVAILABLE";
}
elseif(empty($zip)){
$zip = "UNAVAILABLE";
}
elseif(empty($phone1)){
$phone1 = "UNAVAILABLE";
}
elseif(empty($state)){
$state = "UNAVAILABLE";
}
elseif(empty($state1)){
$state1 = "UNAVAILABLE";
}
elseif(empty($city)){
$city = "UNAVAILABLE";
}
elseif(empty($street)){
$street = "UNAVAILABLE";
}

$nat = strtoupper($pro);

$info = array(
"status" => true,
"domain" => $pro,
"nat" => $nat,
"street" => $street,
"city" => $city,
"state" => $state,
"state1" => $state1,
"phone" => $phone,
"phone1" => $phone1,
"zip" => $zip,
"country" => $country,
"emoji" => $nat_emoji
);

header('Content-Type: application/json');
echo json_encode($info, JSON_UNESCAPED_UNICODE);