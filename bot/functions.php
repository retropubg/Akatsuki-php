<?php

function cCmd($msg, $cmds){
	return in_array(explode(' ', $msg)[0], $cmds);
}

function cBin($bin){
include('hosting.php');
$cBin = json_decode(file_get_contents("$hosting/bin/bin.php?bin=$bin"), 1);
	return $cBin['status'] !== TRUE
? NULL
: $cBin;
}

function mltExplode($data){
	return explode('|', str_replace([' ', '|', '!', '~', ':', '::', '#', '::', '\ ', ';', '/'], '|', $data));
}

function rChk($str, $s, $e, $l = null){
	return $l == null
? $str >= $s && $str <= $e
: $str >= $s && $str <= $e && strlen($str) == $l;
}

function capture($str, $start, $end){	
	return strpos($str, $start) === false || strpos($str, $end) === false
? NULL : explode($end, explode($start, $str)[1])[0];
}

function capturehtml($str, $starting_word, $ending_word){
$subtring_start  = strpos($str, $starting_word);
$subtring_start += strlen($starting_word);
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
return substr($str, $subtring_start, $size);
 }

function ccG($bin, $month, $year, $cvv){
	$ccD = $bin[0] == '3' ? [15, ['4', 0000, 9999]] : [16, ['3', 000, 999]];
	
	do{
do{
	$gen = $bin;

	while(strpos($gen, 'x')){
$gen[strpos($gen, 'x')] = mt_rand(0, 9);
	}

	while(strlen($gen) < $ccD[0]){
$gen .= mt_rand(0, 9);
	}
}
while(luhnChk($gen));

$mGen = $month == 'rnd' ? sprintf("%02d", mt_rand(01, 12)) : $month;
$yGen = $year == 'rnd' ?   mt_rand(24, 32) : $year;
$cGen = $cvv == 'rnd' ? sprintf("%0".$ccD[1][0]."d", mt_rand($ccD[1][1], $ccD[1][2])) : $cvv;

$cc_arr[] = "<code>".$gen."|".$mGen."|".$yGen."|".$cGen."</code>";
	}
	while(count($cc_arr) < 10);	
	
	return $cc_arr;
}

function luhnChk($cc){
	$ccL = strlen($cc);
	
	for($i = 0; $i < $ccL; $i++){
if(($i  % 2) == ['15' => 1, '16' => 0][$ccL]){
	$aux = $cc[$i] * 2;
	
	$cc[$i] = (strlen($aux) > 1) ? array_sum(str_split($aux)) : $aux;
}
	}

	return (array_sum(str_split($cc)) % 10) == 0 ? false : true;
}

function bGen($seed){
	$dLen = (6 - strlen($seed));
	$rndI = str_repeat('0', $dLen);
	$rndF = str_repeat('9', $dLen);
	
	do{
do{
	$gBin = $seed.sprintf("%0".$dLen."d", mt_rand($rndI, $rndF));
	
	$cBin = cBin($gBin);
}
while(!$cBin);

$lGbin[] = "𝘽𝙞𝙣 -» <code>".$gBin."</code>\n𝙄𝙣𝙛𝙤 -» <code>".$cBin['brand']."</code> - <code>".$cBin['type']."</code> - <code>".$cBin['level']."</code>\n𝘽𝙖𝙣𝙠 -» <code>".$cBin['bank']."</code>\n𝘾𝙤𝙪𝙣𝙩𝙧𝙮 -» <code>".$cBin['country_name']." ".$cBin['flag']." - ".$cBin['currency_symbol']." ".$cBin['currency']."</code>\n- - - - - - - - - - - - - - - - - - - - -";

$lGbin = array_unique($lGbin);
	}
	while(count($lGbin) < 3);

	return implode("\n", $lGbin);
}

function antiSpam($id, $time){
	$aS_arr = $GLOBALS['f_data']['antispam'];
	
	if(empty($aS_arr[$id])){
$GLOBALS['f_data']['antispam'][$id] = date('U');

file_put_contents('data.json', json_encode($GLOBALS['f_data']));

return [true];
	}
	
	$tLeft = ($time - (date('U') - $aS_arr[$id]));
	
	if($tLeft < 1){
$GLOBALS['f_data']['antispam'][$id] = date('U');

file_put_contents('data.json', json_encode($GLOBALS['f_data']));

return [true];
	}
	
	return [false, $tLeft];
}

include('hosting.php');

$directorio = "home/$hosting1/www/bot"; // reemplaza con la ruta a tu directorio
$archivos = scandir($directorio); // obtiene un arreglo con los nombres de todos los archivos en el directorio

foreach ($archivos as $archivo) {
if (strpos($archivo, 'cookie') !== false) {
unlink($directorio . '/' . $archivo); // elimina el archivo si contiene la cadena 'hola'
}
}

unlink('botcookie.txt');