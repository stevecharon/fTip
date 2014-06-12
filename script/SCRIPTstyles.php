<?php

// 							fTip Stylesheets v1.0 
// 			Endlich hat der Joerch auch mal was selber getippt....
//				Also das sind unsere privaten Stylesheets....
// ##################################################################

// ++++++++++++++++++++++++++  T  A  G  S   +++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

define ("KONSTANTE", "Text" ); 

$mittig = "<p align=\"center\">";

$center = " align=\"center\"";
$left = " align=\"left\"";
$right = " align=\"right\"";
$top = " valign=\"top\"";

$dreispace = "&nbsp;&nbsp;&nbsp;";

$daumen_2 = "<img height=\"20\" src=\"../img/daumen_hoch.gif\" border=\"0\" alt=\"aufgestiegen\">";
$daumen_3 = "<img height=\"20\" src=\"../img/daumen_runter.gif\" border=\"0\" alt=\"abgestiegen\">";
$daumen_1 = "<img height=\"17\" src=\"../img/daumen_gleich.gif\" border=\"0\" alt=\"gleichgeblieben\">";

$border0 = " border=\"0\"";
$border1 = " border=\"1\"";

$cspn2 = " colspan=\"2\"";
$cspn3 = " colspan=\"3\"";
$cspn4 = " colspan=\"4\"";
$cspn5 = " colspan=\"5\"";
$cspn6 = " colspan=\"6\"";
$cspn7 = " colspan=\"7\"";
$cspn8 = " colspan=\"8\"";
$cspn9 = " colspan=\"9\"";
$cspn10 = " colspan=\"10\"";

$endehtml  = "<br></td></tr>";
$endehtml .= "<tr><td colspan=\"5\" width=\"774\"><hr></td></tr>";
$endehtml .= "<tr><td colspan=\"5\">$mittig <font size=\"1\" face=\"Arial\">"; 
$endehtml .= "fTip (c) 2002-2003 sirDavid, Produnis";
$endehtml .= "</FONT></td></tr></table></body></html>";



// +++++++++++++++++++++++  F  A  R  B  E  N  +++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


//  ################## Auflistung (Nie Mehr Schwuchtelpink)###############

$bgcolor18 = "bgcolor=\"#229cdd\"";		  		// Ueberschrift
$bgcolor19 = "bgcolor=\"#7bb1ff\"";		  		// Textfeld

$bgcolor22 = "bgcolor=\"#b7d5ff\"";		  		// Neuer Eintrag
// -----------------------
$txtcol18 = "black";	  						// Ueberschrift
$txtcol19 = "#0000dd";	  						// Text (Name)
$txtcol20 = "#a7085a";	  						// Text2 (Email) 
$txtcol21 = "#ee0000";	  						// loeschen ! (rot) 

$txtcol22 = "#009933";	  						// Neuer Eintrag



//  ######################### gibts - gibts nicht ##################
//  ++++++++++++++++ g i b t s
$bgcolor23 = "bgcolor=\"#0000bb\"";		  		// Ueberschrift
$bgcolor24 = "bgcolor=\"#4963ef\"";		  		// Textfeld
// -----------------------
$txtcol23 = "#b7ffbd";	  						// Ueberschrift
$txtcol24 = "#ffeda7";	  						// Textfeld

//  ++++++++++++++++ g i b t s    n i c h t 
$bgcolor25 = "bgcolor=\"#9c08ef\"";		  		// Ueberschrift
$bgcolor26 = "bgcolor=\"#cb69ff\"";		  		// Textfeld
// -----------------------
$txtcol25 = "#fff7fd";	  						// Ueberschrift
$txtcol26 = "#b7f9fe";	  						// Textfeld


//  ############################ TABELLE (geht DOCH ! )############

$bgcolor35 = "bgcolor=\"#fffafa\"";				//  Hintergrund
$bgcolor36 = "bgcolor=\"#fff7af\"";				//  Erster und Zweiter
$bgcolor37 = "bgcolor=\"#ccffbc\"";				//  UEFA-Plaetze
$bgcolor38 = "bgcolor=\"#e6e6e6\"";				//  Andere
$bgcolor39 = "bgcolor=\"#ff949f\"";				//  Abstiegsplaetze
// -----------------------
$txtcol35 = "black";								// Ueberschrift
$txtcol36 = "black";								// Ueberschrift
$txtcol37 = "black";								// Ueberschrift
$txtcol38 = "black";								// Ueberschrift
$txtcol39 = "black";								// Ueberschrift


//  ########################## TIPS Abgeben ########################

$bgcolor7 = "bgcolor=\"#dadada\"";				//  Ueberschrift
$bgcolor8 = "bgcolor=\"#c2c2c2\"";				//  Mannschaften
$bgcolor9 = "bgcolor=\"#ffe200\"";				//  Tips
// -----------------------
$txtcol7 = "black";								// Ueberschrift
$txtcol8 = "#041fff";							// Mannschaft HEIM
$txtcol9 = "#5014cc";							// Mannschaft GAST




//	#################### TipsVergleichen (compare.php) ##################

