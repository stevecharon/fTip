<?php
include("stat_lib.php");
include("stat_lib_db.php");
include("stat_lib_db2.php");
include("stat_lib_gfx.php");


$wettkampfid = $_GET['wettkampfid'];
$tiprunde = $_GET['tiprunde'];
$spieltag = $_GET['spieltag'];
$type = $_GET['type'];
$width = $_GET['width'];
$height = $_GET['height'];
$userid = $_GET['userid'];

$w=300;

$h=200;
$tid=1;
$wid=1;
#$uid=5;
$s=16;
#$type=2;
$debug=0;

if (!$width) $width=$w;
if (!$height) $height=$h;
if (!$tiprunde) $tiprunde=$tid;
if (!$wettkampfid) $wettkampfid=$wid;
if (!$userid) $userid=$uid;
if (!$spieltag) $spieltag=$s;

if ($debug==0) {
	header('Content-type: image/png');
#	header('Content-type: image/jpeg');
	$bg=imageCreateFromGIF("../img/fTip_LogoSW_small.gif");
}

if ($type==1)	{ $data=getWettkampfPunkte($tiprunde, $wettkampfid, $spieltag); }
elseif ($type==2)	{ $data=getSaisonPunkte($tiprunde, $wettkampfid, $userid); }
elseif ($type==3)	{ $data=getSpieltagPunkte($tiprunde, $wettkampfid, $spieltag); }
else 		{ $data=getSpieltagPunkte($tiprunde, $wettkampfid, $spieltag); }

if ($type==3) {
	$max=getMax($data);
	$player=count($data);
#	$im=createImageSpieltagPunkteNeu($data,$max,$width,(count($data)*20)+10);
	$im=createImageSpieltagPunkteNeu($data,$max,$player,$width,$height);
}
else if ($type==2) {
	#$max=getMax($data)
	
	$spieltage=getGesamtSpieltage($wettkampfid);
	$im=createImageSpieltagPunkteSaison($data,$max,$width,$height,$spieltage);
}
else if ($type==1) {
	$max=getMax($data);
	$player=count($data);
#	echo "max> $max player> $player<br>\n";
	$im=createImageSpieltagPunkte2(sortArray($data),$max,$width,(count($data)*20)+10);
#	$im=createImageSpieltagPunkteNeu($data,$max,$player,$width,$height);
}
else {
	$max=getMax($data);
	$im=createImageSpieltagPunkte2(sortArray($data),$max,$width,(count($data)*20)+10);
#	$im=createImageSpieltagPunkteNeu($data,$max,count($data),$width,$height);
}

if ($debug==0) {
	if ($type==2) {
#		imageCopyMerge($im,$bg,($width-172)/2,($height-90)/2,0,0,172,90,12);
#		imageCopyMerge($im,$bg,$width-80-7,7,0,0,80,42,12);
#		imageCopyMerge($im,$bg,$width-80,0,0,0,80,42,12);
	}
	else if ($type==1) {
		imageCopyMerge($im,$bg,($width-80),((count($data)*20)+10-42),0,0,80,(count($data)*20)+10,12);
	}
	else {
		imageCopyMerge($im,$bg,($width-80),((count($data)*20)+10-42),0,0,80,$height,12);	
	}
	imagePNG($im);
#	imageJPEG($im);
	imageDestroy($im);
}

?>
	
