<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('user_header.php');
/**/        $logpage = basename(__FILE__);          // ##


//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------




// ################# Daten vorbereiten ########################################
$spruch = "SELECT tippspiel_user.id, tippspiel_id, user_id, tippspiel.name FROM tippspiel_user";$spruch .= " LEFT JOIN tippspiel ON tippspiel_user.tippspiel_id = tippspiel.id";
$spruch .= " WHERE user_id = $uid";
$result = mysql_query($spruch, $db);

$tippspiel_id = array();
$tippspiel_name= array();

while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
//	echo "<BR>";
//	echo $row['name'] . "<BR>";
//	echo $row['tippspiel_id'];
//	echo $row['name'];
	$tippspiel_id[] = $row['tippspiel_id'];
	$tippspiel_name[] = $row['name'];
}


$id1 = array_shift($tippspiel_id);

if ($id1 == '')
    {
    $tuersteher = 1;
    } else {
    $tuersteher = 0;
    
$spruch = "SELECT tippspiel_wettkampf.id, tippspiel_id, wettkampf_id, wettkampf.saison,";
$spruch .= " wettkampf.liga_art_id, wettkampf.done AS checker, liga_art.name FROM tippspiel_wettkampf";
$spruch .= " LEFT JOIN wettkampf ON tippspiel_wettkampf.wettkampf_id = wettkampf.id";
$spruch .= " LEFT JOIN liga_art ON wettkampf.liga_art_id = liga_art.id";
$spruch .= " WHERE tippspiel_id = $id1";

foreach ($tippspiel_id as $id)
{
	$spruch .= " OR tippspiel_id = $id";
}

array_unshift($tippspiel_id, $id1); 

$spruch .= " GROUP BY wettkampf_id";
$result = mysql_query($spruch, $db);

$wettkampf_id = array();
$wettkampf_name = array();

while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
$checker = $row['checker'];
	if ($checker == 0)
	    {
	    $wettkampf_id[] = $row['wettkampf_id'];
	    $wettkampf_name[] = $row['name'] . " " . $row['saison'];
        }
}
}
// #####################################################################################




$font  = fontSizeColor(5, $txtcol13);
$font2 = fontSizeColor(4, $txtcol12);
$font3 = fontSizeColor(3, $txtcol17);
$font33 = fontSizeColor(2, $txtcol17);
$font4 = fontSizeColor(1, $txtcol7);
$font5 = fontSizeColor(1, $txtcol9);
$font6 = fontSizeColor(1, $txtcol19);
$font7 = fontSizeColor(1, $txtcol35);
$font8 = fontSizeColor(2, $txtcol6);
$font9 = fontSizeColor(2, $txtcol22);


echo "<br><table cellspacing=6 $center border=0>";
echo "<tr><td $center>$font $lang_hello <i>$name</i><br>";
echo "$font2 $dreispace $lang_welcome <b>fTip</b> $dreispace <br>$font33";
echo "$lang_welcome2</p></td></tr>";

echo "<tr><td $cspn2>";

    // ---------- Tipprunden -------------------------------------------
    echo "<table width=450 $center border=1 cellspacing=5>";
    echo "<tr>";
        echo "<td rowspan=2><img src=\"../img/tipprunden1.jpg\"></td>";
        echo "<td $cspn2 $justify $top>$font3 $lang_communities $font4<br>";
        echo "$lang_communitext";
//        echo "In der rechten Spalte kannst Du Dich bei weiteren Tipprunden anmelden.";
        echo "</tr><tr><td $justify>$font6";
        
