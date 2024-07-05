<?php

//ADD and DEL PREMIUN
if(cCmd($msg['text'], ['/addp', '!addp', '.addp']) && $isAdmin){
$eMsg = explode(' ', $msg['text']);
$pList = $f_data['premiuns'];

if(isset($eMsg[1])){
if(in_array($eMsg[1], $pList)){
$rAddp = "System Akatsuki -»>_\n\n𝙐𝙨𝙚𝙧 -» <code>This user is already Premium! ⚠️</code>";
}
else{
if(!ctype_digit($eMsg[1])){
$rAddp = "System Akatsuki -»>_\n\n𝙐𝙨𝙚𝙧 -» <code>This ID does not belong to any user</code>";
}
else{
$f_data['premiuns'][] = $eMsg[1];

file_put_contents('data.json', json_encode($f_data));

$rAddp = "𝙋𝙧𝙚𝙢𝙞𝙪𝙢 𝙨𝙪𝙘𝙘𝙚𝙨𝙨𝙛𝙪𝙡𝙡𝙮 𝙜𝙞𝙛𝙩𝙚𝙙 𝙩𝙤 𝙞𝙙! <code>".$eMsg[1]."</code>";
}
}

$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => $rAddp,
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

output('sendMessage', [
'chat_id' => $eMsg[1],
'message_id' => $msgId_bot,
'text' => "
𝙒𝙚𝙡𝙘𝙤𝙢𝙚 𝙩𝙤 𝙤𝙪𝙧 𝙤𝙧𝙜𝙖𝙣𝙞𝙯𝙖𝙩𝙞𝙤𝙣"
]);
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "
𝙒𝙚𝙡𝙘𝙤𝙢𝙚 𝙩𝙤 𝙤𝙪𝙧 𝙤𝙧𝙜𝙖𝙣𝙞𝙯𝙖𝙩𝙞𝙤𝙣
id -» <code>".$eMsg[1]."</code>"
]);
}
}

if(cCmd($msg['text'], ['/delp', '!delp', '.delp']) && $isAdmin){
$eMsg = explode(' ', $msg['text']);
$pList = $f_data['premiuns'];

if(isset($eMsg[1])){
if(!in_array($eMsg[1], $pList)){
$rAddp = "System Akatsuki -»>_\n\n𝙐𝙨𝙚𝙧 -» <code>non-premium</code>";
}
else{
$key = array_search($user['id'], $f_data['premiuns']);

unset($f_data['premiuns'][$key]);

$f_data['premiuns'] = array_values($f_data['premiuns']);

file_put_contents('data.json', json_encode($f_data));

$rAddp = "𝙐𝙨𝙚𝙧 𝙧𝙚𝙢𝙤𝙫𝙚𝙙 𝙛𝙧𝙤𝙢 𝙋𝙧𝙚𝙢𝙞𝙪𝙢! <code>".$eMsg[1]."</code>";
}

$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => $rAddp,
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];

output('sendMessage', [
'chat_id' => $eMsg[1],
'message_id' => $msgId_bot,
'text' => "
𝙄𝙩 𝙬𝙖𝙨 𝙖 𝙥𝙡𝙚𝙖𝙨𝙪𝙧𝙚 𝙩𝙤 𝙝𝙖𝙫𝙚 𝙝𝙖𝙙 𝙮𝙤𝙪 𝙞𝙣 𝙤𝙪𝙧 𝙤𝙧𝙜𝙖𝙣𝙞𝙯𝙖𝙩𝙞𝙤𝙣, 𝙘𝙤𝙢𝙚 𝙗𝙖𝙘𝙠 𝙨𝙤𝙤𝙣 :3"
]);
output('sendMessage', [
'chat_id' => 1205717709,
'message_id' => $msgId_bot,
'text' => "
𝙄𝙩 𝙬𝙖𝙨 𝙖 𝙥𝙡𝙚𝙖𝙨𝙪𝙧𝙚 𝙩𝙤 𝙝𝙖𝙫𝙚 𝙝𝙖𝙙 𝙮𝙤𝙪 𝙞𝙣 𝙤𝙪𝙧 𝙤𝙧𝙜𝙖𝙣𝙞𝙯𝙖𝙩𝙞𝙤𝙣, 𝙘𝙤𝙢𝙚 𝙗𝙖𝙘𝙠 𝙨𝙤𝙤𝙣 :3
id -» <code>".$eMsg[1]."</code>"
]);
}
}

//ADD and DEL GROUP
if(cCmd($msg['text'], ['/addg', '!addg', '.addg']) && $isAdmin){
$eMsg = explode(' ', $msg['text']);
$gList = $f_data['groups'];

if(isset($eMsg[1])){
if(in_array($eMsg[1], $gList)){
$rAddg = "System Akatsuki -»>_\n\n𝙂𝙧𝙤𝙪𝙥 -» <code>This group is already Authorized! ⚠️</code>";
}
else{
$aux = substr($eMsg[1], 1);

if($eMsg[1][0] != '-' || ctype_digit($aux) == false){
$rAddg = "System Akatsuki -»>_\n\n𝙂𝙧𝙤𝙪𝙥 -» <code>This ID does not belong to any group</code>";
}
else{
$f_data['groups'][] = $eMsg[1];

file_put_contents('data.json', json_encode($f_data));

$rAddg = "𝙂𝙧𝙤𝙪𝙥 𝙖𝙪𝙩𝙝𝙤𝙧𝙞𝙯𝙚𝙙 𝙨𝙪𝙘𝙘𝙚𝙨𝙨𝙛𝙪𝙡𝙡𝙮! <code>".$eMsg[1]."</code>";
}
}

$a = $eMsg[1][0] != '-' ? "TRUE" : "FALSE";

$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => $rAddg ,
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];
}
}

if(cCmd($msg['text'], ['/delg', '!delg', '.delg']) && $isAdmin){
$eMsg = explode(' ', $msg['text']);
$gList = $f_data['groups'];

if(isset($eMsg[1])){
if(!in_array($eMsg[1], $gList)){
$rAddg = "System Akatsuki -»>_\n\n𝙂𝙧𝙤𝙪𝙥 -» <code>Not Authorized</code>";
}
else{
$key = array_search($user['id'], $f_data['groups']);

unset($f_data['groups'][$key]);

$f_data['groups'] = array_values($f_data['groups']);

file_put_contents('data.json', json_encode($f_data));

$rAddg = "𝙂𝙧𝙤𝙪𝙥 𝙧𝙚𝙢𝙤𝙫𝙚𝙙 𝙛𝙧𝙤𝙢 𝘼𝙪𝙩𝙝𝙤𝙧𝙞𝙯𝙚𝙙! <code>".$eMsg[1]."</code>";
}

$msgId_bot = output('sendMessage', [
'chat_id' => $chat['id'],
'text' => $rAddg,
'reply_to_message_id' => $msg['message_id']
])['result']['message_id'];
}
}

if(isset($rAddp) || isset($rAddg)){
sleep(5);

output('deleteMessage', [
'chat_id' => $chat['id'],
'message_id' => $msgId_bot
]);
}