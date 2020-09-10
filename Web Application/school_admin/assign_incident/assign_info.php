<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
$incident_to_be_assigned = $_GET['report_id_assign'];
$teacher = $_GET['teacher_id_assign'];

$query = "UPDATE `incident_reporting` SET status = 'ASSIGNED' WHERE report_id = $incident_to_be_assigned";

$result = mysqli_query($db, $query);
$query = "SELECT * FROM teacher JOIN assign_incident USING (teacher_id) WHERE teacher_id = $teacher"; 
$results = mysqli_query($db, $query); 
$row = mysqli_fetch_assoc($results);

$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher";
$result = mysqli_query($db,$sql);
$row_a = mysqli_fetch_array($result);
if ($row_a['current_incident'] == ""){
$query = "UPDATE `assign_incident` SET current_incident = $incident_to_be_assigned	WHERE teacher_id = $teacher";
$result = mysqli_query($db, $query);
}
else {
$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher AND current_incident LIKE '%, %, %, %'";
$result = mysqli_query($db,$sql);
$row_a = mysqli_fetch_assoc($result);

if ($row_a['current_incident'] == "") {
$query = "UPDATE `assign_incident` SET current_incident = concat(current_incident, ', $incident_to_be_assigned') WHERE teacher_id = $teacher";
$result = mysqli_query($db, $query);
}
else {
$query = "UPDATE `assign_incident` SET end_incident = 'YES' WHERE teacher_id = $teacher";
$result = mysqli_query($db, $query);
}

}

$query = "SELECT * FROM `teacher` WHERE teacher_id = $teacher";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$message = "A New Incident has been assigned to you ".$row['teacher_lname'].", ".$row['teacher_fname']." by your posted school's Administrator.<br/> Incident ID:<b>  $incident_to_be_assigned</b><br/><span style = color:red>Make sure you call up a meeting of both stakeholders within</span> <span style = color:blue>5 buisness days</span><br/><a href = 'http://www.stopbeingbullied.org'>Take Action Now!</a>";
$to = $row['teacher_email'];

$subject = "New Incident Assigned To You!";
$type = "HTML"; // or HTML
$charset = "utf-8";

$mail     = "no-reply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
$uniqid   = md5(uniqid(time()));
$headers  = "From: ".$mail."\n";
$headers .= "Reply-to: ".$mail."\n";
$headers .= "Return-Path: ".$mail."\n";
$headers .= "Message-ID: <".$uniqid."@".$_SERVER['SERVER_NAME'].">\n";
$headers .= "MIME-Version: 1.0"."\n";
$headers .= "Date: ".gmdate("D, d M Y H:i:s", time())."\n";
$headers .= "X-Priority: 3"."\n";
$headers .= "X-MSMail-Priority: Normal"."\n";
$headers .= "Content-type: text/".$type.";charset=".$charset."\n";
$headers .= "Content-transfer-encoding: 7bit";

mail($to, $subject, $message, $headers);	

echo $incident_to_be_assigned;



?>