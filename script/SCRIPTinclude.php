<?php
include ("SCRIPTconnect.php");
include ("SCRIPTstyles.php");
include ("SCRIPTlanguage.php");

$heute = date ("Y-m-d");
$zeit = date ("H");


function fontType($color)
{
	$textstyle = "<font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=1 color=\"$color\">";
	return $textstyle;
}


function fontType2($color)
{
	$textstyle = "<font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=2 color=\"$color\">";
	return $textstyle;
}

function fontSizeColor($size, $color)
{
	$textstyle = "<font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"$size\" color=\"$color\">";
	return $textstyle;
}





function SonderzeichenAdee() {
include ("SCRIPTconnect.php");
    $spruch = "SELECT id, name FROM user";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $die_id= $row['id'];
        $der_name = $row['name'];
        
        
         $der_name = htmlentities($der_name);
        
        $sprich = "UPDATE user SET name = '$der_name' WHERE id = $die_id";
        $resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
    }
    
    
    $spruch = "SELECT id, name FROM tippspiel";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $die_id= $row['id'];
        $der_name = $row['name'];
        
        
  $der_name = htmlentities($der_name);
        
        $sprich = "UPDATE tippspiel SET name = '$der_name' WHERE id = $die_id";
        $resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
    }

    $spruch = "SELECT id, saison FROM wettkampf";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $die_id= $row['id'];
        $der_name = $row['saison'];
         $der_name = htmlentities($der_name);
        
        $sprich = "UPDATE wettkampf SET saison = '$der_name' WHERE id = $die_id";
        $resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
    }
    
    $spruch = "SELECT id, name FROM team";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $die_id= $row['id'];
        $der_name = $row['name'];
        
        
         $der_name = htmlentities($der_name);
        $sprich = "UPDATE team SET name = '$der_name' WHERE id = $die_id";
        $resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
    }

}








function WhatGenesis($userid)
{
include ("SCRIPTconnect.php");

$spruch  = "SELECT genesis FROM user WHERE id = $userid";
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$genesis = $row['genesis'];

return $genesis;
}



function LogMalDieURL()
{
include ("SCRIPTconnect.php");
$spruch  = "SELECT www FROM config";
$result = mysql_query($spruch, $db) or die("<b>get wwwConfig</b> failed : " . mysql_error() . "<br><br>" . $sprich);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$logwww = $row['www'];
return $logwww;
}




function UserGenesis()
{
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
    
    if ($uid == '') {
        $spruch  = "SELECT config.language AS conflang, language.suffix AS suffix FROM config";
        $spruch .= " INNER JOIN language ON config.language = language.id";
        $result = mysql_query( $spruch, $db ) or die("failed : " . mysql_error() . " - " . $spruch );
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $langsuffix = $row['suffix'];
        include ("languages/" . $langsuffix . "/include." . $langsuffix);
    
    } else {
        #echo $uid . "  - pupz";
        $langsuffix = Whichlanguage($db, $uid);
        include ("../languages/" . $langsuffix . "/include." . $langsuffix);
    }


$der_tag_monatdummy = date("m");
    if ($der_tag_monatdummy == '01') $der_monat_wort = $lang_f_januar;
    if ($der_tag_monatdummy == '02') $der_monat_wort = $lang_f_februar;
    if ($der_tag_monatdummy == '03') $der_monat_wort = $lang_f_march;
    if ($der_tag_monatdummy == '04') $der_monat_wort = $lang_f_april;
    if ($der_tag_monatdummy == '05') $der_monat_wort = $lang_f_may;
    if ($der_tag_monatdummy == '06') $der_monat_wort = $lang_f_june;
    if ($der_tag_monatdummy == '07') $der_monat_wort = $lang_f_july;
    if ($der_tag_monatdummy == '08') $der_monat_wort = $lang_f_august;
    if ($der_tag_monatdummy == '09') $der_monat_wort = $lang_f_september;
    if ($der_tag_monatdummy == '10') $der_monat_wort = $lang_f_october;
    if ($der_tag_monatdummy == '11') $der_monat_wort = $lang_f_november;
    if ($der_tag_monatdummy == '12') $der_monat_wort = $lang_f_december;
$das_jahr = date("Y");

$genesis = $der_monat_wort . " " . $das_jahr;
return $genesis;
}









