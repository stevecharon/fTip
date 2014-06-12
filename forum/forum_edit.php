<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');

/**/        $logpage = basename(__FILE__);          // ##

$uid = $_SESSION['uid'];

$fid = $_GET['fid'];
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





if ($notthefirst)
{
    $fid            = $_POST['fid'];
    $forumid        = $_POST['forumid'];
    $klicks         = $_POST['klicks'];
    $beitragid      = $_POST['beitragid'];
    $reply          = $_POST['reply'];
    $oldtext        = $_POST['oldtext'];
    $newtext        = $_POST['newtext'];
    $oldtitel      = $_POST['oldtitel'];
    $newtitel      = $_POST['newtitel'];
    
    
$sprich  = "UPDATE forum";
$sprich .= " SET titel = '$newtitel', text = '$newtext' WHERE id = $fid";
$resilt = mysql_query($sprich, $db) or die("<b>SaveEdit</b> failed : " . mysql_error() . "<br><br>" . $spruch);


echo "<br><br>";
echo "<p $center>";
echo "<img src=\"../img/okay.jpg\"><br><br>";
$font  = fontSizeColor(3, $txtcol8);
$font2  = fontSizeColor(2, $txtcol6);
echo "$font $lang_changessaved<br>";
echo "<a href=\"../forum/forum_beitrag.php?forumid=$forumid&beitragid=$beitragid&reply=$reply\">" . $font2 . $lang_showmypost . "</a>";
echo "<br><br>";
echo "<br><br>";
include ('../user/user_footer.html');
exit;




}
// ###########################




$spruch  = "SELECT titel, reply_nr, forum_id, text, klicks, time, user_id, beitrag_id,";
$spruch .= " user.name AS der_name FROM forum";
$spruch .= " INNER JOIN user ON forum.user_id = user.id";
$spruch .= " WHERE forum.id = $fid";


$result = mysql_query($spruch, $db) or die("<b>BeitragHolen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
  
    $titel = $row['titel'];
    $text = $row['text'];
    $forumid = $row['forum_id'];
    $beitragid = $row['beitrag_id'];
    $reply = $row['reply_nr'];
    $der_user_id = $row['user_id'];
    $der_user = $row['der_name'];
    $dbzeit = $row['time']; $zurzeit = DatePrint($dbzeit);
    $klicks = $row['klicks'];
$rundenname = ForumName($forumid);

// ------------------------------------------------------------------------------
$font  = fontSizeColor(2, $txtcol8);



// Owner Abfrage:  Darfst Du ueberhaupt editieren ?!
$tuersteher = 0;
if ($uid == 1) $tuersteher = 1;
if ($der_user_id == $uid) $tuersteher = 1;


if ($tuersteher == 1)
{

$font = fontSizeColor(6, "#cc9900");
echo "<p $center>$font $lang_thetitel<br><hr width=\"60%\">";



echo "<FORM METHOD=\"post\" NAME=\"antworten\" ACTION=\"forum_edit.php\">";
    
echo "<table border=0 $center>";



echo "<tr><td>";
echo "<input NAME=\"newtitel\" maxlength=45 VALUE=\"$titel\">";
echo "</td>";
echo "<td>";
     $font  = fontSizeColor(3, $txtcol9);
echo "$font $lang_editposting";
echo "</td>";


echo "<td rowspan=2 $top $center>";
    echo "<br>";  
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
echo "</td></tr>";

    echo "<tr><td $cspn2>";
       echo "<textarea name=\"newtext\" cols=\"80\" rows=\"15\">$text</textarea>";
       
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$forumid\" NAME=\"forumid\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$beitragid\" NAME=\"beitragid\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$reply\" NAME=\"reply\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$titel\" NAME=\"oldtitel\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"notthefirst\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$text\" NAME=\"oldtext\">";
       echo "<INPUT TYPE=\"hidden\" VALUE=\"$fid\" NAME=\"fid\">";
        echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonsaveit . "'>";

    echo "</td></tr>";
echo "</table>";
echo "</form>";

}else{
    $font  = fontSizeColor(5, $txtcol6); echo $font;
       echo "$lang_onlyyourown";
}


include ('../user/user_footer.html');


?>