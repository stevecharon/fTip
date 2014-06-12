<?php

#echo "pupz ";

include ('SCRIPTconnect.php');
$spruch  = " SELECT * FROM team";

$result = mysql_query($spruch, $db) or die("<b>team</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

$id = $row['id'];
$name = $row['name'];


echo "&#36;langteam_     = &quot;" . $name . "&quot;&#59;<br>";
#echo "if (&#36;teamname == &quot;" . $name . "&quot;) { &#36;thisteam = &#36;langteam_&#59;}<br>";
#echo " &#36;";

}
/*

*/

#if ($nix == '') { echo pupz; }

?>