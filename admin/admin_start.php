<?php	// ###***+++ Der Standard-Admin-Kopf +++***###include ('../script/SCRIPTconnect.php');include ('../script/SCRIPTsession.php');include ('../script/SCRIPTinclude.php');include ('admin_header.php');	// ####****++++-------------------++++****####/**/        $logpage = basename(__FILE__);          // ##//---------- which language should i use? -----------------------$thispage = basename(__FILE__);$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );include ("../languages/" . $langsuffix . "/" . $thepage);//---------------------------------------------------------------// ######### V O R B E R E I T U N G E N #############################// +++++++ aktuelle Wettkämpfe raussuchen +++++	$spruch = "SELECT wettkampf.id AS wkid, wettkampf.saison,";	$spruch .= " wettkampf.liga_art_id, liga_art.name FROM wettkampf";	$spruch .= " LEFT JOIN liga_art ON wettkampf.liga_art_id = liga_art.id";		$spruch2 = $spruch;	$spruch2 .= " WHERE done = 0";	$spruch2 .= " ORDER BY saison DESC";		$result = mysql_query($spruch2, $db);	$aktwk_id = array();	$aktwk_name = array();	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))		{		$akt_wettkampf_id[] = $row['wkid'];		$akt_wettkampf_name[] = $row['name'] . " " . $row['saison'];		}		// +++++++ ageschlossene Wettkämpfe raussuchen +++++	$spruch .= " WHERE done = 1";	$spruch .= " ORDER BY saison DESC";	$result = mysql_query($spruch, $db);	$old_wettkampf_id = array();	$old_wettkampf_name = array();	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))		{		$old_wettkampf_id[] = $row['wkid'];		$old_wettkampf_name[] = $row['name'] . " " . $row['saison'];		}// +++++++++ Tipspiele raussuchen +++++++++++++	$spruch  = "SELECT id, name FROM tippspiel";	$spruch .= " ORDER BY name";	$result = mysql_query($spruch, $db);	$tippspiel_id = array();	$tippspiel_name= array();	while ($row = mysql_fetch_array($result,MYSQL_ASSOC))		{		$tippspiel_id[] = $row['id'];		$tippspiel_name[] = $row['name'];		}	// ###################################################################// ###################################################################// ###################################################################// +++++++ und los gehtz mit der seite... ++++++++++++++++++++++++++++echo "<table border=0 width=\"90%\" $center>";echo "<tr><td $center>&nbsp;";echo "<font size=\"3\" face=\"Times, serif\" color=\"blue\">";echo "<b>$lang_hello</b>,<br>";	$textstyle = fontType2($txtcol8);	echo $textstyle;echo "$lang_select";echo "<br><br><br>";		echo "<table $center width=\"\" border=\"1\" cellspacing=\"10\" cellpadding=\"0\" bgcolor=\"#cccccc\">";		echo "<tr><td bgcolor=\"#0000cc\"><div align=\"center\">";		$textstyle = fontType2($txtcol13);		echo "$textstyle &nbsp;<b>$lang_wettkampf</b>&nbsp;</div></td>";		$textstyle = fontType2($txtcol16);		echo "<td $center bgcolor=\"#cc6600\">$textstyle &nbsp;<b>$lang_tiprunde</b>&nbsp;</td>";		$textstyle = fontType2($txtcol15);		echo "<td $center bgcolor=\"#660033\">$textstyle &nbsp;<b>$lang_functions</b>&nbsp;</td>";	echo "</tr><tr><td align=\"center\" valign=\"top\" bgcolor=\"#99ccff\"><div align=\"center\">";															// Namen der aktuellen Wettkämpfe anzeigen   +++++++++++++++++++++++++++++++++++	$textstyle = fontType($txtcol20);	echo $textstyle;	echo "<br>";	echo "&nbsp;&nbsp; <a href=\"add_wettkampf.php\"><b>$lang_newwettkampf</b></a>&nbsp; &nbsp;<br><br>";	for ($i=0;$i<count($akt_wettkampf_id);$i++)	{	echo "&nbsp; <A HREF=\"admin_wettkampf.php?wettkampfid=$wettkampf_id[$i]\"> ";	$textstyle = fontType2($txtcol20);	echo "$textstyle $akt_wettkampf_name[$i]</A> &nbsp;<br> ";	}	// Namen der ageschlossenen Wettkämpfe anzeigen   +++++++++++++++++++++++++++++++++++	for ($i=0;$i<count($old_wettkampf_id);$i++)	{	echo "&nbsp; <A HREF=\"admin_wettkampf.php?wettkampfid=$old_wettkampf_id[$i]\"> ";	$textstyle = fontType($txtcol19);	echo "$textstyle $old_wettkampf_name[$i]</A> &nbsp;<br> ";	}									echo "</div></td><td align=\"center\" valign=\"top\" bgcolor=\"#ffcc99\">";								// Namen der Tipprunden ausspucken  ++++++++++++++++++++++++++++++++++++++++++++++++++	$textstyle = fontType($txtcol19);	echo $textstyle;	echo "<br>";	echo "&nbsp;&nbsp;<a href=\"admin_add_tipprunde.php\"><b>$lang_newtiprunde</b></a>&nbsp;&nbsp;<br><BR>";			$textstyle = fontType2($txtcol19);	for ($i=0;$i<count($tippspiel_id);$i++)	{	echo "&nbsp; $textstyle [<A HREF=\"admin_tipprunde.php?tiprunde=$tippspiel_id[$i]\">";	echo "$tippspiel_name[$i]</A>] &nbsp;<br>";	}	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++									// ###########  funktionen ########		echo "</td><td align=\"center\" valign=\"top\" bgcolor=\"#996666\">$textstyle";$textstyle = fontType($txtcol20);	echo $textstyle;	echo "<br>";	echo "&nbsp;&nbsp; <a href=\"admin_add_user.php\"><b>$lang_newuser</b></a>&nbsp; &nbsp;<br>";$textstyle = fontType2($txtcol18);	echo $textstyle;  	echo "<br>&nbsp;&nbsp;<a href=\"admin_tipview.php\">$lang_whohastip</a>&nbsp;&nbsp;";		echo "<br>&nbsp;&nbsp;<a href=\"admin_usermenu.php\">$lang_changeudata</a>&nbsp;&nbsp;";	echo "<br>&nbsp;&nbsp;<a href=\"admin_userpics.php\">$lang_editpics</a>&nbsp;&nbsp;";	echo "<br>&nbsp;&nbsp;<a href=\"admin_forum.php\">$lang_forumsetup</a>&nbsp;&nbsp;";				echo "<br><br></td></tr></table>";																	// ++++++++++++   	ENDE GELAENDE !    	++++++++++++++++++++++++++++++echo "&nbsp;</td></tr>";echo "</table>";include ('../user/user_footer.html');?>