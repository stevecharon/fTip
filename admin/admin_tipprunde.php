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




$userja_id = array();
$userno_id = array();
$userja_name = array();
$userno_name = array();
$wkja_id = array();
$wkno_id = array();

$userraus = $_POST['userraus'];
$userrein = $_POST['userrein'];
$wkraus = $_POST['wkraus'];
$wkrein = $_POST['wkrein'];
$tippwd = $_POST['tippwd'];
$tippwd2 = $_POST['tippwd2'];



// ###### Die Funktionen ###################################################
// ----- user entfernen ------------------------------------
if ($userraus)
{
$font0 = fontSizeColor(1, $txtcol1); echo $font0;
foreach ($userraus as $dieser)
    {
    $sprich  = "DELETE FROM tippspiel_user";
    $sprich .= " WHERE tippspiel_id = $tiprunde";
    $sprich .= " AND user_id = $dieser";
    
    //echo $sprich;
    
    $resilt = mysql_query($sprich, $db) or die("USER outof Runde failed : " . mysql_error());

    echo $lang_kickuser . " " . $dieser . "....     ";
    }
}

// ----- user hinzufuegen ----------------------------------
if ($userrein)
{
$font0 = fontSizeColor(1, $txtcol2); echo $font0;
foreach ($userrein as $jener)
    {
    $sprich  = "INSERT INTO tippspiel_user (tippspiel_id, user_id)";
    $sprich .= " VALUES ('$tiprunde', '$jener')";
    $resilt = mysql_query($sprich, $db) or die("USER into Runde failed : " . mysql_error());

    echo $lang_adduser . " " . $jener . "....     ";
    }
}


// ----- WK entfernen ------------------------------------
if ($wkraus)
{
$font0 = fontSizeColor(1, $txtcol3); echo $font0;
foreach ($wkraus as $dieser)
    {
    $sprich  = "DELETE FROM tippspiel_wettkampf";
    $sprich .= " WHERE tippspiel_id = $tiprunde";
    $sprich .= " AND wettkampf_id = $dieser";
    
    //echo $sprich;
    
    $resilt = mysql_query($sprich, $db) or die("WK outof Runde failed : " . mysql_error());

    echo $lang_kickcompetition . " " . $dieser . "....     ";
    }
}

// ----- WK hinzufuegen ----------------------------------
if ($wkrein)
{
$font0 = fontSizeColor(1, $txtcol4); echo $font0;
foreach ($wkrein as $jener)
    {
    $sprich  = "INSERT INTO tippspiel_wettkampf (tippspiel_id, wettkampf_id)";
    $sprich .= " VALUES ('$tiprunde', '$jener')";
    $resilt = mysql_query($sprich, $db) or die("USER into Runde failed : " . mysql_error());

    echo $lang_addcompetition . " " . $jener . "....     ";
    }
}


// Passwort aendern
if ($tippwd)
    {
    if ($tippwd == $tippwd2)
        {
        $md5tip = md5($tippwd);
        // passwort aendern...
        $sprich  = "UPDATE tippspiel ";
        $sprich .= " SET pwd = '$md5tip'";
        $sprich .= " WHERE id = $tiprunde";
        
        $resilt = mysql_query( $sprich, $db ) or die("PWD-Update failed : " . mysql_error());
        $font0 = fontSizeColor(1, $txtcol5); echo $font0;
        echo "- " . $lang_newpwd . "...  ";
        } else {
        
        // stimmen nicht Ÿberein !!
        $font0 = fontSizeColor(1, $txtcol6); echo $font0;
        echo "- <b>" . $lang_pwdnotchanged . "...  ";
        
        }
    }

// ###########################################################################
// ###########################################################################



// ------- Daten vorbereiten ---------------------------------------------------------------

// ------ user dabei oder nicht dabei ------------------------------------------------
$spruch  = "SELECT id, name FROM user";
$spruch .= " WHERE id > 1";

