<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('user_header.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


$meldung = $_GET['meldung'];
if (!$meldung) {
    $meldung = $_POST['meldung'];
}
$rundenid = $_POST['rundenid'];
$rundenpwd = $_POST['rundenpwd'];
$rundenpwd2 = $_POST['rundenpwd2'];

$font  = fontSizeColor(3, $txtcol17);
$font1 = fontSizeColor(2, $txtcol17);
$font2 = fontSizeColor(2, $txtcol22);   // GRUEN
$font3 = fontSizeColor(2, $txtcol6);    // ROT

if ($rundenpwd != '') {
    $md5runde = md5($rundenpwd);
    if ($md5runde == $rundenpwd2)
        {
        echo "$font2 <br><br><b>$lang_okay</b>....<br>$font";
        $sprich  = "INSERT INTO tippspiel_user";
        $sprich .= " (tippspiel_id, user_id)";
        $sprich .= " VALUES ('$rundenid', '$uid')";
        $resilt = mysql_query($sprich, $db) or die("UserINTO rundenDB failed : " . mysql_error());
        echo "$font2 $lang_youaremember<br>$font5";
    
            $meldung = ''; $rundenpwd = '';
         echo "<br><a href=../user/user_start.php>$lang_goahead</a><br><br><br>";
        $logpage .= "[added(" . $rundenid. ")]";
        include ('../user/user_footer.html');
        exit;
        } 
    }
// ###################################################################################
$font4 = fontSizeColor(4, $txtcol13);
$font5 = fontSizeColor(2, $txtcol17); 

echo $font4;

echo "<br>$lang_joincommunity<br>$font5";
echo "$lang_jointext";

echo "<br><br>$lang_iliketojoin<br>";
$spruch  = "SELECT id, name FROM tippspiel";
$spruch .= " ORDER BY name";
$result = mysql_query($spruch, $db) or die("AlleRunden failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
$jenerundeid = $row['id'];
$jenerunde = $row['name'];

    $spruch2 = "SELECT id FROM tippspiel_user WHERE user_id = $uid";
    $spruch2 .= " AND tippspiel_id = $jenerundeid";
    $result2 = mysql_query($spruch2, $db) or die("RundenUsercheck failed : " . mysql_error() . "<br><br>" . $spruch2);
    $row2 = mysql_fetch_array($result2,MYSQL_ASSOC);
    $informant = $row2['id'];

if ($informant == '')
    {
    echo "<a href=\"../user/user_runde_anmelden.php?meldung=$jenerundeid\">";
    echo "$jenerunde</a><br>";
    }
}



if ($meldung)
{
echo "<br><br>";
$spruch  = "SELECT name, pwd FROM tippspiel WHERE id = $meldung";
$result = mysql_query($spruch, $db) or die("RundenGetConf failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$runden_name = $row['name'];
$runden_pwd = $row['pwd'];
//echo $meldung;

echo "<FORM METHOD=\"post\" NAME=\"register\" ACTION=\"user_runde_anmelden.php\">";
echo "<table $center border=0>";
echo "<tr><td $cspn2 $center>" . $font1  . "$lang_join <b><i>$runden_name</i></b></td></tr>";
echo "<tr><td>$font1 $lang_password </td>";
echo "<td><input name=\"rundenpwd\" type=\"password\" value=\"\"></td></tr>";
echo "<tr><td $cspn2 $center><input name=\"submit\" type=\"submit\" value=\"" . $lang_buttonjoin . "\"></td></tr>";
echo "<input name=\"rundenpwd2\" type=\"hidden\" value=\"$runden_pwd\">";
echo "<input name=\"rundenid\" type=\"hidden\" value=\"$meldung\">";
echo "<input name=\"meldung\" type=\"hidden\" value=\"$meldung\">";
echo "</table></form>";

}

/*
echo "<br><p $center>";
echo "<img src=\"../img/baustelle1.jpg\">";
$font3 = fontSizeColor(3, $txtcol17);
echo "$font3<br><br>Dieser Programmteil wird noch bearbeitet und kann derzeit nicht aufgerufen werden.";
*/


    if ($rundenpwd && ($rundepwd != $rundenpwd2))
    {
    echo "$font3 $lang_wrongpwd <b><i>$runden_name</i></b><br>$font<br>";
    }








include ('user_footer.html');
?>










