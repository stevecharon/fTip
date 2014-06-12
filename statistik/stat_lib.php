<?php

function array2string($data) {
    for ($n=0;$n<count($data);$n++) { $res.=" $data[$n]"; }
    return $res.="<br>\n";
}
function array2string2($data) {
    for ($n=0;$n<count($data);$n++) { $res.=array2string($data[$n]); }
    return $res;
}

/**
 * ermittelt das maximum der uebergeben liste
 * die liste entahelt eine liste, deren erstes element der username und das
 * zweite Element die Punkte sind.
 */
function getMax($data) {
    $max=0;
    for ($n=0;$n<count($data);$n++) {
	$current=$data[$n];
	if ($current[1]>$max) { $max=$current[1]; }
    }
    return $max;
}

/**
 * ermittelt das maximum der uebergeben liste
 * die liste entahelt eine liste von Punktewerten
 */
function getMax2($data) {
    $max=0;
    for ($n=0;$n<count($data);$n++) {
	if ($data[$n]>$max) { $max=$data[$n]; }
    }
    return $max;
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

?>
