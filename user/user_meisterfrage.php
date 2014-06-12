<?php


// ++++ uebergeben werden muss die wettkampfid ++++++
include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('user_header.php');
include("../script/SCRIPTteamlanguage.php");
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------

$meisterwird = $_GET['meisterwird'];

// __________________________________SPIELTAG detektiv_____________________________
$spruch  = "SELECT akt_spieltag";
$spruch .= " FROM wettkampf";
$spruch .= " WHERE id = $wettkampfid";
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$detektiv = $row['akt_spieltag'];

//	$detektiv = 1;  //++ harcode

if ($detektiv > 3)
	{
	$font = fontSizeColor(6, "black");
	echo "$font <b>$lang_toolate</b>";
	exit;
	}
// __________________________________________________________________________________

if (!$meisterwird)
{
	//+++++++++++++++++++  Mannschaften rausholen ++++++++++++++
	$zaehler = 0;
	$font = fontSizeColor(1, "black");
	$font2 = fontSizeColor(3, "black");


	echo "<br><table $center border=0 cellspacing=8>";
	echo "<tr><td $center $cspn6>$font2";
	echo "$lang_selectchampion";
	$font = fontSizeColor(1, "black");
	echo "$font <br>$lang_selectchange";
	echo "</td></tr><tr>";

	$spruch  = "SELECT wettkampf_team.team_id, team.id AS teamid, name, wappen_src";
	$spruch .= " FROM wettkampf_team";
	$spruch .= " INNER JOIN team ON wettkampf_team.team_id = team.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";

	$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
		$zaehler++;
		$das_team_id = $row['teamid'];
		$das_team_name = TeamLanguage($row['name']);
		$das_team_wappen = $row['wappen_src'];
	
		echo "<td width=\"80\" $center $bgcolor7>";
		echo "&nbsp;<a href=\"user_meisterfrage.php?meisterwird=$das_team_id&wettkampfid=$wettkampfid\">";
		echo "<img $border0 src=\"../img/Wappen/";
		echo $das_team_wappen;
		echo "\" alt=\"";
		echo $das_team_name;
		echo "\" width=\"50\"></a>&nbsp;<br>";
		echo "&nbsp;<a href=\"user_meisterfrage.php?meisterwird=$das_team_id&wettkampfid=$wettkampfid\">$font";
		echo "$das_team_name</a>&nbsp;";
		echo "</td>";
	
		if ($zaehler == 6)
			{
			echo "</tr><tr>";
			$zaehler = 0;
			}
		}
	echo "</tr></table>";


// ######### Standrad- Foot ##########
include ('user_footer.html');
exit;
}

// ''''''''' NOT THE FIRST ! ***********


$spruch  = "SELECT name, wappen_src";
$spruch .= " FROM team";
$spruch .= " WHERE id = $meisterwird";

$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$wappen = $row['wappen_src'];
$mannschaft = TeamLanguage($row['name']);
$dieses_team = $meisterwird;

// ####### datenbank krams ###########
$spruch  = "SELECT id";
$spruch .= " FROM meister";
$spruch .= " WHERE wettkampf_id = $wettkampfid";
$spruch .= " AND user_id = $uid";
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$dieser_hier = $row['id'];

if ($dieser_hier == '')
	{
	$sprich = "INSERT INTO meister";
	$sprich .= " (user_id, wettkampf_id, team_id)";
	$sprich .= " VALUES ($uid, $wettkampfid, $dieses_team)";
	$resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
//	echo "<br>Neuer Eintrag geschrieben";
	}else{
	
	$sprich  = "UPDATE meister SET";
	$sprich .= " team_id = $dieses_team";
	$sprich .= " WHERE id = $dieser_hier";
	$resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
//	echo "<br>Datenbank wurde aktualisiert";
	
}


// ### graphisch rausrotzen ######
echo "<table>";	
echo "<tr>";
echo "<td>&nbsp;";
echo "<img $border0 src=\"../img/Wappen/";
echo $wappen;
echo "\" alt=\"";
echo $mannschaft;
echo "\" height=\"85\">";
$font = fontSizeColor(5, "black");
echo "&nbsp;</td><td $center>&nbsp;$font";
echo "$mannschaft $lang_yourchampion<br>";
$font = fontSizeColor(3, "black");
echo "$font $lang_yourchampsaved<br>";
$font = fontSizeColor(1, "black");
echo "$font <br>$lang_selectchange";
echo "&nbsp;</td><td>&nbsp;";
echo "<img src=\"../img/okay.jpg\" alt=\"Alles OK\" height=\"108\" width=\"63\" border=\"0\"";
echo "&nbsp;</td></tr><tr><td $cspn3 $center>&nbsp;";
$font = fontSizeColor(2, "blue");
echo "<a href=\"../user/user_tipp_abgeben.php?wettkampfid=$wettkampfid\">" . $font . "$lang_goahead</a>";
echo "&nbsp;</td></tr></table>";
// ######### Standrad- Foot ##########
include ('user_footer.html');
?>

