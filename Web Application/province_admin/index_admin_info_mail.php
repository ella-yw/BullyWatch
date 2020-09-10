<?php 
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
$random_password = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 8)), 0, 8);
session_start();
$_SESSION['code'] = $random_password;
$location =  $_SESSION['login_status_location_province_admin'];

$query = "SELECT * FROM `admin` WHERE location = '$location'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$message = "<span style = 'font-size:15px'>Dear " . $row['admin_lname'] . ", " . $row['admin_fname'] . ", <br/><br/>You have recently intended to change your password.<br/><br/><b> Enter this code in your province admin's home page: $random_password</b><br/>(This code should only be valid for 30 minutes)<br/><br/>Login address: http://stopbeingbullied.org/province_admin/index_admin.php <br/><br/>Sincerely,<br/>Stop Being Bullied</span>";
$to = $row['admin_email'];
	
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