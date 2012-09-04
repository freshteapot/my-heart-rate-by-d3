<?php

$dom = new DOMDocument();
$dom->load("sample.tcx");

$xpath = new DOMXpath($dom);
$xpath->registerNamespace('garmin', "http://www.garmin.com/xmlschemas/TrainingCenterDatabase/v2"); 

/*
From this file we want.

/Time
/HeartRateBpm/Value
*/
$items = $xpath->query("//garmin:Trackpoint");

foreach( $items as $item ) {
	echo $xpath->evaluate("string(garmin:Time)", $item) . "\n";
	echo $xpath->evaluate("string(garmin:HeartRateBpm/garmin:Value)", $item) . "\n";
}
