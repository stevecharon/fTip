<?php


// ++++ uebergeben werden muss die $lsid ++++++


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include("../script/SCRIPTteamlanguage.php");
//** ################## LOGBOT #########################
/**/         $logurl =   LogMalDieURL();           // ##
            $logip = GetEnv('REMOTE_ADDR');
/**/        $logpage = basename(__FILE__);         // ##
/**/    include ('../script/BOTlogbot.php');          // ##
/**/ // include ('../ftiproot/bot/logbot.php');    // ##
// #####################################################

$lsid = $_GET['lsid'];
$uid = $_SESSION['uid'];

//---------- which language should i use? ---------------------------------------------------
$spruch  = "SELECT user.language, language.suffix AS suffix FROM user ";
$spruch .= " INNER JOIN language ON user.language = language.id";
$spruch .= " WHERE user.id = $uid";
$result = mysql_query( $spruch, $db ) or die("failed : " . mysql_error() . " - " . $spruch );
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$langsuffix = $row['suffix'];

$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//--------------------------------------------------------------------------------------------


	$spruch = "SELECT heim_team_id, gast_team_id, datum,";
	$spruch .= " liga_spiel.tore_heim, tore_gast, done,";
	$spruch .= " team.name AS heim, team2.name AS gast,";
	$spruch .= " team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
	$spruch .= " WHERE liga_spiel.id = $lsid";
	
	$result = mysql_query($spruch, $db) or die ("GetSpielINFO failed: " . mysql_error() . "<br><br>" . $spruch);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$team1_id = $row['heim_team_id'];
	$team1_name = TeamLanguage($row['heim']);
	$team1_wappen = "<img src=\"../img/Wappen/" . $row['heimwappen'] . "\" width=20>";
	$team1_tore = $row['tore_heim'];
	$team2_id = $row['gast_team_id'];
	$team2_name = TeamLanguage($row['gast']);
	$team2_wappen = "<img src=\"../img/Wappen/" . $row['gastwappen'] . "\" width=20>";
	$team2_tore = $row['tore_gast'];
    $dbdatum = $row['datum'];
    
    $doneflag = $row['done'];

    //echo $dbdatum;
    $Anpfiff = ZeitStyle($dbdatum);
    // echo $Anpfiff;



$font  = fontSizeColor(4, $txtcol8);
$font1 = fontSizeColor(4, $txtcol9);
$font2 = fontSizeColor(4, $txtcol7);
$font3 = fontSizeColor(5, $txtcol13);
$font6 = fontSizeColor(1, $txtcol6);
echo "<table $center border=1>";
echo "<tr><td $cspn2 $center>";
     echo "<table $center border=0><tr>";
     echo "<td $right>$font ";
     echo $team1_name . "</td><td>" . $team1_wappen . "</td><td>&nbsp;$font2 - &nbsp;</td>";
     echo "<td>" . $team2_wappen . "</td>&nbsp;<td $left>$font1" . $team2_name . "</td></tr>";
//     echo "<tr><td $center $cspn5>$Anpfiff</td></tr>";
     echo "</table>";
echo "</td></tr>";


