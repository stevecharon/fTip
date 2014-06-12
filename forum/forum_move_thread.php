<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../admin/admin_header.php');
include ('../script/SCRIPTforum_functions.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------



$fid        = $_GET['fid'];
$forumid    = $_GET['forumid'];
$beitragid  = $_GET['beitragid'];

if ($beitragid)
{
    $sprich  = "UPDATE forum SET forum_id = $forumid";
    $sprich .= " WHERE beitrag_id = $beitragid";
    $resilt = mysql_query($sprich, $db) or die("ThreadMove failed : " . mysql_error());
   
    $font3 = fontSizeColor(3, "#33cc00"); // gruen
    echo "<p $center>$font3 $lang_threadmoved<br>" ; //. $beitragid . $forumid;
//exit;
}





$spruch  = "SELECT beitrag_id FROM forum WHERE id = $fid";
$result = mysql_query($spruch, $db) or die("<b>BeitragID Holen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$beitragid = $row['beitrag_id'];




$font  = fontSizeColor(5, $txtcol8);$font2  = fontSizeColor(2, $txtcol9);
echo "<table $center border=0>";
echo "<tr>";
echo "<td $top $center>$font";
echo $lang_areyousure1 .  $font2 . " (ID " . $fid . ") $font $lang_areyousure2<br>";
$font  = fontSizeColor(3, $txtcol6);
echo "</td>";
echo "<td><img src=\"../img/data.JPG\"></td>";
echo "</tr><tr><td $cspn2>";
$font  = fontSizeColor(4, $txtcol17);
$font2  = fontSizeColor(2, $txtcol8);
echo "<table $center border=0><tr><td>$font";
echo $lang_wheretomove . "<ul>";

    echo "<li><a href=\"forum_move_thread.php?forumid=0&beitragid=$beitragid&fid=$fid\">" . $font2;
    echo $lang_mainboard . "</a>";
    
    echo "<li><a href=\"forum_move_thread.php?forumid=9999&beitragid=$beitragid&fid=$fid\">" . $font2;
    echo $lang_storyboard . "</a>";
        
    echo "<li><a href=\"forum_move_thread.php?forumid=9998&beitragid=$beitragid&fid=$fid\">" . $font2;
    echo $lang_cafeboard  . "</a>";
$font2  = fontSizeColor(2, $txtcol9);

$spruch = "SELECT id, name FROM tippspiel";
$result = mysql_query($spruch, $db) or die("<b>Foren Holen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
$rundenid = $row['id'];
$rundenname = $row['name'];

    echo "<li><a href=\"forum_move_thread.php?forumid=$rundenid&beitragid=$beitragid&fid=$fid\">" . $font2;
    echo $rundenname . "</a>";

}

        echo "</td></tr></table>";

echo "</td></tr>";

echo "</table></form>";

?>











