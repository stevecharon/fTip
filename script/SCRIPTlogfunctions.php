<?php
include ("SCRIPTconnect.php");





// ################ alte funktionen ############################################



function LogginStartete() {
    include ("SCRIPTconnect.php");
    $spruch  = "SELECT id, timestamp FROM weblog";
    $spruch .= " ORDER BY timestamp ASC";
    $result = mysql_query( $spruch, $db ) or die("<b>logF</b> logStart failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $startete = $row['timestamp'];
    return $startete;
}

function LogginEndet() {
    include ("SCRIPTconnect.php");
    $spruch  = "SELECT id, timestamp FROM weblog";
    $spruch .= " ORDER BY timestamp DESC";
    $result = mysql_query( $spruch, $db ) or die("<b>logF</b> logEndet failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $endet = $row['timestamp'];
    return $endet;
}


function logAnzhalUserTag($heuteistdertag) {
    include ("SCRIPTconnect.php");
    $spruch  = " SELECT id, user FROM weblog";
    $spruch .= " WHERE timestamp like '" . $heuteistdertag . "%'";
    $spruch .= " GROUP BY user";
    $result = mysql_query( $spruch, $db ) or die("<b>logF</b> UserTag failed : " . mysql_error() . "<br><br>" . $spruch);
    $userzaehler = mysql_affected_rows ();
    return $userzaehler;
}


function logAnzhalUserStunde($derMonat, $dasJahr) {
    include ("SCRIPTconnect.php");
    $spruch  = " SELECT id, user, timestamp FROM weblog";
    $spruch .= " WHERE timestamp like '" . $dasJahr . $derMonat . "%'";
   // $spruch .= " ORDER BY timestamp";
    $result = mysql_query( $spruch, $db ) or die("<b>logF</b> UserSTD failed : " . mysql_error() . "<br><br>" . $spruch);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $dummy = $row['timestamp'];
        $dummy2 = $row['user'];
        $DieStunde = $dummy[8] . $dummy[9];
        
        
        
        $userstundendummy[$DieStunde] ;
        
    }
    return $userzaehler;
}



function logZugriffeTag($heuteistdertag) {
    include ("SCRIPTconnect.php");
    $spruch  = " SELECT id, user FROM weblog";
    $spruch .= " WHERE timestamp like '" . $heuteistdertag . "%'";
    $result = mysql_query( $spruch, $db ) or die("<b>logF</b> ZugriffeTag failed : " . mysql_error() . "<br><br>" . $spruch);
    $zugrzaehler = mysql_affected_rows ();
    return $zugrzaehler;
}



function logStundenzugriff($derTag, $derMonat, $dasJahr, $flag) {
    include ("SCRIPTconnect.php");
    $spruch  = " SELECT id, user, timestamp FROM weblog";
    if ($flag == 0)  $spruch .= " WHERE timestamp like '" . $dasJahr . "%'";
    if ($flag == 1)  $spruch .= " WHERE timestamp like '" . $dasJahr . $derMonat .  "%'";
    if ($flag == 2)  $spruch .= " WHERE timestamp like '" . $dasJahr . $derMonat . $derTag . "%'";
    $result = mysql_query( $spruch, $db ) or die("<b>logF</b> ZugriffeSTD failed : " . mysql_error() . "<br><br>" . $spruch);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $dummy = $row['timestamp'];
        
        $dieStunde = $dummy[8] . $dummy[9];
        
        $stundenzaehler[$dieStunde]++;
        
    }
    return $stundenzaehler;

}

function WievielTageGibtEs($derMonat, $dasJahr) {
    $der_tag_monatdummy = $derMonat;
    if ($der_tag_monatdummy == '01') $AnzahlTage = 31;
    if ($der_tag_monatdummy == '02') $AnzahlTage = 28; // 2004 war 29
    if ($der_tag_monatdummy == '03') $AnzahlTage = 31;
    if ($der_tag_monatdummy == '04') $AnzahlTage = 30;
    if ($der_tag_monatdummy == '05') $AnzahlTage = 31;
    if ($der_tag_monatdummy == '06') $AnzahlTage = 30;
    if ($der_tag_monatdummy == '07') $AnzahlTage = 31;
    if ($der_tag_monatdummy == '08') $AnzahlTage = 31;
    if ($der_tag_monatdummy == '09') $AnzahlTage = 30;
    if ($der_tag_monatdummy == '10') $AnzahlTage = 31;
    if ($der_tag_monatdummy == '11') $AnzahlTage = 30;
    if ($der_tag_monatdummy == '12') $AnzahlTage = 31;
    
    if ( ($derMonat == '02') && $dasJahr == '2008') $AnzahlTage = 29; // jaja ich weiss..
    if ( ($derMonat == '02') && $dasJahr == '2012') $AnzahlTage = 29; // sehr quick und besonders dirty...
return $AnzahlTage;
}


function logMonatsname ($derMonat) {
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
$langsuffix = Whichlanguage($db, $uid);
include ("../languages/" . $langsuffix . "/include." . $langsuffix);
    $der_tag_monatdummy = $derMonat;
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
return ($der_monat_wort);
}

function StundeInSchoen ($std) {
    $DieStunde = $std;
    if ($std == 0) $DieStunde = '00';
    if ($std == 1) $DieStunde = '01';
    if ($std == 2) $DieStunde = '02';
    if ($std == 3) $DieStunde = '03';
    if ($std == 4) $DieStunde = '04';
    if ($std == 5) $DieStunde = '05';
    if ($std == 6) $DieStunde = '06';
    if ($std == 7) $DieStunde = '07';
    if ($std == 8) $DieStunde = '08';
    if ($std == 9) $DieStunde = '09';
return $DieStunde;
}


function DatePrint($time)  {
$jahr1 = $time[2];
$jahr2 = $time[3];
$monat1 = $time[4];
$monat2 = $time[5];
$tag1 = $time[6];
$tag2 = $time[7];
$stunde1 = $time[8];
$stunde2 = $time[9];
$minute1 = $time[10];
$minute2 = $time[11];

$in_chick = $tag1 . $tag2 . "." . $monat1 . $monat2 . "." . $jahr1 . $jahr2 . " - " . $stunde1 . $stunde2 . ":" . $minute1 . $minute2 ;


return $in_chick;
}




function DerTagInSchoen ($q) {
    $stelle = $q;
    if ($q == 1) $stelle = '01';
    if ($q == 2) $stelle = '02';
    if ($q == 3) $stelle = '03';
    if ($q == 4) $stelle = '04';
    if ($q == 5) $stelle = '05';
    if ($q == 6) $stelle = '06';
    if ($q == 7) $stelle = '07';
    if ($q == 8) $stelle = '08';
    if ($q == 9) $stelle = '09';
return $stelle;
}


function Monatslist() {
include ("SCRIPTconnect.php");
$uid = $_SESSION['uid'];
$langsuffix = Whichlanguage($db, $uid);
include ("../languages/" . $langsuffix . "/include." . $langsuffix);
    $Monatsliste[1] = $lang_f_januar;
    $Monatsliste[2] = $lang_f_februar;
    $Monatsliste[3] = $lang_f_march;
    $Monatsliste[4] = $lang_f_april;
    $Monatsliste[5] = $lang_f_may;
    $Monatsliste[6] = $lang_f_june;
    $Monatsliste[7] = $lang_f_july;
    $Monatsliste[8] = $lang_f_august;
    $Monatsliste[9] = $lang_f_september;
    $Monatsliste[10] = $lang_f_october;
    $Monatsliste[11] = $lang_f_november;
    $Monatsliste[12] = $lang_f_december;
return $Monatsliste;
}



?>



