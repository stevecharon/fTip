<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTlogfunctions.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##

//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------

$Sternzeit = $_GET['Sternzeit'];
$befehl = $_GET['befehl'];

// uebergeben wird $Sternzeit (timestamp) UND befehl
if (!$Sternzeit) $Sternzeit = date('Ymd');
$dasJahr = $Sternzeit[0] . $Sternzeit[1] . $Sternzeit[2] . $Sternzeit[3];
$derMonat = $Sternzeit[4] . $Sternzeit[5];
$derTag = $Sternzeit[6] . $Sternzeit[7];
$anzahlTage = WievielTageGibtEs($derMonat, $dasJahr);
$heutigerTag = date('d');
$heutigerMonatg = date('m');
$heutigesJahr = date('Y');
$tatsaechlichHeute = $heutigesJahr . $heutigerMonatg . $heutigerTag ;
$anzahlHeutigerTage = WievielTageGibtEs($heutigerMonat, $heutigesJahr);
$Monatsname = logMonatsname ($derMonat) ;
$MonatsnameHeute = logMonatsname ($heutigerMonat) ;
$TageKlicker = ($anzahlTage+1);
    $font  = fontSizeColor(4, $txtcol17);
    
    $font1 = fontSizeColor(2, $txtcol13);
    $font2 = fontSizeColor(2, $txtcol7);
    $font3 = fontSizeColor(1, $txtcol7);
    $font4 = fontSizeColor(1, $txtcol1);
    $font5 = fontSizeColor(1, $txtcol2);
    $font6 = fontSizeColor(1, $txtcol3);




if ((!$befehl) OR ($befehl < 4)) { // erster Aufruf bzw Startseite

    $colspan = $cspn2;
    $DBzeit = $heutigesJahr . $heutigerMonatg . $heutigerTag;
    $background1 = $bgcolor8;
    $background2 = $bgcolor1;
    $text1 = fontSizeColor(2, $txtcol13);
    $text2 = fontSizeColor(1, $txtcol1);

}

if ( ($befehl == 4) OR ($befehl ==5) ) {  // Tagesuebersicchten

    $colspan = $cspn3;
    $DBzeit = $dasJahr . $derMonat . $derTag;
    $background1 = $bgcolor36;
    $background2 = $bgcolor37;
    $text1 = fontSizeColor(2, $txtcol7);
    $text2 = fontSizeColor(1, $txtcol1);
}

if ( $befehl == 6 ) {  // Monatsuebersicchten

    $colspan = $cspn3;
    $DBzeit = $dasJahr . $derMonat ;
    $background1 = $bgcolor18;
    $background2 = $bgcolor19;
    $text1 = fontSizeColor(2, $txtcol7);
    $text2 = fontSizeColor(1, $txtcol1);
}


if ($befehl == 7) {  // Jahresesuebersicchten

    $colspan = $cspn3;
    $DBzeit = $dasJahr ;
    $background1 = $bgcolor10;
    $background2 = $bgcolor2;
    $text1 = fontSizeColor(2, $txtcol7);
    $text2 = fontSizeColor(1, $txtcol1);
}


// ##############################################################################################
//                                          Die Seite
// ##############################################################################################
echo "<table cellspacing=6 $center border=0>";

echo "<tr><td $colspan $center>$font";
if ((!$befehl) OR ($befehl == 0)) echo "$lang_ftipaccess"; // Startseite
if ( ($befehl == 4) OR ($befehl ==5) ) echo $lang_dayaccess . " <b>" . $derTag . ". $Monatsname $dasJahr</b>";
if ( $befehl == 6) echo $font . $lang_monthaccess . " <b>$Monatsname $dasJahr</b>";

echo "</td></tr>";

echo "<tr>";

