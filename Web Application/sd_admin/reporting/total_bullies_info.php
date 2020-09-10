<?php
error_reporting(0);
$bully_id = intval($_GET['q']);

$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
		
$query = "SELECT COUNT( * )
FROM `incident_reporting`
WHERE bully_id = ".$bully_id."";

$results = mysqli_query($db, $query);
$row = mysqli_fetch_row($results);

print $row[0];
?>