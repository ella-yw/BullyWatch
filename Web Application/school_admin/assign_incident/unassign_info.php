<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
$report_id = $_GET['report_id_unassign'];

$query = "UPDATE incident_reporting SET status = 'UNASSIGNED' WHERE report_id = $report_id";
$result = mysqli_query($db,$query);

$query = "SELECT * FROM assign_incident WHERE current_incident LIKE '%$report_id%'"; 

$results = mysqli_query($db, $query); 
$row = mysqli_fetch_assoc($results);
$teacher = $row['teacher_id'];

		$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		$incident_id_feild = $row['current_incident'];
		
		$pos = strpos($incident_id_feild, $report_id);

		if ($pos == 0) {
			$pos = strpos($incident_id_feild, $report_id . ', ');
			if ($pos !== false) {
				  $incident_id_feild = str_replace($report_id . ', ', '', $incident_id_feild);
			} else {
				  $incident_id_feild = str_replace($report_id, '', $incident_id_feild);
				 
			}
			
		} 
		else {
			 $incident_id_feild = str_replace(', ' . $report_id . '', '', $incident_id_feild);
		}
		$queryd ="UPDATE `assign_incident` SET current_incident = '$incident_id_feild' WHERE teacher_id = ".$teacher."";
		$results = mysqli_query($db, $queryd);	
		

$query = "SELECT * FROM `teacher` WHERE teacher_id = $teacher";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$message = "An incident that had been previously assigned to you, has now been unassigned, and removed from your responsibilities by your school administrator.<br/><br/>Incident ID: <b>$report_id</b>.<br/><br/><span style='font-style:italic'>Please pardon any inconveniece this decision of the administrator might cause.</span>";
$to = $row['teacher_email'];

$subject = "Unassigned Incident!";
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
echo "$report_id";
?>