// --------- die letzten 20 -----------------------------------------------------
if ( (!$befehl) OR ($befehl == 0) )
{
  echo "<td>";
    echo "<table $background1 cellspacing=5 $center border=1><tr>";
    echo "<td $center $background2 $cspn4>" . $text1 . $lang_lasttwentyaccess . "</td></tr>";

    echo "<tr><td $center>" . $font2 . $lang_pointintime . "</td>";
    echo "<td $center>" . $font2 . $lang_user . "</td>";
    echo "<td $center>" . $font2 . $lang_site . "</td>";
    echo "<td $center>" . $font2 . $lang_ip . "</td>";

    echo "</tr>";
    
    $spruch  = "SELECT id,  page, user, ip, timestamp FROM weblog";
    $spruch .= " ORDER BY timestamp DESC  LIMIT 20";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $dbtime = $row['timestamp']; $lasttime = DatePrint($dbtime);
        $lastpage = $row['page'];
        $lastuser = $row['user'];
        $lastip = $row['ip'];
        if ($lastuser == '') $lastuser = "[gast]";
        
        echo "<tr>";
    
        echo "<td $left>" .$font3 ."&nbsp;$lasttime" . "&nbsp;</td>";
        echo "<td $left>" .$font4 ."&nbsp;$lastuser" . "&nbsp;</td>";
        echo "<td $left>" .$font5 ."&nbsp;$lastpage" . "&nbsp;</td>";
        echo "<td $left>" .$font6 ."&nbsp;$lastip" . "&nbsp;</td>";
        echo "</tr>";

    }
    echo "</table>";
 echo "</td>";      
}       
// ----------------------------------------------------------------------------


// ---------------------- user war online ---------------------------------------------------
if ( (($befehl > 3) AND  ($befehl < 7)) OR ($befehl == 1) ) {
echo "<td $top>";

    echo "<table cellspacing=2 $center border=1><tr>";
    echo "<td $center $background1 >$text1 $dreispace " . $lang_todayonline . ": $dreispace</td></tr>";
    echo "<tr><td $background2 $left>$dreispace<br>";
    
   
    
    $spruch  = "SELECT id,  user, timestamp FROM weblog";
    $spruch .= " WHERE timestamp like '" . $DBzeit . "%'";
    $spruch .= " GROUP BY user";
    $spruch .= " ORDER BY user";
    $result = mysql_query( $spruch, $db ) or die("UserHeute failed : " . mysql_error() . "<br><br>" . $spruch);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {   
        $dbtime = $row['timestamp']; $heutetime = DatePrint($dbtime);
        $heuteuser = $row['user']; 
        if ($heuteuser == '') $heuteuser = "[gast]";
        echo $text2 . "$dreispace" .$heuteuser . "<br>";
    }
    echo "$dreispace</td></tr></table>";

echo "</td>";
}
// -------------------------------------------------------------------------------------------



// --------- Most User Klicker -----------------------------------------------------
if ( (($befehl > 3) AND  ($befehl <= 7)) OR ($befehl == 2) ) {
 echo "<td $top>";
    echo "<table  cellspacing=2 $center border=1><tr>";
    echo "<td $background1 $center $cspn2>$text1$dreispace";
    echo $lang_frequency . " $dreispace</td></tr>";
   
    $spruch  = "SELECT id, COUNT(user) AS gesamt, user FROM weblog ";
    if ($befehl > 3) $spruch .= " WHERE timestamp like '" . $DBzeit . "%'";

//    $spruch .= " WHERE timestamp like '" . $heutigermonat . "%'";
    $spruch .= " GROUP BY user";
    $spruch .= " ORDER BY gesamt DESC";
    $result = mysql_query( $spruch, $db ) or die("MostUser failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    
    $o = $row['user'];
    if ($o == '') $o = "[gast]";
    $a = $row['gesamt']; 
    
    echo "<tr  $background2>";
    echo "<td $left>" . $dreispace . $font3 . $o . $dreispace . "</td>";
    echo "<td $right>"  . $dreispace . $font4 . $a . $dreispace . "</td>";
    echo "</tr>";
    }
    
    echo "</table>";
 echo "</td>";
}
// ----------------------------------------------------------------------------


