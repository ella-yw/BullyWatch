<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

if (!$db)
{
print "<h1>Unable to Connect to MySQL</h1>";
}
session_start();
$teacher_id =  $_SESSION['login_status_teacher'];


$victim_issue = $_GET['vicissue'];
$bully_issue = $_GET['bulissue'];
$victim_action = $_GET['vicact'];
$bully_action = $_GET['bulact'];
$fake = $_GET['fake'];
$monitoring = $_GET['monitoring'];
$parents = $_GET['parents'];
$ease = $_GET['ease'];
$report_id = $_GET['report_id'];
$message = "";

if($_GET['monitoring'] == 'YES')
{
$monitoring = $_GET['monitoring'];
$sql="SELECT * FROM incident_reporting JOIN un_incident_reporting_victim USING(report_id) JOIN `un_incident_reporting_bully` USING (report_id) WHERE report_id = ".$_GET['report_id']."";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
$result = mysqli_query($db,$sql);
$row_a = mysqli_fetch_array($result);
if ($row_a['current_bully'] == ""){
$query = "UPDATE `assign_incident` SET current_bully = ".$row['bully_id']."	WHERE teacher_id = $teacher_id";
$result = mysqli_query($db, $query);
}
else {
$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id AND current_bully LIKE '%, %, %, %, %'";
$result = mysqli_query($db,$sql);
$row_a = mysqli_fetch_assoc($result);

if ($row_a['current_bully'] == "") {
$query = "UPDATE `assign_incident` SET current_bully = concat(current_bully, ', ".$row['bully_id']."') WHERE teacher_id = $teacher_id";
$result = mysqli_query($db, $query);
}
else {
echo "toomanybullies";
}

}
$message_a .= "<b style = 'color:orange;font-size:16px;'>The bully involved in the incident has been put under monthly monitoring!</b><br/>";
}
if($_GET['parents'] == 'YES')
{

$message_a .= "<b style = 'color:pink;font-size:16px;'>The parents of this bully were notified!</b><br/>";
}
if($_GET['ease'] == 'YES')
{

$message_a .= "<b style = 'color:purple;font-size:16px;'>This incident has said to been fully eased/resolved!</b><br/>";
}
if($_GET['fake'] == 'YES')
{

$message_a .= "<b style = 'color:green;font-size:16px;'>This complaint was judged to be fake!</b><br/>";
}

$today = date("Y-m-d");


$querya ="INSERT INTO `action_taking`(`action_id`, `victim_issue`, `bully_issue`, `victim_action`, `bully_action`, `teacher_id`, `fake_complaint`, `need_monitoring`, `parents_notified`, `report_id`, `action_date`) VALUES (NULL,'".$victim_issue."','".$bully_issue."','".$victim_action."','".$bully_action."','".$teacher_id."','".$fake."','".$monitoring."','".$parents."',".$_GET['report_id'].", '".$today."')";
$result = mysqli_query($db,$querya);
if (!$result) {
$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
$outputDisplay .= "<b><br>SQL: ".$querya."<br></b>";
$outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
print $outputDisplay;
print "error";
}

$queryb ="SELECT * FROM `teacher` WHERE teacher_id = ".$teacher_id;
$results = mysqli_query($db, $queryb);

$row = mysqli_fetch_assoc($results);
$id ="SELECT action_id FROM action_taking ORDER BY action_id DESC LIMIT 1";
$result = mysqli_query($db,$id);
$row = mysqli_fetch_assoc($result);
$last_id = $row['action_id'];

$query ="SELECT * FROM `teacher` WHERE teacher_id = ".$teacher_id;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$subject = "New Action Taken!";
$message = "Dear Administrator,<br/><br/>This email is a notification of an action that has been taken on Report ID:<b> ".$_GET['report_id']." (a previously assigned incident). 
</b><br><br><span style = 'color:green; font-weight:bold;font-size:17px;'>Details: </span><br/><br/><b style = 'color:purple'>Teacher who took action: <b>".$teacher_id." (".$row['teacher_lname'].", ".$row['teacher_fname'].")</b><br/><br/><b style = 'color:red'>Victim Issue: '".$victim_issue."'</b><br/><b style = 'color:blue'>Bully Issue: '".$bully_issue."'</b><br/><b style = 'color:red'>Victim Action: '".$victim_action."'</b><br/><b style = 'color:blue'>Bully Action: '".$bully_action."'</b></b><br/><br/>$message_a";
$message .= "<br/><span style = 'font-size:20px'>Action ID Generated: <b>$last_id</b></span><br/><br/>Sincerely,<br/>Stop Being Bullied";
$query ="SELECT * FROM `teacher` WHERE teacher_id = ".$teacher_id;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$query_a ="SELECT * FROM `admin` WHERE location = ".$row['posted_school_id'];
$results = mysqli_query($db, $query_a);
$row_a = mysqli_fetch_assoc($results);
$to = $row_a['admin_email'];
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



$messageteacher = "Dear ".$row['teacher_lname'].", ".$row['teacher_fname'].",<br/><br/>This email is a report of an action that you have taken on Report ID:<b> ".$_GET['report_id'].". 
</b><br><br><span style = 'color:green; font-weight:bold;font-size:17px;'>Details: </span><br/><br/><b style = 'color:red'>Victim Issue: '".$victim_issue."'</b><br/><b style = 'color:blue'>Bully Issue: '".$bully_issue."'</b><br/><b style = 'color:red'>Victim Action: '".$victim_action."'</b><br/><b style = 'color:blue'>Bully Action: '".$bully_action."'</b></b><br/> <br/>$message_a";
$messageteacher .= "<br/><span style = 'font-size:20px'>Action ID: <b>$last_id</b></span><br/><br/>";
$messageteacher .= "<span style = 'font-size:10px;color:black'>A copy of this email has been sent to the administrator as well.</span><br/><br/>Sincerely,<br/>Stop Being Bullied";
$query ="SELECT * FROM `teacher` WHERE teacher_id = ".$teacher_id;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$to = $row['teacher_email'];
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
mail($to, $subject, $messageteacher, $headers);					


if($_GET['ease'] == 'YES') {

		
		$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
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
		$queryd ="UPDATE `assign_incident` SET current_incident = '$incident_id_feild' WHERE teacher_id = ".$teacher_id."";
		$results = mysqli_query($db, $queryd);	

}	

session_start();
$_SESSION['action'] = $last_id;
unset($_SESSION['action_taking']);




?>