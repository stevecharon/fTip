<?php
$logpage = basename(__FILE__); 
include ("etc/connect.php");
include ("etc/include.php");

if (!$seite) $seite = "start";
if ($seite != 'showshot') include ("etc/HTMLheader.php");




if ( (!$seite) OR ($seite=='start') ) {
    echo "$table <tr><td>";
    $font = fontSizeColor(5 , $txtcol5); echo $font;
    echo "<b>fTip</b><br>";
    $font = fontSizeColor(4 , $txtcol6); echo $font;
    echo "der ultimative Fussball-Tip-Manager<br>";
    $font = fontSizeColor(2 , $txtcol3); echo $font;

    echo "fTip ist ein MySQL- und PHP-basierter Fussball-Tip-Manager f&uuml;r die Bundesliga,  Welt-";
    echo " und Europameisterschaft.<br>";
    echo "Die User loggen sich auf einer Webseite ein und geben dort bequem ihre Tips ab. fTip vergleicht";
    echo " die abgegebenen Tips mit den tats&auml;chlichen Spielegebnissen und verteilt dem entsprechend ";
    echo " Punkte an die User.<br>";
    echo "fTip kann mehrere Tiprunden unterscheiden, und zeigt rundenspeziefische Auswertungen und ";
    echo "Userrankings auf der Webseite an.";
        echo $table;
        echo "<tr>";
        echo "<td width=100><img src='img/fTipBND.jpg' width=100 $center></td><td>$font";
        echo "<b>BerND</b>, der <b>B</b>undesliga<b>Er</b>gebnis<b>N</b>achrichten<b>D</b>ienst ";
        echo " von fTip tr&auml;gt an den Spieltagen ";
        echo "automatisch die (aktuellen) Ergebnisse in die Datenbank ein, und meldet Userrankings";
        echo " und Zwischenergebnisse zus&auml;tzlich in einen Jabber-Groupchat.";
        echo "</td></tr></table>";
    echo "</td></tr></table>";

    echo "<br><br>";
    $font2 = fontSizeColor(4 , $txtcol2); echo $font2;
    echo $table;
    echo "<tr><td $left>$font2 LogBuch:</td></tr>";
    $font2 = fontSizeColor(1 , $txtcol3); echo $font2;
    $spruch  = "SELECT * FROM meilenstein";
    $spruch .= " ORDER BY timestamp DESC";
    $result = mysql_query( $spruch, $db ) or die("GetInfo failed : " . mysql_error() . "<br><br>" .$spruch);
    while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    
       $wann = $row['wann'];
        $was = $row['was'];
       
        echo "<tr>";
        echo "<td $left>$font<b>$wann</b><br>$font2";
        echo "$was";
        echo "</td></tr>";
    }

	echo "<tr><td>";
	echo "<br><br><a href='http://www.produnis.de/fTip/feed.php?feed=rss' title='Bundesliga Ergebniss Feed f&uuml;r Ihren Newsreader'>";
	echo "<img src='img/rss.gif'>";
	echo "</a><br>";
	
	echo "<br><a href='http://www.produnis.de/fTip/Bundesliga.xml.zip' title='XML-Datei der Paarungen und Ergebnisse f&uuml;r Drittanwender'>";
	echo "<img src='img/xml.gif'>";
	echo "</a><br>";
	
	echo "<link rel='alternate' type='application/rss+xml' title='Bundesliga-Ticker' href='http://www.produnis.de/fTip/feed.php?feed=rss' />";
	echo "<br><p align='right'><a href='http://sourceforge.net/projects/ftip/' target='_new'>";
	echo "<img border=0 src='img/SFlogo.png' title='fTip bei SourceForge.net'></a>";
    echo "</td></tr></table>";

}
// ------------------------------------------------------------------------------------------------



