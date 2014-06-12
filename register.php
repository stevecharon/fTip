<?php

############################## L - I - C - E - N - C - E ##########################
###																				
### 		fTip - the multiuser-soccer-sweepstakee-manager						
### 		Copyright (C) 2002-2005 by produnis & durchfall-crew				
###-----------------------------------------------------------------------------
###																				
###    This program is free software; you can redistribute it and/or modify		
###    it under the terms of the GNU General Public License as published by		
###    the Free Software Foundation; either version 2 of the License, or		
###    (at your option) any later version.										
###																				
###    This program is distributed in the hope that it will be useful,			
###    but WITHOUT ANY WARRANTY; without even the implied warranty of			
###    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the			
###    GNU General Public License for more details.								
###																				
###    You should have received a copy of the GNU General Public License		
###    along with this program; if not, write to the Free Software 				
###    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA	
###    or visit webpage  http://www.gnu.org/licenses/licenses.html#GPL			
###-----------------------------------------------------------------------------
###																				
###    to contact produnis, please send mail to ftip@produnis.de				
###    or have a look at http://www.produnis.de/fTip							
###																				
###################################################################################



// 86.400 sec hat ein tag; drei tage haben 259.200 sec.

include ('script/SCRIPTconnect.php');
//include ('../script/SCRIPTsession.php');
include ('script/SCRIPTinclude.php');

//** ################## LOGBOT #########################
/**/         $logurl =   LogMalDieURL();           // ##
            $logip = GetEnv('REMOTE_ADDR');
/**/        $logpage = basename(__FILE__);         // ##
/**/    include ('script/BOTlogbot.php');          // ##
/**/ // include ('../ftiproot/bot/logbot.php');    // ##
// #####################################################

$font8 = fontSizeColor(4, $txtcol18);

$notthefirst = $_POST['notthefirst'];
$notthesecond = $_POST['notthesecond'];
$mailpwd = $_POST['mailpwd'];
$mailname = $_POST['mailname'];
$dbmail = $_POST['dbmail'];
$dbid = $_POST['dbid'];
$newuser = $_POST['newuser'];
$newpwd = $_POST['newpwd'];
$newpwd2 = $_POST['newpwd2'];

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
include ("languages/" . $langsuffix . "/" . $thepage);
//============================================================================



// ##### HEAD ########
echo "<table width=690 $center border=0>";

$font9 = fontSizeColor(3, "#33cc00"); // gruen
$font = fontSizeColor(5, $txtcol13); 
echo "<tr><th $center>$font $lang_confirm</th></tr>";
// ----------------------







if ($notthesecond == 2)
{
if ($newpwd == $newpwd2)
    {
    $mailname = htmlentities($mailname);
    $md5pwd = md5($newpwd);
    
    $font2 = fontSizeColor(2, "#33cc00"); // gruen
    $font  = fontSizeColor(2, $txtcol9); 
    $font3 = fontSizeColor(3, $txtcol17); 
    $UserGenesis =     UserGenesis();
    
    $sprich  = "INSERT INTO user (name, pwd, email, genesis)";
    $sprich .= " VALUES ('$mailname', '$md5pwd', '$dbmail', '$UserGenesis')";
    $resilt = mysql_query($sprich, $db) or die("NewUser into DB failed : " . mysql_error());
    
    $sprech = "DELETE FROM register_user WHERE id = $dbid";
    // echo $sprech;
    $reselt = mysql_query($sprech, $db) or die("Delete RegUser failed : " . mysql_error() . "<br><br>" . $sprech);
    
    
    
    
    echo "<tr><td $center>$font2  $lang_newpwdsaved1";
    echo "$font<br>";
    echo "$lang_newpwdsaved2</td></tr>";
    
    echo "<tr><td $center>$font3<br>";
    echo $lang_youreadded;
    echo "<br><br><br>";
    echo "$font8<b>$lang_step3</b> <br>$font3 $lang_goon1 <a href=\"index.php\">$lang_goon2</a> $lang_goon3</td></tr>";
    
    
    $name = "[" . $mailname . "]";
    
    
    $spruch  = "SELECT maild FROM config";
    
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
            
            
            $subject = "[AdminfTip] " . $lang_adminmail1 . $mailname;
            $daemon_adress = $row['maild'];
            
    $spruch  = "SELECT email FROM user WHERE id = 1";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $adminmail = $row['email'];
    
    $uhrenvergleich = TagHeuer();
    
    $body  = $lang_adminmail2  . "... \r\n";
            $body .= $lang_adminmail3  . "   \r\n ";
            $body .= "Username: " . $mailname . "   \r\n Email: " . $dbmail . "     \r\n ";
            $mailtail = MailTail();
            
            $body .= $mailtail;
            
            
            mail( $adminmail, $subject, $body, "From: fTip-Daemon<" . $daemon_adress . ">" );
    
    
    exit;
    } else {
     $font2 = fontSizeColor(2, $txtcol6);
     echo "<tr><td $center>$font2 $lang_pwdmissmatch</td></tr>";
     $notthefirst = 1;
    
    }
}












