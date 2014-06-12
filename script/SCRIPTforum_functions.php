<?php
include ("SCRIPTconnect.php");


function Themen($forumid)
{
include ("SCRIPTconnect.php");
$dummy = 0;
$spruch  = "SELECT id FROM forum";
$spruch .= " WHERE forum_id = $forumid";
$spruch .= " AND reply_nr = 0";
$result = mysql_query($spruch, $db) or die("<b>ThemenZhaehler</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$dummy = mysql_affected_rows ();
return $dummy;
}




function LastBeitragNr()
{
include ("SCRIPTconnect.php");
$spruch  = " SELECT beitrag_id FROM forum";
$spruch .= " ORDER BY beitrag_id DESC";
$result = mysql_query($spruch, $db) or die("<b>ThemenZhaehler</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$dummy = $row['beitrag_id'];
//echo "Letzter war : " . $dummy;

return $dummy;
}


function Beitraege($forumid)
{
include ("SCRIPTconnect.php");
$dummy = 0;
$spruch  = "SELECT id FROM forum";
$spruch .= " WHERE forum_id = $forumid";
$result = mysql_query($spruch, $db) or die("<b>BeitragZaehlen</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$dummy = mysql_affected_rows ();
return $dummy;
}



function LastReply($mid)
{
include ("SCRIPTconnect.php");
include ('../script/SCRIPTstyles.php');
    $font  = fontSizeColor(1, $txtcol7);
    $font2 = fontSizeColor(1, $txtcol9); 
    $font3 = fontSizeColor(1, $txtcol8); 
$sprach  = "SELECT forum.id AS fid, forum_id, reply_nr AS reply, user_id, time, user.name AS name FROM forum";
$sprach .= " INNER JOIN user ON forum.user_id = user.id";
$sprach .= " WHERE beitrag_id = $mid";
$sprach .= " ORDER BY reply DESC";
$resalt = mysql_query($sprach, $db) or die("<b>LastReply</b> failed : " . mysql_error() . "<br><br>" . $sprach);
$raw = mysql_fetch_array($resalt, MYSQL_ASSOC);
$forumid = $raw['forum_id'];
$bla = $raw['fid'];
$reply = $raw['reply'];
$der_user = $raw['name'];          // echo $der_user;
$time = $raw['time'];
$in_chick = DatePrint($time);


$sprach  = "SELECT titel FROM forum";
$sprach .= " WHERE id = $bla";
$resalt = mysql_query($sprach, $db) or die("<b>ThemenTitel</b> failed : " . mysql_error() . "<br><br>" . $sprach);
$raw = mysql_fetch_array($resalt, MYSQL_ASSOC);
$der_titel = $raw['titel'];    //    echo $der_titel;
echo "$font2 <a href=\"../forum/forum_beitrag.php?beitragid=$mid&reply=$reply&forumid=$forumid#$reply\">$der_titel</a><br>";
echo "$font3 $der_user " . $font . "[" . $in_chick . "]";

return $bla;
}


function LastPost($forumid)
{
include ("SCRIPTconnect.php");
include ('../script/SCRIPTstyles.php');
    $font  = fontSizeColor(1, $txtcol7);
    $font2 = fontSizeColor(1, $txtcol9); 
    $font3 = fontSizeColor(1, $txtcol8); 
$sprach  = "SELECT forum.id AS fid, forum_id, user_id, beitrag_id, reply_nr, time, user.name AS name FROM forum";
$sprach .= " INNER JOIN user ON forum.user_id = user.id";
$sprach .= " WHERE forum_id = $forumid";
$sprach .= " ORDER BY fid DESC";
$resalt = mysql_query($sprach, $db) or die("<b>LastPost</b> failed : " . mysql_error() . "<br><br>" . $spruch);
$raw = mysql_fetch_array($resalt, MYSQL_ASSOC);
 
$forumid = $raw['forum_id'];
$bla = $forumid;
$beitrag_id = $raw['beitrag_id'];
$reply = $raw['reply_nr'];
$der_user = $raw['name'];          // echo $der_user;
$time = $raw['time'];
$in_chick = DatePrint($time);



if ($beitrag_id)
{
$sprach  = "SELECT titel FROM forum";
$sprach .= " WHERE beitrag_id = $beitrag_id";
//$spruch .= " AND beitrag_id = $beitrag_id";
$sprach .= " AND reply_nr = 0";
$resalt = mysql_query($sprach, $db) or die("<b>LastPostThemenTitel</b> failed : " . mysql_error() . "<br><br>" . $sprach);
$raw = mysql_fetch_array($resalt, MYSQL_ASSOC);
$der_titel = $raw['titel'];    //    echo $der_titel;
echo "$font2 <a href=\"../forum/forum_beitrag.php?reply=$reply&forumid=$forumid&beitragid=$beitrag_id#$reply\">$der_titel</a><br>";
echo "$font3 $der_user " . $font . "[" . $in_chick . "]";
}
return $bla;
}




function DatePrint($time)
{
$jahr1 = $time[2];
$jahr2 = $time[3];
$monat1 = $time[4];
$monat2 = $time[5];
$tag1 = $time[6];
$tag2 = $time[7];
$stunde1 = $time[8];
$stunde2 = $time[9];
$minute1 = $time[10];
$minute2 = $time[11];

$in_chick = $tag1 . $tag2 . "." . $monat1 . $monat2 . "." . $jahr1 . $jahr2 . " - " . $stunde1 . $stunde2 . ":" . $minute1 . $minute2 ;


return $in_chick;


}






function AnzahlReplys($beitragid)
{
$zaehler = 0;
include ("SCRIPTconnect.php");
$sprach  = "SELECT id FROM forum WHERE beitrag_id = $beitragid AND reply_nr > 0";
$resalt = mysql_query($sprach, $db) or die("<b>ReplyAnzahl</b> failed : " . mysql_error() . "<br><br>" . $sprach);
$zaehler = mysql_affected_rows ();
return $zaehler;

}





function SmileReplace($smileytext)
{
$dumm=0;
include ("SCRIPTconnect.php");
$spruch  = "SELECT id, file, tag FROM forum_smiley";
$result = mysql_query($spruch, $db) or die("<b>SmileyReplace</b> failed : " . mysql_error() . "<br><br>" . $spruch);
while  ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {

    $smile_id = $row['id'];
    $smile_file = $row['file'];
    $smile_tag = $row['tag'];
    

    if ($smile_tag != '')
        {      
        $dumm++;
        $imagetag = "<img src=\"../img/smile/" . $smile_file . "\">";    

//       echo "$smile_tag - "; echo $imagetag;
        $smileytext = str_replace( "" . $smile_tag . "" , $imagetag , $smileytext );
        $smileytext = str_replace( "\r\n" , "<br>", $smileytext );
        }
    

    }
// $smileytext = $smileytext . "(checked)";
//   echo $smileytext; 
//echo $dumm;
return $smileytext;


}


function ForumFlag()
{
include ("SCRIPTconnect.php");
    $spruch = "SELECT forum_flag FROM config";
    $result = mysql_query($spruch, $db) or die("<b>ForumFlag</b> failed : " . mysql_error() . "<br><br>" . $spruch);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $forumflag = $row['forum_flag'];
return $forumflag;
}



function ForumName($forumid)
{
include ("SCRIPTconnect.php");
global $uid;
#include ('SCRIPTlanguage.php');
$langsuffix = Whichlanguage($db, $uid);
include ("../languages/" . $langsuffix . "/forum_functions." . $langsuffix);

$rundenname = TipName($forumid);
if ($forumid == 0) $rundenname = $lang_mainboard;
if ($forumid == 9999) $rundenname = $lang_storyboard;
if ($forumid == 9998) $rundenname = $lang_cafeboard;
return $rundenname;

}



function UserOpus($des_users_id)
{
$chefzaehler = 0;
include ("SCRIPTconnect.php");
$spruch  = "SELECT id FROM forum WHERE user_id = $des_users_id";
$result = mysql_query($spruch, $db) or die("<b>UserOpus</b> failed : " . mysql_error() . "<br><br>" . $spruch);
//$row = mysql_fetch_array($result, MYSQL_ASSOC);
$chefzaehler = mysql_affected_rows ();
return $chefzaehler;

}



?>