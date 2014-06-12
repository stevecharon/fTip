<?php
include("../script/SCRIPTconnect.php");
function getAktuellerSpieltag($tiprunde, $wettkampfid) {
	global $db;
	$drdirk = 0;

	$spruch  = "SELECT akt_spieltag";
	$spruch .= " FROM wettkampf";
	$spruch .= " WHERE id=$wettkampfid";
	$result = mysql_query($spruch, $db);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$drdirk = $row['akt_spieltag'];
#		echo "< $drdirk >";
		break;
	}
	return $drdirk;
}
function getSpieltagPunkte($tiprunde, $wettkampfid, $spieltag) {
	global $db;
	$drdirk = array();

	$spruch  = "SELECT punkte, user.name";
	$spruch .= " FROM ranking";
	$spruch .= " INNER JOIN user ON ranking.user_id = user.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";
	$spruch .= " AND tippspiel_id = $tiprunde";
	$spruch .= " AND spieltag = $spieltag";
	$spruch .= " ORDER BY punkte DESC";
	$result = mysql_query($spruch, $db);
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$die_punkte = $row['punkte'];
		$der_user = $row['name'];
		$userpunkte = array($der_user, $die_punkte);
		$drdirk[] = $userpunkte ;
	}
	return $drdirk;
}
function getWettkampfPunkte($tiprunde, $wettkampfid, $spieltag) {
	global $db;
	$drdirk = array();

	$spruch  = "SELECT user_id, SUM(punkte) AS gesamtpunkte, user.name";
	$spruch .= " FROM ranking";
	$spruch .= " INNER JOIN user ON ranking.user_id = user.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";
	$spruch .= " AND tippspiel_id = $tiprunde";
	$spruch .= " AND spieltag>=1 AND spieltag <= $spieltag";
	$spruch .= " GROUP BY user_id";
	$spruch .= " ORDER BY gesamtpunkte DESC ";
	
	
	$result = mysql_query($spruch, $db);

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$die_punkte = $row['gesamtpunkte'];
		$der_user = $row['name'];
		$userpunkte = array($der_user, $die_punkte);
		$drdirk[] = $userpunkte ;
	}
	return $drdirk;
}

