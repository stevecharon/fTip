<?php

###  DIESES SCRIPT FUEGT DIE SPIELPAARUNGEN
###  DER 1. FUSSBALLBUNDESLIGA 
###  IN DIE FTIP DATENBANK EIN
###
###  1. Logge Dich als Admin auf der Seite ein.
###  2. Aendere die Adresszeile auf
###    http://(MeinServer)/ftip/update/001ersteLiga2004.php
###
###  Fertig.
#############################################################


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##

echo "fTip Dump #001 - 1.Bundesliga Paarungen 2004/05<br><br>";



if (!$force) {
    $spruch  = "SELECT id FROM wettkampf WHERE";
    $spruch .= " saison = '2004/2005' AND liga_art_id = '3'";
    $result = mysql_query($spruch, $db);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $schonda = $row['id'];
    if ($schonda != '') {
    echo "Dieser Wettkampf befindet sich bereits in der DB !";
    echo "<br><br>Wettkampf <a href='001ersteLiga2004.php?force=1&loeschid=" . $schonda . "'>l&ouml;schen und neu anlegen</a>";
    
    include ('../user/user_footer.html');
    exit;

    }
} elseif($force==1) {

    echo "<br>l&ouml;sche Eintr&auml;ge aus <i>wettkampf</i>, ";
    $sprech = "DELETE FROM wettkampf WHERE id = $loeschid";
    $reselt = mysql_query($sprech, $db);
    
    echo "<i>wettkampf_team</i>, ";
    $sprech = "DELETE FROM wettkampf_team WHERE wettkampf_id = $loeschid";
    $reselt = mysql_query($sprech, $db);

    echo "<i>liga_spiel</i>.. ";
    $sprech = "DELETE FROM liga_spiel WHERE wettkampf_id = $loeschid";
    $reselt = mysql_query($sprech, $db);
    echo ".. fertig !<br><br>";
    
}


echo "<h1 $center>Datenbank-Update</h1>";
echo "<h2 $center>f&uuml;r Spielpaarungen der 1. Bundesliga</h1>";

# Dump of table wettkampf
# ------------------------------------------------------------
echo "<p $center>";


echo "<br>F&uuml;ge Wettkampf hinzu....";
$sprich = " INSERT INTO wettkampf ("; if ($force==1) $sprich .= "id, ";
$sprich .= "saison , liga_art_id , done , spieltage , akt_spieltag , winner_team)";
$sprich .= " VALUES ("; if ($force==1) $sprich .= "'$loeschid', ";
$sprich .= "'2004/2005' , '3' , '0' , '34' , '1' , '0')"; 
$resilt = mysql_query($sprich, $db);
$dieseid = mysql_insert_id();
echo "..id = $dieseid .......[fertig]";



echo "<br>F&uuml;ge Spielpaarungen hinzu....";
# Dump of table liga_spiel fuer BUNDESLIGA 2004/2005
# ------------------------------------------------------------

