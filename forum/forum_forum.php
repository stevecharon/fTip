<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');

$uid = $_SESSION['uid'];
$forumid    = $_GET['forumid'];


/**/        $logpage = basename(__FILE__);          // ##
$flag = ForumFlag();
if ($uid == 1)
    {
    include ('../admin/admin_header.php'); 
//---------- which language should i use? ---------------------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/forum_offline." . $langsuffix);
include ("../languages/" . $langsuffix . "/" . $thepage);
//-------------------------------------------------------------------------


        if ($flag == 0)
        {
        $font  = fontSizeColor(3, $txtcol6); 
        $font2 = fontSizeColor(2, $txtcol7); 
        echo "<p $center>$font $lang_offline";
        echo "$dreispace<a href=\"../admin/admin_forum.php\">" . $font2 . "$lang_offlinechange</a></p>";
        }
      
    }else{
    include ('../user/user_header.php');
//---------- which language should i use? ---------------------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/forum_offline." . $langsuffix);
include ("../languages/" . $langsuffix . "/" . $thepage);
//-------------------------------------------------------------------------



    //echo $flag;
    if ($flag == 0)
        {
        echo "<table border=0 cellspacing=12 $center><tr>";
        echo "<td $center $top><img src=\"../img/ForumClosed.jpg\" width=150></td>";
        $font = fontSizeColor(5, $txtcol8);
        $font2 = fontSizeColor(5, $txtcol6); 
         $font3 = fontSizeColor(3, $txtcol3); 
        echo "<td $center>$font$lang_offlinetext1 $font2<b>$lang_offlinetext2</b> !<br><br>$font3 $lang_offlinetext3</td>";
        echo "</tr></table><br><br><br>";
        include ('../user/user_footer.html');
        exit;
        }
    }



$rundenname = ForumName($forumid);


$font = fontSizeColor(6, "#cc9900");
echo "<p $center>$font $lang_thetitel<br><hr width=\"60%\">";



$font = fontSizeColor(5, $txtcol17); echo $font;
echo "<table $center border=1>";
echo "<tr><th $cspn5 $left>$font $lang_the $rundenname $lang_board</th></tr>";


echo "<tr><td $center $cspn5>";

// ------------------------------------------------------------------------------
$font  = fontSizeColor(2, $txtcol8);
echo "<table cellspacing=8 $center $border=0><tr>";

echo "<td $bgcolor8><a href=\"../forum/forum_start.php\">". $font . $lang_goback . "</a></td>";
echo "<td $bgcolor9><a href=\"../forum/forum_neuer_beitrag.php?forumid=$forumid\">" . $font . $lang_postnewone . "</a></td>";

echo "</tr></table>";
// ------------------------------------------------------------------------------

echo "</td></tr>";


$font = fontSizeColor(3, $txtcol18); echo $font;
$font2 = fontSizeColor(2, $txtcol18); echo $font;
echo "<td $center>$font $lang_thispost</td>";
echo "<td $center>$font $lang_thisuser</td>";
echo "<td $center>$font2 $lang_theclicks</td>";
echo "<td $center>$font2 $lang_theanswers</td>";
echo "<td $center>$font $lang_lastposting</td>";
echo "</tr>";



$spruch  = "SELECT forum.id AS fid, titel, beitrag_id, time2, klicks, user.name AS deruser FROM forum";
$spruch .= " INNER JOIN user ON forum.user_id = user.id";
$spruch .= " WHERE forum_id = $forumid";
$spruch .= " AND reply_nr = 0";
$spruch .= " ORDER BY time2 DESC";
$result = mysql_query($spruch, $db) or die("<b>Titel</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $fid = $row['fid'];
    $der_user = $row['deruser'];
    $beitragid = $row['beitrag_id'];
    $titel = $row['titel'];
    $klicks = $row['klicks'];
    
$font  = fontSizeColor(2, $txtcol8); echo $font;
$font2 = fontSizeColor(2, $txtcol9); echo $font;
$font3 = fontSizeColor(1, $txtcol7); echo $font;

echo "<tr>";
echo "<td $left> &nbsp;<a href=\"../forum/forum_beitrag.php?forumid=$forumid&beitragid=$beitragid&reply=0#$reply\">$font";
echo $titel . "</a>&nbsp;</td>";

echo "<td $center>&nbsp;" . $font2 . "$der_user &nbsp;</td>";

echo "<td $center>" . $font3 . "$klicks</td>";
$blupp = AnzahlReplys($beitragid);
echo "<td $center>$font3 $blupp</td>";  
echo "<td $center $top>";
$blupp = LastReply($beitragid);
echo "</td>";
echo "</tr>";
    }

echo "</table>";

echo "<br>";
// ------------------------------------------------------------------------------
$font  = fontSizeColor(2, $txtcol8);
echo "<table cellspacing=8 $center $border=0><tr>";

echo "<td $bgcolor8><a href=\"../forum/forum_start.php\">". $font . $lang_goback . "</a></td>";
echo "<td $bgcolor9><a href=\"../forum/forum_neuer_beitrag.php?forumid=$forumid\">" . $font . $lang_postnewone . "</a></td>";

echo "</tr></table>";
// ------------------------------------------------------------------------------
	

include ('../user/user_footer.html');
?>