// ############ download ############################
if ($seite=='download') {
    echo "$table <tr><td>";
    $font = fontSizeColor(5 , $txtcol5); echo $font;
    echo "<b>fTip</b><br>";
    $font = fontSizeColor(4 , $txtcol6); echo $font;
    echo "Downloadbereich<br>";
    $font = fontSizeColor(2 , $txtcol3); echo $font;
    $font2 = fontSizeColor(1 , $txtcol3); echo $font;
    echo "fTip ist Freeware (GPL) und kann kostenlos heruntergeladen werden. Zur Installation auf ";
    echo " einem eigenen Server gibt es eine ";
    echo "<a href='index.php?seite=anleitung'>" . $font . "Anleitung</a>, in der alle Schritte beschrieben werden. <br>";
    echo "Das <i><b>Installationspaket";
    echo "</b></i> beinhaltet alle Datein und Datenbank-Dumps, die zur kompletten Installation ben&ouml;tigt";
    echo " werden. <br>Die  <i><b>SQL-Dumps und Updates</b></i> wenden sich an bereits installierte fTip-Versionen, ";
    echo "denen beispielsweise die Spielpaarungen eines (neuen, aktuellen) Wettkampfs hinzugef&uuml;gt werden soll, ";
    echo "oder die aufgrund von anderen fTip-Updates aktualisiert werden m&uuml;ssen.<br><br>";
    echo "Leider steht derzeit noch keine Download-Version von <b>BerND</b> zu Verf&uuml;gung. Wir arbeiten daran... <br><br>";
    
        echo "<table border=1 cellspacing=10 $center>";
        echo "<th $center>" . $font . $dreispace . "Installationspakete" . $dreispace . "</th>";
        echo "<th $center>$font SQL Dumps / Updates</th>";
        echo "<tr><td align='center' $top>$dreispace$font2";
        
       echo "<br><p align='center'><a href='http://sourceforge.net/projects/ftip/' target='_new'>";
	echo "<img border=0 src='img/SFlogo.png' title='fTip bei SourceForge.net'></a></p><br>$dreispace";
        echo "</td><td $top $left<ul>$dreispace$font2";
        
        
        // SQL dupms / updates
        $spruch  = "SELECT file, beschreibung FROM download WHERE flag = 2";
        $spruch .= " ORDER BY file DESC";
        $result = mysql_query( $spruch, $db ) or die("GetINSTALLsql failed : " . mysql_error() . "<br><br>" .$spruch);
        
        while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $file = $row['file'];
            $beschreibung = $row['beschreibung'];
            echo "<li><a href='down/" . $file . "'>$font2";
            echo $beschreibung . "</a>$dreispace";
            
        }
        
        
        echo "</ul></td></tr></table>";
    echo "</td></tr></table>";

}
// ---------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------


// ############ GROSS SHOWscreenshots ############################
if ($seite=='showshot') {
    $font = fontSizeColor(5 , $txtcol5); echo $font;
    echo "<b>fTip</b> - ";
    $font = fontSizeColor(4 , $txtcol6); echo $font;
    echo "Screenshot $picid<br><br>";
    $font2 = fontSizeColor(3 , $txtcol2); echo $font;
    
    $spruch = "SELECT shot, what FROM screenshot WHERE id = $picid";
    $result = mysql_query( $spruch, $db ) or die("GetSHOWpic failed : " . mysql_error() . "<br><br>" .$spruch);
        
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    echo "<img src='img/" . $row['shot'] . "'><br>" . $font2 . $row['what'] . "<br><br><br><br><br><br><br>";
}



// ############ screenshots ############################
if ($seite=='screnshot') {
    echo "<table $border0 cellspacing=20 $center> <tr><td $ left $cspn2>";
    $font = fontSizeColor(5 , $txtcol5); echo $font;
    echo "<b>fTip</b><br>";
    $font = fontSizeColor(4 , $txtcol6); echo $font;
    echo "Screenshots<br>";
    $font = fontSizeColor(2 , $txtcol8); echo $font;
    echo "</td></tr><tr>";
    
    $spruch = "SELECT id, shot, what FROM screenshot ORDER BY id ASC";
    $result = mysql_query( $spruch, $db ) or die("GetINSTALLsql failed : " . mysql_error() . "<br><br>" .$spruch);
        
    while ( $row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $tdzahl++;
        echo "<td $top>";
        echo "<a target='_new' href='index.php?seite=showshot&picid=" . $row['id'] ."'";
        echo "<img src='img/" . $row['shot'] . "' width=250></a><br>$font" . $row['what'] . "<br></td>";
        if ($tdzahl == 2) {
            echo "</tr><tr>";
            $tdzahl=0;
        }
    }
    echo "</td></tr></table>";

}


// ############ kontakt ############################
if ($seite=='kontakt') {
    echo "<table $border0 cellspacing=20 $center> <tr><td $ left $cspn2>";
    $font = fontSizeColor(5 , $txtcol5); echo $font;
    echo "<b>fTip</b><br>";
    $font = fontSizeColor(4 , $txtcol6); echo $font;
    echo "Kontakt<br>";
    $font = fontSizeColor(2 , $txtcol8); echo $font;
    echo "</td></tr><tr><td>";
    
        $font  = fontSizeColor(2 , $txtcol2);
        $font2 = fontSizeColor(2 , $txtcol4);
        $font3 = fontSizeColor(2 , $txtcol3);
        echo "<table $center border=1 cellspacing=10>";
        echo "<tr><td $right>&nbsp;";
        echo "[<a href='mailto:produnisfTip@produnis.de'>" . $font . "produnis</a>]";
        echo "&nbsp;</td><td $left>$dreispace" . $font2;
        echo "fTip allgemein, Installation, Verwaltung";
        echo $font3;
        echo "<br>" . $dreispace . "Jabber-Kontakt &uuml;ber Server <b>internnetz.de</b> : <i>produnis</i>";
        echo "$dreispace</td></tr>";
    
        echo "</table>";
    
    
    echo "</td></tr></table>";

}







if ($seite != 'showshot') include ("etc/HTMLfooter.php");
?>






