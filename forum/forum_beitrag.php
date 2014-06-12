<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');

/**/        $logpage = basename(__FILE__);          // ##



$uid = $_SESSION['uid'];

$reply      = $_GET['reply'];
$forumid    = $_GET['forumid'];
$beitragid  = $_GET['beitragid'];
$notthefirst  = $_POST['notthefirst'];

#echo $forumid; exit;
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


$font = fontSizeColor(6, "#cc9900");
echo "<p $center>$font $lang_thetitel<br><hr width=\"60%\">";

// ------------------------------------------------------------------------------
$font  = fontSizeColor(5, $txtcol17);
if ($forumid == '') {
    #echo PPPUUPZ;
    $forumid = $_POST['forumid'];
}
#echo $forumid;
$rundenname = ForumName($forumid);



$font  = fontSizeColor(5, $txtcol17);
$font2  = fontSizeColor(3, $txtcol18);
echo "<table cellspacing=8 $center $border=0><tr>";
echo "<td $cspn2 $center>$font $lang_the $rundenname $lang_board</td></tr>";

echo "</td></tr><tr>";
$font  = fontSizeColor(2, $txtcol8);
echo "<td $bgcolor8><a href=\"../forum/forum_start.php\">". $font . $lang_goback . "</a></td>";
echo "<td $bgcolor8><a href=\"../forum/forum_forum.php?forumid=$forumid\">". $font . $rundenname . "-" . $lang_board . "</a></td>";

echo "</tr></table>";
// ------------------------------------------------------------------------------



