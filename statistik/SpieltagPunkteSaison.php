<?php
include "stat_lib_db.php";
include "stat_lib_gfx.php";
include "stat_lib.php";

$wettkampfid = $_GET['wettkampfid'];
$tiprunde = $_GET['tiprunde'];
$spieltage = $_GET['spieltage'];
$type = $_GET['type'];
$width = $_GET['width'];
$height = $_GET['height'];
$userid = $_GET['userid'];

$w=300;
$h=200;
$tid=1;
$wid=2;
#$uid=5;
#$type=1;
$debug=0;
$sptage=34;

if (!$width) $width=$w;
if (!$height) $height=$h;
if (!$tiprunde) $tiprunde=$tid;
if (!$wettkampfid) $wettkampfid=$wid;
if (!$userid) $userid=$uid;
if (!$spieltage) $spieltage=$sptage;

$akt_spieltag=getAktuellerSpieltag(0,$wettkampfid);
if ($debug==0) { 
	header('Content-type: image/png'); 
	$bg=imageCreateFromGIF("../img/fTip_LogoSW2.gif");
}
if ($type==1) {
	$data=getSpieltagPlazierung($tiprunde,$wettkampfid,$userid);
	$im=createImageSpieltagPlazierung2($data,$width,$height,$spieltage,$akt_spieltag);
}
else {
	$data=getSaisonPlazierung($tiprunde,$wettkampfid,$userid);
	$im=createImageSpieltagPlazierung2($data,$width,$height,$spieltage,$akt_spieltag);
}
if ($debug==0) {
	imageCopyMerge($im,$bg,($width-172)/2,($height-90)/2,0,0,172,90,15);
	imagePNG($im);
	imageDestroy($im);
}

?>
