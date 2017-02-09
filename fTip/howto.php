<?php
$logpage = basename(__FILE__); 
include ("etc/connect.php");
include ("etc/include.php");
include ("etc/HTMLheader.php");


echo "$table <tr><a name='start'><td width=200 $left $top>";
echo "<img src='img/Professor_Hastig.png' alt='Professor Hastig'></a>";

echo "</td><td>";
$font = fontSizeColor(5 , $txtcol5); echo $font;
echo "<b>fTip</b>" . $dreispace;
$font = fontSizeColor(5 , $txtcol3); echo $font;
echo "Anleitungen<br>";
$font = fontSizeColor(4 , $txtcol6); echo $font;
echo "zum ultimativen Fussball-Tip-Manager<ol>";

$font = fontSizeColor(3 , $txtcol5); echo $font;
echo "<li><a href='#system'>" . $font . "Systemvorraussetzungen</a></li>";
echo "<li><a href='#install'>" . $font . "Installation</a></li>";
echo "<li><a href='#firstthings'>" . $font . "Erste Schritte</a></li>";
echo "<li><a href='#punktvergabe'>" . $font . "Punktevergabe</a></li>";

echo "</ol></td></tr></table>";

$font1 = fontSizeColor(3 , $txtcol2);
$font2 = fontSizeColor(2 , $txtcol3);
$font3 = fontSizeColor(1 , $txtcol4);
echo "<br><hr><br>";
echo "<table border=0 $center cellspacing=20>";

    // +++++++++++++++++++++++ systemvorraussetzungen +++++++++++++++++++++++++++
    echo "<a name='system'><tr><td $top $right>&nbsp;</a>$font1";
    echo "System-<br>vorraussetzungen";
    echo "</td><td $top>$font2";
    echo "Um fTip installieren zu k&ouml;nnen werden folgende Komponenten ben&ouml;tigt:";
    echo "<ul>";
        echo "<li>$font2 Ein Web-Server (z.B. <i>";
        echo "<a target='_new' href='http://httpd.apache.org/download.cgi'>Apache</a>";
        echo "</i>) ";
        echo "<li>$font2 <a href='http://www.mysql.com/downloads/index.html' target='_new'>MySQL</a></li>";
        echo "<li>$font2 <a target='_new' href='http://www.php.net/downloads.php'>PHP4</a> mit <i>GD-Library</i>";
    echo "</ul>";
    echo "<a href='#start'>" . $font3 . "zum Index</a>";
    echo "<br><br><br><br></td></tr>";
    // --------------------------------------------------------------


    // +++++++++++++++++++++++ Installation +++++++++++++++++++++++++++
    echo "<a name='install'><tr><td $top $right>&nbsp;</a>$font1";
    echo "Installation";
    echo "<br><br><br><br>";
   # echo "<p $center>";
    echo "<img src='img/Professor_Hastig.png' height=150 alt='Professor Hastig'>";
    echo "</td><td $top>$font2";
    echo "Folgende Schritte m&uuml;ssen unternommen werden<ul>";
        echo "<li>Lade ein aktuelles ";
        echo "<a target='_new' href='http://www.produnis.de/fTip/index.php?seite=download'>";
        echo $font2 . "Installationspaket</a> herunter.";
        echo "<li> Erstelle in MySQL die Datenbank <i>ftip</i>.";
        echo "<li> Erstelle in MySQL den Benutzer <i>ftip</i> (mit einem netten Passwort), der ";
        echo "alle Zugriffsrechte auf die Datenbank <i>fTip</i> hat.";
        echo "<li> Lese das Datenbankstruktur-Dump-File aus dem Installationspaket in die MySQL-Datenbank ein.";
        echo "<li> Kopiere die Webseiten aus dem Installationspaket an den gew&uuml;nschten Ort.";
        echo "<br>(z.B.: <i>httpd/htdocs/ftip/</i>)";
        echo "<li> Gehe dort in den Unterordner <i>script/</i> und &ouml;ffne mit einem Editor die";
        echo " Datei <i>SCRIPTconnect.php</i>. &Auml;ndere hier die Varbiable entsprechend Deiner MySQL Konfiguration. ";
        echo "<li> Vergewissere Dich, dass in der php.ini deines Webservers (oftmals: /etc/apache/conf/php.ini)";
        echo " <i><b>register_globals = On</b></i> gesetzt ist" ;
        echo "<li> Wenn Du alles richtig gemacht hast, kannst Du nun mit Deinem Browser die Seite erreichen.<br>";
        echo "(z.B.: <i>http://MeinServerName/ftip/index.php</i>)";
        echo "<li> Logge Dich als Administrator auf der Seite ein (<i>Default-Einstellung</i>):";
        echo "<br>$dreispace $dreispace Benutzername:  <b>admin</b>";
        echo "<br>$dreispace $dreispace $dreispace $dreispace Passwort:  <b>kommrein</b><br>$dreispace ";
        echo "<li> Du bist nun als Admin eingeloggt, und es erscheint die Admin-Startseite. Klicke ";
        echo " oben links auf <i>Optionen</i> und &auml;ndere als erstes das Administrator-Passwort.";
        //echo "</ul>";
        // echo "<img border=1 src='img/HOWTOadminopt.jpg'>";
        echo "<img border=1 src='img/HOWTOadminpwd.jpg'>";
        echo "<br>fTip ist darauf angewiesen, Mails verschicken zu d&uuml;rfen. Trage deshalb unter ";
        echo "<i>Mail-Daemon</i> eine Adresse  ein, unter der fTip Mails versenden darf. ";
    echo "</ul>";
    echo "<a href='#start'>" . $font3 . "zum Index</a>";
    echo "<br><br><br><br></td></tr>";
    // --------------------------------------------------------------



    // +++++++++++++++++++++++ Erste Schritte +++++++++++++++++++++++++++
    echo "<a name='firstthings'><tr><td $top $right>&nbsp;</a>$font1";
    echo "Erste Schritte";
    echo "<br><br><br><br>";
   # echo "<p $center>";
    echo "<img src='img/Professor_Hastig.png' height=150 alt='Professor Hastig'>";
    echo "</td><td $top>$font2";
    echo "Und so geht`s dann weiter:<ul>";
       echo "<li><b>Tiprunde erstellen</b><br>";
       echo "Alle User m&uuml;ssen bei mindestens einer Tiprunde angemeldet sein, um mitspielen zu k&ouml;nnen. ";
       echo "Deshalb solltest Du zuerst eine Tiprunde erstellen. Logge Dich also als Administrator auf ";
       echo "der Seite ein und klicke auf <i>neue Tiprunde erstellen</i>. ";
       echo "<p $center><img src='img/HOWTOadminrunde.jpg' height=170 border=1></p><br>";
       echo "Gebe den Namen der Tiprunde und ein dazugeh&ouml;riges Passwort ein. Mit diesem Passwort ";
       echo "k&ouml;nnen die User sich sp&auml;ter bei der Tiprunde anmelden.<br>&nbsp;";
       
       echo "<li> <b>User erstellen</b><br>";
       echo "Die User k&ouml;nnen sich entwerder &uuml;ber die Index-Seite selber anmelden, oder ";
       echo "vom Administrator angelegt werden. Klicke hierzu auf <i>neuen User erstellen</i>.";
       
       echo "<p $center><img src='img/HOWTOadminuser.jpg' height=100 border=1></p><br>";
       echo  "Gebe den gew&uuml;nschten Usernamen und eine Email-Adresse ein. Per H&auml;kchen kannst ";
       echo " Du den User bei einer Tiprunde anmelden. Der User erh&auml;lt eine automatische Herzlich-Willkommen-Mail ";
       echo "(inklusive vorl&auml;ufigem Passwort). ";
       
       echo "<p $center><img src='img/HOWTOadminuser2.jpg' height=100 border=1></p><br>";
       
       echo "<li> <b>Wettkampf erstellen</b><br>";
       echo "Wettk&auml;mpfe <i>selber</i> zu erstellen ist eine aufwendige, etwas umst&auml;ndliche Verfahrensweise. ";
       echo "(Eine Bundesliga hat 306 Spielpaarungen, die alle einzeln hinzugef&uuml;gt werden m&uuml;ssen.)";
       echo " Die Bundesligen liegen schon fertig geplant als SQL-Dumps auf der fTip-Homepage vor, und wir empfehlen daher unbedingt <i>diese ";
       echo " fertigen</i> Dumps zu verwenden !!! Lade also das Dupmfile von dem Wettkampf, den du hinzuf&uuml;gen m&ouml;chtest, herunter ";
       echo " und lese es in MySQL ein.";
       echo "<br>Die Tiprunden m&uuml;ssen (um mitspielen zu k&ouml;nnen) dann f&uuml;r den Wettkampf angemeldet werden. Klicke hierzu ";
       echo "auf der Admin-Startseite die Tiprunde an, ";
       echo "die bei dem Wettkampf mitspielen soll.";
       echo "<p $center><img src='img/HOWTOadminrunde2.jpg' height=100 border=1></p><br>";
       echo "Auf der rechten Seite kannst du per H&auml;kchen die Tiprunde f&uuml;r den Wettkampf anmelden.";
       echo " Ab dann k&ouml;nnen alle User der Tiprunde auf den Wettkampf zugreifen, Spielpaarungen einsehen, und Tips abgeben. ";
    
       echo "<p $center><img src='img/HOWTOadminwkrunde.jpg' height=180 border=1></p><br>";
       echo "WAS DATA SAGT STIMMT !!!<br>Klicke hier niemals un&uuml;berlegt, da beim Entfernen Daten unwiederruflich aus der Datenbank gel&ouml;scht werden !!!";
       echo " Es ist nicht unbedingt n&ouml;tig, User aus der Tiprunde zu entfernen, da fTip ";
       echo "<i>Gelegenheitstipper</i>, die nur einmal und dann nie wieder mitspielen, erkennt und auf den Seiten ausblendet. ";
        
       echo "<br><br>";
       echo "<li> <b>FERTIG</b><br>wenn diese Einstellungen getan sind, kann es losgehen... ;-) <br>";
       echo "Mehr musst Du vorl&auml;ufig nicht machen.";
   echo "</ul><a href='#start'>" . $font3 . "zum Index</a>";
    echo "<br><br><br><br></td></tr>";
    // --------------------------------------------------------------



    // +++++++++++++++++++++++ Erste Schritte +++++++++++++++++++++++++++
    echo "<a name='firstthings'><tr><td $top $right>&nbsp;</a>$font1";
    echo "Punktevergabe";
    echo "<br><br><br><br>";
   # echo "<p $center>";
    echo "<img src='img/Professor_Hastig.png' height=150 alt='Professor Hastig'>";
    echo "</td><td $top>$font2";


    echo "<p align='Justify'><font face='Arial' size='3'>";
    echo "Es gelten folgende Punkteverteilungen beim Vergleich der Tips mit ";
    echo "den tatsaechlichen Ergebnissen:<br><br><i>(Beispiel: Schalke spielt gegen Dortmund,";
    echo " in Schalke)</i><br><br>	<ul><br>";
    echo "<li><b>a) gleiche Anzahl Tore Heim  = 1 Punkt</b><br><br>";
    echo "(ich tippe 2:0, und das tatsaechliche Ergebnis ist 2:1. Ich erhalte";
    echo "1 Punkt dafuer, dass ich fuer Schalke 2 Tore getippt habe, und die ";
    echo "auch wirklich 2 Tore geschossen haben.)<br><br><br>	";
    echo "<li><b>b) gleiche Anzahl Tore Gast  = 1 Punkt</b><br><br>	";
    echo "(genauso wie a), ich tippe 2:0, und Schalke gewinnt 4:0, so erhalte ";
    echo "ich 1 Punkt dafuer, dass ich getippt habe, dass Dortmund kein Tor ";
    echo "schiesst, und die dann auch wirklich keins geschossen haben.)<br><br><br>";
    echo "<li><b>c) gleiche Tendenz = 1 Punkt</b><br><br>";
    echo "(ich tippe 0:0, und die spielen 2:2, so erhalte ich 1 Punkt dafuer, ";
    echo "dass ich <i>unentschieden</i>&nbsp; getippt habe).<br><br>";
    echo "(ich tippe 1:0, und die spielen 4:1, so erhalte ich 1 Punkt dafuer, ";
    echo "dass ich >Schalke gewinnt< getippt habe)<br>";
    echo "</ul><br>		<br><b>a)-c) gelten zusammen,</b><br><br>";
    echo "DAS HEISST:<br><br>";
    echo "<b>Pro Spiel</b> kannst Du <b>3 Punkte</b> holen (genau wie die Mannschaften).";
    echo "(pro Spieltag 27 Punkte, pro Saison 918 Punkte).<br><br><br>";
    echo "Beispiele:<br>			<ul><b>Ich tippe 1:0, echtes Ergebnis 0:0</b><br>";
    echo "<li>ich erhalte 1 Punkt dafuer, dass ich <i>Dortmund 0 Tore</i>&nbsp;<br>	";
    echo "getippt habe, und die auch wirklich keins geschossen haben.<br>  ";
    echo "<li>----ich erhalte insgesamt 1 Punkt fuer das Spiel<br>   </ul><br><br>";
    echo "<ul><b>Ich tippe 2:1, echtes Ergebnis 2:0</b><br><br>	";
    echo "<li>ich erhalte 1 Punkt fuer <i>Schalke schiesst 2 Tore</i><br>";
    echo "<li>ich erhalte 1 Punkt fuer <i>Schalke gewinnt</i><br>";
    echo "<li>---ich erhalte insgesamt 2 Punkte fuer das Spiel<br>	";
    echo "</ul><br>			<br>			<ul><b>Ich tippe 0:0, die spielen auch 0:0</b><br><br>";
    echo "<li>ich erhalte 1 Punkt fuer <i>Schalke schiesst kein Tor</i><br>";
    echo "<li>ich erhalte 1 Punkt fuer <i>Dortmund schiesst kein Tor</i><br>";
    echo "<li>ich erhalte 1 Punkt fuer <i>sie spielen unentschieden</i><br>	";
    echo "<li>---ich erhalte insgesamt 3 Punkte fuer das Spiel<br>";
    echo "</ul><br>			<br>			<ul><b>kein Tip abgegeben = 0 Punkte</b><br><br>";
    echo "<li>--------soweit alles klar ?!<br>			</ul>";
    
   echo "<a href='#start'>" . $font3 . "zum Index</a>";
    echo "<br><br><br><br></td></tr>";
    // --------------------------------------------------------------






echo "</table>";

include ("etc/HTMLfooter.php");
?>

























