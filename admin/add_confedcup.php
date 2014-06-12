<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTstyles.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##
$logpage .= "[WKid(" . $neue_wettkampf_id . ")";





function gibdenspieltagaus($index, $gruppe, $wettkampfid)
{
//	echo "der index aus der funktion $index blubb";
	include("../script/SCRIPTconnect.php");
	#include("../script/SCRIPTinclude.php");
	include("../script/SCRIPTstyles.php");
	/**/        $logpage = basename(__FILE__);          // ##
    $logpage .= "[WKid(" . $neue_wettkampf_id . ")";
    $logpage .= " p(" . $index . ")]";
    if ($name = '') $name = "admin";
	echo "$gruppe";
		
	$spruch = "SELECT wettkampf_team.id, wettkampf_id, gruppe, team_id, team.name, wettkampf.saison FROM wettkampf_team";
	$spruch .= " LEFT JOIN team ON wettkampf_team.team_id = team.id";
	$spruch .= " LEFT JOIN wettkampf ON wettkampf_team.wettkampf_id = wettkampf.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";
	$spruch .= " AND gruppe = '$gruppe'";
    #echo $spruch;
	$result = mysql_query($spruch, $db);
	$anzahl = mysql_num_rows($result);
	if (mysql_num_rows($result) == 0)
	{
		echo "Fertitsch";
		include ('../user/user_footer.html');
		exit();
	}

	
	$w_t_tid = array();
	$w_t_n = array();

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$w_t_tid[] = $row['team_id'];
		$w_t_n[] = $row['name'];
//		$w_t_g[] = $row['gruppe'];
		$wid = $row['wettkampf_id'];
		$saison = $row['saison'];
		echo $row['team_id'];
		echo $row['name'];
		echo $row['wettkampf_id'];
		echo $row['saison'];
	}

	$team_id = $w_t_tid[$index];
	$spruch = "SELECT spieltag, datum, heim_team_id, gast_team_id FROM liga_spiel";
	$spruch .= " WHERE wettkampf_id = $wettkampfid AND (heim_team_id = $team_id OR gast_team_id = $team_id)";
	$spruch .= " ORDER BY spieltag";
	$result = mysql_query($spruch, $db);
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
		echo "<BR>$l_s_datum[$id]<BR>";
		$l_s_heim[$id] = $row['heim_team_id'];
		$l_s_gast[$id] = $row['gast_team_id'];
	}
//	$textstyle = fontType("black");
	
	echo "<FORM METHOD=\"post\" NAME=\"cc\" ACTION=\"add_confedcup.php?wettkampfid=$wettkampfid\">";
	echo "$mittig $stextstyle <b>Bitte w&auml;hlen Sie die Spielpaarungen der Mannschaft";
//	$textstyle = fontType($txtcol8);
	echo "$textstyle &quot;<b>$w_t_n[$index]</b>&quot;</b>";
//	$textstyle = fontType("black");
	echo "<br>$textstyle Saison $saison";
	echo "<br>";
	echo "Gruppe $gruppe";
	echo "<br><br>";
	echo "<TABLE $center BORDER=\"0\">";
	echo "<TR $bgcolor8>";
	echo "<TD COLSPAN=\"2\" $center> $textstyle Heim</TD>";
	echo "<TD COLSPAN=\"1\" $center> $textstyle Datum / Zeit</TD>";
	echo "</TR>";

	$team = $w_t_n[$index];
	$team_id = $w_t_tid[$index];

	for ($j=1;$j<$anzahl;$j++)
	{
		if ($l_s_heim[$j] == $team_id || $l_s_gast[$j] == $team_id)
		{

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
            echo "<BR> $l_s_datum[$j]<BR>";
			$zeit = substr("$l_s_datum[$j]", 11, 5);
			echo "<BR> <BR> $zeit <BR>";
		}

		echo "<TR $bgcolor7>";
		echo "<TD width=\"33%\" $right>";
//		$textstyle = fontType("black");
		echo " $textstyle $j &nbsp;&nbsp;";
//		$textstyle = fontType($txtcol9);	
		echo " $textstyle $team";
//		echo " $w_t_g[$j] ";
		echo "<INPUT TYPE=\"Radio\" NAME=\"spielnr_$j\" $checked1 VALUE=\"$w_t_tid[$index]\">";
		echo " : </TD><TD width=\"33%\">";
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
//				if ($w_t_g[$i] == $w_t_g[$j])
//				{
				echo "$w_t_tid[$i] $w_t_n[$i]";
					echo "<OPTION $selected VALUE=\"$w_t_tid[$i]\">$w_t_n[$i]</OPTION>";
//				}
				
			}
		}
		echo "</SELECT><TD width=\"24%\" ALIGN=\"center\">";
		echo "<INPUT TYPE=\"text\" maxlength=\"5\" size=\"5\" NAME=\"datum_hin_$j\" VALUE=\"$datum_hin\">";
