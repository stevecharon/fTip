<?php

//echo $name; echo $uid;


$spruch = "SELECT logflag FROM config";
$result = mysql_query( $spruch, $db ) or die("BOTcheck nicht: " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

if ($row['logflag'] == 1) {
    if ($name == '') {
    $name = "[gast]";
    }
    $sprich  = "INSERT INTO weblog (page, user, ip)";
    $sprich .= " VALUES ('$logpage', '$name', '$logip')";

    $resilt = mysql_query($sprich, $db) or die("<b>LOGBOT</b> failed : " . mysql_error() . "<br><br>" . $sprich);

//include ("http://www.produnis.de/fTip/bot/logbot.php?logpage=" . $logpage . "&logurl=" . $logurl . "&name=" . $name . "&logip=" . $logip . ""); // ##
}

?>








