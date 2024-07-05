<?php

$nationalities = array(
"us" => "🇺🇸",
"ca" => "🇨🇦",
"tr" => "🇹🇷",
"no" => "🇳🇴",
"rs" => "🇷🇸",
"fi" => "🇫🇮",
"de" => "🇩🇪",
"ua" => "🇺🇦",
"ch" => "🇨🇭",
"br" => "🇧🇷",
"dk" => "🇩🇰",
"mx" => "🇲🇽",
"nl" => "🇳🇱",
"ir" => "🇮🇷",
"ie" => "🇮🇪",
"gb" => "🇬🇧",
"es" => "🇪🇸",
"au" => "🇦🇺",
"fr" => "🇫🇷",
"in" => "🇮🇳",
"nz" => "🇳🇿"
);

$nat = isset($_GET['nat']) ? strtolower($_GET['nat']) : 'us';

if (!array_key_exists($nat, $nationalities)) {
echo json_encode(array(
'status' => false,
'message' => 'Invalid nat parameter.'
));
exit;
}

$url = "https://randomuser.me/api/?nat=" . $nat;
$json = file_get_contents($url);
$data = json_decode($json, true);

$user = $data["results"][0];
$nat_emoji = isset($nationalities[$nat]) ? $nationalities[$nat] : '';
$user["nat_emoji"] = $nat_emoji;

$providers = array('gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com', 'aol.com', 'protonmail.com');
$provider = $providers[array_rand($providers)];
$email = strtolower($user["name"]["first"]) . '.' . strtolower($user["name"]["last"]) . '@' . $provider;

$filteredData = array(
"status" => true,
"gender" => $user["gender"],
"name" => array(
"title" => $user["name"]["title"],
"first" => $user["name"]["first"],
"last" => $user["name"]["last"]
),
"country" => $user["location"]["country"],
"state" => $user["location"]["state"],
"city" => $user["location"]["city"],
"street" => $user["location"]["street"]["name"] . ' ' . $user["location"]["street"]["number"],
"nat_emoji" => $user["nat_emoji"],
"nat" => $user["nat"],
"SSN" => $user["id"]["value"],
"phone" => $user["phone"],
"zip" => $user["location"]["postcode"],
"email" => $email,
);

header('Content-Type: application/json');
echo json_encode($filteredData, JSON_UNESCAPED_UNICODE);

$rnd = $_GET['rnd'];

function capturehtml($str, $starting_word, $ending_word){
    $subtring_start  = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);  
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return substr($str, $subtring_start, $size);
}

$rnd_ua = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36";

$json = file_get_contents("https://randomuser.me/api/?nat=us");
$data = json_decode($json, true);
$user = $data['results'][0];

$name = array(
    "title" => $user["name"]["title"],
    "first" => $user["name"]["first"],
    "last" => $user["name"]["last"]
);
$providers = array('gmail.com', 'hotmail.com', 'yahoo.com', 'outlook.com', 'aol.com', 'protonmail.com');
$provider = $providers[array_rand($providers)];
$email = strtolower($user["name"]["first"]) . '.' . strtolower($user["name"]["last"]) . '@' . $provider;

$countries = array(
'ar' => '🇦🇷',
'bd' => '🇧🇩', 
'be' => '🇧🇪', 
'cn' => '🇨🇳', 
'cz' => '🇨🇿', 
'gr' => '🇬🇷', 
'hu' => '🇭🇺', 
'id' => '🇮🇩', 
'it' => '🇮🇹', 
'jp' => '🇯🇵', 
'my' => '🇲🇾', 
'np' => '🇳🇵', 
'ng' => '🇳🇬', 
'pe' => '🇵🇪', 
'ph' => '🇵🇭', 
'pl' => '🇵🇱', 
'pt' => '🇵🇹', 
'ro' => '🇷🇴', 
'ru' => '🇷🇺', 
'sa' => '🇸🇦', 
'sg' => '🇸🇬', 
'za' => '🇿🇦', 
'kr' => '🇰🇷', 
'se' => '🇸🇪', 
'th' => '🇹🇭', 
'ug' => '🇺🇬', 
'vn' => '🇻🇳'
);

if(!isset($_GET['rnd'])) {
    $data = array('status' => false, 'error' => 'No se proporcionó un valor "rnd" en la solicitud GET');
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

if(!array_key_exists($rnd, $countries)) {
    $data = array('status' => false, 'error' => 'Código de país no válido');
    header('Content-Type: application/json');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

$emoji = $countries[$rnd];

/*=====  1REQ  ======*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.fakexy.com/fake-address-generator-$rnd");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: www.fakexy.com',
    'user-agent: '.$rnd_ua.'',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$r1 = curl_exec($ch);

$country = capturehtml($r1, '<td>Country</td>
        						<td>','</td>');
$street = capturehtml($r1, '<td>Street</td>
        						<td>','</td>');
$city = capturehtml($r1, '<td>City/Town</td>
        						<td>','</td>');
$state = capturehtml($r1, '<td>State/Province/Region</td>
        						<td>','</td>');
$zip = capturehtml($r1, '<td>Zip/Postal Code</td>
        						<td>','</td>');
$phone = capturehtml($r1, '<td>Phone Number</td>
        						<td>','</td>');
$ssn = capturehtml($r1, '<td>Social Security Number</td>
	        				<td>','</td>');

if(empty($ssn)){
    $ssn = 'UNAVAILABLE';
}
if($ssn == null){
    $ssn = 'UNAVAILABLE';
}
if($ssn == " "){
    $ssn = 'UNAVAILABLE';
}

$data = array(
'Country' => $country,
'Street' => $street,
'City' => $city,
'State' => $state,
'Zip' => $zip,
'Phone' => $phone,
'SSN' => $ssn,
'emoji' => $emoji,
"name" => array(
"title" => $user["name"]["title"],
"first" => $user["name"]["first"],
"last" => $user["name"]["last"]
),
"email" => $email,
);

header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);