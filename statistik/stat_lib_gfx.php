<?php
include "../script/SCRIPTsession.php";
function createImage3210Kuchen($data,$width,$height) {
    $im=imageCreate($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
    drawPieChart($im,$data,$width,$height-35);
    drawIndex($im,$data,$width,$height);
    return $im;
}

function createImage3210Kuchen2($data,$width,$height) {
    $im=imageCreate($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
    drawPieChart2($im,$data,$width,$height-30);
    drawIndex2($im,$data,$width,$height);
    return $im;
}
function createImageSpieltagPlazierung2($data,$width,$height,$spieltage,$akt_spieltag) {
    $im=imageCreate($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
    drawGridSpieltagPlazierung($im,$spieltage,18,$width,$height,1);
    drawStatSpieltagPlazierung2($im,$spieltage,$akt_spieltag,18,$width,$height,$data);
    return $im;
}

function createImageSpieltagPunkte2($data,$max,$width,$height) {
#    $im=imageCreate($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $im=imageCreateTrueColor($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
#    $bg=imageColorAllocate($im,240,240,224);
    imageFilledRectangle($im,0,0,$width,$height,$bg);
#    imageRectangle($im,0,0,$width,$height,$gruen2_s); 

    for ($n=0;$n<count($data);$n++) { 
    	$myData=$data[$n]; 
#    echo "hullagulla> $myData[0] $myData[1]<br>\n";
	drawStatSpieltagPunkte2($im,$myData[0],$myData[1],$n+1,$max,$width,$height,count($data)); 
    }
    return $im;
}
function createImageSpieltagPunkteNeu($data,$max,$player,$width,$height) {
    $im=imageCreate($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
    drawGridSpieltagPlazierung($im,$max,$player,$width,$height,0);
    for ($n=0;$n<count($data);$n++) { 
    	$myData=$data[$n]; 
	drawHorizontalBar($im,$myData[1],$n,$myData[0],$max,$player,$width,$height); 
    }
    return $im;
}
function createImageSpieltagPunkteSaison($data,$max,$width,$height,$spieltage) {
    $im=imageCreate($width,$height) or die("Failed in call to imagecreate()<br>\n");
    $bg=imageColorAllocate($im,240,240,224);
    drawGridSpieltagPlazierung($im,$spieltage,21,$width,$height,0);
    for ($n=0;$n<count($data);$n++) { $myData=$data[$n]; drawVerticalBar($im,$myData,$n,$spieltage,21,$width,$height); }
    return $im;
}
function drawGridSpieltagPlazierung($im,$spieltage,$spieler,$width,$height,$mode) {
    $gc=imageColorAllocate($im,140,410,124);
    $xOff=0;
    $yOff=0;
    if ($mode==1) {
	    $xOff=$width/($spieltage+2);
	    $yOff=$height/($spieler+2);
    }
    else {
	    $xOff=$width/($spieltage+2);
	    $yOff=$height/($spieler+2);
    }
    for ($y=0;$y<$spieler+2;$y++) { 
    	if ($spieler>25) {
		if (($y%4)==0) imageLine($im,$xOff,($y+1)*$yOff,$width-$xOff,($y+1)*$yOff,$gc); 
	} 
	else imageLine($im,$xOff,($y+1)*$yOff,$width-$xOff,($y+1)*$yOff,$gc); 
    }
    for ($x=0;$x<$spieltage+1;$x++) { 
    	if ($spieltage>50) {
		if (($x%8)==0) imageLine($im,$xOff*(1+$x),$yOff,$xOff*(1+$x),$height-$yOff,$gc); 
	}
	else imageLine($im,$xOff*(1+$x),$yOff,$xOff*(1+$x),$height-$yOff,$gc); 
    }
}
function drawHorizontalBar($im,$value,$pos,$username,$maxX,$maxY,$width,$height) {
    $bar=imageColorAllocate($im,50,140,192);
    $bar_s=imageColorAllocate($im,20,20,92);
    $gc=imageColorAllocate($im,40,21,24);
    $ctext=imageColorAllocate($im,20,60,122);
    
    $xOff=$width/($maxX+2); $yOff=$height/($maxY+2);

    $startX=$xOff; $startY=$yOff*($pos+1);

    $stopX=$xOff*($value+1); $stopY=$yOff*($pos+2);
    imageFilledRectangle($im,$startX+1,$startY+2,$stopX-3,$stopY-3,$bar_s);
    imageFilledRectangle($im,$startX+2,$startY+3,$stopX-2,$stopY-2,$bar);
    imageString($im,2,$startX+3,$startY+(($yOff-10)/2)-2,$username,$ctext); 
}
function drawIndex($im,$data,$width,$height) {
	$bg=imageColorAllocate($im,200,200,192);
	$gruen2=imageColorAllocate($im,50,212,110);	$gruen2_s=imageColorAllocate($im,20,92,20);
	$blau1=imageColorAllocate($im,50,140,224);	$blau1_s=imageColorAllocate($im,20,20,92);
	$orange1=imageColorAllocate($im,192,192,40);	$orange1_s=imageColorAllocate($im,142,142,20);
	$rot1=imageColorAllocate($im,224,50,60);	$rot1_s=imageColorAllocate($im,92,20,20);
	$textCol=imageColorAllocate($im,20,60,122);
	$b=imageColorAllocate($im,1,23,42);

	$x=15; $y=$height-46;

	imageFilledRectangle($im,$x-13,$y,$width-114,$y+44,$b); 
	imageFilledRectangle($im,$x-14,$y-1,$width-115,$y+43,$bg); 
	imageRectangle($im,$x-14,$y-1,$width-115,$y+43,$textCol); 

	imageString($im,2,$x-3,$y-1,"Dreier (" . $data[1] . ")",$gruen2_s); 
	imageString($im,2,$x-3,$y+9,"Zweier (" . $data[2] . ")",$blau1_s); 
	imageString($im,2,$x-3,$y+19,"Einer  (" . $data[3] . ")",$orange1_s); 
	imageString($im,2,$x-3,$y+29,"Nuller (" . $data[4] . ")",$rot1_s); 

	imageFilledRectangle($im,$x-11,$y+4,$x-6,$y+9,$gruen2); imageRectangle($im,$x-11,$y+4,$x-6,$y+9,$gruen2_s); 
	imageFilledRectangle($im,$x-11,$y+14,$x-6,$y+19,$blau1); imageRectangle($im,$x-11,$y+14,$x-6,$y+19,$blau1_s); 
	imageFilledRectangle($im,$x-11,$y+24,$x-6,$y+29,$orange1); imageRectangle($im,$x-11,$y+24,$x-6,$y+29,$orange1_s); 
	imageFilledRectangle($im,$x-11,$y+34,$x-6,$y+39,$rot1); imageRectangle($im,$x-11,$y+34,$x-6,$y+39,$rot1_s); 
}
function drawIndex2($im,$data,$width,$height) {
	$bg=imageColorAllocate($im,200,200,192);
	$gruen2=imageColorAllocate($im,50,212,110);	$gruen2_s=imageColorAllocate($im,20,92,20);
	$blau1=imageColorAllocate($im,50,140,224);	$blau1_s=imageColorAllocate($im,20,20,92);
	$orange1=imageColorAllocate($im,192,192,40);	$orange1_s=imageColorAllocate($im,142,142,20);
	$rot1=imageColorAllocate($im,224,50,60);	$rot1_s=imageColorAllocate($im,92,20,20);
	$textCol=imageColorAllocate($im,20,60,122);
	$b=imageColorAllocate($im,1,23,42);

	$x=15; $y=$height-36;

	imageFilledRectangle($im,$x-13,$y,$width-114,$y+34,$b); 
	imageFilledRectangle($im,$x-14,$y,$width-115,$y+33,$bg); 
	imageRectangle($im,$x-14,$y-1,$width-115,$y+33,$textCol); 
	imageString($im,2,$x-3,$y-1,"Dreier (" . $data[1]*3 . ")",$gruen2_s); 
	imageString($im,2,$x-3,$y+9,"Zweier (" . $data[2]*2 . ")",$blau1_s); 
	imageString($im,2,$x-3,$y+19,"Einer  (" . $data[3] . ")",$orange1_s); 

	imageFilledRectangle($im,$x-11,$y+4,$x-6,$y+9,$gruen2); imageRectangle($im,$x-11,$y+4,$x-6,$y+9,$gruen2_s); 
	imageFilledRectangle($im,$x-11,$y+14,$x-6,$y+19,$blau1); imageRectangle($im,$x-11,$y+14,$x-6,$y+19,$blau1_s); 
	imageFilledRectangle($im,$x-11,$y+24,$x-6,$y+29,$orange1); imageRectangle($im,$x-11,$y+24,$x-6,$y+29,$orange1_s); 
}
function drawPieChart($im,$data,$width,$height) {
	$ctext=imageColorAllocate($im,20,60,122);
	$gruen1=imageColorAllocate($im,50,224,60);	$gruen1_s=imageColorAllocate($im,20,92,20);
	$gruen2=imageColorAllocate($im,50,212,110);	$gruen2_s=imageColorAllocate($im,20,92,20);
	$gruen3=imageColorAllocate($im,50,192,140);	$gruen3_s=imageColorAllocate($im,20,92,20);
	$orange1=imageColorAllocate($im,192,192,40);	$orange1_s=imageColorAllocate($im,142,142,20);
	$blau1=imageColorAllocate($im,50,140,224);	$blau1_s=imageColorAllocate($im,20,20,92);
	$rot1=imageColorAllocate($im,224,50,60);	$rot1_s=imageColorAllocate($im,92,20,20);
	$cx=$width/2;
	$cy=$height/2;
	imageFilledEllipse($im,$cx+1,$cy-1,$width-20,$height-20,$gruen3_s);
	$units=360/$data[0];
	$start=0;
	$myCol=$gruen2;
	for ($n=1;$n<5;$n++) {
		$end+=($data[$n]*$units);
		if ($n==2) { $myCol=$blau1; }
		else if ($n==3) { $myCol=$orange1; }
		else if ($n==4) { $myCol=$rot1; }
		imageFilledArc($im,$cx,$cy,$width-20,$height-20,$start,$end,$myCol,IMG_ARC_PIE);
		$start=$end;
	}
}
function drawPieChart2($im,$data,$width,$height) {
	$ctext=imageColorAllocate($im,20,60,122);
	$gruen1=imageColorAllocate($im,50,224,60);	$gruen1_s=imageColorAllocate($im,20,92,20);
	$gruen2=imageColorAllocate($im,50,212,110);	$gruen2_s=imageColorAllocate($im,20,92,20);
	$gruen3=imageColorAllocate($im,50,192,140);	$gruen3_s=imageColorAllocate($im,20,92,20);
	$orange1=imageColorAllocate($im,192,192,40);	$orange1_s=imageColorAllocate($im,142,142,20);
	$blau1=imageColorAllocate($im,50,140,224);	$blau1_s=imageColorAllocate($im,20,20,92);
	$rot1=imageColorAllocate($im,224,50,60);	$rot1_s=imageColorAllocate($im,92,20,20);
	$cx=$width/2;
	$cy=$height/2;
	imageFilledEllipse($im,$cx+1,$cy-1,$width-20,$height-20,$gruen3_s);
	$pde=$data[3];
	$pdz=$data[2]*2;
	$pdd=$data[1]*3;

	$units=360/($pde+$pdz+$pdd);
	$start=0;
	for ($n=1;$n<4;$n++) {
		if ($n==1) { $end+=($pdd*$units); $myCol=$gruen2; }
		else if ($n==2) { $end+=($pdz*$units); $myCol=$blau1; }
		else if ($n==3) { $end+=($pde*$units); $myCol=$orange1; }
		imageFilledArc($im,$cx,$cy,$width-20,$height-20,$start,$end,$myCol,IMG_ARC_PIE);
		$start=$end;
	}
}
function drawStatSpieltagPlazierung2($im,$spieltage,$akt_spieltag,$spieler,$width,$height,$scoreArray) {
    $lc=imageColorAllocate($im,240,40,24);
    $hc=imageColorAllocate($im,80,20,12);
    $xOff=$width/($spieltage+2);
    $yOff=$height/($spieler+2);
 #   echo "data> -------- <br>\n";
    $data=array();
    $data[]=$xOff;
    $data[]=$height-$yOff;
    for ($x=0;$x<$akt_spieltag;$x++) {
    	$data[]=($x+2)*$xOff;
	if ($scoreArray[$x]==0) { $data[]= $height-$yOff; }
	else { $data[]=$scoreArray[$x]*$yOff; }
#	echo "data> " . $scoreArray[$x] . "<br>\n";
    }
#echo "a> $akt_spieltag";
    $data[]=($akt_spieltag+1)*$xOff;
    $data[]=$height-$yOff;
#    $data[]=$xOff;
#    $data[]=$height-$yOff;
    imageFilledPolygon($im,$data,(count($data)/2),$lc);
    imagePolygon($im,$data,(count($data)/2),$hc);
}
function drawStatSpieltagPunkte2($im,$username,$points,$pos,$max,$width,$height,$player) {
	global $name;
	$unit = ($width-50) / $max;

	$ctext=imageColorAllocate($im,20,60,122);
	$gruen1=imageColorAllocate($im,50,224,60);	$gruen1_s=imageColorAllocate($im,20,92,20);
	$gruen2=imageColorAllocate($im,50,212,110);	$gruen2_s=imageColorAllocate($im,20,92,20);
	$gruen3=imageColorAllocate($im,50,192,140);	$gruen3_s=imageColorAllocate($im,20,92,20);
	$orange1=imageColorAllocate($im,192,192,40);	$orange1_s=imageColorAllocate($im,142,142,20);
	$blau1=imageColorAllocate($im,50,140,224);	$blau1_s=imageColorAllocate($im,20,20,92);
	$rot1=imageColorAllocate($im,224,50,60);	$rot1_s=imageColorAllocate($im,92,20,20);
	
	$myTex=$ctext;
	if ($pos==1) { $myCol=$gruen1;	$mySha=$gruen1_s; $test=1; }
	else if ($pos==2) { $myCol=$gruen2; $mySha=$gruen2_s; $test=2; }
	else if ($pos==3) { $myCol=$gruen3; $mySha=$gruen3_s; $test=3; } 
	else if ($pos>($player-3)) { $myCol=$rot1; $mySha=$rot1_s; $test=5; }
	else { $myCol=$blau1; $mySha=$blau1_s; $test=4; }
	if ($username==$name) { $myCol=$orange1; $mySha=$orange1_s; $test=6;}
	
#	echo "name> $name username> $username punkte> $points myCol> $myCol ($test)<br>\n";	

	imageString($im,2,10,9+(($pos-1)*20),$points,$ctext);
	imageFilledRectangle($im,32,12+(($pos-1)*20),($points*$unit)+32,22+(($pos-1)*20),$mySha);
	imageFilledRectangle($im,30,10+(($pos-1)*20),($points*$unit)+30,20+(($pos-1)*20),$myCol);
	imageString($im,2,32,9+(($pos-1)*20),"$username",$myTex); 
}
function drawVerticalBar($im,$value,$pos,$maxX,$maxY,$width,$height) {
    $bar=imageColorAllocate($im,50,140,192);
    $bar_s=imageColorAllocate($im,20,20,92);
    $gc=imageColorAllocate($im,140,210,124);
    
    $xOff=$width/($maxX+2); $yOff=$height/($maxY+2);
    $startX=(($pos+1)*$xOff); $startY=$yOff+(($maxY-$value)*$yOff);
    $stopX=(($pos+2)*$xOff) ; $stopY=$height-$yOff ;

    imageFilledRectangle($im,$startX+2,$startY+2,$stopX-3,$stopY-1,$bar_s);
    imageFilledRectangle($im,$startX+3,$startY+3,$stopX-2,$stopY-1,$bar);
}


?>
