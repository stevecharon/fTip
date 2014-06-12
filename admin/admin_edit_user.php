<?php
	// ###***+++ Der Standard-Admin-Kopf +++***###


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##


//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------



$runden_ja = array();
$runden_no = array();
$runden_janame = array();
$runden_noname = array();

$runderaus = $_POST['runderaus'];
$runderein = $_POST['runderein'];
$users_name = $_POST['users_name'];
$users_oldname = $_POST['users_oldname'];
$users_pwd = $_POST['users_pwd'];
$users_mail = $_POST['users_mail'];
$users_oldmail = $_POST['users_oldmail'];
$reminder = $_POST['reminder'];
$oldreminder = $_POST['oldreminder'];
$mailtouser = $_POST['mailtouser'];
$der_user = $_GET['der_user'];

if ($runderaus)
    {
    foreach ($runderaus AS $diese)
        {
        $sprich  = "DELETE FROM tippspiel_user";
        $sprich .= " WHERE tippspiel_id = $diese";
        $sprich .= " AND user_id = $der_user";
        $resilt = mysql_query($sprich, $db) or die("USER outof Runde failed : " . mysql_error());
        $font = fontSizeColor(1, $txtcol10); echo $font;
        echo $lang_userkickedfromgroup . " " . $diese . "....     ";
        }
    }

if ($runderein)
    {
    foreach ($runderein AS $jene)
        {
        $sprich  = "INSERT INTO tippspiel_user (tippspiel_id, user_id)";
        $sprich .= " VALUES ('$jene', '$der_user')";
        $resilt = mysql_query($sprich, $db) or die("USER into Runde failed : " . mysql_error());
        $font = fontSizeColor(1, $txtcol11); echo $font;
        echo $lang_useraddedtogroup . " " . $jene . "....     ";
        }
    }



if ($users_name != $users_oldname)

    {
     // detektiv
            $spruch2  = "SELECT id FROM user WHERE name = '$users_name'";
            $result2 = mysql_query( $spruch2, $db ) or die("UserDetekitv failed : " . mysql_error());
            $row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
            if ($row2['id'] == '')
                {
                $sprich  = "UPDATE user";
                $sprich .= " SET name = '$users_name'";
                $sprich .= " WHERE id = $der_user";
                $resilt = mysql_query( $sprich, $db ) or die("update Username failed : " . mysql_error());
                $font = fontSizeColor(1, $txtcol1); echo $font;
                echo $lang_usernamechanged . " <b>$users_name</b>...";
                } else {
                $font = fontSizeColor(1, $txtcol6); echo $font;
                echo $lang_usernameinuse1 . " <b>$users_name </b>$lang_usernameinuse2";
                } 
    }



if ($users_pwd)
    {
       $md5user = md5($users_pwd);
     $sprich  = "UPDATE user";
     $sprich .= " SET pwd = '$md5user'";
     $sprich .= " WHERE id = $der_user";
     $resilt = mysql_query( $sprich, $db ) or die("update PWD failed : " . mysql_error());
     $font = fontSizeColor(1, $txtcol3); echo $font;
     echo "$lang_pwdchanged";  
    }


if ($users_mail != $users_oldmail)
            {
               $sprich  = "UPDATE user";
                $sprich .= " SET email = '$users_mail'";
                $sprich .= " WHERE id = $der_user";
                $resilt = mysql_query( $sprich, $db ) or die("update E-Mail failed : " . mysql_error());
                $font = fontSizeColor(1, $txtcol2); echo $font;
                echo $lang_mailchanged . " " . $users_mail . "...";  
            }


if ($reminder != $oldreminder)
    {
    $sprich  = "UPDATE user";
     $sprich .= " SET remind_flag = '$reminder'";
     $sprich .= " WHERE id = $der_user";
     $resilt = mysql_query( $sprich, $db ) or die("update REMIND failed : " . mysql_error());
     $font = fontSizeColor(1, $txtcol4); echo $font;
     if ($reminder == 1) echo "$lang_remindon";
    if ($reminder == 0) echo "$lang_remindoff";
    
    }


if ($mailtouser != '')
    {
    
    if ($users_mail != '')
        { 
        $spruch  = "SELECT www, maild FROM config";
        $result = mysql_query( $spruch, $db ) or die("MailConfig failed : " . mysql_error());
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $body = $mailtouser;
        $www = $row['www'];
        $subject = $lang_mailsubject;
        $daemon_adress = $row['maild'];
    
        $obody = ereg_replace( "USER", $username, $body );
	    $obody = ereg_replace( "EMAIL", $users_mail, $obody );
        $obody = ereg_replace( "URL", $www, $obody );
        mail( $users_mail, $subject, $obody, "From: fTip-Daemon<" . $daemon_adress . ">" );
 
        
        $font = fontSizeColor(1, $txtcol8); echo $font;
        echo "$lang_mailsent";
        } else {
        $font = fontSizeColor(1, $txtcol6); echo $font;
        echo "$lang_mailnotsent";        
        }
    }



// #######################################################
//echo $der_user;

echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_edit_user.php?der_user=$der_user\">";
$spruch  = "SELECT name, email, remind_flag FROM user WHERE id = $der_user";

