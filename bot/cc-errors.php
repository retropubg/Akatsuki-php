<?php

if($cc == false){
	$rChk[0] = "𝘾𝘾 -» <code>Invalid! ⚠</code>";
	
	if($cPrepaid == false && strlen($eCc[0]) == $ccD[0]){
$rChk[0] = "𝘽𝙞𝙣 -» <code>Banned! ⚠</code>";
	}
}
if($month == false){
	$rChk[] = "𝙈𝙤𝙣𝙩𝙝 -» <code>Invalid! ⚠</code>";
}
if($year == false){
	$rChk[] = "𝙔𝙚𝙖𝙧 -» <code>Invalid! ⚠</code>";
}
if($cvv == false){
	$rChk[] = "𝘾𝙑𝙑 -» <code>Invalid! ⚠</code>";
}

$rChk = strpos($rChk[0], '𝘽𝙞𝙣') === 0
	? "<b>System Akatsuki -»>_</b>\n\n".$rChk[0]
	: "<b>System Akatsuki -»>_</b>\n\n".implode("\n", $rChk);

$rChk .= rChk($eCc[0][0], 3, 6) && strpos($rChk, '𝘽𝙞𝙣') === false
	? [
3 => "\n\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/chk 379364017638811|03|2024|2453</code>",
4 => "\n\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/chk 4000221270802550|02|29|556</code>",
5 => "\n\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/chk 5356740156481160|11|2025|657</code>",
6 => "\n\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/chk 65050700173948|10|2024|889</code>"
	][$eCc[0][0]]
	: (strpos($rChk, '𝘽𝙞𝙣')
? "\n\n𝙋𝙍𝙀𝙋𝘼𝙄𝘿 𝙗𝙞𝙣𝙨 𝙖𝙧𝙚 𝙣𝙤𝙩 𝙖𝙡𝙡𝙤𝙬𝙚𝙙"
: "\n\n𝙁𝙤𝙧𝙢𝙖𝙩 -» <code>/chk CC|MONTH|YEAR|CVV</code>");