function TagHeuer()
{
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];

    if ($uid == '') {
        $spruch  = "SELECT config.language AS conflang, language.suffix AS suffix FROM config";
        $spruch .= " INNER JOIN language ON config.language = language.id";
        $result = mysql_query( $spruch, $db ) or die("failed : " . mysql_error() . " - " . $spruch );
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $langsuffix = $row['suffix'];
        include ("languages/" . $langsuffix . "/include." . $langsuffix);
    
    } else {
        #echo $uid . "  - pupz";
        $langsuffix = Whichlanguage($db, $uid);
        include ("../languages/" . $langsuffix . "/include." . $langsuffix);
    }
    

$stylef = fontSizeColor(1, $txtcol17);
$das_jahr = date("Y");
$der_tag_zahl = date("d");
$der_tag_wortdummy = date("w"); // 0 = Sonntag, ... 6 = Samstag
    if ($der_tag_wortdummy == 0) $der_tag_wort = $lang_f_sunday;
    if ($der_tag_wortdummy == 1) $der_tag_wort = $lang_f_monday;
    if ($der_tag_wortdummy == 2) $der_tag_wort = $lang_f_tuesday;
    if ($der_tag_wortdummy == 3) $der_tag_wort = $lang_f_wednesday;
    if ($der_tag_wortdummy == 4) $der_tag_wort = $lang_f_thursday;
    if ($der_tag_wortdummy == 5) $der_tag_wort = $lang_f_friday;
    if ($der_tag_wortdummy == 6) $der_tag_wort = $lang_f_saturday;
$der_tag_monatdummy = date("m");
    if ($der_tag_monatdummy == '01') $der_monat_wort = $lang_f_januar;
    if ($der_tag_monatdummy == '02') $der_monat_wort = $lang_f_februar;
    if ($der_tag_monatdummy == '03') $der_monat_wort = $lang_f_march;
    if ($der_tag_monatdummy == '04') $der_monat_wort = $lang_f_april;
    if ($der_tag_monatdummy == '05') $der_monat_wort = $lang_f_may;
    if ($der_tag_monatdummy == '06') $der_monat_wort = $lang_f_june;
    if ($der_tag_monatdummy == '07') $der_monat_wort = $lang_f_july;
    if ($der_tag_monatdummy == '08') $der_monat_wort = $lang_f_august;
    if ($der_tag_monatdummy == '09') $der_monat_wort = $lang_f_september;
    if ($der_tag_monatdummy == '10') $der_monat_wort = $lang_f_october;
    if ($der_tag_monatdummy == '11') $der_monat_wort = $lang_f_november;
    if ($der_tag_monatdummy == '12') $der_monat_wort = $lang_f_december;
    
$die_uhrzeit = date("H:i:s");


$bittesehr  = $stylef . $der_tag_wort . ", " . $der_tag_zahl . ". " . $der_monat_wort . " " . $das_jahr . " - ";
$bittesehr .= $die_uhrzeit . " $lang_f_oclock";

return $bittesehr;
}





function ZeitStyle($dbzeit)
{
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
$langsuffix = Whichlanguage($db, $uid);
include ("../languages/" . $langsuffix . "/include." . $langsuffix);
$stylef = fontSizeColor(1, $txtcol17);
$das_jahr = ($dbzeit[0] . $dbzeit[1] . $dbzeit[2] . $dbzeit[3]);
$der_tag_zahl =  ($dbzeit[8] . $dbzeit[9]);

$der_tag_monatdummy =  ($dbzeit[5] . $dbzeit[6]);
    if ($der_tag_monatdummy == '01') $der_monat_wort = $lang_f_januar;
    if ($der_tag_monatdummy == '02') $der_monat_wort = $lang_f_februar;
    if ($der_tag_monatdummy == '03') $der_monat_wort = $lang_f_march;
    if ($der_tag_monatdummy == '04') $der_monat_wort = $lang_f_april;
    if ($der_tag_monatdummy == '05') $der_monat_wort = $lang_f_may;
    if ($der_tag_monatdummy == '06') $der_monat_wort = $lang_f_june;
    if ($der_tag_monatdummy == '07') $der_monat_wort = $lang_f_july;
    if ($der_tag_monatdummy == '08') $der_monat_wort = $lang_f_august;
    if ($der_tag_monatdummy == '09') $der_monat_wort = $lang_f_september;
    if ($der_tag_monatdummy == '10') $der_monat_wort = $lang_f_october;
    if ($der_tag_monatdummy == '11') $der_monat_wort = $lang_f_november;
    if ($der_tag_monatdummy == '12') $der_monat_wort = $lang_f_december;
    
//$die_uhrzeit =  ($dbzeit[11] . $dbzeit[12] . ":" . $dbzeit[14] . $dbzeit[15]);


$bittesehr  = $stylef . $der_tag_zahl . ". " . $der_monat_wort . " " . $das_jahr;
//$bittesehr .= $die_uhrzeit . " Uhr";

return $bittesehr;
}