$result = mysql_query( $spruch, $db ) or die("Usersuchen failed : " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $user_check_id = $row['id'];
    $user_check_name = $row['name'];
    
    $spruch2  = "SELECT id FROM tippspiel_user";
    $spruch2 .= " WHERE tippspiel_id = $tiprunde";
    $spruch2 .= " AND user_id = $user_check_id";
    // echo $spruch2;
    $result2 = mysql_query( $spruch2, $db ) or die("UserCheck failed : " . mysql_error());
    $row2 = mysql_fetch_array($result2, MYSQL_ASSOC);

    if ($row2['id'] == '')
        {
        $userno_id[] = $user_check_id;
        $userno_name[] = $user_check_name;
      
        } else {
      
        $userja_id[] = $user_check_id;
        $userja_name[] = $user_check_name;
        }
    }

// ------ wettkampf dabei oder nicht dabei ------------------------------------------------
$spruch  = "SELECT id FROM wettkampf";
$spruch .= " WHERE done = 0";

$result = mysql_query( $spruch, $db ) or die("WKsuchen failed : " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    $wk_check_id = $row['id'];
    
    $spruch2  = "SELECT id FROM tippspiel_wettkampf";
    $spruch2 .= " WHERE tippspiel_id = $tiprunde";
    $spruch2 .= " AND wettkampf_id = $wk_check_id";
    // echo $spruch2;
    $result2 = mysql_query( $spruch2, $db ) or die("WKCheck failed : " . mysql_error());
    $row2 = mysql_fetch_array($result2, MYSQL_ASSOC);

    if ($row2['id'] == '')
        {
        $wkno_id[] = $wk_check_id;
      
        } else {
      
        $wkja_id[] = $wk_check_id;
        }
    }



		
// -----------------------------------------------------------------------------------------


// #########################################################
// ++++++ die eigentliche Seite ++++++++++++++++++++++++++++
// #########################################################

echo "<FORM METHOD=\"post\" ACTION=\"../admin/admin_tipprunde.php?tiprunde=$tiprunde\">";

$tipname = TipName($tiprunde);
echo "<table $center cellspacing=15 border=0>";
$font = fontSizeColor(5, $txtcol17);
echo "<tr><td $center $cspn2>$font";
echo "$tipname - " . $lang_settings;
echo "</td></tr>";


echo "<tr><td $top>";
// -+-+-+-+-+-+-+- USER-UEBERSICHT -+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
// +-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
$font0 = fontSizeColor(1, "black"); // #33cc00
$font = fontSizeColor(2, "#33cc00"); // #33cc00
$font2 = fontSizeColor(2, $txtcol9); // #33cc00
$font3 = fontSizeColor(4, $txtcol8); // #33cc00

array_multisort ($userja_name, SORT_ASC, $userja_id);
array_multisort ($userno_name, SORT_ASC, $userno_id);

echo "<table $bgcolor1 cellspacing=5 $center border=1><tr>";
echo "<td $cspn2 $center>$font3 " . $lang_useroverview;
echo "</td></tr>";

$font3 = fontSizeColor(2, $txtcol12); // #33cc00
echo "<tr>";
echo "<td $center>$font3";
echo "<b>$lang_registered</b><br>$font0";
echo "$lang_registeredtxt";
$font3 = fontSizeColor(2, $txtcol11);
echo "</td><td $center>$font3";
echo "<b>$lang_notregistered </b><br>$font0";
echo "$lang_notregisteredtxt";
echo "</td></tr>";
echo "<tr><td $top $left>";
for ($i=0;$i<count($userja_id);$i++)
    {
    echo "<input type=\"checkbox\" name=\"userraus[]\" value=\"$userja_id[$i]\">$font $userja_name[$i] &nbsp;<br>";
    }

