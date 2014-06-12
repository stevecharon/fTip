<?php
include("../script/SCRIPTconnect.php");
function getGesamtSpieltage($wettkampfid) {
	global $db;
	$spruch  = "SELECT spieltage";
	$spruch .= " FROM wettkampf";
	$spruch .= " WHERE id = $wettkampfid";

	$result = mysql_query($spruch, $db);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	return $row['spieltage'];
}
?>