$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '11' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '7' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '20' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '11' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '7' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '20' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '20' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '9' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '9' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '11' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '7' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '9' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '7' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '17' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '9' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '17' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '20' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '17' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '17' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '11' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '6' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '11' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '7' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '6' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '6' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '17' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '9' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '6' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '20' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '6' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '15' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '6' , '15' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '15' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '9' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '15' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '20' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '11' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '15' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '7' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '15' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '15' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '17' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '6' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '21' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '9' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '21' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '20' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '21' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '11' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '21' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '21' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '15' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '21' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '7' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '17' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '21' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '12' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '20' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '21' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '12' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '11' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '12' , '11' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '12' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '15' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '12' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '7' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '17' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '12' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '6' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '12' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '9' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '9' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '20' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '91' , '20' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '91' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '21' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '91' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '11' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '15' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '91' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '7' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '91' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '91' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '17' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '91' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '6' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '12' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '91' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '91' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '9' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '17' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '2' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '6' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '2' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '2' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '12' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '9' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '2' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '91' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '2' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '20' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '2' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '2' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '21' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '2' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '11' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '15' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '2' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '2' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-06 00:00:00' , '7' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '13' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '6' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '12' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '13' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '13' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '9' , '13' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '13' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '91' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-03-16 00:00:00' , '13' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '20' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '21' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '13' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '13' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '11' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '15' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '13' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '13' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '2' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '7' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '13' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '13' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '17' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '3' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '15' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '2' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '3' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '3' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '7' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '17' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '3' , '17' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '3' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '6' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '12' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '3' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '3' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '9' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '3' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '91' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '3' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '20' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '21' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '3' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '3' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '13' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '11' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '3' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '9' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '5' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '91' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '5' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '5' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '20' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '21' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '5' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '5' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '13' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '11' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '5' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '5' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '15' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '2' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '5' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '5' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '7' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '17' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '5' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '5' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '3' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '6' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '5' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '5' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '12' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '4' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '13' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '11' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '4' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '4' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '15' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '2' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '4' , '2' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '4' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '7' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '17' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '4' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '4' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '3' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '4' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '6' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '12' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '4' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '4' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '9' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '4' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '91' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '5' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '4' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '4' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '20' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '21' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '4' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '22' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '11' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '15' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '22' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '22' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '2' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '7' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '22' , '7' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '22' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '17' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '3' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '22' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '22' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '4' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '6' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '22' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '22' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '12' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '9' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '22' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '91' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '22' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '22' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '5' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '20' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '22' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '22' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '21' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '13' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '22' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '16' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '91' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '5' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '16' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '16' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '20' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '21' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '16' , '21' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '16' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '13' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '11' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '16' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '16' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '15' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '2' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '16' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '16' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '7' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '17' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '16' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '16' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '3' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '22' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '16' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '16' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '4' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '6' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '16' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '16' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '12' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '9' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '16' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '34' , '' , '2005-05-21 00:00:00' , '8' , '7' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '17' , '' , '2004-12-11 00:00:00' , '7' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '33' , '' , '2005-05-14 00:00:00' , '91' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '16' , '' , '2004-12-04 00:00:00' , '8' , '91' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '32' , '' , '2005-05-07 00:00:00' , '17' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '15' , '' , '2004-11-27 00:00:00' , '8' , '17' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '31' , '' , '2005-04-30 00:00:00' , '8' , '5' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '14' , '' , '2004-11-20 00:00:00' , '5' , '8' , '1')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '30' , '' , '2005-04-23 00:00:00' , '3' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '13' , '' , '2004-11-13 00:00:00' , '8' , '3' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '29' , '' , '2005-04-16 00:00:00' , '8' , '20' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '12' , '' , '2004-11-06 00:00:00' , '20' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '28' , '' , '2005-04-09 00:00:00' , '22' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '11' , '' , '2004-10-30 00:00:00' , '8' , '22' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '27' , '' , '2005-04-02 00:00:00' , '8' , '21' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '10' , '' , '2004-10-27 00:00:00' , '21' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '26' , '' , '2005-03-19 00:00:00' , '4' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '9' , '' , '2004-10-23 00:00:00' , '8' , '4' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '25' , '' , '2005-03-12 00:00:00' , '8' , '13' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '8' , '' , '2004-10-16 00:00:00' , '13' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '24' , '' , '2005-03-05 00:00:00' , '6' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '7' , '' , '2004-10-02 00:00:00' , '8' , '6' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '23' , '' , '2005-02-26 00:00:00' , '8' , '11' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '6' , '' , '2004-09-25 00:00:00' , '11' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '22' , '' , '2005-02-19 00:00:00' , '12' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '5' , '' , '2004-09-18 00:00:00' , '8' , '12' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '21' , '' , '2005-02-12 00:00:00' , '8' , '15' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '4' , '' , '2004-09-11 00:00:00' , '15' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '20' , '' , '2005-02-05 00:00:00' , '9' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '3' , '' , '2004-08-28 00:00:00' , '8' , '9' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '19' , '' , '2005-01-29 00:00:00' , '8' , '2' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '2' , '' , '2004-08-14 00:00:00' , '2' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '18' , '' , '2005-01-22 00:00:00' , '16' , '8' , '0')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO liga_spiel (wettkampf_id , spieltag , gruppe , datum , heim_team_id , gast_team_id , done) VALUES ('$dieseid' , '1' , '' , '2004-08-07 00:00:00' , '8' , '16' , '0')";   $resilt = mysql_query($sprich ,  $db);


echo ".....[fertig]";




echo "<br>F&uuml;ge teilnehmende Mannschaften hinzu....";

# Dump of table wettkampf_team
# ------------------------------------------------------------

$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '7' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '2' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '8' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '16' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '17' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '15' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '3' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '11' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '22' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '13' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '21' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '4' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '6' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '20' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '5' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '12' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '91' , '')";   $resilt = mysql_query($sprich ,  $db);
$sprich = " INSERT INTO wettkampf_team (wettkampf_id , team_id , gruppe) VALUES ('$dieseid' , '9' , '')";   $resilt = mysql_query($sprich ,  $db);



echo ".....[fertig]";







echo "<br><br><br><br>Ich bin fertig.";


include ('../user/user_footer.html');
?>







