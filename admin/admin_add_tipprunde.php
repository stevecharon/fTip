<?php


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


$teilnahme = $_POST['teilnahme'];
$tipname = $_POST['tipname'];
$tippwd = $_POST['tippwd'];




if ($tipname)
{
$font3 = fontSizeColor(1, "black");
echo "<table border=0 $center><tr><td>$font3";

// -------------- Detektiv -----------------------------------------------------------
$spruch  = "SELECT id FROM tippspiel";
$spruch .= " WHERE name = '$tipname'";	
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$detektiv = $row['id'];
if ($detektiv > 0)
    {
    $font3 = fontSizeColor(4, "red");
    echo "$font3<b>" . $tipname . "</b>";
    echo "<br>$lang_groupinuse";
    echo "<br><a href=\"../admin/admin_add_tipprunde.php\">$lang_tryanother</a>";
    echo "</td></tr></table>";
    include ('../user/user_footer.html');
    exit;
    }
// -----------------------------------------------------------------------------------


$md5runde = md5($tippwd);

$sprich = "INSERT INTO tippspiel (name, pwd) VALUES ('$tipname', '$md5runde')";
$resilt = mysql_query($sprich, $db);
echo $lang_newgroup1 . " <b>" . $tipname . " </b>$lang_newgroup2 ";

$spruch  = "SELECT id FROM tippspiel";
$spruch .= " WHERE name = '$tipname'";	
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$neuerunde = $row['id'];

if ($teilnahme)
{
foreach ($teilnahme AS $hier)
    {
    echo " " . $hier . " ";
    $sprich = "INSERT INTO tippspiel_wettkampf (tippspiel_id, wettkampf_id) VALUES ('$neuerunde', '$hier')";
    $resilt = mysql_query($sprich, $db);
    }
}
echo "</td></tr></table><br><br>";


// #############################################
// --------- SEITENANFANG ----------------------
}

$font2 = fontSizeColor(3, "black");
$font = fontSizeColor(2, $txtcol8); // #33cc00
echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_add_tipprunde.php\">";
echo "<table $bgcolor7 $center>";
echo "<tr><td $cspn2 $center>$font2 $lang_addgroup</td></tr>";
echo "<tr><td $top>";
echo "<table $center border=0 cellspacing=2 cellpadding=0>";
echo "	<tr>";
echo "		<td $center>$font<b>$lang_groupname</b></font></td>";
echo "		<td $center>$font<b>$lang_grouppwd</b></font></td>";
echo "	</tr>";
echo "	<tr>";
echo "		<td><input name=\"tipname\"></td>";
echo "		<td><input name=\"tippwd\"></td>";
echo "	</tr>";
echo "	<tr>";
echo "		<td></td>";
echo "		<td $center><input type=\"submit\" value='" . $lang_buttonsubmit . "' name='" . $lang_buttonsubmit . "' border=\"0\"></td>";
echo "	</tr>";
echo "</table>";
echo "</td><td $top>";

$spruch  = " SELECT id";
$spruch .= " FROM wettkampf";
$spruch .= " WHERE done = 0";
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $wk_id = $row['id'];
    $wk_name = WKname($wk_id);
    echo "<input type=\"checkbox\" name=\"teilnahme[]\" value=\"$wk_id\">$font $wk_name &nbsp;<br>";
    }

echo "</td></tr></table>";
echo "</FORM>";
include ('../user/user_footer.html');
?>