<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

if (!$db)
{
print "<h1>Unable to Connect to MySQL</h1>";
}

session_start();

$victim =  $_SESSION['login_status_student'];
$query = "SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE student_id = ".$victim.""; 
$results = mysqli_query($db, $query); 
$row = mysqli_fetch_assoc($results);
$country = $row['country_name'];
$province = $row['province_name'];
$city = $row['city_name'];
$sd = $row['sd'];
$victim_school_name = $row['school_id'] ." | ". $row['school_name'];
$victim_school_id = $row['school_id'];
$victim_grade = $row['student_grade'];
$bully_school = $_GET['school'];
$bully_grade = $_GET['grade'];
$bully = $_GET['bully'];
$type = $_GET['type'];
$description = $_GET['description'];



$today = date("Y-m-d");
$query ="INSERT INTO `incident_reporting`(`report_id`, `victim_id`, `bully_id`, `bullying_type`, `bullying_description`, `status`, `report_date`) 
VALUES (NULL,".$victim.", ".$bully.", '".$type."','".$description."', 'UNASSIGNED', '".$today."')";
$results = mysqli_query($db, $query);
$id ="SELECT report_id FROM incident_reporting ORDER BY report_id DESC LIMIT 1";
$result = mysqli_query($db,$id);
$row = mysqli_fetch_assoc($result);

$last_id = $row['report_id'];
echo "$last_id";
$query ="SELECT * FROM incident_reporting JOIN `student` ON (victim_id = student_id) JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `victim_id` = ".$victim."";
$results = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($results);
$query ="INSERT INTO `un_incident_reporting_victim`(`report_id`, `country`, `province`, `city`, `sd`, `victim_school_id`, `victim_school_name`, `victim_grade`, `victim_id`, `victim_fname`, `victim_lname`, `victim_gender`, `victim_phone`) VALUES  
($last_id, '".$row['country_name']."','".$row['province_name']."', '".$row['city_name']."', ".$row['sd'].", ".$row['school_id'].", '".$row['school_name']."', ".$row['student_grade'].",".$row['student_id'].",'".$row['student_fname']."','".$row['student_lname']."','".$row['student_gender']."','".$row['parent_contact']."')";
$results1 = mysqli_query($db, $query);


$query ="SELECT * FROM incident_reporting JOIN `student` ON (bully_id = student_id) JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `bully_id` = ".$bully."";
$results = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($results);
$query ="INSERT INTO `un_incident_reporting_bully`(`report_id`, `bully_school_id`, `bully_school_name`, `bully_grade`, `bully_id`, `bully_fname`, `bully_lname`, `bully_gender`,`bully_phone`) VALUES  
($last_id, ".$row['school_id'].", '".$row['school_name']."', ".$row['student_grade'].",".$row['student_id'].",'".$row['student_fname']."','".$row['student_lname']."','".$row['student_gender']."','".$row['parent_contact']."')";
$results2 = mysqli_query($db, $query);



$query ="SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = ".$victim;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);

$subject = "New Incident Reported!";
$message = "Dear Administrator,<br/><br/>This email is a notification that a bullying incident has been reported in your school.
<br/><br/><span style = 'color:green; font-weight:bold;font-size:17px;'>Details: </span><br/><br/><b style = 'color:blue'>Victim: ".$victim."
(".$row['student_lname'].", ".$row['student_fname'].")
- Grade ".$row['student_grade'].", at ".$row['school_name']."<br/></b>";
$query ="SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = ".$bully;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$message .= "<b style = 'color:red'>Bully: ".$bully." (".$row['student_lname'].", ".$row['student_fname'].") - Grade ".$row['student_grade'].", at ".$row['school_name']."";
$message .= "</b><br/><br/><span style = 'color:purple;font-weight:bold'>Type of incident: <b>".$type."</b><span style='color:lightblue'><br/>Bullying Description Provided by Victim: <b style = 'font-size:18px;'>'".$description."'</b></span></span><br/><br/>";
$message .= "<span style = 'font-size:20px'>Report ID Generated: <b>$last_id</b></span><br/><br/>";
$message .= "<span style = 'font-size:15px;color:red'>Please assign this incident as soon as possible.</span><br/><br/><span style = 'font-size:10px;color:black'>A copy of this email has been sent to both the victim's and the bully's parents.</span><br/><br/>Sincerely,<br/>Stop Being Bullied";
$query_a ="SELECT * FROM `admin` WHERE location = ".$row['school_id'];
$results = mysqli_query($db, $query_a);	
$row_a = mysqli_fetch_assoc($results);
$to = $row_a['admin_email'];
$type = "HTML"; // or HTML
$charset = "utf-8";
$mail = "no-reply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
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


