<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');
include ('../admin/admin_header.php');    
/**/        $logpage = basename(__FILE__);          // ##


//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


$notthefirst  = $_POST['notthefirst'];
$fid = $_GET['fid'];


if ($notthefirst)
{
$fid = $_POST['fid'];
$font  = fontSizeColor(4, $txtcol9);
$sprich  = "DELETE FROM forum WHERE id = $fid";
$resilt = mysql_query($sprich, $db) or die("KillThread failed : " . mysql_error() . "<br>" . $sprich);
echo "<p $center>$lang_thread " . $fid . " $lang_deleted....<br><br>";

$font  = fontSizeColor(2, $txtcol19);
echo "<a href=\"../forum/forum_start.php\">" . $font . $lang_goback . "</a><br><br><br><br>";
exit;
}


echo "<FORM METHOD=\"post\" NAME=\"antworten\" ACTION=\"forum_kill_thread.php\">";


$font  = fontSizeColor(5, $txtcol8);$font2  = fontSizeColor(2, $txtcol9);
echo "<table $center border=0>";
echo "<tr>";
echo "<td $top $center>$font";
echo $lang_areyousure1 .  $font2 . "  (ID " . $fid . ")  $font $lang_areyousure2<br>";
$font  = fontSizeColor(3, $txtcol6);
echo "$font $lang_areyousuretxt";
echo "</td>";
echo "<td><img src=\"../img/data.JPG\"></td>";
echo "</tr>";
echo "<tr><td $center $cspn2><INPUT TYPE=\"submit\" VALUE='" . $lang_buttondelete . "'></td></tr>";
echo "<INPUT TYPE=\"hidden\" VALUE=\"$fid\" NAME=\"fid\">";
echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"notthefirst\">";
echo "</table></form>";

?>