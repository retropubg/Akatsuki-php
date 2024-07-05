<?php

$uRnd = json_decode(file_get_contents('https://randomuser.me/api/'), 1);

$name = $uRnd['results']['0']['name'];
$location = $uRnd['results']['0']['location'];
$mail = str_replace('@example.com', '@gmail.com', $uRnd['results']['0']['email']);
$login = $uRnd['results']['0']['login'];