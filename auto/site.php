<?php

error_reporting(0);

include('hosting.php');

function capture($str, $start, $end){ 
return strpos($str, $start) === false || strpos($str, $end) === false
? NULL : explode($end, explode($start, $str)[1])[0];
}

$site = $_GET["site"];
$host = parse_url($site, PHP_URL_HOST);
$parts = explode('.', $host);
$domain = $parts[count($parts)-2] . '.' . $parts[count($parts)-1];

if(strpos($site, '.ca')){
$pro = "ca";
}
elseif(strpos($site, '.au')){
$pro = "au";
}
elseif(strpos($site, '.tr')){
$pro = "tr";
}
elseif(strpos($site, '.no')){
$pro = "no";
}
elseif(strpos($site, '.rs')){
$pro = "rs";
}
elseif(strpos($site, '.fi')){
$pro = "fi";
}
elseif(strpos($site, '.de')){
$pro = "de";
}
elseif(strpos($site, '.ua')){
$pro = "ua";
}
elseif(strpos($site, '.ch')){
$pro = "ch";
}
elseif(strpos($site, '.br')){
$pro = "br";
}
elseif(strpos($site, '.dk')){
$pro = "dk";
}
elseif(strpos($site, '.mx')){
$pro = "mx";
}
elseif(strpos($site, '.nl')){
$pro = "nl";
}
elseif(strpos($site, '.ir')){
$pro = "ir";
}
elseif(strpos($site, '.ie')){
$pro = "ie";
}
elseif((strpos($site, '.gb')) || (strpos($site, '.uk'))){
$pro = "gb";
}
elseif(strpos($site, '.es')){
$pro = "es";
}
elseif(strpos($site, '.fr')){
$pro = "fr";
}
elseif(strpos($site, '.in')){
$pro = "in";
}
elseif(strpos($site, '.nz')){
$pro = "nz";
}
else{
$pro = "us";
}

$Rndus = file_get_contents("$hosting/rnd/rndpro.php?domain=$pro");
$domain1 = capture($Rndus, '"domain":"','"');
$nat = capture($Rndus, '"nat":"','"');
$state = capture($Rndus, '"state":"','"');
$state1 = capture($Rndus, '"state1":"','"');
$city = capture($Rndus, '"city":"','"');
$street = capture($Rndus, '"street":"','"');
$zip = capture($Rndus, '"zip":"','"');
$country = capture($Rndus, '"country":"','"');

$data = array(
'nat' => $nat,
'state' => $state,
'state1' => $state1,
'city' => $city,
'street' => $street,
'zip' => $zip,
'country' => $country,
'domain' => $domain
);

header('Content-Type: application/json');
echo json_encode($data);