if ($tuersteher==1)
    {
    echo $font8;
    echo "&nbsp; $lang_nocommunity<br>";
        echo $font4;
    
    }else{
        echo "&nbsp; $lang_yourcommunity<br>";
        echo $font4;
        for ($i=0;$i<count($tippspiel_id);$i++)
            {
	        echo "&nbsp;  <A HREF=\"user_tipprunde_aktuell.php?tiprunde=$tippspiel_id[$i]\">";
	        echo $font5 . "$tippspiel_name[$i]</A> &nbsp; ";
            echo "<BR>";
            }
      }
        echo "</td>";
        echo "<td $right>";
        if ($tuersteher==1)
        {
        echo $font9;
        }else{
        echo $font4;
        }
        echo $dreispace;
        echo "$lang_joincommu1$dreispace<br>$dreispace ";
        if ($tuersteher==1)
        {
         echo "$lang_joincommu2";
        }else{
        echo "$lang_joincommu3";
        }
        echo "<a href=../user/user_runde_anmelden.php>" . $font5;
        echo $lang_joincommu4 . "</a>$font4" . $dreispace . "</td>";
    echo "</tr>";

    echo "</table>";
    // ---------------------------------------------------------------------

echo "<br><br>";


if ($tuersteher==0)
{

    // ---------- Wettkämpfe -------------------------------------------
    echo "<table width=450 $center border=1 cellspacing=5>";
    echo "<tr>";
        echo "<td rowspan=2><img src=\"../img/aktWK1.jpg\"></td>";
        echo "<td $justify $top>$font3 $lang_competition $font4<br>";
        echo $lang_competitext;
        echo "</tr><tr><td $justify>$font6";
        echo "&nbsp; $lang_lookcompeti<br>";
        echo $font4;
        for ($i=0;$i<count($wettkampf_id);$i++)
            {
        	echo "&nbsp; <A HREF=\"user_tipp_abgeben.php?wettkampfid=$wettkampf_id[$i]\"> ";
	        echo "$font7 $wettkampf_name[$i]</A> &nbsp; ";
	        echo "<BR>";
            }
        
        echo "</td>";
    echo "</tr>";

    echo "</table>";
    // ---------------------------------------------------------------------

echo "<br><br>";

    // ---------- Statistik -------------------------------------------
    echo "<table width=450 $center border=1 cellspacing=5>";
    echo "<tr>";
        echo "<td rowspan=2><img src=\"../img/statistik.jpg\"></td>";
        echo "<td $justify $top>$font3  $lang_statistics $font4<br>";
        echo $lang_stattext1;
        echo "$font6<br>$lang_stattext2";

        	echo "<A HREF=\"../user/user_statistik.php\"> ";
	        echo "$font7 $lang_stattext3</A>" . $font6 . "$lang_stattext4 &nbsp; ";

        echo "</td>";
    echo "</tr>";

    echo "</table>";
    // ---------------------------------------------------------------------



echo "<br><br>";

    // ---------- Forum -------------------------------------------
    echo "<table width=450 $center border=1 cellspacing=5>";
    echo "<tr>";
        echo "<td rowspan=2><img src=\"../img/forum.jpg\"></td>";
        echo "<td $justify $top>$font3  $lang_forum $font4<br>";
        echo $lang_forumtext1;
        echo "$font6<br>$lang_forumtext2 ";
        	echo "<A HREF=\"../forum/forum_start.php\"> ";
	        echo "$font7 $lang_forumtext3</A>" . $font6 . " &nbsp; ";

        echo "</td>";
    echo "</tr>";

    echo "</table>";
    // ---------------------------------------------------------------------


echo "<br><br>";

    // ---------- Archiv und HallOfFame -------------------------------------------
    echo "<table width=450 $center border=1 cellspacing=5>";
    echo "<tr>";
        echo "<td rowspan=2><img src=\"../img/archiv.jpg\"></td>";
        echo "<td $justify $top>$font3  $lang_hofarchive$font4<br>";
        echo "$lang_archivtext1";
        echo "<A HREF=\"../user/user_archiv.php\"> ";
	        echo "$font7 $lang_archivtext2</A>" . $font4 . "&nbsp;";
        echo "$lang_archivtext3<br><br>";
        echo "$lang_hoftext1";
        echo "<A HREF=\"../user/user_tipprunde_HoF.php\"> ";
	    echo "$font7 $lang_hoftext2</A>" . $font4 . "&nbsp;";
        echo "$lang_hoftext3";
        	

        echo "</td>";
    echo "</tr>";

    echo "</table>";
    // ---------------------------------------------------------------------

}




echo "</td></tr></table>";










include ('user_footer.html');
?>












