<?php
// uebergeben bekomm ich WETTKAMPFID und SPIELTAG

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');
include ('admin_header.php');
/**/        $logpage = basename(__FILE__);          // ##



//---------- which language should i use? -----------------------
$thispage = basename(__FILE__);
$thepage = ereg_replace( ".php", "." . $langsuffix , $thispage );
include ("../languages/" . $langsuffix . "/" . $thepage);
//---------------------------------------------------------------


$subject = "$lang_mailsubject";

$spiele = array();
$remind_user = array();

// sachen raussuchen

$spruch  = " SELECT www, maild, reminduser_flag, reminduser_txt";
$spruch .= " FROM config";

$result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

$www = $row['www'];
$daemon_adress = $row['maild'];
$der_text = $row['reminduser_txt'];



if ($row['reminduser_flag'] == 1)
{
    // spiele raussuchen 
    $spruch2 = "SELECT id";
    $spruch2 .= " FROM liga_spiel";
    $spruch2 .= " WHERE spieltag = $akt_spieltag";
    $spruch2 .= " AND done = 0";
    $spruch2 .= " AND wettkampf_id = $wettkampfid";

    $result2 = mysql_query( $spruch2, $db ) or die("Query failed : " . mysql_error());
    while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
    {
    $spiele[] = $row2['id'];
    }

    // auf gehtz ffŸr die user
    $spruch  = "SELECT id, name, email";
    $spruch .= " FROM user";
    $spruch .= " WHERE remind_flag = 1";
    $result = mysql_query( $spruch, $db ) or die("Query failed : " . mysql_error());
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
     {
      $sendmailcount = 0;
      $der_user_id = $row['id'];
      $der_user = $row['name'];
      $die_mail = $row['email'];

    // hatta getippt ?!
       foreach ($spiele AS $das_spiel) 
            {
            $spruch2 = "SELECT heim_tip";
            $spruch2 .= " FROM liga_tip";
            $spruch2 .= " WHERE id = $das_spiel";
            $spruch2 .= " AND user_id = $der_user_id";
            $spruch2 .= " AND wettkampf_id = $wettkampfid";
            $result2 = mysql_query( $spruch2, $db ) or die("Query failed : " . mysql_error());
            $row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
            
            $getippt = $row['heim_tip'];
            
            if ($getippt == '') $sendmailcount++;
            }
       
      
      if ($sendmailcount > 0)
            {
            
      $WKname = WKname($wettkampfid);
      
            $obody = ereg_replace( "USER", $der_user, $der_text );
	        $obody = ereg_replace( "EMAIL", $die_mail, $obody );
            $obody = ereg_replace( "URL", $www, $obody );
            
      $obody = ereg_replace( "WKNAME", $WKname, $obody );
             mail( $die_mail, $subject, $obody, "From: fTip-Daemon<" . $daemon_adress . ">" );
            
            echo $lang_mailsenttouser . " " . $der_user . " [" . $die_mail . "] " . "<br>";
            }
     }

exit;
}
echo $lang_remindoff;

exit;












