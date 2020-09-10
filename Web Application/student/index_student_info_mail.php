<?php 
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
$random_password = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 8)), 0, 8);
session_start();
$_SESSION['code'] = $random_password;
$student_id =  $_SESSION['login_status_student'];

$query = "SELECT * FROM `student` WHERE student_id = $student_id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$message = "<span style = 'font-size:15px'>Dear Parent/Guardian Of " . $row['student_lname'] . ", " . $row['student_fname'] . ", <br/><br/>You or your child has recently intended to change his/her password.<br/><br/><b> Enter this code in the student's home page: $random_password</b><br/>(This code should only be valid for 30 minutes)<br/><br/>Login address: http://stopbeingbullied.org/student/index_student.php <br/><br/>Sincerely,<br/>Stop Being Bullied</span>";
$to = $row['parent_email'];
	
$type = "HTML"; // or HTML
$charset = "utf-8";
$subject = "Password Change";
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
?>