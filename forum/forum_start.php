<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');
/**/        $logpage = basename(__FILE__);          // ##


$uid = $_SESSION['uid'];

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





echo "";

$font = fontSizeColor(6, "#cc9900");
echo "<p $center>$font $lang_thetitel<br><hr width=\"60%\">";

$font = fontSizeColor(3, $txtcol8); echo $font;





$font = fontSizeColor(2, $txtcol9); echo $font;
echo "<table $center cellspacing=8 border=1 $bgcolor=8><tr>";

echo "<th $center>$font $lang_boards</td>";
echo "<th $center>$font $lang_topic</td>";
echo "<th $center>$font $lang_postings</td>";
echo "<th $center>$font $lang_lastposting</td>";
echo "</tr>";



$font  = fontSizeColor(3, $txtcol8); echo $font;
$font2 = fontSizeColor(1, $txtcol7); echo $font;

echo "<tr>";
echo "<td $top $left><a href=\"../forum/forum_forum.php?forumid=0\">$font";
echo "$lang_mainboard</a><br>$font2";
echo "$lang_mainboardtxt</td>";
$themen = Themen(0);
echo "<td $center>$font2 $themen</td>";   
$themen = Beitraege(0);
echo "<td $center>$font2 $themen</td>";  
echo "<td $center $top>";
$blupp = LastPost(0);
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td $top $left><a href=\"../forum/forum_forum.php?forumid=9999\">$font";
echo "$lang_storyboard</a><br>$font2";
echo " $lang_storyboardtxt</td>";
$themen = Themen(9999);
echo "<td $center>$font2 $themen</td>";   
$themen = Beitraege(9999);
echo "<td $center>$font2 $themen</td>";  
echo "<td $center $top>";
$blupp = LastPost(9999);
echo "</td>";
echo "</tr>";


echo "<tr><td $cspn4>&nbsp;</td></tr>";

$spruch  = "SELECT id, name FROM tippspiel";
$spruch .= " ORDER BY name ASC";
$result = mysql_query($spruch, $db) or die("<b>HierOben</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $runden_id = $row['id'];
    $runden_name = $row['name'];
    
    
    $font  = fontSizeColor(3, $txtcol9); echo $font;
    $font2 = fontSizeColor(1, $txtcol7); echo $font;
    $font3 = fontSizeColor(1, $txtcol8); echo $font;
    echo "<tr>";
    echo "<td $top $left><a href=\"../forum/forum_forum.php?forumid=$runden_id\">$font" . $lang_the . " ";
    echo $runden_name . "-Board</a>$font2<br>";
   
    echo "$lang_groupboard1 $font3" . $runden_name . $lang_groupboard2 . $font2 . " " . $lang_groupboard3;
    echo "</td>";
    $themen = Themen($runden_id);
    echo "<td $center>$font2 $themen</td>";
    
    $themen = Beitraege($runden_id);
    echo "<td $center>$font2 $themen</td>";
    
    echo "<td $center>";
    $blupp = LastPost($runden_id);
    echo "</td>";
    echo "</tr>";
    }

$font  = fontSizeColor(3, $txtcol8); echo $font;
$font2 = fontSizeColor(1, $txtcol7); echo $font;

echo "<tr><td $cspn4>&nbsp;</td></tr>";

echo "<tr>";
echo "<td $top $left><a href=\"../forum/forum_forum.php?forumid=9998\">$font";
echo "$lang_cafeboard</a><br>$font2";
echo "$lang_cafeboardtxt</td>";
$themen = Themen(9998);
echo "<td $center>$font2 $themen</td>";   
$themen = Beitraege(9998);
echo "<td $center>$font2 $themen</td>";  
echo "<td $center $top>";
$blupp = LastPost(9998);
echo "</td>";
echo "</tr>";    

	
echo "</table>";
	
	
	
	

include ('../user/user_footer.html');
?>