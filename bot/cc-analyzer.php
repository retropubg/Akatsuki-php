<?php

$eCc = mltExplode(ltrim(str_replace($eMsg[0], '', $msg['text'])));

$ccD = $eCc[0][0] == '3' ? [15, '4'] : [16, '3'];

$bInfo = cBin($eCc[0]);

$cPrepaid = isset($bInfo['level']) && strpos($bInfo['level'], 'PREPAID') === false;

$cc = ctype_digit($eCc[0]) && rChk($eCc[0][0], 3, 6) && strlen($eCc[0]) == $ccD[0] && $cPrepaid
	? $eCc[0]
	: false;
	
$month = isset($eCc[1]) && ctype_digit($eCc[1]) && rChk(ltrim($eCc[1], 0), 1, 12)
	? $eCc[1]
	: false;
	
$year = isset($eCc[2]) && ctype_digit($eCc[2]) && (rChk($eCc[2], 23, 32) || rChk($eCc[2], 2023, 2032))
	? $eCc[2]
	: false;
	
$cvv = isset($eCc[3]) && ctype_digit($eCc[3]) && strlen($eCc[3]) == $ccD[1]
	? $eCc[3]
	: false;