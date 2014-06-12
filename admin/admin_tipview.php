<?php


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------

$notthefirst = $_POST['notthefirst'];
$oldwettkampfid = $_POST['oldwettkampfid'];
$users = $_POST['users'];

// ----- Erinnerungsmails versenden -------------------------
if ($notthefirst)
{
$spruch  = " SELECT www, maild, reminduser_flag, reminduser_txt";
$spruch .= " FROM config";

$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$www = $row['www'];
$daemon_adress = $row['maild'];
$der_text = $row['reminduser_txt'];
$subject = "$lang_mailsubject";

    foreach ($users AS $da)
        {
        // echo $da . "<br>";
    $spruch  = "SELECT name, email";
    $spruch .= " FROM user";
    $spruch .= " WHERE id = $da";
    $spruch .= " AND remind_flag = 1";
    $result = mysql_query( $spruch, $db ) or die("Userdaten failed : " . mysql_error());
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
      $der_user = $row['name'];
      $die_mail = $row['email'];
      $WKname = WKname($oldwettkampfid);
      $obody = ereg_replace( "USER", $der_user, $der_text );
	  $obody = ereg_replace( "EMAIL", $die_mail, $obody );
      $obody = ereg_replace( "URL", $www, $obody );
      $obody = ereg_replace( "WKNAME", $WKname, $obody );
      if ($die_mail != ''){
      mail( $die_mail, $subject, $obody, "From: fTip-Daemon<" . $daemon_adress . ">" );
      }
      if ($der_user != '') echo $lang_mailsenttouser . " " . $der_user . " [" . $die_mail . "] " . "...<br>";
  
    
    
    
        
        }



echo "<br><br>";
}

// -------------------------------------------------------------------


// ################### wettkampf waehlen #############################################################
    $font = fontSizeColor(2, $txtcol7);
        $font1 = fontSizeColor(1, $txtcol7);
    $font2 = fontSizeColor(3, $txtcol9);
    
echo "<table $center border=0><tr><td $center>$font2";
echo $lang_selectcompetition . "</td></tr><tr><td>$font";



$spruch  = "SELECT id FROM wettkampf WHERE done = 0";
$result = mysql_query($spruch, $db) or die("<b>aktWK</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $akWK_id = $row['id'];
    $akWK = WKname($akWK_id);
    echo "&nbsp;<a href=\"../admin/admin_tipview.php?wettkampfid=$akWK_id\">" . $font . "$akWK</a><br>";
    
    }

$spruch  = "SELECT id, saison FROM wettkampf WHERE done = 1";
$spruch .= " ORDER BY saison DESC";
$result = mysql_query($spruch, $db) or die("<b>aktWK</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $oldWK_id = $row['id'];
    $oldWK = WKname($oldWK_id);
    echo "&nbsp;<a href=\"../admin/admin_tipview.php?wettkampfid=$oldWK_id\">" . $font1 . "$oldWK</a><br>";
    
    }



echo "</td></tr></table>";

// ###################################################################################################




if ($wettkampfid)
{

$spruch  = "SELECT done FROM wettkampf WHERE id = $wettkampfid";
$result = mysql_query($spruch, $db) or die("<b>aktWK2</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$checker2 = $row['done'];




echo "<br><hr><br>";
// -------------------------------Wer hat getippt =!-----------( $wettkampfid )--------------------------------------------
$seite = "../admin/admin_tipview.php?wettkampfid=$wettkampfid";
$WK = WKname ($wettkampfid);
$aktueller = SpieltageKlicker ($wettkampfid, $seite);
if (!$spieltag) $spieltag = $aktueller;
$spruch  = "SELECT user_id, user.name FROM liga_tip";
$spruch .= " INNER JOIN user ON liga_tip.user_id = user.id";

        $idiot = 0;
        $spruch2  = "SELECT id FROM liga_spiel";
        $spruch2 .= " WHERE wettkampf_id = $wettkampfid";
        $spruch2 .= " AND spieltag = $spieltag";
        $result2 = mysql_query($spruch2, $db) or die("<b>SpieltagHolen</b> failed : " . mysql_error() . "<br><br>" . $spruch2);
        while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
            {
            $hier = $row2['id'];
            
            if ($idiot == 0) 
                {
                $spruch .= " WHERE liga_spiel_id = $hier ";
                } else {
                $spruch .= " OR liga_spiel_id = $hier"; 
                }
            $idiot++;
            }
          
$spruch .= " GROUP BY user_id";
$spruch .= " ORDER BY name";
$result = mysql_query($spruch, $db) or die("<b>GetipptUser</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $font3 = fontSizeColor(4, $txtcol9);
    $font2 = fontSizeColor(3, $txtcol8);
    $font = fontSizeColor(2, $txtcol7);

echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_tipview.php\">";
echo "<br><table cellspacing=10 border=0 $center><tr><td $bgcolor36 $cspn2 $center>$font3";
echo "$WK $font2 $lang_matchdaypicks " . $spieltag . "</td></tr><tr><td $bgcolor7 $center>";

    $font3 = fontSizeColor(2, $txtcol6);
    $font2 = fontSizeColor(2, $txtcol18);
echo "$font2 " . $lang_hassetpicks . ":</td>";
echo "<td $bgcolor7 $center>$font3 " . $lang_hasnotsetpicks . ":</td></tr>";
echo "<tr><td $bgcolor8>";

while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    
    $die_user[] = $row['user_id'];
    $der_user = $row['name'];
    echo "&nbsp; $font" . $der_user . "<br>";
    
    }
echo "</td><td $bgcolor19>";

$spruch  = "SELECT id, name from user";
$spruch .= " WHERE id != 1";

if ($die_user)
    {
    foreach ($die_user AS $da)
        {
        $spruch .= " AND id != $da";
    
        }
     }
$spruch .= " ORDER BY name";
$result = mysql_query($spruch, $db) or die("<b>VergessenUser</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $nixuser = $row['id'];
    echo "<INPUT TYPE=\"hidden\" NAME=\"users[]\" VALUE=\"$nixuser\">";
    $der_user = $row['name'];
    echo "&nbsp; $font" . $der_user . "<br>";
    
    }
    
$checker = AktuellerSpieltag($wettkampfid);
if  ($checker > $spieltag) 
    {
    $einfachnurso++;
    } else {
    if ($checker2 == 0)
        {
        echo "<br><INPUT TYPE=\"submit\" VALUE='" . $lang_buttonmailremind . "'>";
        }
    }
echo "</td></tr></table>";
    echo "<INPUT TYPE=\"hidden\" NAME=\"notthefirst\" VALUE=\"1\">";
    echo "<INPUT TYPE=\"hidden\" NAME=\"oldwettkampfid\" VALUE=\"$wettkampfid\">";
echo "</form>";
// -------------------------------------------------------------------------------------
}












include ('../user/user_footer.html');
?>




























