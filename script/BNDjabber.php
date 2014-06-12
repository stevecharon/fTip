<?php

############################## L - I - C - E - N - C - E ##########################
###																				
### 		fTip - the multiuser-soccer-sweepstakee-manager						
### 		Copyright (C) 2002-2005 by produnis & durchfall-crew				
###-----------------------------------------------------------------------------
###																				
###    This program is free software; you can redistribute it and/or modify		
###    it under the terms of the GNU General Public License as published by		
###    the Free Software Foundation; either version 2 of the License, or		
###    (at your option) any later version.										
###																				
###    This program is distributed in the hope that it will be useful,			
###    but WITHOUT ANY WARRANTY; without even the implied warranty of			
###    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the			
###    GNU General Public License for more details.								
###																				
###    You should have received a copy of the GNU General Public License		
###    along with this program; if not, write to the Free Software 				
###    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA	
###    or visit webpage  http://www.gnu.org/licenses/licenses.html#GPL			
###-----------------------------------------------------------------------------
###																				
###    to contact produnis, please send mail to ftip@produnis.de				
###    or have a look at http://www.produnis.de/fTip							
###																				
###################################################################################

require("class.jabber.php"); # (available at http://cjphp.netflint.net)
			 # class.jabber.php needs php compiled with "mhash()"

$JABBER = new Jabber;
$JABBER->server         = "internnetz.de";	# ersetze mit deinem server (jabber.org, jabber.at, amessage.info)
$JABBER->port           = "5222";
$JABBER->username       = "BerND"
$JABBER->password       = "";			# und paswwort
$JABBER->resource       = "Trainerbank";	# = Location

$JABBER->enable_logging = TRUE;
$JABBER->log_filename   = 'logfile_jabberBND.txt';	# hierhin werden nette infos geloggt



		// Trage hier ein, wohin gesendet werden soll
$wheretosend = 2; 	# 1 = sende an alle kontakte, die der bot-user im roster hat
		  	# 2 = sende an alle user, die in der liste stehen


// ----------- nur wenn $wheretosend = 2  --------------------
$userliste[] = "produnis@internnetz.de"; 	#produnis

$userliste[] = "dirk@internnetz.de";		#dr


// -----------------------------------------------------------


$spieltag = 27; #### wenn $spieltag nicht gesetzt ist, wird default spieltag 1 genommen !!!
 







## ab hier brauchst du nichts mehr zu aendern....


#################################################################################################

##### --------------------- Das eigentliche Script --------------------------------------------

// --------- ueberpruefe ob Server online -----------
if (!$spieltag) $spieltag=1;


$BNDonline = "http://www.produnis.de/fTip/BND.inf";
$checker = file($BNDonline);
if ($checker == 0) {
	echo "\n\nBND-Server zZ nicht verfuegbar...\n\nbreche ab.... ;(\n\n";
	exit;
	}
// --------------------------------------------------

$datei = "http://www.produnis.de/fTip/BND.php?spieltag=" . $spieltag;



$JABBER->Connect() or die("Couldn't connect!");
$JABBER->SendAuth() or die("Couldn't authenticate!");


$JABBER->SendPresence();




## --------------------------------funktionen------------------------------------------------


function NextLineFromStream()
{
	global $STREAM;

	$line = array_shift($STREAM);
//	echo "Matching: ".$line;

	return $line;
}

function TeamName($team) {

	if ( ereg( "1\.FC N.+rnberg", $team)) $team = "1.FC Nuernberg";
	if ( ereg( "FC Bayern M.+nchen", $team)) $team = "FC Bayern Muenchen";
return $team;
}




function UpdateUserlist()
{
	global $JABBER;
	global $userliste;
	global $wheretosend;

	if ( $wheretosend == 2 )return;
	$userliste = "";

	$JABBER->RosterUpdate();
	foreach ($JABBER->roster AS $peer) {
		$jid = $peer['jid'];
		$userliste[] = $jid;
	}
}

function DumpUserliste()
{
	global $userliste;

	echo "Sende an:\n";
	foreach ($userliste AS $jid) {
		echo $jid . "\n";
	}
}



function SendAMessage($text) {
	global $JABBER;
	global $userliste;

	foreach ($userliste AS $ihm) {
		echo "\tsending to " . $ihm . "\n";
		$JABBER->SendMessage($ihm, "chat", NULL, array("body" => $text), $payload );
	}
	echo "\nNachricht an Userliste gesendet (insgesamt " . count($userliste) . ")\n";
	
	#echo $text . "\n\n";
	
}

