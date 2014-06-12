<?php

	// ###***+++ Der Standard-Admin-Kopf +++***###


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');
include ('admin_header.php');

/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


	// ####****++++-------------------++++****####

$geklappt=0;
$font  = fontSizeColor(4, $txtcol9);


$newflag = $_POST['newflag'];
$oldflag = $_POST['oldflag'];



if ($newflag != '')
    {
    //echo $newflag . $oldflag;
    if ($newflag != $oldflag)
        {
        
        $sprich = "UPDATE config SET forum_flag = $newflag";
        $resilt = mysql_query($sprich, $db) or die("<b>SET ForumFlag</b> failed : " . mysql_error() . "<br><br>" . $sprich);

        $font  = fontSizeColor(1, $txtcol6); echo $font;
        if ($newflag == 0) echo "$font " . $lang_forumnowoffline . "<br>";
        $font  = fontSizeColor(1, $txtcol8); echo $font;
        if ($newflag == 1) echo "$font " . $lang_forumnowonline . "<br>";  
        $geklappt++;
        
        }
    }






$flag = ForumFlag();



$font  = fontSizeColor(5, $txtcol9);
echo "<FORM METHOD=\"post\" NAME=\"antworten\" ACTION=\"admin_forum.php\">";
echo "<table cellspacing=10 $center border=0>";
echo "<tr><td $center $cspn2>$font " . $lang_forumsettings . "</td></tr>";
echo "<tr><td $center $top><br><br>";
           $font  = fontSizeColor(2, $txtcol9);
           $font2  = fontSizeColor(3, $txtcol8);
        echo "<table cellspacing=8 border=0 $center>";
        echo "<tr>";
        echo "<td $bgcolor36>$font2 $lang_forumstatus </td>";
        echo "<td $bgcolor37 $center><input type=\"radio\" name=\"newflag\" value=\"1\"";
        if ($flag == 1) echo " checked=\"checked\"";
        echo ">$font $lang_online $dreispace";
        echo "<input type=\"radio\" name=\"newflag\" value=\"0\"";
        if ($flag == 0) echo " checked=\"checked\"";
        echo ">$font " . $lang_offline;
        echo "</td><td $left>";
        $font  = fontSizeColor(2, $txtcol19);
        echo "$dreispace <a href='../admin/admin_newsmiley.php'>" . $font . $lang_addsmileys . "</a>";
        echo "<br>$dreispace <a href=\"../forum/smile_edit.php\">" .$font . $lang_editsmileys . "</a>$dreispace";
       echo "<br>$dreispace <a href='../forum/show_smileys.php' target='_new'>" . $font . $lang_showallsmileys . "</a>";
        
        
        echo "</td></tr>";
        	echo "<INPUT TYPE=\"hidden\" NAME=\"oldflag\" VALUE=\"$flag\">";
        echo "<tr><td $cspn2 $center><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonchange . "'></td></tr>";
        echo "</table>";
echo "</td></tr>";


echo "</table></form>";


include ('../user/user_footer.html');
?>



