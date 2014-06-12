<?php

// Tu dies wieder rein, um von Hand zu berechnen......
include("SCRIPTsession.php");
include("SCRIPTconnect.php");
include("SCRIPTinclude.php");
include("../admin/admin_header.php");

/**/        $logpage = basename(__FILE__) . "[" . $wettkampfid ."]";          // ##
//---------- which language should i use? -----------------------
include ("../languages/" . $langsuffix . "/admin_wettkampf." . $langsuffix);
//---------------------------------------------------------------



$font  = fontSizeColor(2, $txtcol18);echo $font; 
$textstyle = fontSizeColor(1, $txtcol8);

echo "<h3 $center>" . $lang_calculatingchanp . " " . $wettkampfid . "</h3><br>$textstyle" . $dreispace . $lang_pleasewait;


$spruch  = "SELECT liga_art_id, winner_team, spieltage, team.name AS teamname FROM wettkampf";
$spruch .= " LEFT JOIN team ON wettkampf.winner_team = team.id";
$spruch .= " WHERE wettkampf.id = $wettkampfid";

$result = mysql_query( $spruch, $db ) or die("WinnerTeam failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$ligaart = $row['liga_art_id'];
$meisterid = $row['winner_team'];
$meisterteam = $row['teamname'];
$maxspieltag = $row['spieltage'];

//echo $ligaart . $maxspieltag;


if ($meisterid < 1) {
   
   $font  = fontSizeColor(2, $txtcol7);echo $font;
    echo "<br>" . $dreispace . $lang_nowinner . ".....<br>..";
    
    if ($ligaart < 3) // WM / EM
    {
        echo "<br>" . $dreispace . $lang_calculatewinner .".....<br>...";
        $spruch  = "SELECT done, tore_gast, tore_heim, heim_team_id, gast_team_id, ";
    	$spruch .= " team.name AS heim, team2.name AS gast";
        $spruch .= " FROM liga_spiel";
	    $spruch .= " LEFT JOIN team ON liga_spiel.heim_team_id = team.id";
	    $spruch .= " LEFT JOIN team AS team2 ON liga_spiel.gast_team_id = team2.id";
        $spruch .= " WHERE wettkampf_id = $wettkampfid";
        $spruch .= " AND spieltag = $maxspieltag";
    
        $result = mysql_query( $spruch, $db ) or die("LastGameDATA failed : " . mysql_error() . "<br><br>" . $spruch);
        $row = mysql_fetch_array($result, MYSQL_ASSOC);
        $heimtor = $row['tore_heim'];
        $gasttor = $row['tore_gast'];
        
        $doncheck = $row['done'];
        
        if ($doncheck < 1)
            {
            $font  = fontSizeColor(2, $txtcol6);echo $font;
            echo "<br>$dreispace $lang_lastmatch";
            exit;
            }
        
        if ($heimtor < $gasttor) 
            {
            $meisterid = $row['gast_team_id'];
            $meisterteam = $row['gast'];
            }
        if ($heimtor > $gasttor) 
            {
            $meisterid = $row['heim_team_id'];
            $meisterteam = $row['heim'];
            }
        echo $lang_champis . " : <b>$meisterteam</b> !! ";
        $sprich = "UPDATE wettkampf SET winner_team = $meisterid WHERE id = $wettkampfid";
        $resilt = mysql_query( $sprich, $db ) or die("wmMeisterIntoDB failed : " . mysql_error() . "<br><br>" . $sprich);
        echo ".... " . $lang_savedtodb . "... !";
    }
    
    if (($ligaart == 3) OR ($ligaart == 4) ) // Bundesliga
    {
    echo $lang_calculatewinner . ".....<br>...";
    $davidscript = LigaSiega ($wettkampfid, $maxspieltag);
    
    $meisterid = $davidscript['id'];
    $meisterteam = $davidscript['name'];
    
    echo $lang_champis . " : <b>$meisterteam</b> !! ";
    $sprich = "UPDATE wettkampf SET winner_team = $meisterid WHERE id = $wettkampfid";
    $resilt = mysql_query( $sprich, $db ) or die("LiagMeisterIntoDB failed : " . mysql_error() . "<br><br>" . $sprich);
    echo ".... " . $lang_savedtodb ."... !<br><br>";
    }
    
}
  $font  = fontSizeColor(2, $txtcol18);echo $font;  
echo "<br>" . $dreispace. $lang_champis ."  : (" . $meisterid . ") ". $meisterteam;


$spruch = "SELECT em_meister_punkte, wm_meister_punkte, bl_meister_punkte FROM config";
$result = mysql_query( $spruch, $db ) or die("CONFIGpunkte failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);

if ($ligaart == 1) $preis = $row['wm_meister_punkte'];
if ($ligaart == 2) $preis = $row['em_meister_punkte'];
if ($ligaart == 3) $preis = $row['bl_meister_punkte'];

echo "<br>$dreispace $lang_youcanscore <b>" . $preis . "</b>.<br><br><br>". $dreispace . $lang_igoon . "... ". $lang_pleasewait;








// +++	2. Suche alle Tipprunden, die bei $wettkampfid mitmachen ++++++++++++++++
echo ".";
#echo "<br><br>Jetzt such ich die Tipprunden raus die Mitmachen:  &nbsp;";

$spruch  = "SELECT tippspiel_id";
$spruch .= " FROM tippspiel_wettkampf";
$spruch .= " WHERE wettkampf_id = $wettkampfid";

$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))	{
	$diese_runde  = $row['tippspiel_id'];
 #   echo "$font<br>.....Bin jetzt bei Tipprunde : " . $diese_runde;	
echo ".";
	// +++	2.1 Suche alle user, die bei $dieser_runde mitmachen ++++++++++++++++
	// +++ 	2.1.2 und hol dir direkt die alten HOF punkte und ranks
 #   echo "<br>Suche die teilnehmenden User raus...";
	$spruch2  = "SELECT user_id, rank, punkte";
	$spruch2 .= " FROM tippspiel_user";
	$spruch2 .= " WHERE tippspiel_id = $diese_runde";
	$result2 = mysql_query( $spruch2, $db ) or die("Query failed : " . mysql_error());
	while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))	{
		$dieser_user = $row2['user_id'];
		$die_user[$dieser_user] = $row2['user_id'];
		$wk_user[$dieser_user] = $row2['user_id'];
		$old_HOF_rank[$dieser_user] = $row2['rank'];
		$old_HOF_punkte[$dieser_user] = $row2['punkte'];
        
 #       echo "<br><br>----- Bin bei User " . $dieser_user;
 #       echo "...sein alter HallOfFame-Rank :<b>" . $old_HOF_rank[$dieser_user];
 #       echo "</b>&nbsp;&nbsp;<i>(" .	$old_HOF_punkte[$dieser_user] . " Punkte)</i>";
echo ".";

	    $spruch3  = "SELECT rank, SUM(punkte) AS gesamtpunkte, user.name FROM ranking";
        $spruch3 .= " INNER JOIN user ON ranking.user_id = user.id";
        $spruch3 .= " WHERE tippspiel_id = $diese_runde";
        $spruch3 .= " AND wettkampf_id = $wettkampfid";
        $spruch3 .= " AND user_id = $dieser_user";
        $spruch3 .= " AND spieltag > 0";
        $spruch3 .= " GROUP BY user_id";
        $result3 = mysql_query( $spruch3, $db ) or die("UserWKpunkte failed : " . mysql_error() . "<br><br>" . $spruch3);
        $row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
        $old_wk_punkte[$dieser_user] = $row3['gesamtpunkte'];
        
        $spruch3 = "SELECT rank FROM ranking";
        $spruch3 .= " WHERE tippspiel_id = $diese_runde";
        $spruch3 .= " AND wettkampf_id = $wettkampfid";
        $spruch3 .= " AND user_id = $dieser_user";
        $spruch3 .= " AND spieltag = $maxspieltag";
        $result3 = mysql_query( $spruch3, $db ) or die("Lastrank failed : " . mysql_error() . "<br><br>" . $spruch3);
        $row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
        $old_wk_rank[$dieser_user] = $row['rank'];
        


        $spruch3  = "SELECT id,  team_id, punkte FROM meister WHERE wettkampf_id = $wettkampfid";
        $spruch3 .= " AND user_id = $dieser_user";
        $result3 = mysql_query( $spruch3, $db ) or die("GetWinnerTIP failed : " . mysql_error() . "<br><br>" . $spruch3);
        $row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
        
    
        $die_id = $row3['id'];
        $tip_team = $row3['team_id'];
        $bisher_punkte = $row3['punkte'];

        if ($tip_team == $meisterid) 
            {
            $font  = fontSizeColor(1, "green");echo $font; 
 echo ".";
 #echo "...er hat <b>richtig</b> getippt (" . $tip_team  .") und erh&auml;t ";
            $neue_meisterpunkte = $preis;
            $font  = fontSizeColor(2, $txtcol18);echo $font; 
#            echo $neue_meisterpunkte . "Punkte..";
            
            } else {
            $font  = fontSizeColor(1, $txtcol6);echo $font; 
 echo ".";
 #echo "...er hat <i><b>FALSCH</b></i> getippt (" . $tip_team  .")  und erh&auml;t ";
            $neue_meisterpunkte = 0;
            $font  = fontSizeColor(2, $txtcol18);echo $font; 
 #           echo $neue_meisterpunkte . "Punkte..";
            }
        
        $sprich = "UPDATE meister SET punkte = $neue_meisterpunkte WHERE user_id = $dieser_user";
		$resilt = mysql_query($sprich, $db) or die("SaveNEWpunkte failed : " . mysql_error() . "<br><br>" . $sprich);

        $neue_wk_punkte[$dieser_user] = ($old_wk_punkte[$dieser_user]  + $neue_meisterpunkte);
        $neue_HOF_punkte[$dieser_user] = ($old_HOF_punkte[$dieser_user] - $bisher_punkte + $neue_meisterpunkte);
            //    $old_HOF_punkte[$dieser_user] = $neueHOFpunkte;

        }
    array_multisort ($neue_HOF_punkte, SORT_DESC, SORT_NUMERIC, $die_user, $old_HOF_rank);
  $font9  = fontSizeColor(1, $txtcol8);echo $font9;
 # echo "<br><br><b>######  HALL OF FAME RANKING #######</b><br><br>";
 echo ".";
 $HOFplatzierung = 0;$HOFpunkte_detektiv = 0;$aufschlag=0;
    for ($o=0;$o<count($die_user);$o++)
		{
		$dieser_user_id = $die_user[$o];
		
		// --teilt sich der user den platz mit wem ?! --------		
		if ($neue_HOF_punkte[$o] == $HOFpunkte_detektiv)
			{
 #           echo "<br> -- [teilt sich den platz]";
            $aufschlag++;
            $dasflag=1;
			} else {
#			echo "<br>";
			if ($dasflag==1) {
			    
			    $HOFplatzierung = ($HOFplatzierung +1 + $aufschlag);
			    $aufschlag=0; $dasflag=0;
			} else {
		        $HOFplatzierung++;
		    }
	    }
		$HOFpunkte_detektiv = $neue_HOF_punkte[$o];	
		// ---------------------------------------------------
				
 echo ".";
 #echo "....Auf Platz " . $HOFplatzierung . " : &nbsp; &nbsp; User ";
 #       echo $die_user[$o];
 #       echo " mit " . $neue_HOF_punkte[$o] . " Punkten";

		// daumen faxe durchranken -------------------------
		if ($HOFplatzierung == $old_HOF_rank[$o]) 
			{
 #           echo " ...(gleichgeblieben)";
			$HOFdaumenflag = 1; // gleichgeblieben
			}

		if ($HOFplatzierung < $old_HOF_rank[$o]) 
			{
 #           echo " ...(aufgestiegen)";
			$HOFdaumenflag = 2; // aufgestiegen
			}
		if ($HOFplatzierung > $old_HOF_rank[$o]) 
			{
 #           echo " ...(abgestiegen)";
			$HOFdaumenflag = 3; // abgestiegen
			}
		// -------------------------------------------------	
 echo ".";
 #       echo " <br> Das speicher ich mal so in <i>tippspie_user</i> ab....<br>";
		$sprich = "UPDATE tippspiel_user SET";
		$sprich .= " daumen_flag = $HOFdaumenflag,";
		$sprich .= " punkte = $neue_HOF_punkte[$o],";
		$sprich .= " rank = $HOFplatzierung";		
		$sprich .= " WHERE user_id = $dieser_user_id";
		$sprich .= " AND tippspiel_id = $diese_runde";
		$resilt = mysql_query($sprich, $db);	
		}
		
    array_multisort ($neue_wk_punkte, SORT_DESC, SORT_NUMERIC, $wk_user, $old_wk_rank, $old_wk_punkte);
    $font9  = fontSizeColor(1, $txtcol9);echo $font9;  
    