$font  = fontSizeColor(1, $txtcol8);
$font1 = fontSizeColor(1, $txtcol9);
$font2 = fontSizeColor(1, $txtcol7);
$font3 = fontSizeColor(2, $txtcol7);
echo "<tr><td $top>";

    echo "<table $center border=0><tr>";
     echo "<td $center>$font ";
     echo $team1_name . "</td><td $top>$font2 - </td>";
     echo "<td>$font1" . $team2_name . "</td></tr>";

    
	$spruch = "SELECT liga_spiel.id AS lsid, heim_team_id, gast_team_id, datum,";
	$spruch .= " liga_spiel.tore_heim, tore_gast, done";
	$spruch .= " FROM liga_spiel";
	$spruch .= " WHERE done=1";
	$spruch2 = $spruch;
	$spruch2 .= " AND heim_team_id = $team1_id AND gast_team_id = $team2_id";
	$spruch2 .= " ORDER BY datum DESC";
    $result2 = mysql_query($spruch2, $db) or die ("otherPaarung1 failed: " . mysql_error() . "<br><br>" . $spruch2);
	
	$spielzaehler = mysql_affected_rows ();
	$grosserzaehler = $spielzaehler;
	while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	{
	$paarung = $row2['lsid'];
	$dbzeit = $row2['datum'];
	$heimtore = $row2['tore_heim'];
	$gasttore = $row2['tore_gast'];
	$team1tore = ($team1tore + $row2['tore_heim']);
	$team2tore = ($team2tore + $row2['tore_gast']);
	$Anpfiff = ZeitStyle($dbzeit);
	
	echo "<tr>";
	echo "<td $cspn2>$Anpfiff</td>";
	echo "<td $center>" . $font3 . "$heimtore :" . $font3 . " $gasttore</td>";
	echo "</tr>";
	}
	if ($paarung != '')
	{
	echo "<tr><td $right $cspn2>$font3 $lang_durchschnitt";

	$team1schnitt = round ( ($team1tore / $spielzaehler));	
	$team2schnitt = round ( ($team2tore / $spielzaehler) );
	
	echo "<td $center><b>" . $font3 . $team1schnitt . "</b>";
	echo ": <b>" . $font3 . $team2schnitt . "</b></td>";
	} else { $keiner++; }
	echo "</tr></table>";

echo "</td><td $top>";

    echo "<table $center border=0><tr>";
     echo "<td $center>$font ";
     echo $team2_name . "</td><td size=2 $top>$font2 - </td>";
     echo "<td>$font1" . $team1_name . "</td></tr>";

    
	$spruch = "SELECT liga_spiel.id AS lsid, heim_team_id, gast_team_id, datum,";
	$spruch .= " liga_spiel.tore_heim, tore_gast, done";
	$spruch .= " FROM liga_spiel";
	$spruch .= " WHERE done=1";
	$spruch2 = $spruch;
	$spruch2 .= " AND heim_team_id = $team2_id AND gast_team_id = $team1_id";
	$spruch2 .= " ORDER BY datum DESC";
    $result2 = mysql_query($spruch2, $db) or die ("otherPaarung2 failed: " . mysql_error() . "<br><br>" . $spruch2);
    $spielzaehler = mysql_affected_rows ();
	$grosserzaehler = ($grosserzaehler + $spielzaehler);
	while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	{
	
	$paarung = $row2['lsid'];
	
	$dbzeit = $row2['datum'];
	$heimtore = $row2['tore_heim'];
	$gasttore = $row2['tore_gast'];
	$team2tore = ($team2tore + $row2['tore_heim']);
	$team1tore = ($team1tore + $row2['tore_gast']);
	$Anpfiff = ZeitStyle($dbzeit);
    $dummy1tore = ($dummy1tore + $row2['tore_heim']);
	$dummy2tore = ($dummy2tore + $row2['tore_gast']);
	$doedel++;
	echo "<tr>";
	echo "<td $right $cspn2>$Anpfiff</td>";
	echo "<td $center>" . $font3 . "$heimtore : " . $font3 . "$gasttore</td>";
	echo "</tr>";
	}
    if ($doedel > 0)
	{
	echo "<tr><td $cspn2 $right>$font3 $lang_durchschnitt";

	$dummy1schnitt = round ( ($dummy1tore / $spielzaehler));	
	$dummy2schnitt = round ( ($dummy2tore / $spielzaehler) );
	
	echo "<td $center><b>" . $font3 . $dummy1schnitt;
	echo "</b> : <b>" . $font3 . $dummy2schnitt . "</b></td>";
	} else { $keiner++; }
	echo "</tr></table>";

echo "</td></tr>";	
if ($keiner < 2)
	{
echo "<tr><td $cspn2 $center>$font3<b>$lang_gesamtschnitt $dreispace</b>";

	$team1gschnitt = round ( ($team1tore / $grosserzaehler));	
	$team2gschnitt = round ( ($team2tore / $grosserzaehler) );
echo $team1gschnitt . ":" . $team2gschnitt;
echo "</td>";
echo "</tr></table>";
} else { 

echo "</tr><tr><td $center $cspn2>$font6";
echo "$lang_nomatch</td>";
echo "</tr></table>";
}

?>









