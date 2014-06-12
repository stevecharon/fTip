<?php
header("Content-Type: text/xml");

include ("../script/SCRIPTinclude.php");

// --- eine Funktion um XMLtags zu generieren -----------

function tag($name, $content) {
	return "<$name><![CDATA[$content]]></$name>\r\n";
}
// --------------------------------------------------



#echo "pupz";

// ++++Voreinstellungen ++++++++++ 
$ich = getenv("REMOTE_USER");


$font1 = str_replace ("<", "&lt;", fontSizeColor(2, "black"));
$font1 = str_replace (">", "&gt;", $font1);
$font2 = str_replace ("<", "&lt;", fontSizeColor(1, "black"));
$font2 = str_replace (">", "&gt;", $font2);



// ++++++++++++++++++++++++++++++++++++++ der RSS-FEED +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// ----------------------------------- K o p f z e i l e -------------------------
echo '<?xml version="1.0" encoding="ISO-8859-1" ?>' . "\r\n";
echo "<rss version=\"2.00\">\r\n";
echo "<channel>\r\n";
echo "<title>fTip - Newsfeed</title>\r\n";
echo "<link>http://www.produnis.de/fTip</link>\r\n";
echo "<description>";
echo "Dieses Dokument liefert die aktuellen Ergebnisse, und eventuell auch irgendwann einmal die Tipprundenstaende";
echo "</description>\r\n";
echo "<language>de-de</language>\r\n";
// -------------------------------------------------------------------------------


// ------------------------------------------------------------ Inhalt ------------------------------------------------------------
$spruch2 = "SELECT id FROM wettkampf WHERE done = 0";
$result2 = mysql_query($spruch2, $db) or die("<b>aktWK</b> failed : " . mysql_error() . "<br><br>" . $spruch2);
while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
   {

	$wkid = $row2['id'];
	$die_saison = WKname($wkid);
	$aktueller_spieltag = AktuellerSpieltag($wkid);
	
	#$aktueller_spieltag = 2;
	
	for ($i=0;($i<35);$i++)
   		{
    
    	if ($aktueller_spieltag == 1) {
    		$i = 9999;
    		}
    		
		echo "<item>";
		
		
	
		$titel =  $die_saison . " - " . $aktueller_spieltag . ". Spieltag";
		#$titel .= " {$_SERVER['PHP_AUTH_USER']}";

		$link = "http://";				# link auf die seite mit ihnalt der news 
		$text = "";
		$text = "<table><tr>";
		$text .=  "<td colspan='3'><b>Ergebnisse des " . $aktueller_spieltag . ". Spieltags " . $die_saison . " $ich<br>";
				

	
	$spruch = "SELECT liga_spiel.id, spieltag, heim_team_id, gast_team_id, tore_heim, tore_gast,";
	$spruch .= " team.name AS heim, team2.name AS gast, datum";
//	$spruch .= " ,team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen, datum";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
	$spruch .= " WHERE wettkampf_id = $wkid AND spieltag = $aktueller_spieltag";
	$spruch .= " ORDER BY datum, id ASC";
	$result = mysql_query($spruch, $db) or die("<b>getSpielpaarung</b> failed : " . mysql_error() . "<br><br>" . $spruch);
	
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
			$die_heimmannschaft = $row['heim'];
			$die_gastmannschaft = $row['gast'];
			$die_heimtore = $row['tore_heim'];
			$die_gasttore = $row['tore_gast'];

			$text .= "<tr>";
			$text .= "<td>" . $die_heimmannschaft . "</td>\t";
			$text .= "<td>" . $die_gastmannschaft . "</td>\t";
			$text .= "<td>" . $die_heimtore . ":" . $die_gasttore . "</td>\r\n";
			$text .= "</tr>";

					// ----------------------------------------------------------------------------------
			}		
				#$text .= "&lt;/table&gt;";
				
		$text .= "<tr>";
		$text .=  "<td colspan='3'><br>&nbsp;";
		$text .= "</tr></table>";
		#$wettkampf_id = $wkid;
		#$spieltag = $aktueller_spieltag;
		#$text .= include('SCRIPTtabelleBundesliga.php');
		
		
		
		echo tag("title", $titel);
		echo tag("link", $link);
		echo tag("description", $text);
		echo "<pubDate>";
		echo "";									# sollte so aussehen: Fri, 17 Mar 2005 10:16:55 GMT+01:00
		echo "</pubDate>\r\n";


		echo "</item>\r\n\r\n";
		$aktueller_spieltag = ($aktueller_spieltag-1);
		}
	
	
	}
// ---------------------------------------------------------------------------------------------------------------------------------

// ----------------------------------- F u s s z e i l e -------------------------
echo "</channel>\r\n";
echo "</rss>\r\n";
// -------------------------------------------------------------------------------
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



// ################## LOGBOT #########################
//             //$logurl =  GetURL();            // ##
            $logip = GetEnv('REMOTE_ADDR');
            $logpage = "[RSS-request]";
            $name = "[RSS]";
    include ('../script/BOTlogbot.php');       // ##
// #####################################################
?>