#    echo "<br><br><b>######   WETTKAMPF-Runden RANKING #######</b><br><br>";
echo ".";
    $WKplatzierung = 0;$WKpunkte_detektiv = 0;$aufschlag=0;$dasflag=0;
    
    for ($o=0;$o<count($wk_user);$o++) {
		$dieser_user_id = $wk_user[$o];

        		// --teilt sich der user den platz mit wem ?! --------		
		if ($neue_wk_punkte[$o] == $WKpunkte_detektiv) {
         #   echo "<br>[teilt sich den platz]";
            $aufschlag++;
            $dasflag=1;
			
			} else {
		#	echo "<br>";
			if ($dasflag==1) {
			    $WKplatzierung = ($WKplatzierung + 1 + $aufschlag);
			    $dasflag=0; $aufschlag=0;
			    } else {
			    $WKplatzierung++;
			    }
			}
		$WKpunkte_detektiv = $neue_wk_punkte[$o];	
		// ---------------------------------------------------
		echo ".";
		
        #echo "...Auf Platz " . $WKplatzierung . " : &nbsp; &nbsp; User ";
        #echo $wk_user[$o];
        #echo " mit " . $neue_wk_punkte[$o] . " Punkten";

		// daumen faxe durchranken -------------------------
		if ($neue_wk_punkte[$o]  == $old_wk_punkte[$o])  {
        #    echo " ...(gleichgeblieben) " . $old_wk_punkte[$o];
			$WKdaumenflag = 1; // gleichgeblieben
			}

		if ($neue_wk_punkte[$o]  > $old_wk_punkte[$o])  {
        #    echo " ...(aufgestiegen)" . $old_wk_punkte[$o];
			$WKdaumenflag = 2; // aufgestiegen
			}
		if ($neue_wk_punkte[$o]  < $old_wk_punkte[$o] ) {
        #    echo " ...(abgestiegen)" . $old_wk_punkte[$o];
			$WKdaumenflag = 3; // abgestiegen
			}
		// -------------------------------------------------	

echo ".";
        #echo " <br> Das speicher ich mal so in <i>ranking</i> ab....<br>";
        
        $spruch3  = "SELECT id FROM ranking";
        $spruch3 .= " WHERE user_id = $dieser_user_id";
        $spruch3 .= " AND spieltag = 0";
        $spruch3 .= " AND wettkampf_id = $wettkampfid";
        $spruch3 .= " AND tippspiel_id = $diese_runde";
        $result3 = mysql_query( $spruch3, $db ) or die("Checka failed : " . mysql_error() . "<br><br>" . $spruch3);
        $row3 = mysql_fetch_array($result3, MYSQL_ASSOC);
        $checka = $row3['id'];
        
        if ($checka == '')
            {
            $sprich  = "INSERT INTO ranking (user_id, wettkampf_id, tippspiel_id, spieltag, daumen_flag, rank, punkte)";
            $sprich .= " VALUES ('$dieser_user_id', '$wettkampfid', '$diese_runde', '0', '$WKdaumenflag', '$WKplatzierung', '$neue_wk_punkte[$o]')";
            $resilt = mysql_query($sprich, $db);	
          #  echo "[neuen Eintrag erstellt]";
           echo ".";
           } else {
		    $sprich = "UPDATE ranking SET";
		    $sprich .= " daumen_flag = $WKdaumenflag,";
		    $sprich .= " punkte = $neue_wk_punkte[$o],";
		    $sprich .= " rank = $WKplatzierung";		
		    $sprich .= " WHERE id = $checka";
            $resilt = mysql_query($sprich, $db);	
           # echo "[Eintrag erneuert]";
            echo ".";
            }


        }
    
    echo ".";
#    echo "<br><hr><br>So, ich w&auml;re denn soweit...";
 #   echo "und mit der Tiprunde " . $diese_runde . " fertig....<br>";
	
	
	
	
	// hier muss ich noch den alle arrays $die_user, $user_wk_punkte, $neue_HOF_punkte, loeschen
 #   echo "...ich loesche noch schnell die arrays...<br><br><br>";
echo ".";
	$die_user = "";
    $wk_user = "";
	$neue_wk_punkte = "";	
	$neue_HOF_punkte = "";
	$old_HOF_rank = "";
	$old_HOF_punkte = "";
	$old_wk_rank = "";
		$old_wk_punkte = "";
	$user_spieltag_punkte = "";
	$alte_spieltag_punkte = "";
	}
	      
        
        
#echo "<br><br><h3>Setze Wettkampf done auf 1</h3>";
$sprich = "UPDATE wettkampf SET done = 1 WHERE id = $wettkampfid";        
 $resilt = mysql_query($sprich, $db)or die("SETdone failed : " . mysql_error() . "<br><br>" . $sprich);
echo ".";	

echo "<br><br><br>" . $dreispace . $lang_done ;

include ('../user/user_footer.html');


?>