// ----------------------------------------------------------------------------------------------------------


UpdateUserlist();

echo "\n\nBND nimmt Dienst auf fuer Spieltag " . $spieltag . "\n\n";
$melde_dich = "BND nimmt Dienst auf für Spieltag " . $spieltag;
$do_it = SendAMessage($melde_dich);



		

// +++++++++++++++++++++++++ TUE DIES ALLE 30 SEC. +++++++++++++++++++++++++++++++
while (true) {
	echo "\n" . $datei . "\n";
	$xmlfeed = file($datei);
	$STREAM = $xmlfeed;

	$neuigkeit = 0;
#echo "Keine Neuigkeit: ".$neuigkeit . "\n";
	$message = "";


	

	for ($a=0;$a<9;$a++) {
		// ------------------- zerstueckel den FEED -------------------------
		
		$line = "";
			
		while  ( !ereg( "<heim>(.*)</heim>", $line, $out ) ) {
			$line = NextLineFromStream();
		}

		$heim = $out[1];
		echo "Heim: ".$heim."\n";

		while  ( !ereg( "<gast>(.*)</gast>", $line, $out ) ) {
			$line = NextLineFromStream();
		}
		
		$gast = $out[1];
		echo "gast: ".$gast."\n";

			
		while  ( !ereg( "<heimtore>(.*)</heimtore>", $line, $out ) ) {
			$line = NextLineFromStream();
		}

		$heimtore = $out[1];
		echo "Heimtore: ".$heimtore."\n";

		while  ( !ereg( "<gasttore>(.*)</gasttore>", $line, $out ) ) {
			$line = NextLineFromStream();
		}
		
		$gasttore = $out[1];
		echo "gasttore: ".$gasttore."\n";

// ------------------------------------------------------------------
		

		$heim = TeamName($heim);
		$gast = TeamName($gast);


		if ($heimtore_old[$a] == "") {
			if (($heimtore != "-") OR ($gasttore != "-")) {
			$neuigkeit++;
			echo "Erste Neuigkeit: ".$neuigkeit . "\n";
			}
		$neuigkeit++;
		}


		if (($heimtore_old[$a] != $heimtore) AND ($heimtore != 0) AND ($heimtore_old[$a] != "")) {
			$message .= "Tooor für " . $heim . " zum " . $heimtore . ":" . $gasttore ." zuhause gegen " . $gast . " ! \n";
			$neuigkeit++;
#echo "zweite Neuigkeit: ".$neuigkeit . "\n";			
			}
		if (($gasttore_old[$a] != $gasttore) AND ($gasttore != 0) AND ($gasttore_old[$a] != "")) {
			$message .= "Tooor für die Gäste " . $gast . " zum " . $heimtore . ":" . $gasttore ." bei " . $heim . " ! \n";
			$neuigkeit++;
#echo "dritte Neuigkeit: ".$neuigkeit . "\n";			
			}
		
		if (($heimtore_old[$a] != $heimtore) AND ($heimtore == 0) AND ($neuigkeit == 0)) {
			
			$message .= "Anpfiff " . $heim . " - " . $gast . "\n";
			$neuigkeit++;
#echo "vierte Neuigkeit: ".$neuigkeit . "\n";
			}
		

		$heimteam[$a] = $heim;
		$gastteam[$a] = $gast;
		$heimtore_old[$a] = $heimtore;
		$gasttore_old[$a] = $gasttore;
	}

	if ($neuigkeit > 0) {
		$message .= "\n";
		$message .= "Die aktuellen Ergebnisse: \n";

		for ($a=0;$a<9;$a++) {
			$message .= $heimteam[$a] . " - ";
			$message .= $gastteam[$a] . " ";
			$message .= $heimtore_old[$a] . ":" . $gasttore_old[$a] . "\n";
			}
		//


		// ++++ Sende an alle Jabber-User ++++++++++++++++++++++
		$iditot = SendAMessage($message);
		
		// ++++++++++++++++++++++++++++++++++++++++++++++++++++
	}


$ubi++;
echo "\n\nBin bei Runde : " . $ubi . ", neuigkeit: $neuigkeit\n\n";
sleep(30);

} # Ende der While TRUE schleife
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$JABBER->Disconnect();

?> 
