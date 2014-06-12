<?php


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##

echo "<table $center border=0 cellspacing=2 cellpadding=0><tr><td $center>";
$font = fontSizeColor(2, $txtcol7);
//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


//----------- GLOBALS = OFF -------------------------------------
$pic_change             = $_GET['pic_change'];
$newpic                 = $_GET['newpic'];
$flaggenchange          = $_GET['flaggenchange'];

$newlanguage            = $_POST['newlanguage'];
$newgloballanguage      = $_POST['newgloballanguage'];
$sendtestmail           = $_POST['sendtestmail'];
$dbbackup               = $_POST['dbbackup'];
$adminmail              = $_POST['adminmail'];
$oldmail                = $_POST['oldmail'];
$newpwd                 = $_POST['newpwd'];
$newpwd2                = $_POST['newpwd2'];
$new_newuser_txt        = $_POST['new_newuser_txt'];
$oldnewuser_txt         = $_POST['oldnewuser_txt'];
$new_reminduser_txt     = $_POST['new_reminduser_txt'];
$reminduser_txt         = $_POST['reminduser_txt'];
$new_www                = $_POST['new_www'];
$www                    = $_POST['www'];
$new_localfile          = $_POST['new_localfile'];
$localfile              = $_POST['localfile'];
$new_maild              = $_POST['new_maild'];
$maild                  = $_POST['maild'];
$new_remindflag         = $_POST['new_remindflag'];
$remindflag             = $_POST['remindflag'];
$new_jabber             = $_POST['new_jabber'];
$jabber                 = $_POST['jabber'];
$new_loggin             = $_POST['new_loggin'];
$logflag                = $_POST['logflag'];
$new_jabber_id          = $_POST['new_jabber_id'];
$jabber_id              = $_POST['jabber_id'];
$new_jabber_pwd         = $_POST['new_jabber_pwd'];
$jabber_pwd             = $_POST['jabber_pwd'];
$new_jabber_room        = $_POST['new_jabber_room'];
$jabber_room            = $_POST['jabber_room'];
$new_wmpunkte           = $_POST['new_wmpunkte'];
$old_wmpunkte           = $_POST['old_wmpunkte'];
$new_empunkte           = $_POST['new_empunkte'];
$old_empunkte           = $_POST['old_empunkte'];
$new_blpunkte           = $_POST['new_blpunkte'];
$old_blpunkte           = $_POST['old_blpunkte'];

//---------------------------------------------------------------


