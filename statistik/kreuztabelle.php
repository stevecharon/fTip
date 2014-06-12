<?php

	// ###***+++ Der Standard-Admin-Kopf +++***###
/*
include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
//include ('admin_header.php');

	// ####****++++-------------------++++****####
	
	
// ''''''''''''''' HARDCODE !! '''''''''''''''''''''''''''''''	
$wettkampfid = 1; $tiprunde = 1; $spieltag = 3;
$bgcolor46 = "bgcolor=\"#aa0000\""; // ROT


echo $wettkampfid . " - ";
echo $tiprunde . " - ";
echo $spieltag . " - ";
// '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

*/
// ################################################################################################################
// ############################ Daten vorbereiten #################################################################

	$spruch = "SELECT liga_spiel.id AS lsid, datum, heim_team_id, gast_team_id,";
	$spruch .= " liga_spiel.tore_heim, tore_gast, done,";
	$spruch .= " team.name AS heim, team2.name AS gast,";
	$spruch .= " team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen, datum";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";
	$spruch .= " AND spieltag = $spieltag AND done=1";
	
	$result = mysql_query($spruch, $db) or die ("GetSpielINFO failed: " . mysql_error() . "<br><br>" . $spruch);
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
    $lsid = $row['lsid'];
    
    $id_sammlung[] = $row['lsid'];
    
    $heimwappen[$lsid] = "<img src=\"../img/Wappen/" . $row['heimwappen'] . "\" width=15>";
    $gastwappen[$lsid] = "<img src=\"../img/Wappen/" . $row['gastwappen'] . "\" width=15>";
    $tore_heim[$lsid] = $row['tore_heim'];
    $tore_gast[$lsid] = $row['tore_gast'];
    
        // Usertipsraussuchen --------------------------------------------------
    $spruch2  = "SELECT user_id, heim_tip, gast_tip, punkte, user.name FROM liga_tip";
    $spruch2 .= " LEFT JOIN user ON liga_tip.user_id = user.id";
    $spruch2 .= " WHERE liga_spiel_id = $lsid";
    $spruch2 .= " ORDER BY name";
    $result2 = mysql_query($spruch2, $db) or die ("GetUserTips failed: " . mysql_error() . "<br><br>" . $spruch2);
	while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	    {
	    $dummy = $row2['user_id'];
	    
	    // +++++ DETEKTIV +++++++++++++++++++++++++++++
	    $spruch3 = "SELECT id FROM tippspiel_user WHERE tippspiel_id = $tiprunde AND user_id = $dummy";
	    $result3 = mysql_query($spruch3, $db) or die ("Detektiv failed: " . mysql_error() . "<br><br>" . $spruch3);
	    $row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
	    $detektiv = $row3['id'];
	    // +++++++++++++++++++++++++++++++++++++++++++
	    if ($detektiv != '')
            {
            $users_ids[$dummy] = $dummy;
            $users_names[$dummy] = $row2['name'];
            
            $userpunkte_{$lsid}{$dummy} = $row2['punkte'];
            $userheimtip_{$lsid}{$dummy} = $row2['heim_tip'];
            $usergasttip_{$lsid}{$dummy} = $row2['gast_tip'];
            //echo $userpunkte_{$lsid}{$dummy} . " -- ";
            }
	    
	    }
        // ---------------------------------------------------------------------
    //echo "<br><br>";
    }
// ################################################################################################################
// ################################# graphisch ausrotzen ##########################################################

if ($users_names != '')
{

$font  = fontSizeColor(1, $txtcol8);
$font1 = fontSizeColor(1, $txtcol7);
$font2 = fontSizeColor(1, $txtcol9);
$font3 = fontSizeColor(5, $txtcol13);
$font4 = fontSizeColor(1, "white");


echo "<p $center>$font3";
echo $lang_kreuztabelle . "</p>";

echo "<table border=1 cellspacing=5 $center>";
echo "<tr>";
// Erste Zeile :  Wappen und Ergebnisse
    echo "<td $center>$font1 " . $lang_kmatchday . ": $spieltag </td>";
    
    for ($i=0;$i<count($id_sammlung);$i++)
    {
    $diesesspiel = $id_sammlung[$i];
    echo "<td $center $bgcolor8 >";
    echo $heimwappen[$diesesspiel] . "$font1 vs. " . $gastwappen[$diesesspiel] . "<br>$font";
    echo $tore_heim[$diesesspiel] . " : " . $tore_gast[$diesesspiel];
    echo "</td>";
    
    }
echo "<td $center>$font1 " . $lang_ktotal . ":</td>";
echo "</tr>";


// Jetzt fuer jeden User

array_multisort ($users_names,  SORT_ASC, $users_ids);

for ($u=0;$u<count($users_ids);$u++)
{
$usersid = $users_ids[$u];
$usersname = $users_names[$u];
echo "<tr>";
    echo "<td $right $bgcolor4>$font2 $usersname &nbsp;</td>";
    
    
    for ($i=0;$i<count($id_sammlung);$i++)
    {
    $hier = $id_sammlung[$i];
    
    $bekommen = $userpunkte_{$hier}{$usersid};
    $heimgetippt = $userheimtip_{$hier}{$usersid};
    $gastgetippt = $usergasttip_{$hier}{$usersid};
    
    if ($bekommen == 0) { $farbe = $bgcolor46; $font1 = fontSizeColor(1, "#fffgaa");  } // Kein Punkt, ROT
    if ($bekommen == 1) {$farbe = $bgcolor6;  $font1 = fontSizeColor(1, $txtcol7);}// 1 Punkt, GELB ....
    if ($bekommen == 2) {$farbe = $bgcolor13; $font1 = fontSizeColor(1, $txtcol7); }// 2 Punkte, BLAU ....
    if ($bekommen == 3) {$farbe = $bgcolor11; $font1 = fontSizeColor(1, $txtcol7);} // 3 Punkte, GRUEN ...
    echo "<td $farbe $center>$font1";
    echo $heimgetippt . " : " . $gastgetippt;
    
    echo "</td>";
    $gesamtpunkte = ($gesamtpunkte + $bekommen);
    }
    
    echo "<td $center>$font $gesamtpunkte</td>";  
    $gesamtpunkte = 0;
    
echo "</tr>";
}

echo "</table>";

echo "<table border=1 cellspacing=5 $center><tr>";
echo "<td $center $bgcolor46>" . $font4 . "&nbsp;0 " . $lang_kpoints . "&nbsp;</td>";
echo "<td $center $bgcolor6>" . $font . "&nbsp;1 " . $lang_kpoint . "&nbsp;</td>";
echo "<td $center $bgcolor13>" . $font . "&nbsp;2 " . $lang_kpoints . "&nbsp;</td>";
echo "<td $center $bgcolor11>" . $font . "&nbsp;3 " . $lang_kpoints . "&nbsp;</td>";
echo "</tr></table>";
// nenn mich gott.... ;-)

}






?>













