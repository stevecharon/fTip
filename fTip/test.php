<?PHP
if (!$spieltag) $spieltag = 27;
echo $spieltag . ". Spieltag<br>";



function MannschaftId($team) {
$teamid = 0;
if ($team == 'FC Schalke 04') $teamid = 2;

return $teamid;
}


$datei = "http://sport.ard.de/php/sportticker/frame_fussballbl_tableau.phtml?bigticker=0&event_art=22&ticker=490&spieltag=" . $spieltag . "&quiet=0";
$array = file($datei);
for($x=0;$x<count($array);$x++){
  #echo $x . " : " . $array[$x];
  #echo "<br>";
}

echo "<br><hr><br>";

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



#echo $spiel1 . "==" . $ergebnis1;
	
	echo $heimteam . " - " . $gastteam;
	#echo $spiel1[166] . $spiel1[167];
	echo " -> " . $ergebnis1[81] . " : " . $ergebnis1[85];
	echo "<br>";
	
	}

?>