// --------- Most Site -----------------------------------------------------
if ( (($befehl > 3) AND  ($befehl <= 7)) OR ($befehl == 3) ) {
  echo "<td $top>";
    echo "<table  cellspacing=2 $center border=1><tr>";
    echo "<td $center $background1 $cspn2>$text1$dreispace " . $lang_mostwantedsite . " $dreispace</td></tr>";
   
    $spruch  = "SELECT id, COUNT(page) AS gesamt, page FROM weblog ";
if ($befehl > 3) $spruch .= " WHERE timestamp like '" . $DBzeit . "%'";
    $spruch .= " GROUP BY page";
    $spruch .= " ORDER BY gesamt DESC";
    $result = mysql_query( $spruch, $db ) or die("MostPages failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    
    $o = $row['page'];
    $a = $row['gesamt']; 
    
    echo "<tr $background2>";
    echo "<td $left>" . $dreispace . $font3 . $o . $dreispace . "</td>";
    echo "<td $right>"  . $dreispace . $font4 . $a . $dreispace . "</td>";
    echo "</tr>";
    }
    
    echo "</table>";
 echo "</td>";   
}
// ----------------------------------------------------------------------------




// ############################### Funktionsuebersicht rechts ########################################################
if ($befehl < 4) {
echo "<td $top>";
    
    echo "<table border=1 $center>";
    echo "<tr><td $center $bgcolor8>$font1 $lang_functions</td></tr>";
    echo "<tr><td $bgcolor7><ul>";
    
        echo "<li>" . $font2 . "<a href=\"../admin/admin_log.php?befehl=0&Sternzeit=" . $Sternzeit . "\">";
        echo $lang_lasttwentyaccess . "</a>$dreispace";
     
        echo "<li>" . $font2 . "<a href=\"../admin/admin_log.php?befehl=1&Sternzeit=" . $Sternzeit . "\">";
        echo $lang_todayonline . "</a>$dreispace";
        
        echo "<li>" . $font2 . "<a href=\"../admin/admin_log.php?befehl=2&Sternzeit=" . $Sternzeit . "\">";
        echo $lang_frequency . "</a>$dreispace";
        
        echo "<li>" . $font2 . "<a href=\"../admin/admin_log.php?befehl=3&Sternzeit=" . $Sternzeit . "\">";
        echo $lang_mostwantedsite . "</a>$dreispace";
    
    echo "</ul>";
    echo "<p $center><a href='../admin/admin_log.php?Sternzeit=" . $tatsaechlichHeute ."&befehl=4'>";
    echo $font2 . $lang_analysistoday . "</a>";
    echo "<br>&nbsp;</td></tr>";
    echo "</table>";
// +++++++++++++++++++
    $dummy1 = LogginStartete();
    $dummy2 = LogginEndet() ;
    
    $startete = $dummy1[0] . $dummy1[1] . $dummy1[2] . $dummy1[3];
    $endete = $dummy2[0] . $dummy2[1] . $dummy2[2] . $dummy2[3];
    $seitJahren = ($endete - $startete);
    //$seitJahren++;
    if ($seitJahren > 0) {
    echo "<br><table border=1 $center>";
    echo "<tr><td $center $bgcolor8>$font1 $lang_archive</td></tr>";
    echo "<tr><td $bgcolor7>";
    echo "<ul>";

        for ($i=0;$i<$seitJahren;$i++) {
            $jetztHammwa = ($startete + $i);
            echo "<li><a href='../admin/admin_log.php?Sternzeit=" . $jetztHammwa . "&befehl=7'>$font2";
            echo "$jetztHammwa</a>$dreispace";
        
        }
    
    echo "</td></tr></table>";
    }
 echo "</td>";
 }
// ---------------------------------------------   


echo "</tr></table>";

// ##############################################################################################



