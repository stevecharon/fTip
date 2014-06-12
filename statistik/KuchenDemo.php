<?php
include("stat_lib.php");
include("stat_lib_db.php");
include("stat_lib_gfx.php");

$wettkampfid = $_GET['wettkampfid'];
$tiprunde = $_GET['tiprunde'];
$spieltag = $_GET['spieltag'];
$type = $_GET['type'];
$width = $_GET['width'];
$height = $_GET['height'];
$userid = $_GET['userid'];

#$wettkampfid=1;
#$spieltag=11;
#$userid=5;
#$width=200;
#$height=200;
$debug=0;
if ($debug==0) header('Content-type: image/png');
$bg=imageCreateFromGIF("../img/fTip_LogoSW_small.gif");

$data=User3210($wettkampfid, $spieltag,$userid);
if ($type==1) {
	$im=createImage3210Kuchen2($data,$width,$height);
}
else {
	$im=createImage3210Kuchen($data,$width,$height);
}
if ($debug==0) {
	imageCopyMerge($im,$bg,$width-80+1,$height-42+1,0,0,80,42,15);
	imagePNG($im);
	imageDestroy($im);
}
?>
