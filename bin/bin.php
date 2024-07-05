<?php

function capture($str, $start, $end){	
	return strpos($str, $start) === false || strpos($str, $end) === false
? NULL : explode($end, explode($start, $str)[1])[0];
}

// Obtener el BIN de la solicitud GET (solo los primeros 6 dígitos)
$bin = substr($_GET['bin'], 0, 6);

// Abrir el archivo CSV
$handle = fopen('bins_all.csv', 'r');

// Iterar por las líneas del archivo CSV
$info = null;
while (($line = fgetcsv($handle)) !== FALSE) {
// Obtener el BIN actual (solo los primeros 6 dígitos)
$currentBin = substr($line[0], 0, 6);

// Si el BIN actual coincide con el BIN buscado
if ($currentBin === $bin) {
// Obtener la información correspondiente
$info = [
'status' => true,
'bin' => $currentBin,
'country_code' => $line[1],
'flag' => $line[2],
'brand' => $line[3] !== '' ? $line[3] : 'UNAVAILABLE',
'type' => $line[4] !== '' ? $line[4] : 'UNAVAILABLE',
'level' => $line[5] !== '' ? $line[5] : 'UNAVAILABLE',
'bank' => $line[6] !== '' ? $line[6] : 'UNAVAILABLE',
];

// Si el primer dígito es inválido, marcar como inválido
$invalidFirstDigits = ['1', '2', '7', '8', '9', '0'];
if (in_array(substr($bin, 0, 1), $invalidFirstDigits)) {
$info['status'] = false;
}

$countryCode = $info['country_code'];
$url = 'https://restcountries.com/v2/alpha/' .$countryCode;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$countryname = capture($response, '"name":"','"');
$currency = capture($response, '"currencies":[{"code":"','"');
$symbol = capture($response, '"symbol":"','"');
curl_close($curl);
$info['country_name'] = strtoupper($countryname);
$info['currency'] = $currency;
$info['currency_symbol'] = $symbol;
break;
}
}
// Si no se encontró el BIN, enviar una respuesta de error
if ($info === null) {
header('Content-Type: application/json');
echo json_encode(['status' => false, 'bin' => $bin, 'error' => 'BIN no encontrado'], JSON_UNESCAPED_UNICODE);
exit;
}
// Si el status es invalid, enviar respuesta correspondiente
if ($info['status'] === false) {
header('Content-Type: application/json');
echo json_encode(['status' => false, 'bin' => $bin, 'error' => 'Invalid BIN!'], JSON_UNESCAPED_UNICODE);
exit;
}
// Convertir a JSON y enviar como respuesta
header('Content-Type: application/json');
echo json_encode($info, JSON_UNESCAPED_UNICODE);