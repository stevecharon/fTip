<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');
/**/        $logpage = basename(__FILE__);          // ##
$uid = $_SESSION['uid'];


$forumid    = $_GET['forumid'];

$notthefirst  = $_POST['notthefirst'];


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
// $forumid wurde uebergeben.

if ($forumid == '') {
    $forumid = $_POST['forumid'];
}

$rundenname = ForumName($forumid);



$font = fontSizeColor(6, "#cc9900");
echo "<p $center>$font $lang_thetitel<br><hr width=\"60%\">";



if ($notthefirst)
    {
    
    $forumid        = $_POST['forumid'];
    $klicks         = $_POST['klicks'];
    #$beitragid      = $_POST['beitragid'];
    $reply          = $_POST['reply'];
    $new_txt        = $_POST['new_txt'];
    $new_titel      = $_POST['new_titel'];
    
    $font = fontSizeColor(2, $txtcol7); echo $font;
    $bla = LastBeitragNr(); $bla++;
    $beitragid = $bla;
    
    // echo "$forumid $beitragid $new_titel $new_txt $uid";
    
    $sprich  = "INSERT INTO forum (forum_id, beitrag_id, titel, text, user_id, reply_nr, klicks)";
    $sprich .= " VALUES ('$forumid', '$beitragid', '$new_titel', '$new_txt', '$uid', '0', '0')";
    $resilt = mysql_query($sprich, $db) or die("Antworten failed : " . mysql_error());
    
    $spruch  = "SELECT id, timestamp FROM forum";
    $spruch .= " WHERE beitrag_id = $beitragid";
    $spruch .= " AND reply_nr = 0";
    $result = mysql_query($spruch, $db) or die("<b>BeitragHolen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $bla = $row['timestamp'];
    $blu = $row['id'];
    
    $sprich = "UPDATE forum SET time = '$bla', time2 = '$bla' WHERE id = $blu";
     $resilt = mysql_query($sprich, $db) or die("Antworten failed : " . mysql_error());
     
    
    echo "<br><p $center><img src=\"../img/okay.jpg\"><br><br>";
    
    echo "$lang_created";
     $font = fontSizeColor(1, $txtcol7); echo $font;
    echo "<br><a href=\"forum_beitrag.php?forumid=$forumid&beitragid=$beitragid&reply=0\">" . $font;
    echo $lang_havealook . "</a><br><br<br><br></p>";
    exit;
    }



echo "<table border=0 $center><tr>";

echo "<td $top $center>";


$font = fontSizeColor(4, $txtcol17); echo $font;
$font2 = fontSizeColor(4, $txtcol9);
echo "<table $center border=1>";
echo "<tr><th $center>$font $lang_createnew $font2";
echo $rundenname . "$font $lang_board</td></tr>";
    echo "<FORM METHOD=\"post\" NAME=\"antworten\" ACTION=\"forum_neuer_beitrag.php\">";
    
   $font  = fontSizeColor(2, $txtcol18);
    echo "<tr><td $left>$font";
    echo $lang_threadtitle . ": ";
    echo "<input NAME=\"new_titel\" maxlength=45 VALUE=\"$titel\">";
    echo "</td></tr>";
   
       echo "<tr><td $center>";
    echo "<textarea name=\"new_txt\" cols=\"75\" rows=\"15\"></textarea>";
    echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"notthefirst\">";
      echo "<INPUT TYPE=\"hidden\" VALUE=\"$forumid\" NAME=\"forumid\">";
    echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_buttoncreate . "'>";
    echo "</td></tr>"; 
    
    
 
echo "</table></form>";

echo "</td><td $top $center>";

  echo "<br><br>";  
  // ------------------ smileys ------------------
    $smdumm = array();
    $smdumm[] = 1;   //   :)
    $smdumm[] = 2;   //   ;)
    $smdumm[] = 3;   //   :D
    
    $smdumm[] = 4;   //  :(
    $smdumm[] = 5;   //   :nein:
    $smdumm[] = 6;   //   :ja:
    
    $smdumm[] = 7;   //   :insane:
    $smdumm[] = 8;   //   :ka:
    $smdumm[] = 9;   //   :uphihi:
    
    $smdumm[] = 10;   //   :gelb:
    $smdumm[] = 11;   //   :champ:
    $smdumm[] = 12;   //   :rot:

        $blupp = 0;
     $font  = fontSizeColor(1, $txtcol7);
        echo "<table $center border=0>";
        
        echo "<th $cspn3 $center>$font $lang_addsmileys</th>";
        echo "<tr>";
           $font  = fontSizeColor(1, $txtcol4);
        foreach ($smdumm AS $dummy)
            {
            $spruch  = "SELECT file, tag FROM forum_smiley";
            $spruch .= " WHERE id = $dummy";
            $result = mysql_query($spruch, $db) or die("<b>SmileyReplace</b> failed : " . mysql_error() . "<br><br>" . $spruch);
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            
            $dasgif = $row['file'];
            $dertag = $row['tag'];
            
            
            $image = "<img src=\"../img/smile/" . $dasgif . "\">";    

            echo "<th $center bgcolor=0 >$font &nbsp; $image <br>&nbsp;" . $dertag . "&nbsp;</th>";
            $blupp++;
            if ($blupp == 3)
                {
                echo "</tr><tr>";
                $blupp = 0;
                }
            
            }
        echo "</tr>";
        
        echo "<tr><td $center $cspn3>";
        $font  = fontSizeColor(1, $txtcol8);
        echo "<a href=\"../forum/show_smileys.php\" target=\"_new\">" .$font . "$lang_showallsmile</a>";
        echo "</td></tr>";
        echo "</table>";
  // ----------------------------------------------
  


echo "</td></tr></table>";
include ('../user/user_footer.html');
?>