<?php
include ("SCRIPTconnect.php");

function WhichLanguage($db, $uid) {


//===== Which Language has user set ? =================================
$spruch  = "SELECT user.language AS userlang, language.suffix AS suffix FROM user";
$spruch .= " INNER JOIN language ON user.language = language.id";
$spruch .= " WHERE user.id = $uid";
$result = mysql_query( $spruch, $db ) or die("Languagefailed : " . mysql_error() . " - " . $spruch );
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$userlang = $row['userlang'];
$langsuffix = $row['suffix'];

return $langsuffix;

}




?>