$bgcolor1 = "bgcolor=\"#cccccc\"";				//###Mannschaft/Ergebnis

$bgcolor4 = "bgcolor=\"#e0e0e0\"";				//###Tip
$bgcolor5 = "bgcolor=\"#ffe200\"";				//###Punkte
$bgcolor6 = "bgcolor=\"#fff080\"";				//###Punkte Gesamt
// -----------------------
$txtcol1 = "#041fff";							// Mannschaft HEIM
$txtcol2 = "#5014cc";							// Mannschaft GAST
$txtcol3 = "#0000cc";							// Tore SPIEL

$txtcol4 = "#0099cc";							// TIPP
$txtcol5 = "#111111";							// Punkte EINZEL
$txtcol6 = "#aa0000";							// Punkte GESAMT




//  ######################### UserRanking ##########################
//  +++++++ a k t u e l l 
$bgcolor10 = "bgcolor=\"lime\"";		  		// erster Platz
$bgcolor11 = "bgcolor=\"#00ff66\"";		  		// zweiter Platz 
$bgcolor12 = "bgcolor=\"#00ff99\"";		  		// dritter Platz 
$bgcolor13 = "bgcolor=\"#00ffcc\"";		  		// andere Plaetze
// -----------------------
$txtcol10 = "#3300ff";	  						// erster Platz
$txtcol11 = "#9900ff";	  						// zweiter Platz
$txtcol12 = "#0066cc";	  						// dritter Platz
$txtcol13 = "#ff6600";	  						// andere Plaetze

//  +++++++ g e s a m t w e r t u n g  
$bgcolor14 = "bgcolor=\"#000077\"";		  		// erster Platz
$bgcolor15 = "bgcolor=\"#6633ff\"";		  		// zweiter Platz 
$bgcolor16 = "bgcolor=\"#6699ff\"";		  		// dritter Platz 
$bgcolor17 = "bgcolor=\"#00ccff\"";		  		// andere Plaetze
// -----------------------
$txtcol14 = "#ffff66";	  						// erster Platz
$txtcol15 = "#ffff99";	  						// zweiter Platz
$txtcol16 = "#ffcccc";	  						// dritter Platz
$txtcol17 = "#666666";	  						// andere Plaetze

// +++++++++ a l t e    L i g a ++++++++++++++++++
$bgcolor41 = "bgcolor=\"#f7db00\"";		  		// erster Platz
$txtcol41 = "#ff1e5e";	  						// erster Platz

$bgcolor42 = "bgcolor=\"#cbe1e1\"";		  		// zweiter Platz
$txtcol42 = "#1012cc";	  						// zweiter Platz

$bgcolor43 = "bgcolor=\"#e99142\"";		  		// dritter Platz
$txtcol43 = "#053b38";	  						// dritter Platz

$bgcolor44 = "bgcolor=\"#0e3588\"";		  		// andere Plaetze
$txtcol44 = "#26e6e1";							// andere Plaetze

// +++++++++++++++++++++++++++++

$bgcolor40 = "bgcolor=\"black\"";		  		// MEIN Plaetz
$txtcol40 = "white";	  						// MEIN Plaetz



//  ######################### User Start ##########################
//  ++++++++++++++++ g i b t s
$bgcolor27 = "bgcolor=\"#35adff\"";		  		// Ueberschrift 1 (Tipprunden)
$bgcolor28 = "bgcolor=\"#35adff\"";		  		// Textfeld 1 (Tipprunde)
$bgcolor29 = "bgcolor=\"#8c82ff\"";		  		// Ueberschrift 2 (Wettkampf)
$bgcolor30 = "bgcolor=\"#8c82ff\"";		  		// Textfeld 2 (Wettkampf)
// -----------------------
$txtcol27 = "black";	  						// Ueberschrift
$txtcol28 = "white";	  						// Textfeld 1 (Tipprunde)
$txtcol29 = "black";	  						// Ueberschrift 2 (Wettkampf)
$txtcol30 = "white";	  						// Textfeld 2 (Wettlampf)




//  ######################### Wettkampfliste ##########################
//  ++++++++++++++++ a k t u e l l e
$bgcolor31 = "bgcolor=\"#3d00a6\"";		  		// Ueberschrift 
$bgcolor32 = "bgcolor=\"#5e00ff\"";		  		// Textfeld 
// -----------------------
$txtcol31 = "#ccffff";	  						// Ueberschrift
$txtcol32 = "#ccffff";	  						// Textfeld

//  ++++++++++++++++ a b g e s c h l o s s e n 
$bgcolor33 = "bgcolor=\"#4f00d7\"";		  		// Ueberschrift 
$bgcolor34 = "bgcolor=\"#a794ff\"";		  		// Textfeld 
// -----------------------
$txtcol33 = "#cfc1ff";	  						// Ueberschrift
$txtcol34 = "#edfffa";	  						// Textfeld

$bgcolor45 = "bgcolor=\"#ffffff\"";		
$bgcolor46 = "bgcolor=\"#aa0000\""; // ROT
// ++++++++++++++++++++++++++++++ End of File +++++++++++++++++++++++
// Benutzte Zahlen: 46


?>