<?PHP
header("Content-Type: text/xml");
include ("etc/xmlhead.php");

$wkid = "6";  // Bundesliga 04/05 

if (!$spieltag) $spieltag = 1;
$error="0";

$datei = "http://sport.ard.de/php/sportticker/frame_fussballbl_tableau.phtml?bigticker=0&event_art=22&ticker=490&spieltag=" . $spieltag . "&quiet=0";
$array = file($datei);
for($x=0;$x<count($array);$x++){
  #echo $x . " : " . $array[$x];
  #echo "<br>";
	}


function GetTeamID($team) {
	$teamid="0";
	if ($team=='FC Schalke 04') $teamid="2";
	if ($team=='Werder Bremen') $teamid="7";
	if ($team=='Bayer 04 Leverkusen') $teamid="4";
	if ($team=='Hannover 96') $teamid="21";
	if ($team=='SC Freiburg') $teamid="17";
	if ($team=='Hansa Rostock') $teamid="15";
	if ($team=='1.FC Kaiserslautern') $teamid="8";
	if ($team=='Borussia Dortmund') $teamid="3";
	if ($team=='VfL Wolfsburg') $teamid="11";
	if ($team=='Hertha BSC Berlin') $teamid="6";
	if ($team=='VfL Bochum') $teamid="20";
	if ($team=='Hamburger SV') $teamid="12";
	if ($team=='Arminia Bielefeld') $teamid="22";
	if ($team=='VfB Stuttgart') $teamid="9";
	if ($team=='1.FSV Mainz 05') $teamid="91";
	if ($team=='MSV Duisburg') $teamid="93";
	if ($team=='Eintracht Frankfurt') $teamid="87";
	
	if (($team[0]=='1')  AND ($team[1]=='.')  AND ($team[2]=='F') AND ($team[3]=='C') AND ($team[4]==' ') AND ($team[5]=='N') AND ($team[7]=='r') ) $teamid = "16";								
	if (($team[0]=='F')  AND ($team[1]=='C')  AND ($team[2]==' ') AND ($team[3]=='B') AND ($team[4]=='a') AND ($team[5]=='y') AND ($team[7]=='r') ) $teamid = "5";								
	if (($team[11]=='g')  AND ($team[12]=='l')  AND ($team[13]=='a') AND ($team[14]=='d') AND ($team[15]=='b') AND ($team[16]=='a') AND ($team[17]=='c') ) $teamid = "13";								
	if (($team[0]=='1')  AND ($team[1]=='.')  AND ($team[2]=='F') AND ($team[3]=='C') AND ($team[4]==' ') AND ($team[5]=='K') AND ($team[7]=='l') ) $teamid = "18";								

	return $teamid;
	}

echo "<bundesliga>\r\n";


if ($feed=='ftip') {
	echo "<wkid>$wkid</wkid>\r\n";	
	}

	
echo "<saison>2004/2005</saison>\r\n";
echo "<spieltag>$spieltag</spieltag>\r\n";

for ($paar=0; ($paar<9);$paar++) {

	$nt = ($paar * 9);
	$p = (17 + $nt);
	$e = (19 + $nt);
	$signs = 178;
	if ($spieltag < 10) {
		$signs = ($signs - 1);
		}	
	if ($spieltag == 1) {
		$signs = ($signs - 11);
		}
	
	$spiel1 = $array[$p];
	$ergebnis1 = $array[$e];

	$team = 0;
	$heimteam = "";
	$gastteam = "";
	
	for($a=0; ($a<80); $a++) {
			
		$y = ($a + $signs);
		$du = ($y + 1);
		$duu = ($y + 2);
		
		#if ($spiel1[$y]=="") $spiel1[$y] = "ue";
		
		if ($team == 0) {
		   $heimteam .= $spiel1[$y] ;
			}
		if ($team == 1) {
			$gastteam .= $spiel1[$y] ;
			}
	
		if ( ($spiel1[$du] == ' ') AND ($spiel1[$duu] == ':')) {
		
			$team = 1;
			$a = ($a + 3);
			#$old = $y;
			#$a = 99999;
			}
	
		if ( $spiel1[$du] == '<' OR (($spiel1[$du] == ' ') AND ($spiel1[$duu] == '('))) {
			$a = 999;
			}
	
	
		}

	$heimid = GetTeamID($heimteam);
	$gastid = GetTeamID($gastteam);
	
	if (($heimid=="0") OR ($gastid=="0")) $error++;
	
	
	$heimtore = $ergebnis1[81];
	$gasttore = $ergebnis1[85];

	echo "\t<spiel>\r\n";
	
	if ($feed=='ftip') {
	
		include ('../ftip/script/SCRIPTconnect.php');
		$spruch = "SELECT id FROM liga_spiel WHERE heim_team_id = $heimid AND gast_team_id = $gastid AND wettkampf_id = $wkid AND spieltag = $spieltag";
		$result = mysql_query($spruch, $db) or die("<b>getSpielpaarung</b> failed : " . mysql_error() . "<br><br>" . $spruch);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$sid = $row['id'];
		if ($sid == '') { 
			$error++; 
			$sid="not in DB";
			}
		
		echo "\t\t<sid>$sid</sid>\r\n";		
		echo "\t\t<heim>$heimid</heim>\r\n";
		echo "\t\t<gast>$gastid</gast>\r\n";				
		} else {

		echo "\t\t<heim>$heimteam</heim>\r\n";
		echo "\t\t<gast>$gastteam</gast>\r\n";	
		}
		
	echo "\t\t<heimtore>$heimtore</heimtore>\r\n";
	echo "\t\t<gasttore>$gasttore</gasttore>\r\n";	
	if ($debug=="1") {
		echo "<debug>" . $heimteam . " ID: " . $heimid . "</debug>\r\n";
		echo "<debug>" . $gastteam . " ID: " . $gastid . "</debug>\r\n";	
		echo "<error>" . $error . "</error>\r\n";	
		}
	
	echo "\t</spiel>\r\n";
	
	#echo $heimteam . " - " . $gastteam;
	#echo $spiel1[166] . $spiel1[167];
	#echo " -> " . $ergebnis1[81] . " : " . $ergebnis1[85];
	#echo "<br>";
	
	}
echo "</bundesliga>";
?>