if ($befehl < 7) {
echo "<br><br>";

// ###############################################################################
// --------- Stundenuebersicht ---------------------------

echo "<table $center border=1><tr  $background1>";
echo "<td colspan=25 $center>$font2 $lang_summaryhours ";
if ($befehl <6) echo "<b>$derTag</b>.";

echo  "<b>$Monatsname $dasJahr</b>";
echo "</td></tr>";


echo "<tr  $background2><td $left>&nbsp;$font5";
echo $lang_accesses . "&nbsp;</td>";
if ((!$befehl) OR ($befehl < 6)) $d = logStundenzugriff($derTag, $derMonat, $dasJahr, 2);
if ($befehl== 6) $d = logStundenzugriff($derTag, $derMonat, $dasJahr, 1);
if ($befehl== 7) $d = logStundenzugriff($derTag, $derMonat, $dasJahr, 0);

for ($std=0;$std<24;$std++) {
    $DieStunde = StundeInSchoen ($std) ;
    if ($d[$DieStunde] == '') $d[$DieStunde] = '-';
    echo "<td $center>" . $font3 . "$d[$DieStunde]</td>";  
}

if ($befehl < 6) {
    echo "</tr>";
    echo "<tr $background2><td $left>&nbsp;$font5";
    echo $lang_numberofusers . "&nbsp;</td>";

    for ($std=0;$std<24;$std++) {

        $DieStunde = StundeInSchoen ($std) ;
        $dummydumm = $dasJahr . $derMonat . $derTag . $DieStunde;
        $d =  logAnzhalUserTag($dummydumm);
    
     if ($d == '') $d = '-';
        echo "<td $center>" . $font3 . "$d</td>";  
    }

}

echo "</tr><tr  $bgcolor2><td $center>&nbsp;$font3";
echo $lang_hour . "&nbsp;</td>";
for ($std=0;$std<24;$std++) {

    $DieStunde = StundeInSchoen ($std) ;
    echo "<td $center>" . $font4 . "$DieStunde</td>";  
}
echo "</tr></table>";



// ###############################################################################

echo "<br><br>";


// ###############################################################################
// -------------- Monatsuebersicht ---------------------------

// echo $TageKlicker . $dasJahr . $derMonat;
echo "<table $center border=1><tr>";
echo "<td $background1 colspan=32 $center>";
echo "<a href='../admin/admin_log.php?befehl=6&Sternzeit=" . $dasJahr . $derMonat . "'$font2 " . $lang_summarymonth . " ";
echo "<b>$Monatsname $dasJahr</b></td></tr>";




// ----- zugriffe -------------
echo "<tr $background2 ><td $center>$font5 $lang_accesses </td>";

for ($q=1;$q<$TageKlicker;$q++) {
    $stelle = DerTagInSchoen ($q) ;
    $ichBrauche = $dasJahr . $derMonat . $stelle;
    $p = logZugriffeTag($ichBrauche);
    if ( ($tatsaechlichHeute - $ichBrauche) < 0) $p = '&nbsp;';
    echo "<td $center>" . $font3 . "$p</td>";
}
// --------------------------------------



// ------ anzahl user -----------
echo "</tr><tr  $background2 ><td>$font5 $lang_numberofusers";
for ($q=1;$q<$TageKlicker;$q++) {

    $stelle = DerTagInSchoen ($q) ;
    $ichBrauche = $dasJahr . $derMonat . $stelle;
    $p = logAnzhalUserTag($ichBrauche);
    if ( ($tatsaechlichHeute - $ichBrauche) < 0) $p = '&nbsp;';
    echo "<td $center>" . $font3 . "$p</td>";
}
// -----------------



// -------- tagesdatum ---------------
echo "</tr><tr><td $center>$font3 $lang_date </td>";
for ($q=1;$q<$TageKlicker;$q++) {
    echo "<td   $bgcolor2 $center>";
    
        
    $stelle = DerTagInSchoen ($q) ;
    $ichBrauche = $dasJahr . $derMonat . $stelle;
    if ( ($tatsaechlichHeute - $ichBrauche) >= 0) echo "<a href='../admin/admin_log.php?befehl=4&Sternzeit=" . $ichBrauche ."'>";
    echo $font4 . "$q</a></td>";
    
}
echo "</tr></table>"; 
// ------------------------------------------------------------     
// ###############################################################################
}
echo "<br><br>";

// ###############################################################################
// -------------- JAHRES uebersicht ---------------------------

    

    
echo "<table $center border=1><tr>";
echo "<td  $background1 colspan=13 $center>";
echo "<a href='../admin/admin_log.php?befehl=7&Sternzeit=" . $dasJahr . "'>" . $font2;
echo $lang_summaryyear . " $dasJahr</a></td></tr>";



