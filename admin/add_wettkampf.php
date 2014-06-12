<?php


include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../admin/admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##



if ($mannschaft) {
	include("../script/SCRIPTconnect.php");
	if ($liga_art == 3) $diespieltage = 34;
	if ($liga_art == 4) $diespieltage = 34;
	if ($liga_art == 1) $diespieltage = 7;
	if ($liga_art == 2) $diespieltage = 6;
	if ($liga_art == 7) $diespieltage = 5;
	$saison = htmlentities($saison);
	$spruch  = "INSERT INTO wettkampf (saison, liga_art_id, done, spieltage, akt_spieltag)";
	$spruch .= " VALUES ('$saison', $liga_art, 0, $diespieltage, 1)";
	$result = mysql_query($spruch, $db);
	$neue_wettkampf_id = mysql_insert_id();
	

	
	foreach ($mannschaft as $team_id) {
	    $gruppe = "gruppe_$team_id";
	  
	    $spruch = "INSERT INTO wettkampf_team (wettkampf_id, team_id, gruppe) VALUES ($neue_wettkampf_id, $team_id, '${$gruppe}')";
	    $result = mysql_query($spruch, $db);
        //echo $spruch;
	}
echo "Wettkampf (" . $neue_wettkampf_id . ") wurde angelegt.<br>Klicke f&uuml;r Spielpaarungseingabe";
// hier bleibt er stehen	
//echo $neue_wettkampf_id .$liga_art;


// WM
if ($liga_art == 1) {
echo " <a href='add_wm.php?wettkampfid=$neue_wettkampf_id'>hier</a>";
}

// EM
if ($liga_art == 2) {
echo " <a href='add_em.php?wettkampfid=$neue_wettkampf_id'>hier</a>";
}

// ConfedCup
if ($liga_art == 7) {
echo " <a href='add_confedcup.php?wettkampfid=$neue_wettkampf_id'>hier</a>";
}

// Bundesligen
if (($liga_art == 3) OR ($liga_art == 4)) {
echo " <a href='add_bundesliga.php?neue_wettkampf_id=$neue_wettkampf_id'>hier</a>";
}



	
} else {
    if ($saison and $liga_art) {
	    include("../script/SCRIPTconnect.php");
	    $logpage .= "(teams)";
	    
        echo "Wettkampf-Art: (" . $liga_art . ") ";
	
	    $spruch = "SELECT name FROM liga_art WHERE id = $liga_art";
    	$result = mysql_query($spruch, $db);
    	$row = mysql_fetch_row($result);
    	$l_a_name = "$row[0]";
        echo " $l_a_name";
	
    	$spruch = "SELECT teams FROM liga_art WHERE id = $liga_art";
    	$result = mysql_query($spruch, $db);
    	$row = mysql_fetch_row($result);
    	$teamart = $row[0];
        // echo "<BR>bla: $teamart<BR>";		
        // Sonderfall WM + ConfedCup:
        if ($l_a_name == "WM") $teamart2 = "3";
        if ($l_a_name == "Confederations Cup") $teamart2 = "3";
	    $spruch = "SELECT * FROM team WHERE liga_art_teams = $teamart ORDER BY name";
	    if ($teamart2 == "3") $spruch = "SELECT * FROM team WHERE liga_art_teams < $teamart2 ORDER BY name";
    	$result = mysql_query($spruch, $db);
    	$anzahl = mysql_num_rows($result);
	
    	echo "<br>$anzahl Mannschaften verf&uuml;gbar<BR>";
    	echo "W&auml;hle die teilnehmenden Mannschaften aus.";
		
    	$mannschaften_id = array();
    	$mannschaften_name = array();

// selectbox mit Gruppen    

	
	    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		    $id = $row['id'];
	    	$name = $row['name'];
	    	$mannschaften_id[] = "$id";
	    	$mannschaften_name[] = "$name";
	    }

    	echo "<FORM METHOD=\"post\" NAME=\"teilnehmer\" ACTION=\"add_wettkampf.php\">";
    	echo "<INPUT TYPE=\"Hidden\" VALUE=\"$liga_art\" NAME=\"liga_art\">";
    	echo "<INPUT TYPE=\"Hidden\" VALUE=\"$saison\" NAME=\"saison\">";

    	echo "<TABLE>";
	    for ($i=0;$i<$anzahl;$i++) {
		    echo "<TR><TD>";
		    echo "<INPUT TYPE=\"Checkbox\" NAME=\"mannschaft[]\" VALUE=\"$mannschaften_id[$i]\">$mannschaften_name[$i]";
		
		    if ("$l_a_name" == "EM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "WM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "<OPTION VALUE=\"E\">E</OPTION>";
			    $box .= "<OPTION VALUE=\"F\">F</OPTION>";
			    $box .= "<OPTION VALUE=\"G\">G</OPTION>";
			    $box .= "<OPTION VALUE=\"H\">H</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "Confederations Cup") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }

		    $i++;
		    if ($i == $anzahl) { break; }
		    echo "</TD><TD>";
		    echo "<INPUT TYPE=\"Checkbox\" NAME=\"mannschaft[]\" VALUE=\"$mannschaften_id[$i]\">$mannschaften_name[$i]";
		    if ("$l_a_name" == "EM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "WM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "<OPTION VALUE=\"E\">E</OPTION>";
			    $box .= "<OPTION VALUE=\"F\">F</OPTION>";
			    $box .= "<OPTION VALUE=\"G\">G</OPTION>";
			    $box .= "<OPTION VALUE=\"H\">H</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "Confederations Cup") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }

		    echo "</TD>";
		    $i++;
		    if ($i == $anzahl) { break; }
		    echo "</TD><TD>";
		    echo "<INPUT TYPE=\"Checkbox\" NAME=\"mannschaft[]\" VALUE=\"$mannschaften_id[$i]\">$mannschaften_name[$i]";
		    if ("$l_a_name" == "EM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "WM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "<OPTION VALUE=\"E\">E</OPTION>";
			    $box .= "<OPTION VALUE=\"F\">F</OPTION>";
			    $box .= "<OPTION VALUE=\"G\">G</OPTION>";
			    $box .= "<OPTION VALUE=\"H\">H</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "Confederations Cup") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }

		    echo "</TD>";


		    $i++;
		    if ($i == $anzahl) { break; }
		    echo "</TD><TD>";
		    echo "<INPUT TYPE=\"Checkbox\" NAME=\"mannschaft[]\" VALUE=\"$mannschaften_id[$i]\">$mannschaften_name[$i]";
		    if ("$l_a_name" == "EM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "WM") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "<OPTION VALUE=\"C\">C</OPTION>";
			    $box .= "<OPTION VALUE=\"D\">D</OPTION>";
			    $box .= "<OPTION VALUE=\"E\">E</OPTION>";
			    $box .= "<OPTION VALUE=\"F\">F</OPTION>";
			    $box .= "<OPTION VALUE=\"G\">G</OPTION>";
			    $box .= "<OPTION VALUE=\"H\">H</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }
		    if ("$l_a_name" == "Confederations Cup") {
			    $box = "<SELECT NAME=\"gruppe_$mannschaften_id[$i]\" size=\"1\">";
			    $box .= "<OPTION VALUE=\"A\">A</OPTION>";
			    $box .= "<OPTION VALUE=\"B\">B</OPTION>";
			    $box .= "</SELECT>";
			    echo "</TD><TD>$box</TD>";

		    }

		    echo "</TD></TR>";
	    }
	    echo "<TR>";
	    echo "<td><input type=\"reset\" value=\"Abbrechen\" border=\"0\"></td>";
	    echo "<td><input type=\"submit\" value=\"Erstellen\" name=\"submitButtonName\" border=\"0\"></td>";
	    echo "</TR>";
	    echo "</TABLE></FORM>";
	    
       
    } else {
?>	
<FORM METHOD="post" NAME="wettkampf" ACTION="add_wettkampf.php">

<table border="0" cellspacing="2" cellpadding="0">
	<tr>
		<td><font size="4"><b>Saison</b></font></td>
		<TD><input type="text" name="saison"></TD>
	</tr>
	<tr>
		<TD><font size="4">	<b>Typ</b></font></TD>
		<td><select name="liga_art" size="1">
			
	    <?php

		include("../script/SCRIPTconnect.php");

	
	    $spruch = "SELECT id, name, teams FROM liga_art";
		$result = mysql_query($spruch, $db);

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$id = $row['id'];
				$name = $row['name'];
				echo "<OPTION VALUE=\"$id\">$name</OPTION>";
			}

		?>
			</SELECT>
		</TD>
	</TR>
	<TR>
		<td><input type="reset" value="Abbrechen" border="0">	</td>
		<td><input type="submit" value="Erstellen" name="submitButtonName" border="0">	</td>
	</TR>
</TABLE>	
</FORM>


<?php

    }
}

include ('../user/user_footer.html');
?>
