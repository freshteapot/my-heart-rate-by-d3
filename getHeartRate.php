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

$points = array();
foreach( $items as $item ) {
	$points[] = array(
		"timestamp" => $xpath->evaluate("string(tcx:Time)", $item),
		"heartrate" => $xpath->evaluate("string(tcx:HeartRateBpm/tcx:Value)", $item),
	);
}

print_r($points);
