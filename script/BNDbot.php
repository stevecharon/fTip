<?PHP
include ("SCRIPTinclude.php");

if (!$spieltag) $spieltag = 1;


#### Dieses Script nutzt den BND-Hauptbot von http://www.produnis.de/fTip/BND.php
#### Der Haupt bot liefert ein XML-file der aktuellen Ergebnisse der 1.Fussball-Bundesliga
#### Der entsprechende Spieltag wird mit dem Zusatz aufgerufen:
#### http://www.produnis.de/fTip/BND.php?spieltag=13  <--- ersetzen
#### per default schaut der BOT bei spieltag 1 nach
#### 
####
#### fTip kann den BOT aufrufen per
#### http://www.produnis.de/fTip/BND.php?feed=ftip
#### auch hier wird der spieltag optional gewaehlt mit
#### http://www.produnis.de/fTip/BND.php?feed=ftip&spieltag=15 <--- ersetzen


function TeamName ($teamid) {
global $db;
 	$spruch3 = "SELECT name";
	$spruch3 .= " FROM team";
	$spruch3 .= " WHERE id = $teamid";
	
	$result3 = mysql_query($spruch3, $db);
	$row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
	$teamname =  $row3['name'];

return $teamname;

}

$font1 =  fontSizeColor(2, $txtcol8);  # blau
$font2 =  fontSizeColor(2, $txtcol7);  # schwarz
$font3 =  fontSizeColor(2, $txtcol21);  # rot
$font4 =  fontSizeColor(2, "#00cc00");  # gruen
$font5 =  fontSizeColor(2, $txtcol9);  # lila
$font6 =  fontSizeColor(2, $txtcol12);  # hellblau
$font7 =  fontSizeColor(2, $txtcol13);  # gelblich
$font8 =  fontSizeColor(2, $txtcol18);  # grau
$font9 =  fontSizeColor(2, $txtcol17);  # grau

$error = "0";
$updateflag = "0";
echo "<img src='../img/fTipBND.jpg' alt='BundesligaNachrichtenDienst BND' title='BundesligaNachrichtenDienst BND'>";
echo "<br>";



### ....ueberpruefe, ob BND-server noch aktuell ist.....

$datei = "http://www.produnis.de/fTip/BND.inf";
$checker = file($datei);