function MailTail()
{
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
if (!$uid) {
    $langsuffix = Whichlanguage($db, 1);
    include ("languages/" . $langsuffix . "/include." . $langsuffix);
    } else {
    $langsuffix = Whichlanguage($db, $uid);
    include ("../languages/" . $langsuffix . "/include." . $langsuffix);
    }


//include ("../script/SCRIPTconnect.php");
$spruch = "SELECT www, version FROM config";
$result = mysql_query( $spruch, $db ) or die("MailTail failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$current_version = $row['version'];
$current_www = $row['www'];
$current_time = TagHeuer();

$mailtail  = " \r\n \r\n";
$mailtail .= "$lang_f_mailtail1  \r\n";
$mailtail .= "$lang_f_mailtail2  \r\n  \r\n";
$mailtail .= "=================================================================  \r\n";
$mailtail .= $lang_f_mailtail3 . ": " . $current_time . "  \r\n";
$mailtail .= "fTip Version " . $current_version . "  \r\n";
$mailtail .= $lang_f_mailtail4 . " " . $current_www . "  \r\n";
$mailtail .= "=================================================================  \r\n";

return $mailtail;
}






function UserPic($user)
{
include ("SCRIPTconnect.php");
$spruch  = " SELECT pic, user_pic.file AS picture FROM user";
$spruch .= " INNER JOIN user_pic ON user.pic = user_pic.id";
$spruch .= " WHERE user.id = $user";
$result = mysql_query($spruch, $db) or die("<b>USERpic</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$pic = $row['picture']; // echo "function $pic";
$image = "<img src=\"../img/userpics/" . $pic . "\" height=\"49\" width=\"86\"  border=\"0\" >";
return $image;

}

// ++++++++ Wettkampf - Name raussuchen ++++++++++++++++++++++++++++++++
function WKname($wkid)
{
include ("SCRIPTconnect.php");
 	$spruch3 = "SELECT wettkampf.saison,";
	$spruch3 .= " wettkampf.liga_art_id, liga_art.id AS laid, liga_art.name FROM wettkampf";
	$spruch3 .= " LEFT JOIN liga_art ON wettkampf.liga_art_id = liga_art.id";
	$spruch3 .= " WHERE wettkampf.id = $wkid";
	
	$result3 = mysql_query($spruch3, $db);
	$row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
	$wkname =  $row3['name'] . " " . $row3['saison'];

return $wkname;
}

// ++++++++ Tipprunden - Name raussuchen ++++++++++++++++++++++++++++++++
function TipName($tiprunde)
{
include ("SCRIPTconnect.php");
 	$spruch3 = "SELECT name";
	$spruch3 .= " FROM tippspiel";
	$spruch3 .= " WHERE id = $tiprunde";
	
	$result3 = mysql_query($spruch3, $db) or die ("Tipname failed : " . mysql_error() . "<br>" . $spruch3);
	$row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
	$tipname =  $row3['name'];

return $tipname;
}





// -+-+-+-+-+-+-+-+ TABELLENCHECK -+-+-+-+-+-+-+-+-+-+-
//  1 = WM    2 = EM    3 = Bundesliga   4 =  EuropaCup
function LigaArt($wettkampfid)
{
include ("SCRIPTconnect.php");
$spruch  = "SELECT liga_art_id FROM wettkampf";
$spruch .= " WHERE id = $wettkampfid";
$result = mysql_query( $spruch, $db ) or die("LigaCheck failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$ligaart = $row['liga_art_id'];

return $ligaart;
}



// ++++++++++++++ Spuck aus den aktueller Spieltag ++++++++++++++++++++++++++
function AktuellerSpieltag($wettkampfid)
{
include ("SCRIPTconnect.php");
	$spruch = "SELECT akt_spieltag FROM wettkampf";
	$spruch .= " WHERE id = $wettkampfid";
	$result = mysql_query($spruch, $db) or die("<b>ActualWK</b> failed : " . mysql_error() . "<br><br>" . $spruch);
	
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$aktueller_spieltag = $row['akt_spieltag'];
return $aktueller_spieltag;
}


// gib mir die Anzahl der User der Tiprunde
function TippspielGroesse($tiprunde)
{
include ("SCRIPTconnect.php");
$hier_zaehlt_der_Chef = 0;
$spruch  = "SELECT user_id";
$spruch .= " FROM tippspiel_user";
$spruch .= " WHERE tippsiel_id = $tiprunde";
$result = mysql_query($spruch, $db);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
	$bedeutungslos = $row['user_id'];
	$hier_zaehlt_der_Chef++;
	}

return $hier_zaehlt_der_Chef;
}



function SpieltageKlicker ($wettkampfid, $seite)
{
include ("../script/SCRIPTstyles.php");
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
$langsuffix = Whichlanguage($db, $uid);
include ("../languages/" . $langsuffix . "/include." . $langsuffix);

$textstyle = fontSizeColor(1, "black");
$spruch  = "SELECT spieltage, akt_spieltag FROM wettkampf";
$spruch .= " WHERE id = $wettkampfid";
$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$anzahl = $row['spieltage'];
$aktueller = $row['akt_spieltag'];

if ($anzahl > 9) { $umbruch = ($anzahl / 2); } else { $umbruch = ""; }

$anzahl++; 
echo "<center>$textstyle $lang_f_selectmatchday ";
echo "$lang_f_currentmatchday : ";
echo "<a href=\"" . $seite . "&spieltag=$aktueller\">$textstyle" . "$aktueller</a>";

echo "<table $center cellspacing=5>";
echo "<tr>";
for($x=1;$x<$anzahl;$x++)
	{
  	echo "<td $center>";
  	echo "&nbsp;";
  	echo "<a href=\"" . $seite . "&spieltag=$x\">$textstyle";
  	echo "$x</a>&nbsp;";
  	echo "</td>";
  	if ($x == $umbruch) echo "</tr><tr>";
	} 
echo "</tr></table></center>";
return $aktueller;
}




// ++++++++++++++++ Davids Scripte ++++++++++++++++++++++++++++++++++++++
function spieleAusDB($tag, $wettkampfid, $notthefirst)
{
	$spruch = "SELECT liga_spiel.id, spieltag, heim_team_id, gast_team_id, tore_heim, tore_gast,";
	$spruch .= " team.name AS heim, team2.name AS gast, datum";
	$spruch .= " ,team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen, datum";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";

	if ($notthefirst)
	{
		$spruch .= " WHERE wettkampf_id = $wettkampfid AND spieltag = $tag"; #AND done != 1";
	} else {
		$spruch .= " WHERE wettkampf_id = $wettkampfid AND spieltag <= $tag AND done != 1";
	}

//	$spruch .= " AND liga_spiel.id = liga_tip.liga_spiel_id";
	$spruch .= " ORDER BY spieltag DESC, datum, id ASC";

	return $spruch;
}


function tipsAusDB($uid, $spielid)
{
	$spruch = "SELECT heim_tip, gast_tip, id FROM liga_tip";
	$spruch .= " WHERE user_id = $uid AND liga_spiel_id = $spielid";
	
	return $spruch;
}








function suchspiele($spieltag, $wettkampfid, $notthefirst, $tip)
{
	include("SCRIPTstyles.php");
	include ("SCRIPTconnect.php");
	
	$name = $_SESSION['name'];
    $uid = $_SESSION['uid'];
    $heute = date ("Y-m-d");
    $zeit = date ("H");
	
	$tag = $spieltag;
	$spruch = spieleAusDB($spieltag, $wettkampfid, $notthefirst);
    
    $langsuffix = Whichlanguage($db, $uid);
    
    include ("../languages/" . $langsuffix . "/include." . $langsuffix);


	$result = mysql_query($spruch, $db);
	if($tip)
	{
		$action = "user_tipp_abgeben.php";
	} else {
		$action = "add_ergebnis.php";
	}
	$textstyle = fontType($txtcol7);


echo "<script>function HastigTip (paarung) {";
echo "window.open ('../user/user_hastigtip.php?lsid=' + paarung, 'hastigtip', 'location=no,toolbar=no,status=no,menubar=no,height=300,width=480');";
echo "}";
echo "</script>";


	echo "<FORM METHOD=\"post\" NAME=\"ergebnis\" ACTION=\"$action\">";
	echo "<TABLE $center BORDER=\"0\">";
	echo "<TR $bgcolor7>";
	echo "<TH $right > $textstyle $lang_f_matchday</TH>";
    echo "<TH $center > $textstyle $lang_f_date</TH>";
	echo "<TH $cspn2 $center > $textstyle $lang_f_hometeam</TH>";
	echo "<TH $cspn2 $center > $textstyle $lang_f_guestteam</TH>";
	echo "<TH $cspn2 $center > $textstyle $lang_f_goals</TH><th></th>";
	echo "</TR>";

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$id = $row['id'];
		$tore_heim = $row['tore_heim'];
		$tore_gast = $row['tore_gast'];
		
		$sprich  = "SELECT done FROM liga_spiel";
		$sprich .= " WHERE id = $id";
		
		$resilt = mysql_query( $sprich, $db ) or die("Query failed : " . mysql_error());
		$riw = mysql_fetch_array($resilt, MYSQL_ASSOC);

		if (($riw['done'] == 1) && ($uid != 1))
		{
//			$weissnix_kannix_voellig_umsonst++;
		} else {
			echo "<TR $bgcolor8>";
			$textstyle = fontType($txtcol7);
			
			if ($row['spieltag'] == $tag)
			{
				echo "<TD $right ><B> $textstyle ". $row['spieltag']. "</B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD>";
			} else {
				echo "<TD $right > $textstyle ". $row['spieltag']. "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD>";
			}
            $dummy= $row['datum'];
            $showdatum =   $dummy[8] . $dummy[9] . "." . $dummy[5] . $dummy[6] . "." . $dummy[0] . $dummy[1] . $dummy[2] . $dummy[3];
			echo "<TD $right> $textstyle &nbsp;&nbsp;". $showdatum . "&nbsp;";
			
			$textstyle = fontType($txtcol8);
			$lheim = TeamLanguage($row['heim']);
			echo "<TD $right> $textstyle &nbsp;&nbsp;". $lheim . "&nbsp;";
			echo "</td>";
		
			echo "<td $center>";
			echo "&nbsp;<img border=\"0\" height=\"25\" src=\"../img/Wappen/";
			echo $row['heimwappen'];
			echo "\">&nbsp;&nbsp;</td>";
		
			echo "<td $center>";
			echo "&nbsp;&nbsp;<img border=\"0\" height=\"25\" src=\"../img/Wappen/";
			echo $row['gastwappen'];
			echo "\">&nbsp;";
			echo "</td>";
		
			$textstyle = fontType($txtcol9);
			echo "<TD $left>";
			$lgast = TeamLanguage($row['gast']);
			echo "&nbsp; $textstyle &nbsp;&nbsp;". $lgast . "&nbsp;&nbsp;</td>";

//$heute = "2003-08-01";
//$zeit = "12";
		
			if($tip)
			{
				$spruch2 = tipsAusDB($uid, $row['id']);
				$result2 = mysql_query($spruch2,$db);
				$row2 = mysql_fetch_row($result2);
				$tore_heim = $row2[0];
				$tore_gast = $row2[1];
				$datum = $row['datum'];
				if ($heute > $datum || ($heute == $datum && $zeit > "12"))
				{
					$disabled = "disabled";
					$spiellaeuft = "1";
				} else {
					$disabled = "";
				}
			}
		
			echo "<TD";
			if ($disabled)
			{
				 echo " bgcolor=\"black\"";
			 } else {
	 			echo " $bgcolor9";
 			}		 
			echo "><INPUT TYPE=\"text\" maxlength=\"2\" size=\"2\" NAME=\"tore_heim_$id\" VALUE=\"$tore_heim\" $disabled>";
			echo "</TD>";
			
			echo "<TD $left";
			if ($disabled)
			{
				 echo " bgcolor=\"black\"";
			 } else {
				 echo " $bgcolor9";
			 }		
			echo ">";
			echo "<INPUT TYPE=\"text\" maxlength=\"2\" size=\"2\" NAME=\"tore_gast_$id\" VALUE=\"$tore_gast\" $disabled>";
			echo "</TD>";
			
			
			
			echo "<td $bgcolor8>";

	echo "<a  href=\"javascript:HastigTip('" . $id . "')\">";
	echo "<img border=0 alt=\"alte Paarungen\" src=\"../img/hilfe1.png\" ";
	echo ">";
	echo "</a>";



			echo "</td>";
			
			
			
			
			echo "</TR>";
		}
	}
	echo "<TR $bgcolor7><TD $cspn5>&nbsp;</TD>";
	echo "<TD $cspn3 $center><INPUT TYPE=\"submit\" VALUE='" . $lang_f_submitbutton . "' NAME=\"submitButtonName\" BORDER=\"0\">";
	echo "</TD></TR></TABLE>";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"1\" NAME=\"ergebnisda\">";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"$spieltag\" NAME=\"spieltag\">";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"$tag\" NAME=\"tag\">";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"$wettkampfid\"NAME=\"wettkampfid\">";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"$tore_heim\" NAME=\"heim_alt_$id\">";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"$tore_gast\" NAME=\"gast_alt_$id\">";
	echo "<INPUT TYPE=\"hidden\" VALUE=\"$notthefirst\" NAME=\"notthefirst\">";
//	echo "<INPUT TYPE=\"submit\" VALUE=\"Weiter\" NAME=\"submitButtonName\" BORDER=\"0\">";
	echo "</FORM>";
	if ($spiellaeuft)
	{
	include("MSGspiel_laeuft.html");
	}
}





function LigaSiega ($wettkampfid, $spieltag)
{
	include ("SCRIPTconnect.php");
	$penalty = array();
	$spruch  = "SELECT penalty.team_id, SUM(penalty) AS gesamtpenalty, team.name AS teamname";
	$spruch .= " FROM penalty";
	$spruch .= " INNER JOIN team ON penalty.team_id = team.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid";
	$spruch .= " GROUP BY penalty.team_id";
	$spruch .= " ORDER BY gesamtpenalty DESC";

	$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$a = $row['teamname'];
		$penalty["$a"] = $row['gesamtpenalty'];
	}

	$tabelle = array();
	if (!$spieltag) $spieltag = 1;
	$spruch = "SELECT liga_spiel.id, spieltag, heim_team_id, gast_team_id, tore_heim, tore_gast,";
	$spruch .= " team.name AS heim, team2.name AS gast";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
	$spruch .= " WHERE wettkampf_id = $wettkampfid AND spieltag <= $spieltag"; #AND done != 1
	$spruch .= " ORDER BY spieltag ASC";
	$result = mysql_query($spruch, $db);

	$heim = array();
	$gast = array();
	$heim_id = array();
	$gast_id = array();
	$tore_heim = array();
	$tore_gast = array();
	$spieltag = array();

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$heim[] = $row['heim'];
		$gast[] = $row['gast'];
		$heim_id[] = $row['heim_team_id'];
		$gast_id[] = $row['gast_team_id'];
		$tore_heim[] = $row['tore_heim'];
		$tore_gast[] = $row['tore_gast'];
		$spieltag[] = $row['spieltag'];
	}

	for ($i=0;$i<count($heim);$i++)
	{
		if ( $tore_heim[$i] == "" || $tore_gast[$i] == "" ) continue;
		$tabelle["${heim[$i]}"]["id"] = $heim_id[$i];
		$tabelle["${gast[$i]}"]["id"] = $gast_id[$i];
		$tabelle["${heim[$i]}"]["spiel"] = $spieltag[$i];
		$tabelle["${gast[$i]}"]["spiel"] = $spieltag[$i];

		if ($tore_heim[$i] > $tore_gast[$i])
		{
			// Punkte
			$tabelle["${heim[$i]}"]["punkte"] = $tabelle["${heim[$i]}"]["punkte"] + 3;
			$tabelle["${gast[$i]}"]["punkte"] = $tabelle["${gast[$i]}"]["punkte"] + 0;
			// Tore geschossen
			$tabelle["${heim[$i]}"]["raus"] = $tabelle["${heim[$i]}"]["raus"] + $tore_heim[$i];
			$tabelle["${gast[$i]}"]["raus"] = $tabelle["${gast[$i]}"]["raus"] + $tore_gast[$i];
			// Tore gekriegt
			$tabelle["${heim[$i]}"]["rein"] = $tabelle["${heim[$i]}"]["rein"] + $tore_gast[$i];
			$tabelle["${gast[$i]}"]["rein"] = $tabelle["${gast[$i]}"]["rein"] + $tore_heim[$i];
			// Spiele gewonenn
			$tabelle["${heim[$i]}"]["win"] = $tabelle["${heim[$i]}"]["win"] + 1;
			// spiele verloren
			$tabelle["${gast[$i]}"]["lose"] = $tabelle["${gast[$i]}"]["lose"] + 1;
		}

		if ($tore_heim[$i] == $tore_gast[$i])
		{
			$tabelle["${heim[$i]}"]["punkte"] = $tabelle["${heim[$i]}"]["punkte"] + 1;
			$tabelle["${gast[$i]}"]["punkte"] = $tabelle["${gast[$i]}"]["punkte"] + 1;
			$tabelle["${heim[$i]}"]["raus"] = $tabelle["${heim[$i]}"]["raus"] + $tore_heim[$i];
			$tabelle["${gast[$i]}"]["raus"] = $tabelle["${gast[$i]}"]["raus"] + $tore_gast[$i];
			$tabelle["${heim[$i]}"]["rein"] = $tabelle["${heim[$i]}"]["rein"] + $tore_gast[$i];
			$tabelle["${gast[$i]}"]["rein"] = $tabelle["${gast[$i]}"]["rein"] + $tore_heim[$i];
			// Spiele unentschieden
			$tabelle["${heim[$i]}"]["duce"] = $tabelle["${heim[$i]}"]["duce"] + 1;
			$tabelle["${gast[$i]}"]["duce"] = $tabelle["${gast[$i]}"]["duce"] + 1;
		}

		if ($tore_heim[$i] < $tore_gast[$i])
		{
			$tabelle["${heim[$i]}"]["punkte"] = $tabelle["${heim[$i]}"]["punkte"] + 0;
			$tabelle["${gast[$i]}"]["punkte"] = $tabelle["${gast[$i]}"]["punkte"] + 3;
			$tabelle["${heim[$i]}"]["raus"] = $tabelle["${heim[$i]}"]["raus"] + $tore_heim[$i];
			$tabelle["${gast[$i]}"]["raus"] = $tabelle["${gast[$i]}"]["raus"] + $tore_gast[$i];
			$tabelle["${heim[$i]}"]["rein"] = $tabelle["${heim[$i]}"]["rein"] + $tore_gast[$i];

			$tabelle["${gast[$i]}"]["rein"] = $tabelle["${gast[$i]}"]["rein"] + $tore_heim[$i];
			$tabelle["${heim[$i]}"]["lose"] = $tabelle["${heim[$i]}"]["lose"] + 1;
			$tabelle["${gast[$i]}"]["win"] = $tabelle["${gast[$i]}"]["win"] + 1;
		}

	}

	$mannschaften = array();
	$mannschaften = array_keys($tabelle);
	$punkte = array();
	$tore_raus = array();
	$tore_rein = array();
	$diff = array();

	foreach ($mannschaften as $m)
	{
		if ($penalty["$m"])
		{
			$tabelle["$m"]["punkte"] = $tabelle["$m"]["punkte"] - $penalty["$m"];
		}
		$punkte[] = $tabelle["$m"]["punkte"];
		$tore_raus[] = $tabelle["$m"]["raus"];
		$tore_rein[] = $tabelle["$m"]["rein"];
		$diff[] = $tabelle["$m"]["raus"] - $tabelle["$m"]["rein"];
	}

	array_multisort ($punkte, SORT_DESC, SORT_NUMERIC, $diff, SORT_DESC, SORT_NUMERIC, $tore_raus, SORT_DESC, SORT_NUMERIC, $mannschaften);

	$spruch  = "SELECT id FROM team";
	$spruch .= " WHERE name = '${mannschaften[0]}'";
	$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
	$row = mysql_fetch_row($result);

	$erster = array("name" => "${mannschaften[0]}",
			"id" => "${row[0]}");

	return $erster;
}

?>