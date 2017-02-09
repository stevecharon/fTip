<?php
header("Content-Type: text/xml");
include ("etc/xmlhead.php");
include ("../ftip/script/SCRIPTinclude.php");


echo $xml; 							# stammt aus include ("etc/xmlhead.php");

// ++++Voreinstellungen ++++++++++ 
$ich = getenv("REMOTE_USER");




// ########################################### Funktionen #############################################

// --- eine Funktion um XMLtags zu generieren -----------

function xmltag($name, $content) {
	return "<$name><![CDATA[$content]]></$name>\r\n";
	}
// --------------------------------------------------


function Ergebnisse($wkid, $spieltag) {
	$spruch = "SELECT liga_spiel.id, spieltag, heim_team_id, gast_team_id, tore_heim, tore_gast,";
	$spruch .= " team.name AS heim, team2.name AS gast, datum, done ";
//	$spruch .= " ,team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen, datum";
	$spruch .= " FROM liga_spiel";
	$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
	$spruch .= " WHERE wettkampf_id = $wkid AND spieltag = $spieltag";
	$spruch .= " ORDER BY datum, id ASC";
	return $spruch;
	}


// ####################################################################################################





$font1 = fontSizeColor(1, "black");
$font2 = fontSizeColor(2, "black");




$ffont1 = str_replace ("<", "&lt;", fontSizeColor(1, "black"));
$ffont1 = str_replace (">", "&gt;", $font1);
$ffont2 = str_replace ("<", "&lt;", fontSizeColor(2, "black"));
$ffont2 = str_replace (">", "&gt;", $font2);





#########################################  F  E  E  D  S  ######################################################






// +++++++++++++++++++++++++++++++++++++++++ der RSS-FEED +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if ( ($feed == 'rss') OR ($feed == 'RSS') OR ($feed == 'Rss') ) {
	// ----------------------------------- K o p f z e i l e -------------------------

	echo "<rss version=\"2.00\">\r\n";
	echo "<channel>\r\n";
	echo "<title>fTip - Newsfeed</title>\r\n";
	echo "<link>http://www.produnis.de/fTip</link>\r\n";
	echo "<description>";
	echo "Dieses Dokument liefert die aktuellen Ergebnisse, und eventuell auch irgendwann einmal die Tipprundenstaende";
	echo "</description>\r\n";
	echo "<language>de-de</language>\r\n";
	// -------------------------------------------------------------------------------


	// ----------------------------------------------------- Inhalt --------------------------------------------------------
	$spruch2 = "SELECT id, spieltage FROM wettkampf WHERE done = 0";
	$result2 = mysql_query($spruch2, $db) or die("<b>aktWK</b> failed : " . mysql_error() . "<br><br>" . $spruch2);
	while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    	{

		$wkid = $row2['id'];
		$aktueller_spieltag = AktuellerSpieltag($wkid);
		$die_saison = WKname($wkid);
		
		
		
		$spruch = "SELECT liga_spiel.id, spieltag, heim_team_id, gast_team_id, tore_heim, tore_gast,";
		$spruch .= " team.name AS heim, team2.name AS gast, datum, done, spieltag ";
	//	$spruch .= " ,team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen, datum";
		$spruch .= " FROM liga_spiel";
		$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
		$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
		$spruch .= " WHERE wettkampf_id = $wkid AND spieltag <= $aktueller_spieltag";
		$spruch .= " ORDER BY spieltag DESC, datum, id ASC";
		$result = mysql_query($spruch, $db) or die("<b>getSpielpaarung</b> failed : " . mysql_error() . "<br><br>" . $spruch);
		
		$oldspieltag = "";
		
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
			$die_heimmannschaft = $row['heim'];
			$die_gastmannschaft = $row['gast'];
			$die_heimtore = $row['tore_heim'];
			$die_gasttore = $row['tore_gast'];
			$dbspieltag = $row['spieltag'];
	
			if ($oldspieltag != $dbspieltag) {
	
				if ($oldspieltag != "") {
								
					$text .= "<tr>";
					$text .=  "<td colspan='3'><br>&nbsp;";
					$text .= "</tr></table>";
					echo xmltag("description", $text);
					echo "<pubDate>";
					echo "";									# sollte so aussehen: Fri, 17 Mar 2005 10:16:55 GMT+01:00
					echo "</pubDate>\r\n";
					echo "\t\t</item>\r\n";	
					
					} 
				
				$titel =  $die_saison . " - " . $dbspieltag . ". Spieltag";
				$link = "http://www.produnis.de/fTip";				# link auf die seite mit ihnalt der news 
				$text = "";
				$text = "<table><tr>";
				$text .=  "<td colspan='3'><b>Ergebnisse des " . $dbspieltag . ". Spieltags " . $die_saison . " $ich<br>";
				echo "<item>\r\n";	
				echo xmltag("title", $titel);
				echo xmltag("link", $link);
					
					
						
  				} 
	



			$text .= "<tr>";
			$text .= "<td>" . $die_heimmannschaft . "</td>\t";
			$text .= "<td>" . $die_gastmannschaft . "</td>\t";
			$text .= "<td>" . $die_heimtore . ":" . $die_gasttore . "</td>\r\n";
			$text .= "</tr>";

			// ----------------------------------------------------------------------------------
				
			
			$oldspieltag = $dbspieltag;
			
			}

		$text .= "<tr>";
		$text .=  "<td colspan='3'><br>&nbsp;";
		$text .= "</tr></table>";
		echo xmltag("description", $text);
		echo "<pubDate>";
		echo "";									# sollte so aussehen: Fri, 17 Mar 2005 10:16:55 GMT+01:00
		echo "</pubDate>\r\n";
		echo "</item>\r\n\r\n";	
	
		}
	// --------------------------------------------------------------------------------------------------------------------

	// ----------------------------------- F u s s z e i l e -------------------------
	echo "</channel>\r\n";
	echo "</rss>\r\n";
	// -------------------------------------------------------------------------------




	// ################## LOGBOT #########################
	//             //$logurl =  GetURL();            // ##
            $logip = GetEnv('REMOTE_ADDR');
            $logpage = "[RSS-request]";
            $name = "[RSS]";
   # include ('../script/BOTlogbot.php');       // ##
	// #####################################################
	
	}
	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++









