<?php

include ("../script/SCRIPTconnect.php");

if ($datumda == 0 ) {
	$spruch = "SELECT * FROM liga_spiel WHERE wettkampf_id = $wettkampfid AND spieltag = 4";
	$result = mysql_query($spruch, $db);

	$mannschaften = array();
	$m_namen = array();

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$heim = $row['heim_team_id'];
		$gast = $row['gast_team_id'];
		$tore_heim = $row['tore_heim'];
		$tore_gast = $row['tore_gast'];
		if ($tore_heim > $tore_gast)
		{
			$mannschaften[] = $heim;
		} else {
			$mannschaften[] = $gast;
		}
	}

	for($i=0;$i<count($mannschaften);$i++)
	{
		$spruch = "SELECT name FROM team WHERE id = ${mannschaften[$i]}";
		$result = mysql_query($spruch,$db);
		$row = mysql_fetch_row($result);
		$m_namen[] = $row[0];
		echo $mannschaften[$i] . " ist " . $m_namen[$i] . "<BR>";
	}

	echo "<FORM METHOD=\"post\" NAME=\"em\" ACTION=\"EM-Halb.php\">";
	echo "<TABLE>";
	echo "<TR>";
	echo "<TD COLSPAN=\"5\" align=\"right\"> Datum / Zeit</TD>";
	echo "</TR>";

	for($i=0;$i<(count($mannschaften)/2);$i++)
	{
		$heim = $m_namen[$i];
		$i = $i + 2;
		$gast = $m_namen[$i];
			$i = $i - 2;;
		echo "<input type=\"hidden\" NAME=\"heim_$i\" VALUE=\"${mannschaften[$i]}\">";
		echo "<input type=\"hidden\" NAME=\"gast_$i\" VALUE=\"${mannschaften[$i+2]}\">";
		echo "<TR><TD>$heim</TD><TD>:</TD><TD>$gast</TD>";
		echo "<TD><input type=\"text\" maxlength=\"5\" size=\"5\" name=\"datum_$i\"></TD>";
		echo "<TD><input type=\"text\" maxlength=\"5\" size=\"5\" name=\"zeit_$i\"></TD>";
		echo "</TR>";
	}

	echo "</TABLE>";
	echo "<input type=\"hidden\" NAME=\"datumda\" VALUE=\"1\">";
	echo "<input type=\"hidden\" NAME=\"wettkampfid\" VALUE=\"$wettkampfid\">";
	echo "<input type=\"submit\" value=\"Weiter\" name=\"submitButtonName\" border=\"0\">";
	echo "</FORM>";
} else {
	echo "blubb";
	echo "$wettkampfid <BR>";

	$spruch = "SELECT saison FROM wettkampf where id = $wettkampfid";
	$result = mysql_query($spruch, $db);
	$row = mysql_fetch_row($result);
	$saison = $row[0];

	echo $saison . "<BR>";

	ereg("[0-9]{4}", $saison, $jahr);

	for($i=0;$i<2;$i++)
	{
		$heim = "heim_$i";
		$gast = "gast_$i";
		$datum_hin = "datum_$i";
		$zeit = "zeit_$i";
		$hin = "${jahr[0]}.${$datum_hin} ${$zeit}:00";
		${$datum_hin} = ereg_replace("\.", "-", "$hin");
		echo ${$heim} . " : " . ${$gast} . " : " . ${$datum_hin} . "<BR>";
		$gruppe = $i + 1;
		$spruch = "INSERT INTO liga_spiel (wettkampf_id, spieltag, datum, heim_team_id, gast_team_id, gruppe,done)";
		$spruch .= " VALUES ($wettkampfid, 5, '${$datum_hin}', ${$heim}, ${$gast}, '$gruppe', 0)";
		echo "$spruch <BR>";
		$result = mysql_query($spruch,$db);
	}
}
?>