// Victim Email
$type = $_GET['type'];
$query ="SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = ".$victim;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$message = "Dear Parent Of ".$row['student_lname'].", ".$row['student_fname'].",<br/><br/>This email is a report of a bullying incident that you/your child has reported.
<br/><br/><span style = 'color:green; font-weight:bold;font-size:17px;'>Details: </span><br/><br/><b style = 'color:blue'>Victim: ".$victim."
(".$row['student_lname'].", ".$row['student_fname'].")
- Grade ".$row['student_grade'].", at ".$row['school_name']."<br/></b>";
$query ="SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = ".$bully;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$message .= "<b style = 'color:red'>Bully: ".$bully." (".$row['student_lname'].", ".$row['student_fname'].") - Grade ".$row['student_grade'].", at ".$row['school_name']."";
$message .= "</b><br/><br/><span style = 'color:purple;font-weight:bold'>Type of incident: <b>".$type."</b><span style='color:lightblue'><br/>Bullying Description Provided By You: <b style = 'font-size:18px;'>'".$description."'</b></span></span><br/><br/>";
$message .= "<span style = 'font-size:20px'>Report ID: <b>$last_id</b></span><br/><br/>";
$message .= "<span style = 'font-size:15px;color:red'>A teacher will call up a meeting of both your child and the bully to resolve this uprising.</span><br/><br/><span style = 'font-size:10px;color:black'>A copy of this email has been sent to the administrator, and the bully's parents as well.</span><br/><br/>Sincerely,<br/>Stop Being Bullied";

$to = $row['parent_email'];
$type = "HTML"; // or HTML
$charset = "utf-8";
$mail = "no-reply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
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

//Bully Email

$type = $_GET['type'];
$query ="SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = ".$bully;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$message = "Dear Parent Of ".$row['student_lname'].", ".$row['student_fname'].",<br/><br/>This email is a report of a bullying incident in which your child is claimed to be the bully.
<br/><br/><span style = 'color:green; font-weight:bold;font-size:17px;'>Details: </span><br/><br/><b style = 'color:blue'>Victim: ".$victim." ";
$query ='SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = '.$victim;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$message .= "(".$row['student_lname'].", ".$row['student_fname'].") - Grade ".$row['student_grade'].", at ".$row['school_name']."<br/></b>";
$query ="SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE `student_id` = ".$bully;
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);
$message .= "<b style = 'color:red'>Bully: ".$bully." (".$row['student_lname'].", ".$row['student_fname'].") - Grade ".$row['student_grade'].", at ".$row['school_name']."";
$message .= "</b><br/><br/><span style = 'color:purple;font-weight:bold'>Type of incident: <b>".$type."</b><span style='color:lightblue'><br/>Bullying Description Provided By Victim: <b style = 'font-size:18px;'>'".$description."'</b></span></span><br/><br/>";
$message .= "<span style = 'font-size:20px'>Report ID: <b>$last_id</b></span><br/><br/>";
$message .= "<span style = 'font-size:15px;color:red'>A teacher will call up a meeting of both your child and the targeted victim to resolve this uprising.</span><br/><br/><span style = 'font-size:10px;color:black'>A copy of this email has been sent to the administrator as well.</span><br/><br/>Sincerely,<br/>Stop Being Bullied";

$to = $row['parent_email'];
$type = "HTML"; // or HTML
$charset = "utf-8";
$mail = "no-reply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
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

session_start();
$_SESSION['report'] = $last_id;


?>