// +++++++++++++++++++++++++++++++++++++++++ der XML +++++++++++++++++++++++++++++++++++++++++++++++++++++++++

if ( ($feed == 'xml') OR ($feed == 'XML') OR ($feed == 'Xml') ) {
	// ----------------------------------- K o p f z e i l e -------------------------

	echo "<ftip>\r\n";
	
	$spruch2 = "SELECT id, spieltage FROM wettkampf WHERE done = 0";
	$result2 = mysql_query($spruch2, $db) or die("<b>aktWK</b> failed : " . mysql_error() . "<br><br>" . $spruch2);
	while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    	{

		$wkid = $row2['id'];
		$die_saison = WKname($wkid);
		$aktueller_spieltag = $row2['spieltage'];
	
		echo "\t<wettkampf>\r\n";
		echo "\t\t<titel>$die_saison</titel>\r\n";
		
		
		$spruch = "SELECT liga_spiel.id, spieltag, heim_team_id, gast_team_id, tore_heim, tore_gast,";
		$spruch .= " team.name AS heim, team2.name AS gast, datum, done, spieltag ";
	//	$spruch .= " ,team.wappen_src AS heimwappen, team2.wappen_src AS gastwappen, datum";
		$spruch .= " FROM liga_spiel";
		$spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
		$spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
		$spruch .= " WHERE wettkampf_id = $wkid";
		$spruch .= " ORDER BY spieltag DESC, datum, id ASC";
		$result = mysql_query($spruch, $db) or die("<b>getSpielpaarung</b> failed : " . mysql_error() . "<br><br>" . $spruch);
			
		$bla=0;
		
		$oldspieltag = "";
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
			$die_heimmannschaft = str_replace ("&uuml;", "ue", $row['heim']);
			$die_gastmannschaft = str_replace ("&uuml;", "ue", $row['gast']);
			$die_heimtore = $row['tore_heim'];
			$die_gasttore = $row['tore_gast'];	
			$dbspieltag = $row['spieltag'];
			$spieldatum = $row['datum'];
			$doneflag = $row['done'];
			
			$bla++;
		
			if ($oldspieltag != $dbspieltag) {
				if ($oldspieltag != "") echo "\t\t</spieltag>\r\n";	
			
    			echo "\t\t<spieltag id='$dbspieltag'>\r\n";			
   				echo "\t\t<tag>$dbspieltag</tag>\r\n";				
				$bla = 1;
				} 
	
    		echo "\t\t<spiel id='$bla'>";
			echo "\t\t\t<datum>$spieldatum</datum>\r\n";
			echo "\t\t\t<heim>$die_heimmannschaft</heim>\r\n";
			echo "\t\t\t<gast>$die_gastmannschaft</gast>\r\n";
			echo "\t\t\t<heimtore>$die_heimtore</heimtore>\r\n";
			echo "\t\t\t<gasttore>$die_gasttore</gasttore>\r\n";
				
			if ($doneflag=='0') {
				echo "\t\t\t<status valid='no'>spiel noch nicht gestartet</status>\r\n";
				} else {
				echo "\t\t\t<status valid='yes'>spiel gestartet bzw. beendet</status>\r\n";
				}
				
			echo "\t\t</spiel>\r\n";			
								
			#if ( ($oldsppieltag != $dbspieltag) AND ($oldspieltag != "")) echo "\t\t</spieltag>\r\n";	
			
			$oldspieltag = $dbspieltag;
			
			} # Ender der FOR - spielpaarungen
		echo "\t\t</spieltag>\r\n";	
		echo "\t</wettkampf>\r\n\r\n";
		} # Ende der Wettkampf FOR schleife
	
	echo "</ftip>\r\n";

	} # END OF FEED
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++





?>
