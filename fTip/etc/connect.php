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
/* else
{
        echo "<p>Idiot, hast wieder alles FALSCH GEMACHT !!";
}
*/
?>
