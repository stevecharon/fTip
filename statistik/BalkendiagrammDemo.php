<?php

function array2string($data) {
    for ($n=0;$n<count($data);$n++) { $res.=" $data[$n]"; }
    return $res.="<br>\n";
}
function array2string2($data) {
    for ($n=0;$n<count($data);$n++) { $res.=array2string($data[$n]); }
    return $res;
}
function getMax($data) {
    $max=0;
    for ($n=0;$n<count($data);$n++) {
	$current=$data[$n];
	if ($current[1]>$max) { $max=$current[1]; }
    }
    return $max;
}
function getCount($data) {
    $mcount=0;
    for ($n=0;$n<count($data);$n++) {
	$count++;
    }
    return $count;
}
function sortArray($data) {
    for ($n=0;$n<count($data)-1;$n++) {
	$current=$data[$n];
	$next=$data[$n+1];
	if ($current[1]<$next[1]) {
	    $tmp=$next;
	    $data[$n+1]=$current;
	    $data[$n]=$tmp;
	}
    }
    return $data;
}
function drawStat($im,$spieltage,$spieler,$width,$height,$scoreArray) {
    $lc=imageColorAllocate($im,240,40,24);
    $xOff=$width/($spieltage+1);
    $yOff=$height/($spieler+1);
    $lastX=$xOff;
    $lastY=$yOff*($spieler);
    for ($x=0;$x<count($scoreArray);$x++) {
    	$newX=($xOff*($x+1));
	$newY=($scoreArray[$x])*($yOff);
	imageLine($im,$lastX,$lastY,$newX,$newY,$lc);
	$lastX=$newX;
	$lastY=$newY;
    }
}

function drawGrid($im,$spieltage,$spieler,$width,$height) {
    $gc=imageColorAllocate($im,40,40,24);
    $xOff=$width/($spieltage+1);
    $yOff=$height/($spieler+1);
    for ($y=0;$y<$spieler;$y++) {
	imageLine($im,$xOff,($y+1)*$yOff,$width-$xOff,($y+1)*$yOff,$gc);
    }
    for ($x=0;$x<$spieltage;$x++) {
	imageLine($im,$xOff*(1+$x),$yOff,$xOff*(1+$x),$height-$yOff,$gc);
    }
}

function createImage($data) {
    $w=300;
    $h=200;
    $im=imageCreate($w,$h) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
    $data=array(3,5,5,4,5,7,8,10,9,8,7,6,5,4,3,2,1,5,5,7,6,4,2,3,3,2,1);
    drawGrid($im,34,10,$w,$h);
    drawStat($im,34,10,$w,$h,$data);
    return $im;
}

header('Content-type: image/png');
$im=createImage($daten);
imagePNG($im);
imageDestroy($im)

?>