if ($notthefirst == 1)
{

if ($mailname && $mailpwd)
    {
    //########### ok, dann schau mal, ob alle daten stimmen ##################
    
    $spruch  = "SELECT id, mail, schluessel FROM register_user ";
    $spruch  .= " WHERE name = '$mailname'";
    $result = mysql_query( $spruch, $db ) or die("RegCheck failed : " . mysql_error() . "<br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    
    $dbid = $row['id'];
    $dbpwd = $row['schluessel'];
    $dbmail = $row['mail'];
    if ($dbid != '')
        {
        if ($dbpwd == $mailpwd)
        
            {
            
            $font2 = fontSizeColor(2, "#33cc00"); // gruen
            echo "<tr><td $center>$font2 $lang_dataok</td></tr>";
           
            $font = fontSizeColor(4, $txtcol17); 
            echo "<tr><td $justify>$font8<br><b>$lang_step2</b>$font";
            echo "<br>$lang_createpwd";
            
            echo "</td></tr>";
            echo "<FORM METHOD=\"post\" NAME=\"register2\" ACTION=\"register.php\">";
            
            echo "<table border=0 $center> ";
                echo "<tr><td $right>";
                    
                echo "$lang_newpwd1 &nbsp;<INPUT NAME=\"newpwd\" type=\"password\"><br>";
                echo "$lang_newpwd2 &nbsp;<INPUT NAME=\"newpwd2\" type=\"password\"><br>";
                
                echo "<INPUT TYPE=\"hidden\" NAME=\"newuser\" VALUE=\"$mailname\">";
                echo "<INPUT TYPE=\"hidden\" NAME=\"notthesecond\" VALUE=\"2\">";
                echo "<INPUT TYPE=\"hidden\" NAME=\"mailpwd\" VALUE=\"$mailpwd\">";
                echo "<INPUT TYPE=\"hidden\" NAME=\"mailname\" VALUE=\"$mailname\">";
                echo "<INPUT TYPE=\"hidden\" NAME=\"dbid\" VALUE=\"$dbid\">";
                echo "<INPUT TYPE=\"hidden\" NAME=\"dbmail\" VALUE=\"$dbmail\">";
                echo "<INPUT TYPE=\"hidden\" NAME=\"notthefirst\" VALUE=\"0\">";
                echo "<INPUT TYPE=\"submit\" VALUE=\"&nbsp;" . $lang_buttonpwd . "&nbsp;\"></FORM>";
            echo "</table>";
            
            exit;
            } else {
             $font2 = fontSizeColor(2, $txtcol6);
            echo "<tr><td $center>$font2 $lang_pwdmissmatch2</td></tr>";
            }
        } else {
        $font2 = fontSizeColor(2, $txtcol6);
        echo "<tr><td $center>$font2 $lang_userunknown1 <b><i>" . $mailname  . "</i></b> ";
        echo $lang_userunknown2 . "</td></tr>";
        }
    
    // #######################################################################
    
    } else {
    $font2 = fontSizeColor(2, $txtcol6);
    echo "<tr><td $center>$font2 $lang_checktypo</td></tr>";
    }
}



// ######################## Die Seite vor dem NOTTHEFIRST ####################

        $font = fontSizeColor(4, $txtcol17); 
        
echo "<tr><td $center>$font8<br><b>$lang_step1</b>$font <br>";
echo $lang_giveregdata . "</td></tr>";
    echo "<FORM METHOD=\"post\" NAME=\"register\" ACTION=\"register.php\">"; 
echo "<tr><td $center><table $center border=0>";
    echo "<tr><td $right><br><br>";
   
    
    
    echo $lang_username . " &nbsp;<INPUT NAME=\"mailname\" VALUE=\"$newname\" MAXLENGTH=\"20\"><br>";
    echo $lang_password . " &nbsp;<INPUT NAME=\"mailpwd\" VALUE=\"\"><br>";
    echo "<INPUT TYPE=\"hidden\" NAME=\"notthefirst\" VALUE=\"1\">";
    echo "<INPUT TYPE=\"submit\" VALUE=\"&nbsp;" . $lang_buttonok . "&nbsp;\"></FORM>";

    echo "</td></tr></table>";
echo "</td></tr>";

// ###########
// echo "<tr><td>"; include ('user/user_footer.html');
?>