echo "</td><td $top $left>";
for ($i=0;$i<count($userno_id);$i++)
    {
    echo "<input type=\"checkbox\" name=\"userrein[]\" value=\"$userno_id[$i]\">$font2 $userno_name[$i] &nbsp;<br>";
    }
echo "</td></tr>";
echo "<tr><td $cspn2 $center><input type=\"submit\" name='" . $lang_buttonok . "' value='" . $lang_buttonok . "' border=\"0\"></td></tr>";
echo "</table>";
// +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+


echo "</td><td $top>";


// ------ Data`s Warnung ----------
echo "<table cellspacing=5 $center $bgcolor16 border=0><tr>";
echo "<td $center>";
$font = fontSizeColor(3, $txtcol6); echo $font;
echo "$lang_warning1<br>";
$font = fontSizeColor(1, $txtcol6);echo $font;
echo "<br>$lang_warning2";
echo "</td><td>";
echo "<img src=\"../img/data.JPG\">";
echo "</td></tr></table>";
echo "<br><br>";
// -+-+-+-+-+-+-+- WETTKAMPF-UEBERSICHT -+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-++-+-+-+-+-+-+-+-+-+-
// +-+-+-+-+-+-+-+-+-+-+--+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+




$font0 = fontSizeColor(1, "black"); // #33cc00
$font = fontSizeColor(2, "#33cc00"); // #33cc00
$font2 = fontSizeColor(2, $txtcol9); // #33cc00
$font3 = fontSizeColor(4, $txtcol8); // #33cc00

echo "<table $bgcolor22 cellspacing=5 $center border=1><tr>";
echo "<td $cspn2 $center>$font3 $lang_competitions";
echo "</td></tr>";

$font3 = fontSizeColor(2, $txtcol12); // #33cc00
echo "<tr>";
echo "<td $center>$font3";
echo "<b>" . $lang_registered . "</b><br>$font0";
echo "$lang_registeredtxt";
$font3 = fontSizeColor(2, $txtcol11);
echo "</td><td $center>$font3";
echo "<b>" . $lang_notregistered . "</b><br>$font0";
echo "$lang_notregisteredtxt";
echo "</td></tr>";
echo "<tr><td $top $left>";

for ($i=0;$i<count($wkja_id);$i++)
    {
    $dummy = $wkja_id[$i];
    $wkname = WKname($dummy);
    echo "<input type=\"checkbox\" name=\"wkraus[]\" value=\"$wkja_id[$i]\">$font $wkname &nbsp;<br>";
    }

echo "</td><td $top $left>";
for ($i=0;$i<count($wkno_id);$i++)
    {
    $dummy = $wkno_id[$i];
    $wkname = WKname($dummy);
    echo "<input type=\"checkbox\" name=\"wkrein[]\" value=\"$wkno_id[$i]\">$font2 $wkname &nbsp;<br>";
    }
echo "</td></tr>";
echo "<tr><td $cspn2 $center><input type=\"submit\" name='" . $lang_buttonok . "' value='" . $lang_buttonok . "' border=\"0\"></td></tr>";
echo "</table>";

echo "<br><br>";

// ----------- Passwort aendern
echo "<table cellspacing=5 $center $bgcolor6 border=0><tr>";
$font = fontSizeColor(2, $txtcol12);
echo "<td $center>$font $lang_grouppwd </td>";
echo "<td><input type=\"password\" name=\"tippwd\">";
echo "</td></tr>";

$font = fontSizeColor(2, $txtcol11);
echo "<td $center>$font $lang_confirm </td>";
echo "<td><input type=\"password\" name=\"tippwd2\">";
echo "</td></tr>";

echo "<tr><td $cspn2 $right><input type=\"submit\"  name='" . $lang_buttonok . "' value='" . $lang_buttonok . "'  border=\"0\"></td></tr>";
echo "</table>";



// +-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-
// -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

echo "</td></tr></table>";
echo "</FORM>";


include ('../user/user_footer.html');















?>