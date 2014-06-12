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
$username   = $_POST['username'];
$newmail    = $_POST['newmail'];

if ($username)
{
$font3 = fontSizeColor(1, "black");
echo "<table border=0 $center><tr><td>$font3";

$spruch  = "SELECT id FROM user";
$spruch .= " WHERE name = '$username'";	
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$detektiv = $row['id'];
if ($detektiv > 0)
    {
    $font3 = fontSizeColor(4, "red");
    echo "$font3<b>" . $username . "</b>";
    echo "<br>$lang_usernameinuse";
    echo "<br><a href=\"../admin/admin_add_user.php\">$lang_tryanother</a>";
    echo "</td></tr></table>";
    include ('../user/user_footer.html');
    exit;
    }

$spruch  = "SELECT language FROM config";	
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$the_language = $row['language'];

$UserGenesis =     UserGenesis();
$md5user = md5($username);
$sprich = "INSERT INTO user (name, email, pwd, genesis, language) VALUES ('$username', '$newmail', '$md5user', '$UserGenesis', '$the_language')";
$resilt = mysql_query($sprich, $db);

echo $lang_newuser1 . " <b>" . $username . " </b>$lang_newuser2 ";

$spruch  = "SELECT id FROM user";
$spruch .= " WHERE name = '$username'";	
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$neueruser = $row['id'];

if ($teilnahme)
{
foreach ($teilnahme AS $hier)
    {
    echo " " . $hier . " ";
    $sprich = "INSERT INTO tippspiel_user (user_id, tippspiel_id) VALUES ('$neueruser', '$hier')";
    $resilt = mysql_query($sprich, $db);
    }
}

if (newmail)
    {
    $spruch  = "SELECT newuser_txt, www, maild FROM config";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $body = $row['newuser_txt'];
    $www = $row['www'];
    $subject = $lang_mailsubject;
    $daemon_adress = $row['maild'];
    
    $obody = ereg_replace( "USER", $username, $body );
	$obody = ereg_replace( "EMAIL", $newmail, $obody );
    $obody = ereg_replace( "URL", $www, $obody );
    mail( $newmail, $subject, $obody, "From: fTip-Daemon<" . $daemon_adress . ">" );
    echo "<br>$lang_mailsent " . $newmail;
    
    }


echo "</td></tr></table><br><br>";
}

$font2 = fontSizeColor(3, "black");
$font = fontSizeColor(2, $txtcol8); // #33cc00
echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_add_user.php\">";
echo "<table $bgcolor7 $center>";
echo "<tr><td $cspn2 $center>$font2 $lang_addnewuser</td></tr>";
echo "<tr><td $top>";
echo "<table $center border=0 cellspacing=2 cellpadding=0>";
echo "	<tr>";
echo "		<td $center>$font<b>$lang_username</b></font></td>";
echo "		<td $center>$font<b>$lang_usermail</b></font></td>";
echo "	</tr>";
echo "	<tr>";
echo "		<td><input name=\"username\"></td>";
echo "		<td><input name=\"newmail\"></td>";
echo "	</tr>";
echo "	<tr>";
echo "		<td></td>";
echo "		<td $center><input type=\"submit\" value='" . $lang_buttonsubmit  . "' name='" . $lang_buttonsubmit  ."' border=\"0\"></td>";
echo "	</tr>";
echo "</table>";
echo "</td><td $top>";

$spruch  = " SELECT id, name";
$spruch .= " FROM tippspiel";
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $runde_id = $row['id'];
    $runde_name = $row['name'];
    echo "<input type=\"checkbox\" name=\"teilnahme[]\" value=\"$runde_id\">$font $runde_name &nbsp;<br>";
    }

echo "</td></tr></table>";
echo "</FORM>";
include ('../user/user_footer.html');
?>



	