//************ Aktionen / Funktionen in die DB *********************************
if ($newlanguage)
    {
    #echo $newlanguage;

    $spruch  = "SELECT id, suffix FROM language WHERE language = '$newlanguage'";
    $result = mysql_query( $spruch, $db ) or die("NewLanguage bug: " . mysql_error() . " - " . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $langid = $row['id'];
    $newsuffix = $row['suffix'];
    
    
    $spruch  = "SELECT language FROM user WHERE id = 1";
    $result = mysql_query( $spruch, $db ) or die("NewUserLanguage bug: " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $oldadminlang = $row['language'];
    
    if ($oldadminlang != $langid) {
        
        $sprich = "UPDATE user SET language = $langid WHERE id = 1";
        $resilt = mysql_query($sprich, $db);
        
        
        $thispage = basename(__FILE__);
        $thepage = ereg_replace( ".php", "." . $newsuffix , $thispage );
        include ("../languages/" . $newsuffix . "/" . $thepage);
        
        echo "$lang_langchange " . $newlanguage;
        }
    }
    
   
if ($newgloballanguage)
    {
    #echo $newlanguage;

    $spruch  = "SELECT id FROM language WHERE language = '$newgloballanguage'";
    $result = mysql_query( $spruch, $db ) or die("NewGLanguage bug: " . mysql_error() . " - " . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $glangid = $row['id'];
    
    $spruch  = "SELECT language FROM config";
    $result = mysql_query( $spruch, $db ) or die("NewGlobalLanguage bug: " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $oldgloballang = $row['language'];
    
    if ($oldgloballang != $glangid) {
        
        $sprich = "UPDATE config SET language = $glangid ";
        $resilt = mysql_query($sprich, $db);
        
        echo "<br>$lang_globallangchange " . $newgloballanguage;
        }
    }
    
   


if ($newpic)
    {
    $sprich = "UPDATE user SET pic = $newpic WHERE id = 1";
    $resilt = mysql_query($sprich, $db);
    
    echo "<table $center border=0>";
    echo "<td><img src=\"../img/okay.jpg\"></td>";
    $font  = fontSizeColor(3, $txtcol19);
    $font2 = fontSizeColor(1, $txtcol20);
    echo "<td $center>$font $lang_adminpicchange1<br>$font2";
    echo $lang_adminpicchange2 . " ";
    echo "<a href=\"../admin/admin_daten.php\">" . $lang_adminpicchange3 ."</a> $lang_adminpicchange4</td>";
    
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
echo "<tr><td $center $cspn5>$font $lang_selectadminpic</td></tr>";
    echo "<tr>";
    $asi = 0;
    $spruch  = "SELECT id, file FROM user_pic WHERE file LIKE '00admin_%'";
    
$spruch .= " ORDER BY file";
    $result = mysql_query( $spruch, $db ) or die("AllePictures failed: " . mysql_error() . "<br><br>" . $spruch);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
      {
     $bild_id = $row['id'];
     $bild_file = $row['file'];
     //if ($bild_file )
     echo "<td><a href=\"../admin/admin_daten.php?newpic=$bild_id\">";
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


if ($sendtestmail){

#echo $oldmail; // hierhin VERsenden
#echo  $maild; // hirMIT versenden
$jetzt = date('Y-m-d__H:i');
#echo $jetzt;
$body = $lang_testmailbody  . " " . $jetzt;
$subject = $lang_testmailsubject . " " . $jetzt;
$daemon_adress = $row['maild'];
mail( $oldmail, $subject, $body, "From: fTip-Daemon<" . $maild . ">" );
 
echo $font . $lang_testmailtext1 . " <i>" . $maild . "</i>  " . $lang_testmailtext2 . " <i>" . $oldmail . "</i> " . $lang_testmailtext3 . "<br>";
}



if ($dbbackup) // == 'backup')
    {
    // ####################################################################################################################################################
    // ########################### DB - Dump #################################################################################################

    //$szad = SonderzeichenAdee() ;
    $font6 = fontSizeColor(2, $txtcol6); 
    $font7 = fontSizeColor(1, $txtcol17); 
    $font8 = fontSizeColor(2, $txtcol13); 
    $pfad = "../sql/";
    $download_url = "../sql/";
    $dateiname  = "fTip_db_";
    $dateiname .= date('Y-m-d-His');
    $parameter = "  --add-drop-table -h " . $dbhost . " -u " . $dbuser . "  --password=" . $dbpass . " " . $dbname . " > " . $pfad . $dateiname . ".sql";

    echo "$font8 $lang_mysqldumpstart";
    exec ("/usr/local/bin/mysqldump " . $parameter . "", $lines, $result);
    echo $font7 . "&nbsp;mysqldump " . $parameter . " ... ";



    $datei2 = $pfad . $dateiname . ".sql";
    $dateisize = filesize($datei2); $sqlsize = $dateisize;

    if ($dateisize == 0)
    {
    $logpage = "[DBbackup FAILED!!!]";
    echo "$font6<b>$lang_mysqldumpfailed</b><br>";
    }else{


    echo "$font8<b>$lang_mysqldumpdone</b><br>";


    echo "$lang_mysqldumpgzip ...";
    $zauberspruch = " -c " . $pfad . $dateiname . ".sql > " . $pfad . $dateiname . ".sql.gz";

    exec ("gzip " . $zauberspruch . "", $lines, $result);
    echo $font7 . "&nbsp;gzip " . $zauberspruch . " ... ";

    $datei2 = $pfad . $dateiname . ".sql.gz";
    $dateisize = filesize($datei2); $gzsize = $dateisize;
     if ($dateisize == 0)
       {
        $logpage = "[zipBackup FAILED!!!]";
        echo "<br>$font6<b>$lang_mysqlgzipfailed</b><br>";
    
        $download = $pfad . $dateiname . ".sql";
        echo "$font7 " . $lang_downloadnogzip1 . " <a href=\"" . $download . "\">" . $lang_downloadnogzip2 . "</a> $dreispace [$sqlsize Bytes].<br>";


        }else {

        echo "$font8<b>fertig !</b><br>";
        $logpage = "[Datenbank-BackUp]";
        exec ("rm " . $pfad . $dateiname . ".sql", $lines, $result);

        $download = $pfad . $dateiname . ".sql.gz";
        echo "$font7 " . $lang_downloaddump1 . " <a href=\"" . $download . "\">" . $lang_downloaddump2 ."</a>$dreispace [$gzsize Bytes].<br>";
        }
    }
echo "<br><br>";
// ######################################################################################################################################
// ####################################################################################################################################################
    }


// ########################################################################################
// #########################FLAGGENCHANGE####################################################

if ($flaggenchange == 1)    {
    include ('../script/SCRIPTflaggenchange.php');
// ----- wappen der verbände ----------
    $font = fontSizeColor(1, $txtcol18);
    echo "$font $lang_teamlogofeder<br>";
// -------------------------------------
}


if ($flaggenchange == 2)    {
    include ('../script/SCRIPTflaggenchange.php');
// ----- wappen der Länder ----------

    $font = fontSizeColor(1, $txtcol18);
    echo "$font $lang_teamlogonational<br>";
// -------------------------------------
}


// #######################################################################################
// #######################################################################################

if ($adminmail && ($adminmail != $oldmail))
    {

       $sprich = "UPDATE user SET email = '$adminmail' WHERE id = 1";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font " . $lang_adminmailchanged . " " . $adminmail . "<br>";
       
    }




if ($newpwd)
    {
    if ($newpwd == $newpwd2)
        {
        $md5pwd = md5($newpwd);
        $sprich = "UPDATE user SET pwd = '$md5pwd' WHERE id = 1";
	    $resilt = mysql_query($sprich, $db);
	    echo "$font $lang_adminpwdchanged";
        
        $spruch = "SELECT genesis FROM user WHERE id = 1";
        $result = mysql_query($spruch, $db) or die("<b>get wwwConfig</b> failed : " . mysql_error() . "<br><br>" . $sprich);
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        if ($row['genesis'] == '') {
        $newgenesis =  UserGenesis();
        
        $sprich = "UPDATE user SET genesis = '$newgenesis' WHERE id = 1";
	    $resilt = mysql_query($sprich, $db);
        
        }
        
        
        } else {
        // include ('../script/MSGerror.html');
        echo "$lang_adminpwdnotchang<br>";
        }
    }



if (($new_newuser_txt != $oldnewuser_txt))
    {
      //  echo $new_newuser_txt . "<br><br>";
       #         echo $oldnewuser_txt . "<br><br>";
       $sprich = "UPDATE config SET newuser_txt = '$new_newuser_txt'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newwelcometxt<br>";
    }


if ($new_reminduser_txt && ($new_reminduser_txt != $reminduser_txt))
    {
       $sprich = "UPDATE config SET reminduser_txt = '$new_reminduser_txt'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newremindtxt <br>";
    }


if ($new_www && ($new_www != $www))
    {
       $sprich = "UPDATE config SET www = '$new_www'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newurl " . $new_www  . "<br>";
    }


if ($new_localfile && ($new_localfile != $localfile))
    {
       $sprich = "UPDATE config SET localfile = '$new_localfile'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newlocalpath " . $new_localfile  . "<br>";
    }


if ($new_maild && ($new_maild != $maild))
    {
       $sprich = "UPDATE config SET maild = '$new_maild'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newdaemonmail " . $new_maild  . "<br>";
    }


if ($new_remindflag != $remindflag)
    {       
    $sprich = "UPDATE config SET reminduser_flag = '$new_remindflag'";
	$resilt = mysql_query($sprich, $db);
    if ($new_remindflag == 0)echo "$font $lang_remindoff<br>";
    if ($new_remindflag == 1)echo "$font $lang_remindon<br>";    
    }


if ($new_jabber != $jabber)
    {       
    $sprich = "UPDATE config SET jabber = '$new_jabber'";
	$resilt = mysql_query($sprich, $db);
    if ($new_jabber == 0)echo "$font $lang_jabberturnedoff<br>";
    if ($new_jabber == 1)echo "$font $lang_jabberturnedon<br>";    
    }


if ($new_loggin != $logflag)
    {       
    $sprich = "UPDATE config SET logflag = '$new_loggin'";
	$resilt = mysql_query($sprich, $db);
    if ($new_loggin == 0)echo "$font $lang_loggingoff<br>";
    if ($new_loggin == 1)echo "$font $lang_loggingon<br>";    
    }


if ($new_jabber_id && ($new_jabber_id != $jabber_id))
    {
       $sprich = "UPDATE config SET jabber_id = '$new_jabber_id'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newjabberaccount " . $new_jabber_id  . "<br>";
    }


if ($new_jabber_pwd && ($new_jabber_pwd != $jabber_pwd))
    {
        $md5jabber = md5($new_jabber_pwd);
       $sprich = "UPDATE config SET jabber_pwd = '$md5jabber'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font $lang_newjabberpwd<br>";
    }

if ($new_jabber_room && ($new_jabber_room != $jabber_room))
    {
       $sprich = "UPDATE config SET jabber_room = '$new_jabber_room'";
	   $resilt = mysql_query($sprich, $db);
	   echo "$font " . $lang_newjabbergroup  . " " . $new_jabber_room . "<br>";
    }




// ++++  Meisterpunkte ++++

if ($new_wmpunkte && ($new_wmpunkte != $old_wmpunkte))
    {
     $font9 = fontSizeColor(2, $txtcol8);echo $font9;
     echo $lang_newWMpoints . " " . $new_wmpunkte . " <br>";
    $sprich = "UPDATE config SET wm_meister_punkte = $new_wmpunkte";
    $resilt = mysql_query($sprich, $db);
    }

if ($new_empunkte && ($new_empunkte != $old_empunkte))
    {
     $font9 = fontSizeColor(2, $txtcol8);echo $font9;
     echo $lang_newEMpoints . " " . $new_empunkte . " <br>";
    $sprich = "UPDATE config SET em_meister_punkte = $new_empunkte";
    $resilt = mysql_query($sprich, $db);
    }
if ($new_blpunkte && ($new_blpunkte != $old_blpunkte))
    {
     $font9 = fontSizeColor(2, $txtcol8);echo $font9;
     echo $lang_newBULIpoints . " " . $new_blpunkte . " <br>";
    $sprich = "UPDATE config SET bl_meister_punkte = $new_blpunkte";
    $resilt = mysql_query($sprich, $db);
    }

// +++++++++++++++++++++++++++





// #######################################################################################

// +++++++++++++++++++++++++++++ Die eigentliche Seite +++++++++++++++++++++++++++++++++++
// #######################################################################################




echo "</td></tr></table>";

// ------------------------- Daten vorbereiten ------------------------
$spruch = "SELECT language.language, email FROM user ";
$spruch .= " INNER JOIN language ON user.language = language.id";
$spruch .= " WHERE user.id = 1";

$result = mysql_query( $spruch, $db ) or die("Klappt nicht: " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$oldmail = $row['email'];
$adminlanguage = $row['language'];

$spruch = "SELECT *, language.language AS glang FROM config";
$spruch .= " INNER JOIN language ON config.language = language.id";

$result = mysql_query( $spruch, $db ) or die("Klappt nicht: " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$www = $row['www'];
$localfile = $row['localfile'];
$maild = $row['maild'];
$newuser_txt = $row['newuser_txt'];
$reminduser_txt = $row['reminduser_txt'];
$remindflag = $row['reminduser_flag'];
$jabber = $row['jabber'];
$jabber_room = $row['jabber_room'];
$jabber_id = $row['jabber_id'];
$jabber_pwd = $row['jabber_pwd'];
$logflag = $row['logflag'];
$defaultlang = $row['glang'];


// ---------------------------------------------------------------------

echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_daten.php\">";
echo "<table $bgcolor1 $center border=0 cellspacing=15 cellpadding=0><tr>";

echo "<td $center $top>";
  
  // ----- Admin Daten -----------------
    $font2 = fontSizeColor(3, $txtcol8);
    $font = fontSizeColor(2, $txtcol7);
    echo "<table $center $bgcolor8 border=0 cellspacing=2 cellpadding=0><tr>";
    echo "<td $cspn2 $center>$font2 $lang_admindata</td></tr><tr>";
    echo "<td $right>$font $lang_adminmail</td>";
    echo "<td><input name=\"adminmail\" value=\"$oldmail\"></td></tr><tr>";
    echo "<td $right>$font $lang_adminpassword</td>";
    echo "<TD><INPUT TYPE=\"password\" NAME=\"newpwd\" MAXLENGTH=\"20\"></TD></tr><tr>";
    echo "<td $right>$font $lang_confirmpassword</td>";
    echo "<TD><INPUT TYPE=\"password\" NAME=\"newpwd2\" MAXLENGTH=\"20\"></TD></tr>";
    
    
    //===================set admin language================================

	echo "<tr>";
	echo "<td $right>$font&nbsp;" . $lang_adminlanguage . " </td>";
	
	echo "<td>";
	echo "<select name='newlanguage' size='1'>";
	    echo "<option>$adminlanguage</option>";
	    
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
    
    echo "<tr>";

    echo "<TD $cspn2 $right><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonok . "' STYLE=\"width: 50px;\">";

    echo "<INPUT TYPE=\"hidden\" NAME=\"oldmail\" VALUE=\"$oldmail\">";
	echo "</TD></tr></table><br>";
	// ------------------------------------
	

    // ########## Pfade und Dienste ##############################
    $font2 = fontSizeColor(3, $txtcol6);
    $font = fontSizeColor(2, $txtcol5);
    echo "<table $center $bgcolor6 border=0 cellspacing=2 cellpadding=0><tr>";
    echo "<td $cspn2 $center>$font2 $lang_pathnservice </td></tr><tr>";
    echo "<td $right>$font $lang_url</td>";
    echo "<td><input name=\"new_www\" value=\"$www\"></td></tr><tr>";

    echo "<td $right>$font $lang_localfile </td>";
    echo "<td><input name=\"new_localfile\" value=\"$localfile\"></td></tr><tr>";

    echo "<td $right>$font $lang_maildaemon </td>";
    echo "<td><input name=\"new_maild\" value=\"$maild\"></td></tr><tr>";
    
    echo "<td $right>$font $lang_remindmail</td>";
    echo "<td $center><input type=\"radio\" name=\"new_remindflag\" value=\"1\"";
    if ($remindflag == 1) echo " checked=\"checked\"";
    echo ">$font $lang_yes $dreispace";
    echo "<input type=\"radio\" name=\"new_remindflag\" value=\"0\"";
    if ($remindflag == 0) echo " checked=\"checked\"";
    echo ">$font $lang_no";
    echo "</td></tr>";
    
    
    //===================set global language================================

	echo "<tr>";
	echo "<td $right>$font&nbsp;$lang_globallang </td>";
	
	echo "<td>";
	echo "<select name='newgloballanguage' size='1'>";
	    echo "<option>$defaultlang</option>";
	    
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
    
    echo "<tr>";
       
    echo "<td $right>$font $lang_jabberaccount </td>";
    echo "<td><input name=\"new_jabber_id\" value=\"$jabber_id\"></td></tr><tr>";    
       
    echo "<td $right>$font $lang_jabberpwd </td>";
    echo "<td><input type=\"password\" name=\"new_jabber_pwd\" value=\"$jabber_pwd\"></td></tr><tr>";  
    
    echo "<td $right>$font $lang_jabbergroupchat </td>";
    echo "<td><input name=\"new_jabber_room\" value=\"$jabber_room\"></td></tr><tr>";

    echo "<td $right>$font $lang_jabberservice</td>";
    echo "<td $center><input type=\"radio\" name=\"new_jabber\" value=\"1\"";
    if ($jabber == 1) echo " checked=\"checked\"";
    echo ">$font $lang_on $dreispace";
    echo "<input type=\"radio\" name=\"new_jabber\" value=\"0\"";
    if ($jabber == 0) echo " checked=\"checked\"";
    echo ">$font $lang_off";
    echo "</td></tr><tr>";
    
    echo "<td $right>$font $lang_loggclicks</td>";
    echo "<td $center><input type=\"radio\" name=\"new_loggin\" value=\"1\"";
    if ($logflag == 1) echo " checked=\"checked\"";
    echo ">$font $lang_yes $dreispace";
    echo "<input type=\"radio\" name=\"new_loggin\" value=\"0\"";
    if ($logflag == 0) echo " checked=\"checked\"";
    echo ">$font $lang_no";
    echo "</td></tr><tr>";

    
    echo "<TD $cspn2 $right><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonok ."' STYLE=\"width: 50px;\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"www\" VALUE=\"$www\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"localfile\" VALUE=\"$localfile\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"maild\" VALUE=\"$maild\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"remindflag\" VALUE=\"$remindflag\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"jabber\" VALUE=\"$jabber\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"logflag\" VALUE=\"$logflag\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"jabber_id\" VALUE=\"$jabber_id\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"jabber_pwd\" VALUE=\"$jabber_pwd\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"jabber_room\" VALUE=\"$jabber_room\">";

    echo "</TD></tr></table>";
    // -------------------------------------
   
    
    
    
echo "</td><td $center $top>";

// ----- Aktionen ---------------------

    echo "<table $center $bgcolor12 border=0 cellspacing=8 cellpadding=0><tr>";
        echo "<td $cspn2 $center>$font2 $lang_actions</td></tr><tr>";
    echo "<tr><td $center>$font2";
    echo "<INPUT TYPE=\"submit\" name=\"dbbackup\" VALUE='" . $lang_mysqldump . "'>";
    echo "<INPUT TYPE=\"submit\" name=\"sendtestmail\" VALUE='" . $lang_sendtextmail . "'>";
    echo "</td><td>";
    echo "</td></tr></table><br>";
    //--------------------------------------------------------
    
    
    
    
    // ----- Begrüssungstext neuer User ---------------------
    $font2 = fontSizeColor(3, $txtcol8);
    $font = fontSizeColor(1, $txtcol7);
    echo "<table $center $bgcolor10 border=0 cellspacing=2 cellpadding=0><tr><td $center>$font2";
    echo "$lang_mailnewusers<br>$font";
    echo "$lang_mailreplace";
    echo "<br><textarea name=\"new_newuser_txt\" cols=\"50\" rows=\"10\">$newuser_txt</textarea>";
    echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonok . "' STYLE=\"width: 50px;\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"oldnewuser_txt\" VALUE=\"$newuser_txt\">";
    echo "</table><br>";
    //--------------------------------------------------------
    
    
        // -----  User Reminder ---------------------
    $font2 = fontSizeColor(3, $txtcol11);
    $font = fontSizeColor(1, $txtcol10);
    echo "<table $center $bgcolor11 border=0 cellspacing=2 cellpadding=0><tr><td $center>$font2";
    echo "$lang_userremind<br>$font";
    echo "$lang_remindreplace";
    echo "<br><textarea name=\"new_reminduser_txt\" cols=\"50\" rows=\"10\">$reminduser_txt</textarea>";
    echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonok . "' STYLE=\"width: 50px;\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"reminduser_txt\" VALUE=\"$reminduser_txt\">";
    echo "</table>";
    //--------------------------------------------------------
    
    
    
echo "</td></tr><tr><td $center $top><br><br>";
// linke seite


    // ++++++Meisterpunkte+++++++++++++++++++++
    $font  = fontSizeColor(2, $txtcol3);
    $font2 = fontSizeColor(3, $txtcol4);
    echo "<table border=0 $center $bgcolor39>";
    $spruch  = "SELECT em_meister_punkte, wm_meister_punkte, bl_meister_punkte";
    $spruch .= " FROM config";
    $result = mysql_query( $spruch, $db ) or die("MeisterPunkte failed : " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    
    $wmpunkte = $row['wm_meister_punkte'];
    $empunkte = $row['em_meister_punkte'];
    $blpunkte = $row['bl_meister_punkte'];

    echo "<tr><td $cspn2 $center>$font2 $lang_championpoints</td></tr>";
    echo "<tr><td $right>$font $lang_worldchampion </td>";
    echo "<td><input size=\"4\" MAXLENGTH=\"4\" NAME=\"new_wmpunkte\" VALUE=\"$wmpunkte\"></td></tr>";
    
    echo "<tr><td $right>$font $lang_eurochampion </td>";
    echo "<td><input size=\"4\" MAXLENGTH=\"4\"  NAME=\"new_empunkte\" VALUE=\"$empunkte\"></td></tr>"; 
    
    echo "<tr><td $right>$font $lang_bundesliga </td>";
    echo "<td><input size=\"4\" MAXLENGTH=\"4\"  NAME=\"new_blpunkte\" VALUE=\"$blpunkte\"></td></tr>";
    
    echo "<input TYPE=\"hidden\" NAME=\"old_wmpunkte\" VALUE=\"$wmpunkte\">";
    echo "<input TYPE=\"hidden\" NAME=\"old_empunkte\" VALUE=\"$empunkte\">";
    echo "<input TYPE=\"hidden\" NAME=\"old_blpunkte\" VALUE=\"$blpunkte\">";
    echo "<tr><td $cspn2 $center><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonchange ."'></td></tr>";
    echo "</table>";
    // ++++++++++++++++++++++++++++++++++++++++


echo "</td><td $center $top>";
// rechte seite

    // ###### Flaggen Einstellungen
    $font  = fontSizeColor(2, $txtcol1);
    $font2 = fontSizeColor(3, $txtcol2);
        $font3 = fontSizeColor(2, $txtcol20);
    echo "<br><br><table $center $bgcolor27>";
    echo "<tr><td $cspn2 $center>$font2";
    echo "$lang_teamflag";
    echo "</td></tr>";
    
   
    echo "<tr><td $cspn2 $center>$font";
    $spruch = "SELECT wappen_src FROM team WHERE id = 1";
    $result = mysql_query( $spruch, $db ) or die("pngORgif failed : " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $pngorgif = $row['wappen_src'];
    echo "<img src=\"../img/Wappen/" .  $pngorgif . "\" width=30><br>";
    $dete = $pngorgif[12];
    echo "$font $lang_currentsetting ";
    if ($dete == 'p') echo "$font3 $lang_nationalflag";
    if ($dete == 'g') echo "$font3 $lang_clubflag";
    echo "</td></tr><tr>";
    echo "<td>$font &nbsp;<a href=\"../admin/admin_daten.php?flaggenchange=2\">" . $font . $lang_nationalflag . "</a>&nbsp;</td>";
    echo "<td>$font &nbsp;<a href=\"../admin/admin_daten.php?flaggenchange=1\">" . $font . $lang_clubflag . "</a>&nbsp;</td>";
    echo "</tr></table>";
    $flaggenchange = 0;
    // ####### flaggenende ##############
    
    
    
    
    
  
    echo "<br><table border=0 cellspacing=8 $center>";

    $blupp = UserPic($uid);
    $font = fontSizeColor(3, $txtcol18);
    
    echo "<tr><td><a href=\"../admin/admin_daten.php?pic_change=1\">";
    echo "$blupp</a></td><td $center>$dreispace<a href=\"../admin/admin_daten.php?pic_change=1\">" . $font;
    echo  "$lang_adminpic";
    echo "</a>$dreispace</td></tr>";
    echo "</table>";

  
    
    
    

echo "</td></tr></table>";
echo "</FORM>";

include ('../user/user_footer.html');
?>