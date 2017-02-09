<?php

$dbname = "ftiproot";
$dbuser = "ftipdad";
$dbpass = "ftipdad";
$dbhost = "localhost";

$db = @mysql_connect($dbhost, $dbuser, $dbpass);

if ($db)
{
        mysql_select_db($dbname, $db);
}

//echo $name; echo $uid;

$sprich  = "INSERT INTO wwwlog (url, page, user, ip)";
$sprich .= " VALUES ('$logurl', '$logpage', '$name', '$logip')";

$resilt = mysql_query($sprich, $db) or die("<b>LOGBOT</b> failed : " . mysql_error() . "<br><br>" . $sprich);




?>








