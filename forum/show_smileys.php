<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('../script/SCRIPTforum_functions.php');
//include ('../user/user_header.php');
/**/        $logpage = basename(__FILE__);          // ##



echo "<table border=1 cellspacing=6 $center><tr>";

$zaehler=0;
$spruch  = "SELECT id, file, tag FROM forum_smiley";
$spruch .= " ORDER BY file";
$result = mysql_query($spruch, $db) or die("<b>ALL Smileys</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while  ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
    
    $smile_id = $row['id'];
    $smile_file = $row['file'];
    $smile_tag = $row['tag'];
 
 $font = fontSizeColor(1, $txtcol1); echo $font;
    echo "<th $bgcolor36><img src=\"../img/smile/" . $smile_file . "\"><br>$font";
    
    echo $smile_tag . "</th>";
    $zaehler++;
    if ($zaehler == 3) 
        {
        echo "</tr><tr>";
        $zaehler = 0;
        }
 
    }
echo "<tr></table>";




?>