function getSaisonPlazierung($tiprunde,$wettkampfid,$uid) {
	global $db;
	$userid = $uid;
	$platzierungen = array();
	// wieviele spieltage gibt es ?
	$spruch  = "SELECT spieltage";
	$spruch .= " FROM wettkampf";
	$spruch .= " WHERE id = $wettkampfid";

	$result = mysql_query($spruch, $db);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$n = $row['spieltage'];
	// gehe alle spieltage durch
	for ($i=1;$i<=$n;$i++) {
		// -- DETEKTIV ! ___
		$spruch2  = "SELECT user_id";
		$spruch2 .= " FROM ranking";
		$spruch2 .= " WHERE wettkampf_id = $wettkampfid";
		$spruch2 .= " AND tippspiel_id = $tiprunde";
		$spruch2 .= " AND spieltag = $i";
		
		$result2 = mysql_query($spruch2, $db);
		$row2 = mysql_fetch_array($result2,MYSQL_ASSOC);
		$detektiv = $row2['user_id'];
		//------
	
	if (!$detektiv) { $platzierungen[$i-1] = 0; } 
	else {
		$spruch  = "SELECT user_id, SUM(punkte) AS gesamtpunkte";
		$spruch .= " FROM ranking";
		$spruch .= " WHERE wettkampf_id = $wettkampfid";
		$spruch .= " AND tippspiel_id = $tiprunde";
		$spruch .= " AND spieltag <= $i AND spieltag > 0";
		$spruch .= " GROUP BY user_id";
		$spruch .= " ORDER BY gesamtpunkte DESC";
		
		$result = mysql_query($spruch, $db);
		
		$rankdummy = 0;
		$flag=0;
		$aufschlag=0;
		while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
		{
			$der_user = $row['user_id'];
			$die_punkte = $row['gesamtpunkte'];
			if ($die_punkte == $alte_punkte) {  $aufschlag++; $flag=1; } 
			else { $rankdummy+=$aufschlag+1; $flag=0; $aufschlag=0; }
			if ($der_user == $userid) { $platzierungen[$i-1] = $rankdummy; }
			$alte_punkte = $die_punkte;
		}	// der zum WHILE

	} // der hier zum ELSE
		
	} // der gehört zur FOR schleife
return $platzierungen;
}
function getSpieltagPlazierung($tiprunde,$wettkampfid,$uid) {
	global $db;
	$userid = $uid;
	$platzierungen = array();
	// wieviele spieltage gibt es ?
	$spruch  = "SELECT spieltage";
	$spruch .= " FROM wettkampf";
	$spruch .= " WHERE id = $wettkampfid";

	$result = mysql_query($spruch, $db);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$n = $row['spieltage'];
	// gehe alle spieltage durch
	for ($i=1;$i<=$n;$i++) {
		// -- DETEKTIV ! ___
		$spruch2  = "SELECT user_id";
		$spruch2 .= " FROM ranking";
		$spruch2 .= " WHERE wettkampf_id = $wettkampfid";
		$spruch2 .= " AND tippspiel_id = $tiprunde";
		$spruch2 .= " AND spieltag = $i";
		
		$result2 = mysql_query($spruch2, $db);
		$row2 = mysql_fetch_array($result2,MYSQL_ASSOC);
		$detektiv = $row2['user_id'];
		//------
	
		if (!$detektiv) { $platzierungen[$i-1] = 0; } 
		else {
		
			$spruch  = "SELECT user_id, punkte";
			$spruch .= " FROM ranking";
			$spruch .= " WHERE wettkampf_id = $wettkampfid";
			$spruch .= " AND tippspiel_id = $tiprunde";
			$spruch .= " AND spieltag = $i";
			$spruch .= " ORDER BY punkte DESC";
		
			$result = mysql_query($spruch, $db);
		
			$rankdummy = 0;		
			$flag=0;
			$aufschlag=0;
			while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
			{
				$der_user = $row['user_id'];
				$die_punkte = $row['punkte'];
				if ($die_punkte == $alte_punkte) {  $aufschlag++; $flag=1; } 
				else { $rankdummy+=$aufschlag+1; $flag=0; $aufschlag=0; }
				if ($der_user == $userid) { $platzierungen[$i-1] = $rankdummy; }
				$alte_punkte = $die_punkte;
			}	// der zum WHILE
		}
#	echo "A$i> " . $platzierungen[$i-1] . "<br>\n";
	}

return $platzierungen;
}
function getSaisonPunkte($tiprunde,$wettkampfid,$uid) {
	global $db;
	$userid = $uid;
	$punkte = array();
	// wieviele spieltage gibt es ?
	$spruch  = "SELECT spieltage";
	$spruch .= " FROM wettkampf";
	$spruch .= " WHERE id = $wettkampfid";

	$result = mysql_query($spruch, $db);
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	$n = $row['spieltage'];
	// gehe alle spieltage durch
	for ($i=1;$i<=$n;$i++) {
		// -- DETEKTIV ! ___
		$spruch2  = "SELECT punkte";
		$spruch2 .= " FROM ranking";
		$spruch2 .= " WHERE wettkampf_id = $wettkampfid";
		$spruch2 .= " AND tippspiel_id = $tiprunde";
		$spruch2 .= " AND spieltag = $i";
		$spruch2 .= " AND user_id = $uid";
		$result2 = mysql_query($spruch2, $db);
		$row2 = mysql_fetch_array($result2,MYSQL_ASSOC);
		$punkte[] = $row2['punkte'];
	} // der gehört zur FOR schleife
return $punkte;
}

function User3210($wettkampfid, $spieltag, $userid)
{
	global $db;

	$gesamt = 0;
	$DREIer = 0; 
	$ZWEIer = 0; 
	$EINer = 0; 
	$NULLer = 0;
	// ++++ hole dir die spiele des tages und dazugehörige userpunkze raus
	
	$spruch  = "SELECT liga_spiel.id";
	$spruch .= ", liga_tip.punkte";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN liga_tip ON liga_spiel.id = liga_tip.liga_spiel_id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";
	$spruch .= " AND spieltag <= $spieltag AND $spieltag>0";
	$spruch .= " AND liga_tip.user_id = $userid";
	$result = mysql_query($spruch, $db);
	while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
		$die_punkte = $row['punkte'];
		if ($die_punkte == 0) $NULLer++;
		if ($die_punkte == 1) $EINer++;
		if ($die_punkte == 2) $ZWEIer++;
		if ($die_punkte == 3) $DREIer++;
		$gesamt++;
	}
	 return array($gesamt,$DREIer,$ZWEIer,$EINer,$NULLer);
}
function SpielID($wettkampf,$spieltag) {
}
?>