if ($checker[0] == "0") {
	
	echo $font3 .  "BND-Server ist zZ nicht erreichbar...<br>";
	
	echo "<form><br><br><input type=button value='Fenster schliessen?' onClick='JavaScript:self.close()'> </form>";
	exit;
	
	
	
	} elseif ($checker[0] == "1") {




### --------------- hole XML-datei mit errgebnissen -----------------------------

	$datei = "http://www.produnis.de/fTip/BND.php?feed=ftip&spieltag=" . $spieltag;
	$array = file($datei);
	
	
	if ($debug == 1) {
		for($x=0;$x<count($array);$x++){
  			echo $x . " : " . $array[$x];
  			echo "<br>";
			}
		}

	// ------------ liga art -------------------------------------	
	$liga_art_f = str_replace ("<", "", $array[0]); 
	$liga_art_f = str_replace (">\r\n", "", $liga_art_f);
	if ($liga_art_f == "bundesliga") {
		$liga_art = "3";
		} else {
		$error++;
		}	
	// -----------------------------------------------------------

	
	$wkid_f = str_replace ("<wkid>", "", $array[1]);
	$wkid = str_replace ("</wkid>\r\n", "", $wkid_f);
	if ($wkid == "") 	$error++;
	
	
	$saison_f = str_replace ("<saison>", "", $array[2]);
	$saison = str_replace ("</saison>\r\n", "", $saison_f);
	if ($saison == "") 	$error++;
	
	
	$spieltag_f = str_replace ("<spieltag>", "", $array[3]);
	$spieltag_f = str_replace ("</spieltag>\r\n", "", $spieltag_f);
	if ($spieltag_f == "") 	$error++;
	if ($spieltag_f != $spieltag) 	$error++;


	if ($debug == "1") {
		echo "$font1<hr>Liga_artID : " . $liga_art . "<br>";
		echo "WKID : " . $wkid . "<br>";
		echo "Saison : " . $saison_f . "<br>";
		echo "Spieltag : " . $spieltag_f . "<br>";
		echo "Error: " . $error . "<br><hr>";
		}
	
	
	
	
	## -------- ueberpruefen, ob dieser WK so in der DB steht ---------------------
	
	$spruch  = "SELECT id FROM wettkampf ";
	$spruch .= " WHERE saison = '$saison' AND liga_art_id = $liga_art";
	$result = mysql_query($spruch, $db) or die("<b>getWK</b> failed : " . mysql_error() . "<br><br>" . $spruch);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	
	$db_wkid = $row['id'];
	
	if ($db_wkid == $wkid) {
		
		echo "$font5 Wettkampf gefunden !<br>";
	
		} else {
		
		echo $font3 .  "XML-Wettkampf hat andere ID als in deiner Datenbank !";
		$error++;
		
		
		echo "<form><br><br><input type=button value='Fenster schliessen?' onClick='JavaScript:self.close()'> </form>";
	
		exit;
		}
	
	
	
	
	## ------------ die spiele ueberpruefen ----------------------------------------
	
	for ($paar=0; ($paar<9);$paar++) {
	
		$aufschlag = ($paar * 7) ; # spiele liegen im abstand von 7 zeilen
		$zeile = (5 + $aufschlag) ; # startet bei zeile 5, dann immer 7 weiter
		
		
		// ++++ ueberpruefe SPIEL_ID ++++++++
		$sid_f = str_replace ("\t\t<sid>", "", $array[$zeile]);
		$sid_f = str_replace ("</sid>\r\n", "", $sid_f);
		$zeile++;
		// ----------------------------------
				
		
		// ++++ ueberpruefe heimteam_ID ++++++++
		$heim_f = str_replace ("\t\t<heim>", "", $array[$zeile]);
		$heim_f = str_replace ("</heim>\r\n", "", $heim_f);
		$zeile++;
		// ----------------------------------
		
				
		
		// ++++ ueberpruefe gastteam_ID ++++++++
		$gast_f = str_replace ("\t\t<gast>", "", $array[$zeile]);
		$gast_f = str_replace ("</gast>\r\n", "", $gast_f);
		$zeile++;
		// ----------------------------------
		
				
		
		// ++++ ueberpruefe heimtore ++++++++
		$heimtore_f = str_replace ("\t\t<heimtore>", "", $array[$zeile]);
		$heimtore_f = str_replace ("</heimtore>\r\n", "", $heimtore_f);
		$zeile++;
		// ----------------------------------
		
				
		
		// ++++ ueberpruefe gastore ++++++++
		$gasttore_f = str_replace ("\t\t<gasttore>", "", $array[$zeile]);
		$gasttore_f = str_replace ("</gasttore>\r\n", "", $gasttore_f);
		$zeile++;
		// ----------------------------------

		if ($sid_f == "not in DB") {
			echo $font3 .  "FEED kennt spiel nicht... ;-(";
			$error++;
			echo " Error: $error <br>";		
			} else {
			$spruch = "SELECT id, tore_heim, tore_gast FROM liga_spiel WHERE heim_team_id = $heim_f AND gast_team_id = $gast_f AND wettkampf_id = $wkid AND spieltag = $spieltag_f";
			$result = mysql_query($spruch, $db) or die("<b>getSpielpaarung</b> failed : " . mysql_error() . "<br><br>" . $spruch);
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$sid = $row['id'];
			$dbheimtore = $row['tore_heim'];
			$dbgasttore = $row['tore_gast'];
			
			
			if ( ($sid == '') OR ($sid != $sid_f) ) { 
				$error++; 
				echo $font3 .  "FEED ID des Spiels stimmt nicht mit Deiner DB &uuml;berein...";
				}
			
			$heimname = TeamName($heim_f);
			$gastname = TeamName($gast_f);
			echo $font1 . "Spiel $font4 $sid_f $font1 gefunden ($heimname - $gastname)<br>";

			}


		
		if ($debug == 1) {
			echo "Spiel_ID : " . $sid_f . "<br>";
			echo "heim_ID : " . $heim_f . "<br>";
			echo "gast_ID : " . $gast_f . "<br>";
			echo "heimtore : " . $heimtore_f . " (db: $dbheimtore)<br>";		
			echo "gasttore : " . $gasttore_f . " (db: $dbgasttore)<br>";			
			echo "<br>";
			}




		if ($error != 0) {
		
			echo $font3 .  "Es ist ein Fehler aufgetreten.... der BND wird sicherheitshalber abgebrochen, ";
			echo " um der Datenbank keinen (ungewollten) Schaden zuzuf&uuml;gen";
		
		
			echo "<form><br><br><input type=button value='Fenster schliessen?' onClick='JavaScript:self.close()'> </form>";
			exit;
			} else {
			
			
			if ( ($heimtore_f == '-') OR ($gasttore_f == '-')) {
				echo $font7 . "Spiel noch nicht gestartet...<br>";
			
				} else {
				
				
				echo $font6 .  "Spiel l&auml;uft bzw. abgeschlossen...<br>";
				
				if (($heimtore_f != $dbheimtore) OR ($gasttore_f != $dbgasttore)) {
				
					// hier kommt jetzt der DBkrams hinne...
					 $sprich  = "UPDATE liga_spiel ";
					 $sprich .= " SET tore_heim = $heimtore_f, tore_gast = $gasttore_f, done = 1" ;
					 $sprich .= " WHERE id = $sid_f";
					 $resilt = mysql_query($sprich, $db) or die ("Nee :" . mysql_error() . "<br><br>" . $sprich);
					# echo $sprich . "<br>";
					echo $font8 . "<b>Neues Ergebnis $heimtore_f : $gasttore_f</b>...  wurde in DB gespeichert...";
					echo "<br><br>";
					$updateflag++;	
					
					} else {
					echo $font9 . "Ergebnis unver&auml;ndert ($heimtore_f : $gasttore_f).. kein DB-update n&ouml;tig..<br><br>";
									
					}
					
					
				} # Ende von tore = "-"
			
			
			
			}  # Ende von ERROR = 0


			
		}  # Ende der FOR-schleife Spielpaarunge 
	## --------------------------------------------------------------------------------------
	
	
	if ($updateflag > 0) {
		$wettkampfid = $wkid;
		echo $font8 . "<br>Punkt-Daumenfaxe wird gestartet (WK=$wettkampfid  spieltag=$spieltag)<hr>";
		include ('../script/SCRIPTpunktdaumen.php');
		} else {
		echo $font9 . "<br>Punkt-Daumenfaxe nicht notwendig";
		}
	
	
	
	
	
	
	} # END OF FILE

if ($error == 0) {
	echo "<meta http-equiv='refresh' content='30; URL=BNDbot.php?spieltag=" . $spieltag . "'>";
	echo "$font2<hr>Auto-refresh in 30sec ...<hr>";
	}


?>

<form> <input type=button value="Fenster schliessen?" onClick="JavaScript:self.close()"> </form>