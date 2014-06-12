<?php


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../user/user_header.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


$geklappt = 0;
$betrug = 0;

//--------------- GLOBALS = OFF -------------
$newpic = $_GET['newpic'];
$pic_change = $_GET['pic_change'];
$oldpwd = $_POST['oldpwd'];
$newpwd = $_POST['newpwd'];
$newpwd2 = $_POST['newpwd2'];
$newemail = $_POST['newemail'];
$new_reminder = $_POST['new_reminder'];
$newlanguage = $_POST['newlanguage'];
$pwd2 = $_POST['pwd2'];
$oldreminder = $_POST['oldreminder'];
$oldemail = $_POST['oldemail'];
$notthefirst = $_POST['notthefirst'];
//-------------------------------------------
    
if ($newpic)
    {
    $sprich = "UPDATE user SET pic = $newpic WHERE id = $uid";
    $resilt = mysql_query($sprich, $db);
    
    echo "<table $center border=0>";
    echo "<td><img src=\"../img/okay.jpg\"></td>";
    $font  = fontSizeColor(3, $txtcol19);
    $font2 = fontSizeColor(1, $txtcol20);
    echo "<td $center>$font $lang_changepic1<br>$font2";
    echo "$lang_changepic2";
    echo "<a href=\"../user/user_daten.php\">$lang_changepic3</a> $lang_changepic4</td>";
    
    $spruch = "SELECT file FROM user_pic WHERE id = $newpic";
    $result = mysql_query( $spruch, $db ) or die("GetNewPictures failed: " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $newpic_file = $row['file'];
    
    echo "<td><img src=\"../img/userpics/";
    echo $newpic_file . "\" height=\"49\" width=\"86\"  border=\"0\" ></td></tr>";
    
    echo "</table>";
    	include ("../user/user_footer.html"); 
    	$newpic = '';
    	exit;
    }


if ($pic_change == 1)
    {
    echo "<table cellspacing=10 $center border=0>";
$font = fontSizeColor(3, $txtcol19);
echo "<tr><td $center $cspn5>$font $lang_selectpic</td></tr>";
    echo "<tr>";
    $asi = 0;
    $spruch  = "SELECT id, file FROM user_pic WHERE file  NOT LIKE '00admin%'";
    
$spruch .= " ORDER BY file";
    $result = mysql_query( $spruch, $db ) or die("AllePictures failed: " . mysql_error() . "<br><br>" . $spruch);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
      {
     $bild_id = $row['id'];
     $bild_file = $row['file'];
     //if ($bild_file )
     echo "<td><a href=\"../user/user_daten.php?newpic=$bild_id\">";
     echo "<img src=\"../img/userpics/";
     echo $bild_file . "\" height=\"49\" width=\"86\"  border=\"0\" ></a></td>";
     $asi++;
     if ($asi == 5) 
        {
        echo "</tr><tr>";
        $asi = 0;
        }
     }
    echo "</tr>";
    echo "</table>"; 
    $pic_change = 0;
    	
	include ("../user/user_footer.html");
    exit;
    }



if ($notthefirst)
{
echo "<table $center border=0 cellspacing=2 cellpadding=0><tr><td $center>";


    if ($newemail && ($newemail != $oldemail))
        {
        $sprich = "UPDATE user SET email = '$newemail' WHERE id = $uid";
	    $resilt = mysql_query($sprich, $db);
	    echo "$font neue E-Mail-Adresse : " . $newemail . "<br>";
	    $geklappt++;
        } 
    
    
    
    if ($new_reminder != $oldreminder)
        {       
        $sprich = "UPDATE user SET remind_flag = '$new_reminder' WHERE id = $uid";
    	$resilt = mysql_query($sprich, $db);
        if ($new_reminder == 0)echo "$font $lang_remindoff<br>";
        if ($new_reminder == 1)echo "$font $lang_remindon<br>";  
        $geklappt++;
        }

    
    if  ($newpwd != '') {
        
        $md5pwd = md5($newpwd);
        $oldmd5pwd = md5($oldpwd);
        
        if (($oldmd5pwd == $pwd2) && ($newpwd == $newpwd2))
            {
            
            $sprich = "UPDATE user SET pwd = '$md5pwd' WHERE id = $uid";
	        $resilt = mysql_query($sprich, $db);
	        echo "$font $lang_pwdchanged";
            $geklappt++;

            }
        
        }
    
    if ($newpwd != $newpwd2) 
        { 
        $betrug++;  
        echo "$lang_pwdnotchanged<br>";
        }
        
    if (($newpwd != '') &&  ($oldmd5pwd != $pwd2) ) $betrug++;     
    
if ( ($geklappt > 0) && ($betrug == 0) ) include ('../script/MSGhatgeklappt.html');
if ( $betrug > 0 ) include ('../script/MSGerror.html');
echo "</td></tr></table>";

}


if ($newlanguage)
    {
    #echo $newlanguage;

    $spruch  = "SELECT id, suffix FROM language WHERE language = '$newlanguage'";
    $result = mysql_query( $spruch, $db ) or die("NewLanguage bug: " . mysql_error() . " - " . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $langid = $row['id'];
    $newsuffix = $row['suffix'];
    $spruch  = "SELECT language FROM user WHERE id = $uid";
    $result = mysql_query( $spruch, $db ) or die("NewUserLanguage bug: " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $olduserlang = $row['language'];
    #echo $olduserlang . " - " . $langid;
    if ($olduserlang != $langid) {
        
        $sprich = "UPDATE user SET language = $langid WHERE id = $uid";
        $resilt = mysql_query($sprich, $db);
        
        
        $thispage = basename(__FILE__);
        $thepage = ereg_replace( ".php", "." . $newsuffix , $thispage );
        include ("../languages/" . $newsuffix . "/" . $thepage);
        
        echo "$lang_changelang " . $newlanguage;
        
        #echo "$dreispace <a href=\"../user/user_daten.php\">$lang_changepic3</a>";
        #include ("../user/user_footer.html");
        #exit;
        }
    }
    
    


// -----------------------------------------------------------
$font2 = fontSizeColor(3, $txtcol8);
$font = fontSizeColor(2, $txtcol7);
$spruch  = "SELECT language.language AS userlang, email, pwd, remind_flag, pic FROM user ";
$spruch .= " INNER JOIN language ON user.language = language.id";
$spruch .= " WHERE user.id = $uid";
$result = mysql_query( $spruch, $db ) or die("Klappt nicht: " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$oldemail = $row['email'];
$oldpwd = $row['pwd'];
$reminder = $row['remind_flag'];
$oldpic = $row['pic'];
$userlang = $row['userlang'];

	echo "<FORM METHOD=\"post\" NAME=\"changepw\" ACTION=\"user_daten.php\">";


	echo "<br><table $center border=0 width=\"80%\">";
	echo "<tr><td width=\"100%\" $cspn2>";

	echo "<p $justify>$font2";
	echo "$lang_editdata";
	echo "<br><br>";	
	echo "</td></tr>";
	echo "</table>";

	echo "<TABLE cellspacing=\"8\" align=\"center\">";
	echo "<TR bgcolor=\"#8c82ff\"><TD>$font&nbsp;$lang_oldpwd &nbsp;</TD>";
	echo "<TD><INPUT TYPE=\"password\" NAME=\"oldpwd\" MAXLENGTH=\"20\"></TD>";
	echo "</TR>";
	echo "<TR bgcolor=\"#35adff\"><TD>$font&nbsp;$lang_newpwd&nbsp;</TD>";
	echo "<TD><INPUT TYPE=\"password\" NAME=\"newpwd\" MAXLENGTH=\"20\"></TD>";
	echo "</TR>";
	echo "<TR bgcolor=\"#35adff\"><TD>$font&nbsp;$lang_newpwdagain&nbsp;</TD>";
	echo "<TD><INPUT TYPE=\"password\" NAME=\"newpwd2\" MAXLENGTH=\"20\"></TD>";
	echo "</TR>";
	echo "<TR bgcolor=\"#33ccff\"><TD>$font&nbsp;$lang_email&nbsp;</TD>";
	echo "<TD><INPUT TYPE=\"text\" NAME=\"newemail\" VALUE=\"$oldemail\"></TD>";
	echo "</TR>";
	
	    echo "<td $right>$font $lang_remindmail</td>";
    echo "<td $center><input type=\"radio\" name=\"new_reminder\" value=\"1\"";
    if ($reminder == 1) echo " checked=\"checked\"";
    echo ">$font $lang_remindyes $dreispace";
    echo "<input type=\"radio\" name=\"new_reminder\" value=\"0\"";
    if ($reminder == 0) echo " checked=\"checked\"";
    echo ">$font $lang_remindno";
    echo "</td></tr>";
	
	
	//===================set language================================

	echo "<tr>";
	echo "<td $right>$font&nbsp;$lang_language </td>";
	
	echo "<td>";
	echo "<select name='newlanguage' size='1'>";
	    echo "<option>$userlang</option>";
	    
	    $spruch  = "SELECT * FROM language ORDER BY language";
	    $result = mysql_query( $spruch, $db ) or die("Klappt nicht: " . mysql_error());
        WHILE ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
	        $dblang = $row['language'];
        
       
	        echo "<option>$dblang</option>";
	        }
	    echo "</select>";
	echo "</td>";
	echo "</tr>";
	
	//===============================================================
	
	
	echo "<TR><TD COLSPAN=\"2\" align=\"right\"><INPUT TYPE=\"submit\" VALUE=\"OK\" STYLE=\"width: 50px;\"></TD></TR>";

	echo "</TABLE>";
	echo "<INPUT TYPE=\"hidden\" NAME=\"pwd2\" VALUE=\"$oldpwd\">";
	echo "<INPUT TYPE=\"hidden\" NAME=\"oldreminder\" VALUE=\"$reminder\">";
	echo "<INPUT TYPE=\"hidden\" NAME=\"oldemail\" VALUE=\"$oldemail\">";
	echo "<INPUT TYPE=\"hidden\" NAME=\"notthefirst\" VALUE=\"1\">";
	echo "</FORM>";
	





echo "<br><br>";

echo "<table border=0 cellspacing=8 $center>";

$blupp = UserPic($uid);
$font = fontSizeColor(3, $txtcol18);
    
echo "<tr><td><a href=\"../user/user_daten.php?pic_change=1\">";
echo "$blupp</a></td><td $center>$dreispace<a href=\"../user/user_daten.php?pic_change=1\">" . $font;
echo  "$lang_changeuserpic";
echo "</a>$dreispace</td></tr>";
echo "</table>";





	
	include ("user_footer.html");

?>





	
	