// ----- zugriffe -------------
echo "<tr $background2><td $center>$font5 $lang_accesses </td>";

for ($q=1;$q<13;$q++) {
    $ZurZeitMonat = DerTagInSchoen ($q);
    $rechenDummy = $dasJahr . $ZurZeitMonat;
    $p = logZugriffeTag($rechenDummy);
    $ichHabe = $heutigesJahr . $heutigerMonatg;
    if ( ($ichHabe - $rechenDummy) < 0)  $p = '&nbsp;';
    echo "<td $center>" . $font3 . "$p</td>";
}
// --------------------------------------
// ------ anzahl user -----------
echo "</tr><tr $background2><td>$font5 " . $lang_numberofusers;

for ($q=1;$q<13;$q++) {
    $ZurZeitMonat = DerTagInSchoen ($q);
    $rechenDummy = $dasJahr . $ZurZeitMonat;
    $p = logAnzhalUserTag($rechenDummy);
    $ichHabe = $heutigesJahr . $heutigerMonatg;
    if ( ($ichHabe - $rechenDummy) < 0)  $p = '&nbsp;';
    echo "<td $center>" . $font3 . "$p</td>";
}
// -----------------



echo "</tr><tr>";
echo "<td $center>$font3";
echo $lang_month . "</td>";
for ($m=1;$m<13;$m++) {
    
    $ZurZeitMonat = DerTagInSchoen ($m);
    $DerMonatsname = logMonatsname ($ZurZeitMonat);
    echo "<td $center>&nbsp;";

    $ichBrauche = $dasJahr . $ZurZeitMonat;
    $ichHabe = $heutigesJahr . $heutigerMonatg;
    //echo $ichHabe . $ichBrauche;
    if ( ($ichHabe - $ichBrauche) >= 0) echo "<a href='../admin/admin_log.php?befehl=6&Sternzeit=" . $dasJahr . $ZurZeitMonat ."'>";
    echo $font4 . "$DerMonatsname</a>&nbsp;</td>";
}

echo "</tr></table>"; 


// ##############################################################################################

echo "<p $center>";
if ($befehl == 4) {
echo "<a href='../admin/admin_log.php?befehl=5&Sternzeit=" . $dasJahr . $derMonat . $derTag . "'>" . $lang_allaccessesofday . ".</a>";
}

if ($befehl == 5) {
    $font1 = fontSizeColor(2, $txtcol13);
    echo "<br><br>";
    echo "<table cellspacing=5 $center border=1><tr>";
    echo "<td $center $bgcolor14 $cspn4>" . $font1 . $lang_dateaccess . " <b>" . $derTag . ". $Monatsname $dasJahr</b></td></tr>";

    echo "<tr><td $center>" . $font2 . $lang_pointintime . "</td>";
    echo "<td $center>" . $font2 . $lang_user . "</td>";
    echo "<td $center>" . $font2 . $lang_site . "</td>";
    echo "<td $center>" . $font2 . $lang_ip . "</td>";

    echo "</tr>";
    
    $spruch  = "SELECT id,  page, user, ip, timestamp FROM weblog";
    $spruch .= " WHERE timestamp like '" . $DBzeit . "%'";
    $spruch .= " ORDER BY timestamp DESC";
    
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        $dbtime = $row['timestamp']; $lasttime = DatePrint($dbtime);
        $lastpage = $row['page'];
        $lastuser = $row['user'];
        $lastip = $row['ip'];
        
        if ($lastuser == '') $lastuser = "[gast]";
        echo "<tr>";
    
        echo "<td $left>" .$font3 ."&nbsp;$lasttime" . "&nbsp;</td>";
        echo "<td $left>" .$font4 ."&nbsp;$lastuser" . "&nbsp;</td>";
        echo "<td $left>" .$font5 ."&nbsp;$lastpage" . "&nbsp;</td>";
        echo "<td $left>" .$font6 ."&nbsp;$lastip" . "&nbsp;</td>";
        echo "</tr>";

    }
    echo "</table>";
}




include ('../user/user_footer.html');




?>


