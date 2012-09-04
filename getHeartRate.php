<?php

$dom = new DOMDocument();
$dom->load("sample.tcx");

$xpath = new DOMXpath($dom);
$xpath->registerNamespace('tcx', "http://www.garmin.com/xmlschemas/TrainingCenterDatabase/v2"); 

/*
From this file we want.

/Time
/HeartRateBpm/Value
*/
$items = $xpath->query("//tcx:Trackpoint");

$pointsSimple = array();
foreach( $items as $item ) {
	$pointsSimple[] = $xpath->evaluate("string(tcx:HeartRateBpm/tcx:Value)", $item);
}
echo json_encode($pointsSimple);
