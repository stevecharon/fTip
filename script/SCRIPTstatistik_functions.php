<?phpinclude ("SCRIPTconnect.php");function SpieltagPunkte($userid, $wettkampfid, $spieltag){include ("SCRIPTconnect.php");$spruch  = "SELECT punkte FROM ranking";$spruch .= " WHERE user_id = $userid";$spruch .= " AND spieltag = $spieltag";$spruch .= " AND wettkampf_id = $wettkampfid";$result = mysql_query($spruch, $db);$row = mysql_fetch_array($result,MYSQL_ASSOC);$spieltagPunkte = $row['punkte'];return $spieltagPunkte;}// +++ Abst�nde +++++++function Abstaende($wettkampfid, $tiprunde, $spieltag){include ("SCRIPTconnect.php");global $uid;$userid = $uid;     // tu diese zeile wieder rein f�r global userid....// $userid = 5;  // PRODUNIS... nimm diese ziele wieder raus...#include ('SCRIPTlanguage.php');$langsuffix = Whichlanguage($db, $uid);include ("../languages/" . $langsuffix . "/statistik_functions." . $langsuffix);if (!$spieltag)	{	// wieviele spieltage gibt es ?	$spruch  = "SELECT akt_spieltag";	$spruch .= " FROM wettkampf";	$spruch .= " WHERE id = $wettkampfid";	$result = mysql_query($spruch, $db);	$row = mysql_fetch_array($result,MYSQL_ASSOC);	$spieltag = $row['akt_spieltag'];	}$schnitt_punkte = array();$schnitt_user = array();	$spruch  = "SELECT user_id, SUM(punkte) AS gesamtpunkte, user.name";$spruch .= " FROM ranking";$spruch .= " LEFT JOIN user ON ranking.user_id = user.id";$spruch .= " WHERE wettkampf_id = $wettkampfid";$spruch .= " AND tippspiel_id = $tiprunde";$spruch .= " AND spieltag <= $spieltag";$spruch .= " AND spieltag > 0";$spruch .= " GROUP BY user_id";$spruch .= " ORDER BY gesamtpunkte DESC";		$result = mysql_query($spruch, $db);		$rankdummy = 0;$alte_punkte = 0;$alte_id = "";$notthefirst = 0;$aufschlag=0;while ($row = mysql_fetch_array($result,MYSQL_ASSOC))	{	$der_user_name = $row['name'];			$der_user = $row['user_id'];	$die_punkte = $row['gesamtpunkte'];				if ($die_punkte == $alte_punkte) 			{  			$aufschlag++; 			$dasflag=1;			} else { 			        if ($dasflag==1) {                        $rankdummy = ($rankdummy + 1 + $aufschlag);                        $aufschlag=0;                        $dasflag=0;                        $vormirname_dummy = $alte_name;						$vormirpunkte_dummy = $alte_punkte;				    } else {				        $rankdummy++; 						$vormirname_dummy = $alte_name;						$vormirpunkte_dummy = $alte_punkte;				    }				    		    }				if ($rankdummy ==1)	 {	 $erster_name = $der_user_name; $erster_punkte = $die_punkte;	 }		if ( ($notthefirst == 1) AND ($my_rank < $rankdummy) )		{		$notthefirst = 2;		$nach_mir_name = $der_user_name;		$nach_mir_punkte = $die_punkte;		}		if ($der_user == $userid) 		{		$my_rank = $rankdummy; 		$my_punkte = $die_punkte;		$vor_mir_name = $vormirname_dummy;		$vor_mir_punkte = $vormirpunkte_dummy;			$notthefirst = 1;		}						$alte_punkte = $die_punkte;	$alte_name = $der_user_name;	$vormirname_dummy = $alte_name;	$vormirpunkte_dummy = $alte_punkte;		$schnitt_punkte[] = ($die_punkte / $spieltag);	$schnitt_user[] = $der_user_name;			}	// der zum WHILE		// ----- abstaende vorbereiten -----------------------------$abstand_erster = ($erster_punkte - $my_punkte);$abstand_vorheriger = ($vor_mir_punkte - $my_punkte);$abstand_naechster = ($my_punkte - $nach_mir_punkte);// ---- durchschnitt vorbereiten -------------------------------------------------// + + + mein schnitt + + + + + $my_schnitt = ($my_punkte / $spieltag);$my_schnitt = round ($my_schnitt, 2);// + + + bester schnitt + + + array_multisort ($schnitt_punkte, SORT_DESC, SORT_NUMERIC, $schnitt_user);$puenktli = round($schnitt_punkte[0], 2);$best_schnitt_punkte = $puenktli;$best_schnitt_user = $schnitt_user[0];// - - - miesester schnitt - - - array_multisort ($schnitt_punkte, SORT_NUMERIC, $schnitt_user);$puenktli = round($schnitt_punkte[0], 2);$worst_schnitt_punkte = $puenktli;$worst_schnitt_user = $schnitt_user[0];// ### aufraeumen ####$schnitt_user = "";$schnitt_punkte = "";// -------------------------------------------------------------------------------// ###### ab hier wird f�r die seite graphisch rausgerotzt ################include ('../script/SCRIPTstyles.php');$font0 = fontSizeColor(2, $txtcol7);	$font1 = fontSizeColor(2, $txtcol8);$font2 = fontSizeColor(2, $txtcol9);$font3 = fontSizeColor(2, $txtcol11);//include ('../script/SCRIPTinclude.php');			// bin ich erster ?! echo "<br>";$welcherWK = WKname($wettkampfid);$font = fontSizeColor(2, $txtcol17);  // 17echo "$font &nbsp; " . $welcherWK . " $font0 (Spieltag " . $spieltag . ") :";echo "$font1 $lang_f_yourrank ";$font = fontSizeColor(2, $txtcol22); // 12echo "$font" . $my_rank;$vor_rank = ($my_rank - 1);$nach_rank = ($my_rank + 1);	if ($my_rank > 2)	{	echo "<br>$font1 $dreispace $lang_f_nextrank " . $vor_rank . " (";	echo "$font2" . $vor_mir_name;	echo "$font1" . "): ";	echo "$font3" . $abstand_vorheriger . " ";	echo "$font1 $lang_f_points";	}echo "<br> $font1 $dreispace $lang_f_nextrank " . $nach_rank . " (";echo "$font2" . $nach_mir_name;echo "$font1" . "): ";echo "$font3" . $abstand_naechster . " ";echo "$font1 $lang_f_points <br>";if ($my_rank > 1) 	{	echo "$font1 $dreispace $lang_f_firstrank (";	echo "$font2" . $erster_name;	echo $font1 . "): ";	echo "$font3" . $abstand_erster . " ";	echo "$font1 $lang_f_points<br>";	}echo "$font1" . $dreispace . " $lang_f_meanpoints ";	echo "$font3" . $my_schnitt . " ";	echo "$font1 $lang_f_pointsperday";echo "<br>$font1" . $dreispace .  $lang_f_bestmean . ": ";echo "$font3" . $best_schnitt_punkte . " $font1 $lang_f_points2 (";echo "$font2" . $best_schnitt_user . "$font1)";echo "<br>$font1" . $dreispace .  $lang_f_worstmean . ": ";echo "$font3" . $worst_schnitt_punkte . " $font1 $lang_f_points2 (";echo "$font2" . $worst_schnitt_user . "$font1)";return $my_rank;}function User3210($wettkampfid, $spieltag){include ("SCRIPTconnect.php");global $uid;#include ('SCRIPTlanguage.php');$langsuffix = Whichlanguage($db, $uid);include ("../languages/" . $langsuffix . "/statistik_functions." . $langsuffix);$userid = $uid;     // tu diese zeile wieder rein f�r global userid....// $userid = 5;  // PRODUNIS... nimm diese ziele wieder raus...		$kartenabreisser = 0;	$DREIer = 0; 	$ZWEIer = 0; 	$EINer = 0; 	$NULLer = 0;	// ++++ hole dir die spiele des tages und dazugeh�rige userpunkze raus		$spruch  = "SELECT liga_spiel.id";	$spruch .= ", liga_tip.punkte";	$spruch .= " FROM liga_spiel";	$spruch .= " LEFT JOIN liga_tip ON liga_spiel.id = liga_tip.liga_spiel_id";	$spruch .= " WHERE wettkampf_id = $wettkampfid";	$spruch .= " AND spieltag <= $spieltag";	$spruch .= " AND liga_tip.user_id = $userid";	$result = mysql_query($spruch, $db);	while ($row = mysql_fetch_array($result,MYSQL_ASSOC))		{		$die_punkte = $row['punkte'];						if ($die_punkte == 0) $NULLer++;		if ($die_punkte == 1) $EINer++;		if ($die_punkte == 2) $ZWEIer++;		if ($die_punkte == 3) $DREIer++;		$kartenabreisser++;		}	// ok, hier ist der Spieltag durch, �bergebe alles in nen array...	//--- oder wie hier: rotze was graphisch f�r die seite raus$font = fontSizeColor(2, "black");echo "$font<br><br>$lang_f_allmatches : " .$kartenabreisser;$font = fontSizeColor(2, "#58d858"); // #33cc00echo "$font<br>$lang_f_three : $font" . $DREIer; $font = fontSizeColor(2, "#3399ff");echo "$font<br>$lang_f_two : $font" . 	$ZWEIer; $font = fontSizeColor(2, "#cc9900");echo "$font<br>$lang_f_one : $font" . 	$EINer; $font = fontSizeColor(2, "#ff0033");echo "$font<br>$lang_f_zero : $font" . 	$NULLer;}function BesterDuemmster($wettkampfid, $tiprunde, $seite){include ("SCRIPTconnect.php");global $uid;#include ('SCRIPTlanguage.php');$langsuffix = Whichlanguage($db, $uid);include ("../languages/" . $langsuffix . "/statistik_functions." . $langsuffix);$bester_user = array();$bester_user_spieltag = array();$duemmster_user = array();$duemmster_user_spieltag = array();$i = 0;$rankdummy = 0;$alte_punkte = 0;$ntf = 0;$spruch  = "SELECT punkte, user_id, spieltag, user.name";$spruch .= " FROM ranking";$spruch .= " LEFT JOIN user ON ranking.user_id = user.id";$spruch .= " WHERE tippspiel_id = $tiprunde";$spruch .= " AND wettkampf_id = $wettkampfid";$spruch .= " ORDER BY punkte DESC";$result = mysql_query($spruch, $db);while ($row = mysql_fetch_array($result,MYSQL_ASSOC))	{		$am_spieltag = $row['spieltag'];	$dieser_user = $row['user_id'];	$user_name = $row['name'];	$user_punkte = $row['punkte'];		if ($alte_punkte == $user_punkte) { $nixzubedeuten++; } else { $rankdummy++; }			if ($rankdummy == 1)		{		$bester_punkte = $user_punkte;		$bester_user[] = $user_name;		$bester_user_spieltag[] = $am_spieltag;		}		if ($dieser_user == $uid AND $ntf == 0)		{		$my_best_punkte = $user_punkte;		$my_best_spieltag = $am_spieltag;		$ntf = 1;		}				if ($dieser_user == $uid AND $ntf == 1 AND $user_punkte > 0)		{		$my_worst_punkte = $user_punkte;		$my_worst_spieltag = $am_spieltag;		$ntf = 1;		}			if ($user_punkte > 0)		{				$duemmster_punkte = $user_punkte;		if ($user_punkte == $alte_punkte) { $nixzubedeuten++; } else {						$duemmster_user = "";			$duemmster_user_spieltag = "";			}		$duemmster_user[] = $user_name;		$duemmster_user_spieltag[] = $am_spieltag;		}	$alte_punkte = $user_punkte;		}// #### so, entweder hier in nen array alles reinpacken ######// ### oder graphisch was f�r die seite rausrotzen ########include ('../script/SCRIPTstyles.php');$font1 = fontSizeColor(2, $txtcol8);  // 8$font2 = fontSizeColor(2, $txtcol11);  //4$font3 = fontSizeColor(1, $txtcol7);$font4 = fontSizeColor(2, $txtcol9);echo "<table width=400 border=0 $center><tr><td>";echo "$font1<br>$lang_f_mybestresult :  ";echo "$font2" . $my_best_punkte . " $font1 $lang_f_points2 ";echo "$font3" . " (";echo "<a href=\"" . $seite . "&spieltag=$my_best_spieltag\">$font3";echo  $my_best_spieltag . ".</a> $lang_f_matchday)";echo "<br>$font1 $lang_f_myworstresult :  ";echo "$font2" . $my_worst_punkte . " $font1 $lang_f_points ";echo "$font3" . " (";echo "<a href=\"" . $seite . "&spieltag=$my_worst_spieltag\">$font3";echo  $my_worst_spieltag . ".</a> $lang_f_matchday)";echo "<br><br>";echo "$font1  $lang_f_thebestresult ";echo "$font2" . $bester_punkte;echo "$font1" . " $lang_f_points3 : ";$dummy = 0;for ($o=0;$o<count($bester_user);$o++)	{	$dummy++;		if ($dummy > 1) {  echo $font1 . ", ";  }	echo "$font4" . $bester_user[$o];	echo "$font3" . " (";	echo "<a href=\"" . $seite . "&spieltag=$bester_user_spieltag[$o]\">$font3";	echo $bester_user_spieltag[$o] . ".</a> $lang_f_matchday)";	}echo "<br>$font1 $lang_f_theworstresult ";echo "$font2" . $duemmster_punkte;echo "$font1" . " $lang_f_points3 : ";$dummydummy = 0;for ($o=0;$o<count($duemmster_user);$o++)	{	$dummydummy++;	if ($dummydummy > 1) echo $font1 . ", ";	echo "$font4" . $duemmster_user[$o];	echo "$font3" . " (";	echo "<a href=\"" . $seite . "&spieltag=$duemmster_user_spieltag[$o]\">$font3";	echo $duemmster_user_spieltag[$o] . ".</a> $lang_f_matchday)";	}echo "</td></tr></table>";echo "<br>";}function PunkteDurchTeam($wettkampfid, $userid){// ##################################################################################// ############ mit welchem team hol ICH die meisten punkte ? ####################// ##################################################################################include ("SCRIPTconnect.php");global $uid;include ('../script/SCRIPTstyles.php');include("../script/SCRIPTteamlanguage.php");#include ('SCRIPTlanguage.php');$langsuffix = Whichlanguage($db, $uid);include ("../languages/" . $langsuffix . "/statistik_functions." . $langsuffix);// mitmachende teams raussuchen$teams_ids = array();$teams_punkte = array();$team_names = array();$team_wappens = array();$spruch  = "SELECT id, heim_team_id AS heimid, gast_team_id AS gastid";$spruch .= " FROM liga_spiel";$spruch .= " WHERE done = 1";$spruch .= " AND wettkampf_id = $wettkampfid";$result = mysql_query($spruch, $db);while ($row = mysql_fetch_array($result,MYSQL_ASSOC))	{	$spiel_id = $row['id'];	$heim = $row['heimid'];	$gast = $row['gastid'];		$spruch2  = "SELECT punkte";	$spruch2 .= " FROM liga_tip";	$spruch2 .= " WHERE user_id = $userid";	$spruch2 .= " AND liga_spiel_id = $spiel_id";//	echo $spruch2;	$result2 = mysql_query($spruch2, $db);	$row2 = mysql_fetch_array($result2,MYSQL_ASSOC);		$punkte = $row2['punkte'];//	echo "<br> Der User bekam f�r spiel " . $spiel_id . "&nbsp; ---> " . $punkte . " Punkte.....";	$teams_punkte_{$heim} = ($teams_punkte_{$heim} + $punkte);	$teams_punkte_{$gast} = ($teams_punkte_{$gast} + $punkte);	}$spruch  = "SELECT team_id, team.name AS name, team.wappen_src AS wappen";$spruch .= " FROM wettkampf_team";$spruch .= " LEFT JOIN team ON wettkampf_team.team_id = team.id";$spruch .= " WHERE wettkampf_id = $wettkampfid";$result = mysql_query($spruch, $db);while ($row = mysql_fetch_array($result,MYSQL_ASSOC))	{	$das_team = $row['team_id'];	$team_names[] = TeamLanguage($row['name']);	$team_wappens[] = $row['wappen'];	$teams_ids[] = $das_team;	$teams_punkte[] = $teams_punkte_{$das_team};	}// -------------------------------------------------------------------------// ++++++++ graphisch alles anzeigen ++++++++++++++++++++++++++++++++++ echo "<table $center $bgcolor2 border=0 cellspacing=4>";$textstyle = fontSizeColor(3, "black");echo "<tr $bgcolor4><td  $bgcolor4 $cspn3 $center >$textstyle $lang_f_pointsperteam</td></tr>";array_multisort ($teams_punkte, SORT_DESC, SORT_NUMERIC, $teams_ids, $team_names, $team_wappens);for ($o=0;$o<count($teams_ids);$o++)	{	echo "<tr $bgcolor1>";		echo "<td valign=\"middle\" $center >";	echo "<img $border0 height=\"15\" src=\"../img/Wappen/";	echo $team_wappens[$o];	echo "\" alt=\"";	echo $team_names[$o];	echo "\">";	echo "</td>";	echo "<td valign=\"middle\" $left >&nbsp;";	$textstyle = fontSizeColor(2, $txtcol8);	echo "$textstyle";	echo $team_names[$o];	echo "&nbsp;</td>";	echo "<td valign=\"middle\" $right >&nbsp;";	$textstyle = fontSizeColor(2, $txtcol9);	echo "$textstyle";	echo $teams_punkte[$o];	echo "&nbsp;</td>";			echo "</tr>";	}echo "</table>";// -------------------------------------------------------------------------// ##################################################################################// ##################################################################################}?>