if ($notthefirst)
    {
    
    $forumid        = $_POST['forumid'];
    $klicks         = $_POST['klicks'];
    $beitragid      = $_POST['beitragid'];
    $reply          = $_POST['reply'];
    $new_txt        = $_POST['new_txt'];
    $new_titel      = $_POST['new_titel'];
    
    
    $reply++;
    $font  = fontSizeColor(2, $txtcol8);
    echo "$font<br>";
    echo "$lang_threadcreated";
    $logpage .= "[POST]";
    $spruch  = "SELECT klicks from forum";
    $spruch .= " WHERE beitrag_id = $beitragid";
    $spruch .= " AND reply_nr = 0";
    $result = mysql_query($spruch, $db) or die("<b>BeitragHolen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $klicks = $row['klicks'];
    
    $sprich  = "INSERT INTO forum (forum_id, beitrag_id, titel, text, user_id, reply_nr, klicks)";
    $sprich .= " VALUES ('$forumid', '$beitragid', '$new_titel', '$new_txt', '$uid', '$reply', '$klicks')";
    
    $resilt = mysql_query($sprich, $db) or die("Antworten failed : " . mysql_error());
    
    $spruch  = "SELECT id, timestamp FROM forum";
    $spruch .= " WHERE beitrag_id = $beitragid";
    $spruch .= " AND reply_nr = $reply";
    $result = mysql_query($spruch, $db) or die("<b>BeitragHolen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $bla = $row['timestamp'];
    $blu = $row['id'];
    
    $sprich = "UPDATE forum SET time = '$bla' WHERE id = $blu";
     $resilt = mysql_query($sprich, $db) or die("Antworten2 failed : " . mysql_error());
   
     $sprich = "UPDATE forum SET time2 = '$bla' WHERE beitrag_id = '$beitragid'";
     $resilt = mysql_query($sprich, $db) or die("Antworten3 failed : " . mysql_error());
   
   
   }




// +-+-+-+-+-+-+- Daten vorbereiten +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
$spruch  = "SELECT forum.id as fid, titel, reply_nr, forum_id, text, klicks, time, user_id, user.name AS der_name, user.genesis FROM forum";
$spruch .= " INNER JOIN user ON forum.user_id = user.id";
$spruch .= " WHERE beitrag_id = $beitragid";
if ($reply == 0) 
    {
    $spruch .= " AND reply_nr >= $reply ORDER BY reply_nr ASC";
    }else{
    $spruch .= " AND reply_nr <= $reply ORDER BY reply_nr ASC";
    }

echo "<table $center cellspacing=8 $bgcolor38>";
$result = mysql_query($spruch, $db) or die("<b>BeitragHolen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $oldklicks = $klicks;
    $antwort = $row['reply_nr'];
    $bla = $row['fid'];
    $titel = $row['titel'];
    $text = $row['text'];
    $forumid = $row['forum_id'];
    $owner_id = $row['user_id'];
    $der_user = $row['der_name'];
    $dbzeit = $row['time']; $zurzeit = DatePrint($dbzeit);
    $klicks = $row['klicks'];
    $usergen = $row['genesis'];
    
    
$rundenname = ForumName($forumid);
    
    
    $opus = UserOpus($owner_id);
    echo "<a name=\"" . $reply . "\"> </a>";
    echo "<tr>";
    // -------- linke seite BEITRAG  ----------------
    echo "<td $bgcolor7 rowspan=2 $center>";
    $picture = UserPic($owner_id);
    echo $picture . "<br>";

    $font  = fontSizeColor(3, $txtcol19); echo $font;
    echo "$der_user<br>";
    $font  = fontSizeColor(1, $txtcol19); echo $font;
    echo "$zurzeit<br>";
    $font  = fontSizeColor(1, $txtcol18); echo $font;
    if ($antwort == 0) 
        {
        echo $lang_initialpost . "<br>";
        } else {
    echo $lang_answernum . ": " . $antwort . "<br>";
        }
    
    echo $lang_totalclicks . " : " . $klicks;
    echo "<br>$lang_numofposts : " . $opus; 
    $font  = fontSizeColor(1, $txtcol18); echo $font;

    echo "<br>" . $lang_reggedsince . ": " . $usergen;
    echo "</td>";
    
    // -------- rechte seite BEITRAG  ----------------
    
    
    $font  = fontSizeColor(3, $txtcol18); echo $font;
    echo "<td width=550 $bgcolor37$ center >$font $titel &nbsp;</td>";
    echo "<td $bgcolor36 $center $top>";
    
    // Admin-Check
    if ($uid == 1)
        {
        echo "<a href=\"../forum/forum_edit.php?fid=$bla\">";
        echo "<img src=\"../img/uebersicht.gif\" alt='" . $lang_editposting . "' title='" . $lang_editposting . "'></a><br>";
        echo "<a href=\"../forum/forum_kill_thread.php?fid=$bla\">";
        echo "<img src=\"../img/achtung.gif\" alt='" . $lang_killposting . "' title='" . $lang_killposting . "'></a>";
        echo "<a href=\"../forum/forum_move_thread.php?fid=$bla\">";
        echo "<img src=\"../img/verschieben.gif\" alt='" . $lang_moveposting . "' title='" . $lang_moveposting . "'></a>";
        
        }else{
    
    // --- Besitzer User abfrage (Editieren) ----------------
        if ($owner_id == $uid)
            {
            echo "<a href=\"../forum/forum_edit.php?fid=$bla\">";
            echo "<img src=\"../img/uebersicht.gif\" alt='" . $lang_editposting . "' title='" . $lang_editposting . "'></a>";
            }
        }

    echo "</td></tr>";
    $font  = fontSizeColor(2, $txtcol18); echo $font;
    $newtext = SmileReplace($text);
    echo "<tr><td $top $left $cspn2 $bgcolor35>$font $newtext</td></tr>";
    echo "<tr><td $center $cspn3><hr></td></tr>"; 
// +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
    }
    
   
 
echo "<tr><td $center $cspn2>";

 echo "<table $center border=0>";

    echo "<tr><td $top>";

       
       // Antwort##############
       echo "<FORM METHOD=\"post\" NAME=\"antworten\" ACTION=\"forum_beitrag.php\">";
    
        echo "<table $center border=0>";
        $font  = fontSizeColor(3, $txtcol9);
        echo "<tr><td $center>$font $lang_writeanswer</td></tr>";
    
        $font  = fontSizeColor(2, $txtcol18);
        echo "<tr><td $left>$font";
        echo $lang_answertitle . ": ";
        echo "<input NAME=\"new_titel\" maxlength=45 VALUE=\"$titel\">";
        echo "</td></tr>";
   
       echo "<tr><td $center>";
       echo "<textarea name=\"new_txt\" cols=\"80\" rows=\"15\"></textarea>";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$antwort\" NAME=\"reply\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"notthefirst\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$beitragid\" NAME=\"beitragid\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$oldklicks\" NAME=\"klicks\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$forumid\" NAME=\"forumid\">";
        echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_answerbutton . "'>";
        echo "</td></tr>";
    
        echo "</table>";
        echo "</form>";
    
  
    echo "</td><td $center $top>";
    
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
        echo "<a href=\"../forum/show_smileys.php\" target=\"_new\">" .$font . $lang_showallsmile . "</a>";
        echo "</td></tr>";
        echo "</table>";
  // ----------------------------------------------
  
  
  
    echo "</td></tr></table>";  
  
echo "</td></tr>";
echo "</table>";






// ------------------------------------------------------------------------------
$font  = fontSizeColor(2, $txtcol8);
echo "<table cellspacing=8 $center $border=0><tr>";
echo "<td $bgcolor8><a href=\"../forum/forum_start.php\">". $font . $lang_goback . "</a></td>";
echo "<td $bgcolor8><a href=\"../forum/forum_forum.php?forumid=$forumid\">". $font . $rundenname . "-" . $lang_board . "</a></td>";

echo "</tr></table>";
// ------------------------------------------------------------------------------




$newklicks = $klicks;
$newklicks++;
$sprich = "UPDATE forum set klicks = '$newklicks' WHERE beitrag_id = $beitragid";
$resilt = mysql_query($sprich, $db);

include ('../user/user_footer.html');

?>
