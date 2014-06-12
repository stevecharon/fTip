<?php


include ('../script/SCRIPTconnect.php');
//include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');

/**/        $logpage = basename(__FILE__);          // ##



//================== which language is set as default ? ======================
$spruch  = "SELECT config.language AS conflang, language.suffix AS suffix, language.language AS mylang FROM config";
$spruch .= " INNER JOIN language ON config.language = language.id";
$result = mysql_query( $spruch, $db ) or die("failed : " . mysql_error() . " - " . $spruch );
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$conflang = $row['conflang'];
$langsuffix = $row['suffix'];
$mylang = $row['mylang'];
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $row['suffix'], $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//============================================================================



$notthefirst = $_POST['notthefirst'];
$newmail = $_POST['newmail'];
$newname = $_POST['newname'];


// ##### HEAD ########
echo "<table width=690 $center border=0>";

$font9 = fontSizeColor(3, "#33cc00"); // gruen
$font = fontSizeColor(5, $txtcol13); 
echo "<tr><th $center>$font $lang_register</th></tr>";
// ----------------------




if ( ($notthefirst == 1) && ($newname != '' ) )
    {
    
    if ($newmail != '')
    
        {
        

        $font = fontSizeColor(4, $txtcol17); 
        
            $detektiv = 0;
        $spruch  = "SELECT id FROM user WHERE name = '$newname'";
        $result = mysql_query( $spruch, $db ) or die("Userdetektiv nicht: " . mysql_error());
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $dummy = $row['id'];
        if ($dummy != '') $detektiv++;
        
        $spruch  = "SELECT id FROM register_user WHERE name = '$newname'";
        $result = mysql_query( $spruch, $db ) or die("REGUserdetektiv nicht: " . mysql_error());
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $dummy = $row['id'];
        if ($dummy != '') $detektiv++;
        
        if ( $detektiv == 0)
            {
            
            
            echo "<tr><td $justify>";
            echo "$font <br><br>$lang_newuser1 <b>" . $newname . "</b> $lang_newuser2";
            echo " <i>" . $newmail . "</i> ";
            echo $lang_newuser3 . " <a href=\"../register.php\">$lang_newuser4</a> ";
            echo $lang_newuser5 . "<br><br><br><br>";
            
            $spruch  = "SELECT newuser_txt, www, maild FROM config";
            $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            
            $www = $row['www'];
            $subject = "[fTip] " . $lang_usermail1;
            $daemon_adress = $row['maild'];
            
            $schluessel = date("U");
            $body  = $lang_usermail2 . " " . $newname . "... \r\n";
            $body .= $lang_usermail3 . "  \r\n";
            $body .= $lang_usermail4 . "  \r\n \r\n";
            $body .= $lang_usermail5 . "       \r\n";
            $body .= $lang_usermail6 . $newname . " \r\n";
            $body .= $lang_usermail7 . $schluessel . "    \r\n";
            $body .= $lang_usermail8 . "      " . $www . "register.php  ";
            
            $body .= $lang_usermail9. " \r\n \r\n";
            $body .= $lang_usermail10;
            
            mail( $newmail, $subject, $body, "From: fTip-Daemon<" . $daemon_adress . ">" );
            //echo "<br>$font9 Wilkommens-Email versendet an Adresse: " . $newmail;
            
            $sprich  = "INSERT INTO register_user (name, mail, schluessel)";
            $sprich .= " VALUES ('$newname', '$newmail', '$schluessel')";
                $resilt = mysql_query($sprich, $db) or die("Reg DB failed : " . mysql_error());
            // echo $schluessel;
            
            $name = "[<i>" . $newname . "</i>]";
            
            
         
            
            // ###### und STOP #####
             echo "<tr><td>"; include ('../user/user_footer.html');  exit;
            }
            
            $font = fontSizeColor(3, $txtcol6); 
            echo "<tr><td $center>$font $lang_erroruser1 <b><i>" . $newname . "</i></b> $lang_erroruser2</td></tr>";
            $newname = '';
      
        } else {
        $font = fontSizeColor(3, $txtcol6); 
        echo "<tr><td $center>$font $lang_errormail</td></tr>";
        }
    }




$rightnow = date("U");
$spruch  = "SELECT id, schluessel FROM register_user";
$result = mysql_query( $spruch, $db ) or die("GEToldOnes failed : " . mysql_error());
   while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $indbid = $row['id'];
    $oldone = $row['schluessel'];
//    echo $indbid . "    -   " . $oldone;
    $kontrolle = ($rightnow - $oldone);
//    echo "   ____" . $kontrolle;
    if ($kontrolle > 86400)      // 86400 sind 24h... er loescht hier also alle die aelter als 1tag sind
        {
        $sprech = "DELETE FROM register_user WHERE id = $indbid";
        $reselt = mysql_query($sprech, $db) or die("Delete OldOnes failed : " . mysql_error() . "<br><br>" . $sprech);
 //  echo $sprech;
        }
    }
            

$font = fontSizeColor(4, $txtcol17); 
echo "<tr><td $justify>$font<br>$lang_hellouser</td></tr>";
echo "<tr><td $center>";
    echo "<br><br><table $center border=0>";
    echo "<FORM METHOD=\"post\" NAME=\"register\" ACTION=\"user_register.php\">";
    echo "<tr><td $right>$font";
    echo $lang_reguser . " &nbsp;<INPUT NAME=\"newname\" VALUE=\"$newname\" MAXLENGTH=\"20\"><br>";
    echo $lang_regmail . " &nbsp;<INPUT NAME=\"newmail\" VALUE=\"$newmail\" MAXLENGTH=\"40\"><br>";
    echo "<INPUT TYPE=\"hidden\" NAME=\"notthefirst\" VALUE=\"1\">";
    echo "<INPUT TYPE=\"submit\" VALUE=\"&nbsp;" . $lang_button . "&nbsp;\"></td></tr></FORM>";
    echo "</table>";
echo "</td></tr>";









// ###########
echo "<tr><td>"; include ('../user/user_footer.html');
?>