//		echo "</TD><TD WIDTH=\"24%\" ALIGN=\"left\">";
		echo "<INPUT TYPE=\"text\" maxlength=\"5\" size=\"5\" NAME=\"zeit_$j\" VALUE=\"$zeit\">";
		echo "</TD>";
		echo "</TR>";
		unset ($checked1);
		unset ($checked2);
		unset ($datum_hin);
		unset ($zeit);
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
	echo "<input type=\"hidden\" name=\"gruppe\" VALUE=\"$gruppe\">";
	echo "</FORM>";
		include ('../user/user_footer.html');
}

if ($anzahl)
{
	if($anzahl == $index)
	{
		echo $gruppe;
		$g = ord($gruppe);
		echo "$g";
		$g++;
		$gruppe = chr($g);
		echo "$gruppe <BR>";
		echo "Fertitsch";
		echo "$index";
		$index = 0;
		//exit();
	//	gibdenspieltagaus($index);
	}
	if($nothefirst)
	{
		gibdenspieltagaus($index, $gruppe, $wettkampfid);
	}
	if ($anzahl and $gegner_1)
	{
		include("../script/SCRIPTconnect.php");
		$index = $index + 1;
		echo "<FORM METHOD=\"post\" NAME=\"cc\" ACTION=\"add_confedcup.php?wettkampfid=$wettkampfid\">";
		for ($i=1;$i<$anzahl;$i++)
		{
			$datum_hin = "datum_hin_$i";
			$zeit = "zeit_$i";
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
				#echo "<BR>$team_name spielt zu hause gegen $gegner_name am ${$datum_hin} um ${$zeit}<BR>";
			} else {
				${$heim} = "${$gegner}";
				${$gegner} = "$team_id";
				#echo "<BR>$team_name spielt ausw&auml;rts gegen $gegner_name am ${$datum_hin} um ${$zeit}<BR><BR>";
			}

			$jahr = "";
			ereg("[0-9]{4}", $saison, $jahr);
			$hin = "${jahr[0]}.${$datum_hin} ${$zeit}:00";


			${$datum_hin} = ereg_replace("\.", "-", "$hin");

			if (${$gegner} == "ausdb" || ${$heim} == "ausdb")
			{
				$spruch = "";
				$spruch2 = "";
			} else {
				$spruch = "INSERT INTO liga_spiel (wettkampf_id, spieltag, datum, heim_team_id, gast_team_id, gruppe,done)";
				$spruch .= " VALUES ($wid, $i, '${$datum_hin}', ${$heim}, ${$gegner}, '$gruppe', 0)";


				echo "Spiel : $spruch<BR>";
				
				$result = mysql_query($spruch, $db);
				$number = mysql_insert_id();
				echo "$number<BR>";	
				echo "<P>".mysql_error($db);

			}
		}
		echo "$anzahl<BR>";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"nothefirst\">";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"$anzahl\" NAME=\"anzahl\">";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"$index\" NAME=\"index\">";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"$gruppe\" NAME=\"gruppe\"";
		echo "<INPUT TYPE=\"hidden\" VALUE=\"$wettkampfid\" NAME=\"wettkampfid\">";
		echo "<input type=\"submit\" value=\"Weiter\" name=\"submitButtonName\" border=\"0\">";
		echo "</FORM>";
	    echo "Anzahl der fertig gepaarten Mannschaften : $index";
		$logpage .= " p(" . $index . ") db]";
	    include ('../user/user_footer.html');
	}
} else {
    #echo "Hulla";
	$index = 0;
	$gruppe = "A";
	gibdenspieltagaus($index, $gruppe, $wettkampfid);
}
?>