$result = mysql_query( $spruch, $db ) or die("User holen failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$dieser_name = $row['name'];
$dieser_mail = $row['email'];
$dieser_remind = $row['remind_flag'];


$font = fontSizeColor(4, $txtcol8);

echo "<p $center>$font $lang_usersettings ";
$font = fontSizeColor(4, $txtcol9);
echo "$font $dieser_name";

echo "<br><br>";
echo "<table $center border=0>";
$font = fontSizeColor(2, $txtcol3);
echo "<tr $bgcolor7>";
echo "<td $center>$font $lang_username</td>";
echo "<td $center>$font $lang_userpwd</td>";
echo "<td $center>$font $lang_mailaddress</td>";
echo "<td $center $cspn2>$font $lang_reminder</td>";
echo "</tr>";

echo "<tr $bgcolor2>";
echo "<td><input type=\"\" name=\"users_name\" value=\"$dieser_name\" size=\"12\"></td>";
echo "<input type=\"hidden\" name=\"users_oldname\" value=\"$dieser_name\">";

echo "<td><input type=\"password\" name=\"users_pwd\" size=\"12\" MAXLENGTH=\"20\"></td>";

echo "<td><input type=\"\" name=\"users_mail\" value=\"$dieser_mail\"></td>";
echo "<input type=\"hidden\" name=\"users_oldmail\" value=\"$dieser_mail\">";
$font = fontSizeColor(1, $txtcol7);
echo "<td><input type=\"radio\" name=\"reminder\" value=\"1\"";
if ($dieser_remind == 1)  echo " checked=\"checked\"";
echo ">$font $lang_yes</td>";

echo "<td><input type=\"radio\" name=\"reminder\" value=\"0\"";
if ($dieser_remind == 0)  echo " checked=\"checked\"";
echo ">$font $lang_no</td>";

echo "<input type=\"hidden\" name=\"oldreminder\" value=\"$dieser_remind\">";

echo "<tr><td $cspn5 $right><input type=\"submit\" name=\"OK\" value='" . $lang_submitbutton . "' border=\"0\"></td></tr>";
echo "</table>";


echo "<table $center border=0 cellspacing=8><tr>";
echo "<td $center $top>";
// -+-+-+-+-+- Tippspiel Select +-+-+-+-+-+-+-+-++-++-+-+-+-+-+

$spruch  = "select id, name FROM tippspiel";
$result = mysql_query( $spruch, $db ) or die("Tippspiel holen failed : " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $runden_id = $row['id'];
    $runden_name = $row['name'];
    
    $spruch2  = "SELECT id FROM tippspiel_user";
    $spruch2 .= " WHERE tippspiel_id = $runden_id";
    $spruch2 .= " AND user_id = $der_user";
    $result2 = mysql_query( $spruch2, $db ) or die("USER Tippspiel holen failed : " . mysql_error());
    $row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
    if ($row2 == '')
        {
        $runden_no[] = $runden_id;
        $runden_noname[] = $runden_name;
        }else{
        $runden_ja[] = $runden_id;
        $runden_janame[] = $runden_name;
        }
    }
array_multisort($runden_noname, SORT_ASC, $runden_no);
array_multisort($runden_janame, SORT_ASC, $runden_ja);


echo "<table $center border=0 $bgcolor4>";
$font2 = fontSizeColor(1, "black");
$font = fontSizeColor(4, $txtcol9);
echo "<tr $bgcolor8><td $cspn2 $center>$font $lang_groupmembership</td></tr>";

echo "<tr>";
$font = fontSizeColor(2, "green");
echo "<td  $bgcolor36 $center>$font $lang_ismember<br>$font2 $lang_ismembertxt</td>";

$font = fontSizeColor(2, $txtcol6);
echo "<td $bgcolor37 $center>$font $lang_isnomember<br>$font2 $lang_isnomembertxt</td>";


$font = fontSizeColor(2, $txtcol3);

echo "<tr>";
echo "<td  $bgcolor36 $top>";
for ($i=0;$i<count($runden_ja);$i++)
    {
    echo "<input type=\"checkbox\" name=\"runderaus[]\" value=\"$runden_ja[$i]\">$font $runden_janame[$i] &nbsp;<br>";
   
    }
echo "</td><td $bgcolor37 $top>";
for ($i=0;$i<count($runden_no);$i++)
    {
    echo "<input type=\"checkbox\" name=\"runderein[]\" value=\"$runden_no[$i]\">$font $runden_noname[$i] &nbsp;<br>";
   
    }
echo "<tr><td $cspn2 $center><input type=\"submit\" name=\"OK\" value='" . $lang_buttonchange . "' border=\"0\"></td></tr>";

echo "</td></tr>";
echo "</table>";

// +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

echo "</td><td $top $center>";

// +-+-+-+ E-Mail -+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
if ($dieser_mail != '')
    {
    $font2 = fontSizeColor(3, $txtcol8);
    $font = fontSizeColor(1, $txtcol7);
    echo "<table $center $bgcolor10 border=0 cellspacing=2 cellpadding=0><tr><td $center>$font2";
    echo $lang_sendmailtouser . "<br>$font";
    echo "$lang_mailreplace";
    echo "<br><textarea name=\"mailtouser\" cols=\"50\" rows=\"10\"></textarea>";
    echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonsendmail . "'>";


    echo "</td></tr></table>";
    }

// +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

echo "</tr></table>";

echo "</form>";



// ########## ende gelände ############
include ('../user/user_footer.html');
?>