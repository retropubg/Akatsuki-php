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