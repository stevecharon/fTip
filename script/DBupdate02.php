<?php

include ('../script/SCRIPTconnect.php');
include ('../script/SCRIPTsession.php');
include ('../script/SCRIPTinclude.php');

/*
### folgendes anlegen:
in config
jabber_server
jabber_conference
jabber_room
jabber


+++ in meister
punkte

*/
$blu = "August 2003";
$bla = "Juni 2004";

$sprich  = "UPDATE user SET genesis = '$blu'";
$sprich .= " WHERE id < 26";
$resilt = mysql_query($sprich, $db) or die("NewUser into DB failed : " . mysql_error());
   
$sprich  = "UPDATE user SET genesis = '$bla'";
$sprich .= " WHERE id > 26";
$resilt = mysql_query($sprich, $db) or die("NewUser into DB failed : " . mysql_error());
    
?>