<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTstyles.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##
$logpage .= "[WKid(" . $neue_wettkampf_id . ")";


//echo $neue_wettkampf_id;


function gibdenspieltagaus($index, $neue_wettkampf_id)
{
//	echo "der index aus der funktion $index blubb";
	include("../script/SCRIPTconnect.php");
    include ('../script/SCRIPTstyles.php');
	$logpage = basename(__FILE__);          // ##
    $logpage .= "[WKid(" . $neue_wettkampf_id . ") p(" . $index . ")]";
    if ($name = '') $name = "admin";
	
	$spruch = "SELECT wettkampf_team.id, wettkampf_id, team_id, team.name, wettkampf.saison";
	$spruch .= " FROM wettkampf_team";
	$spruch .= " LEFT JOIN team ON wettkampf_team.team_id = team.id";
	$spruch .= " LEFT JOIN wettkampf ON wettkampf_team.wettkampf_id = wettkampf.id";
	$spruch .= " WHERE wettkampf_id = $neue_wettkampf_id";

	$result = mysql_query($spruch, $db) or die("<b>GibSpieltag</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    
	$anzahl = mysql_num_rows($result);

	$w_t_tid = array();
	$w_t_n = array();

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$w_t_tid[] = $row['team_id'];
		$w_t_n[] = $row['name'];
		$wid = $row['wettkampf_id'];
		$saison = $row['saison'];
	}

	$team_id = $w_t_tid[$index];
	$spruch = "SELECT spieltag, datum, heim_team_id, gast_team_id FROM liga_spiel";
	$spruch .= " WHERE wettkampf_id = $neue_wettkampf_id AND (heim_team_id = $team_id OR gast_team_id = $team_id)";
	$spruch .= " ORDER BY spieltag";
	$result = mysql_query($spruch, $db) or die("<b>Paarungen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    
	$anzahl2 = mysql_num_rows($result);
	$l_s_heim = array();
	$l_s_gast = array();
	$l_s_datum = array();
	$l_s_spieltag = array();
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$l_s_spieltag[] = $row['spieltag'];
		$id = $row['spieltag'];
		$l_s_datum[$id] = $row['datum'];
		$l_s_heim[$id] = $row['heim_team_id'];
		$l_s_gast[$id] = $row['gast_team_id'];
	}
	$textstyle = fontType("black");
	
	echo "<FORM METHOD=\"post\" NAME=\"bundesliga\" ACTION=\"add_bundesliga.php\">";
	echo "<p $center> $textstyle <b>Bitte w&auml;hlen Sie die Spielpaarungen der Mannschaft";
	$textstyle = fontType($txtcol8);
	echo "$textstyle &quot; <b>$w_t_n[$index]</b>&quot;</b>";
	$textstyle = fontType("black");
	echo "<br>$textstyle Saison $saison";
	echo "<br><br>";
	
	echo "<TABLE $center BORDER=\"1\">";
	echo "<TR $bgcolor8>";
	echo "<TD  COLSPAN=\"2\" $center> $textstyle Heim</TD>";
	echo "<TD $center> $textstyle Datum<br>(mm.tt)</TD>";
	echo "<TD $right> $textstyle R&uuml;ckspiel<br>(mm.tt)</TD>";
	echo "</TR>";

	$team = $w_t_n[$index];
	$team_id = $w_t_tid[$index];

	for ($j=1;$j<$anzahl;$j++)
	{
		if ($l_s_heim[$j] == $team_id || $l_s_gast[$j] == $team_id)
		{
//			echo "bin hier";
//			echo "${l_s_datum[$j]}";
//			echo "${l_s_datum[$j+$anzahl]}";
//			echo "$l_s_heim[$j] : $team_id : $l_s_gast[$j]";
			if ($l_s_heim[$j] == $team_id)
			{
				$checked1 = "checked = \"checked\"";
				$checked2 = "";
				$gegner_id = $l_s_gast[$j];
			} else {
				$checked2 = "checked = \"checked\"";			
				$checked1 = "";
				$gegner_id = $l_s_heim[$j];
			}
			$datum_hin = ereg_replace("-", ".", substr("${l_s_datum[$j]}", 5));
			$datum_rueck = ereg_replace("-", ".", substr("${l_s_datum[($j)+($anzahl-1)]}", 5));
		}

		echo "<TR $bgcolor7>";
		echo "<TD $right>";
		$textstyle = fontType("black");
		echo " $textstyle $j &nbsp;&nbsp;";
		$textstyle = fontType($txtcol9);	
		echo " $textstyle $team";
		echo "<INPUT TYPE=\"Radio\" NAME=\"spielnr_$j\" $checked1 VALUE=\"$w_t_tid[$index]\">";
		echo " : </TD><TD $left>";
		echo "<INPUT TYPE=\"Radio\" NAME=\"spielnr_$j\" $checked2 VALUE=\"0\">";
		unset($w_t_n[$index]);		
		echo "<select name=\"gegner_$j\" size=\"1\">";
		for ($i=0;$i<count($w_t_tid);$i++)
		{
			if (empty($w_t_n[$i]))
			{
				next;
			} else {
				if ($gegner_id == $w_t_tid[$i])
				{
					$selected = "selected";
					$w_t_tid[$i] = "ausdb";
				} else {
					$selected = "";
				}
				echo "<OPTION $selected VALUE=\"$w_t_tid[$i]\">$w_t_n[$i]</OPTION>";
			}
		}
		echo "</SELECT><TD ALIGN=\"center\">";
		echo "<INPUT TYPE=\"text\" maxlength=\"5\" size=\"5\" NAME=\"datum_hin_$j\" VALUE=\"$datum_hin\">";
		echo "</TD><TD ALIGN=\"right\">";
		echo "<INPUT TYPE=\"text\" maxlength=\"5\" size=\"5\" NAME=\"datum_rueck_$j\" VALUE=\"$datum_rueck\">";
		echo "</TD></TR>";
		unset ($checked1);
		unset ($checked2);
		unset ($datum_hin);
		unset ($datum_rueck);
	}
	echo "<TR $bgcolor8><TD COLSPAN=\"3\" ALIGN=\"right\">";
	echo "<input type=\"reset\"value=\"Zur&uuml;cksetzen\" border=\"0\">&nbsp;";
	echo "<input type=\"submit\" value=\"Erstellen\" name=\"submitButtonName\" border=\"0\">";
	echo "</TD><td>&nbsp;</TD><";
	echo "/TR></TABLE>";
	echo "<input type=\"hidden\" NAME=\"anzahl\" VALUE=\"$anzahl\">";
	echo "<input type=\"hidden\" NAME=\"index\" VALUE=\"$index\">";
	echo "<input type=\"hidden\" NAME=\"team_id\" VALUE=\"$team_id\">";
	echo "<input type=\"hidden\" NAME=\"wid\" VALUE=\"$wid\">";
	echo "<input type=\"hidden\" NAME=\"saison\" VALUE=\"$saison\">";
    echo "<input type=\"hidden\" NAME=\"neue_wettkampf_id\" VALUE=\"$neue_wettkampf_id\">";
	echo "</FORM>";
	include ('../user/user_footer.html');
}

