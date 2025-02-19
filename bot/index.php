<?php

include('hosting.php');

$botToken = '7633669044:AAFPAjaTej2gIMNVDJXcK1AXU6qdO9TSZ-w';
$botUrl = "$hosting/bot/";

$input = json_decode(file_get_contents('php://input'), 1);

$pro = file_get_contents("https://api.telegram.org/bot$botToken/setWebhook?url=$botUrl&drop_pending_updates=True");

echo "pro:$pro";

if(strpos($pro, 'Many')){
file_get_contents("https://api.telegram.org/bot$botToken/setWebhook?url=$botUrl");
}

include('proxys.php');
require_once('functions.php');

$f_data = json_decode(file_get_contents('data.json'), 1);

if(isset($input['message'])){
	$user = $input['message']['from'];
	$chat = $input['message']['chat'];
	$msg = $input['message'];
}

$userlink = "<a href='tg://user?id=".$user['id'].">".$user['first_name']."</a>";

$admins = [
	'6699273462'
];
$isAdmin = in_array($user['id'], $admins);

$sellers = [
'5435611792',
'5362176219',
'6076355362',
'5162213041',
'5622648117',
'5928496674',
'1649834075',
'5113072048',
'5747095773',
'5494896535',
'5750586305',
'1824148738',
'1297999372'
];
$isSeller = in_array($user['id'], $sellers);

$isPremiun = in_array($user['id'], $f_data['premiuns']);
$isGAppd = in_array($chat['id'], $f_data['groups']);

include('kbinline.php');

if(in_array($msg['text'], ['/start', '!start', '.start', '/cmds', '!cmds', '.cmds'])){
	output('sendVideo', array_merge([
'chat_id' => $chat['id'],
'video' => 'https://polito283.alwaysdata.net/video/1_5111912587285496600.mp4',
'reply_to_message_id'=> $msg['message_id']
	], $kb_s));
}

include('admins.php');
include('au.php');
include('key.php');
include('claim.php');
include('tools.php');
include('sk.php');
include('rnd.php');
include('rnd1.php');
include('rndp.php');
include('email.php');
include('email1.php');
include('auto.php');
include('itachi.php');//Braintree $3 2req
include('aktz.php');//Shopify avs
include('kyusuke.php');//Shopify + Chase
include('daibutsu.php');//Shopify + adyen
include('yahiko.php');//Shopify + Moneris
include('pain.php');//Shopify Avs $4.36
include('zetsu.php');//Shopify $18.93
include('hidan.php');//Shopify + Braintree $14.14
include('tobi.php');//Shopify + Braintree
include('obito.php');//Shopify + Moneris $9.85
include('sasori.php');//Shopify + Payeezy
include('kie.php');//Shopify + Payeezy
include('pp.php');//Paypal $0.01
include('pp1.php');//Paypal $1
include('kakuzu.php');//Braintree + vbv €7.94
include('konan.php');//Stripe Auth 4req
include('deidara.php');//Shopify auth

function output($method, $data){
	$out = curl_init();
	
	curl_setopt_array($out, [
CURLOPT_URL => 'https://api.telegram.org/bot'.$GLOBALS['botToken'].'/'.$method.'',
CURLOPT_POST => 1,
CURLOPT_POSTFIELDS => array_merge([
	'parse_mode' => 'HTML'
], $data),
CURLOPT_RETURNTRANSFER => 1
	]);
	
	$result = curl_exec($out);
	
	curl_close($out);
	
	return json_decode($result, 1);
}