if ($anzahl)
{
	if($anzahl == $index)
	{
		echo "Fertitsch";
		$logpage .= " FERTIG]";
	    include ('../user/user_footer.html');
		exit();
	}
	if($nothefirst)
	{
		gibdenspieltagaus($index, $neue_wettkampf_id);
	}
	if ($anzahl and $gegner_1)
	{
		include("../script/SCRIPTconnect.php");
		$index = $index + 1;
		echo "<FORM METHOD=\"post\" NAME=\"bundesliga\" ACTION=\"add_bundesliga.php\">";
		for ($i=1;$i<$anzahl;$i++)
		{
			$datum_hin = "datum_hin_$i";
			$datum_rueck = "datum_rueck_$i";
			$gegner = "gegner_$i";
			$heim = "spielnr_$i";

			if (${$gegner} == "ausdb")
			{
			} else {
				$spruch = "SELECT name FROM team WHERE id = ${$gegner}";
				$result = mysql_query($spruch, $db);
				$row = mysql_fetch_row($result);
				$gegner_name = "$row[0]";

				$spruch = "SELECT name FROM team WHERE id = $team_id";
				$result = mysql_query($spruch, $db);
				$row = mysql_fetch_row($result);
				$team_name = "$row[0]";
			}

			if (${$heim} == $team_id)
			{
			#echo "<BR>$team_name spielt zu hause gegen $gegner_name am ${$datum_hin} R&uuml;ckspiel am ${$datum_rueck}<BR>";
			} else {
				${$heim} = "${$gegner}";
				${$gegner} = "$team_id";
				#echo "<BR>$team_name spielt ausw&auml;rts gegen $gegner_name am ${$datum_hin} R&uuml;ckspiel am ${$datum_rueck}<BR><BR>";
			}

			$jahr = array();
			$jahr = explode("/",$saison);
			$hin = "${jahr[0]}.${$datum_hin}";
			$rueck = "${jahr[1]}.${$datum_rueck}";
			#echo "$hin<BR>";
			#echo "$rueck<BR>";
			${$datum_hin} = ereg_replace("\.", "-", "$hin");
			${$datum_rueck} = ereg_replace("\.", "-", "$rueck");

			#echo "<BR>IIIIIIIIIIIIIIIIIIII<BR>";
			#echo "$i";
			#echo "<BR>nbbbbb<BR>";
			#echo "${$gegner}";
			#echo "${$heim}";
			if (${$gegner} == "ausdb" || ${$heim} == "ausdb")
			{
				$spruch = "";
				$spruch2 = "";
			} else {
				$spruch = "INSERT INTO liga_spiel (wettkampf_id, spieltag, datum, heim_team_id, gast_team_id, done)";
				$spruch .= " VALUES ($wid, $i, '${$datum_hin}', ${$heim}, ${$gegner}, 0)";

				$spruch2 = "INSERT INTO liga_spiel (wettkampf_id, spieltag, datum, heim_team_id, gast_team_id, done)";
				$spruch2 .= " VALUES ($wid, ($i + ($anzahl - 1)), '${$datum_rueck}', ${$gegner}, ${$heim}, 0)";

				//echo "Hinspiel : $spruch<BR>";
				//echo "R&uuml;ckspiel : $spruch2<BR>";
				$result = mysql_query($spruch, $db);
				$number = mysql_insert_id();
				//echo "$number<BR>";
				//echo "<P>".mysql_error($db);
				$result2 = mysql_query($spruch2, $db);
				$number = mysql_insert_id();
				//echo "$number<BR>";
				//echo "<P>".mysql_error($db);
			}
		}
		#echo "$anzahl<BR>";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"nothefirst\">";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"$anzahl\" NAME=\"anzahl\">";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"$index\" NAME=\"index\">";
	    echo "<input type=\"hidden\" NAME=\"neue_wettkampf_id\" VALUE=\"$neue_wettkampf_id\">";
		echo "<input type=\"submit\" value=\"Weiter\" name=\"submitButtonName\" border=\"0\">";
		echo "</FORM>";
		echo "Anzahl der fertig gepaarten Mannschaften : $index";
		$logpage .= " p(" . $index . ") db]";
	    include ('../user/user_footer.html');
	}
} else {
	$index = 0;
	gibdenspieltagaus($index, $neue_wettkampf_id);
	include ('../user/user_footer.html');
}
?>
