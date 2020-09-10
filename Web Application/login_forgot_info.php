<?php 
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');


$user_id = $_GET['user_id'];
if ($_GET['type'] == "Administrator") {

$query = "SELECT * FROM admin WHERE user_id = '$user_id'";			
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);

$random_password = $row['admin_password'];
$message = "<span style = 'font-size:15px'>Dear " . $row['admin_lname'] . ", " . $row['admin_fname'] . ", <br/>You have recently requested your password be sent to you for your Stop Being Bullied account. Please find your password below.<br/><br/><b> Password: $random_password</b><br/><br/>Login address: http://stopbeingbullied.org/login_panel.php <br/><br/>If this was not your doing, please change your password at once.<br/><br/>Sincerely,<br/>Stop Being Bullied</span>";
$to = $row['admin_email'];

if ($row['user_id'] == "") {
echo 'wronguserid';
}

}
elseif ($_GET['type'] == "Teacher") {
$query = "SELECT * FROM teacher WHERE teacher_id = '$user_id'";			
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);

$random_password = $row['teacher_password'];
$message = "<span style = 'font-size:15px'>Dear " . $row['teacher_lname'] . ", " . $row['teacher_fname'] . ", <br/>You have recently requested your password be sent to you for your Stop Being Bullied account. Please find your password below.<br/><br/><b> Password: $random_password</b><br/><br/>Login address: http://stopbeingbullied.org/login_panel.php <br/><br/>If this was not your doing, please change your password at once.<br/><br/>Sincerely,<br/>Stop Being Bullied</span>";
$to = $row['teacher_email'];
if ($row['teacher_id'] == "") {
echo 'wronguserid';
}

}
elseif ($_GET['type'] == "Student/Parent") {
$query = "SELECT * FROM student WHERE student_id = '$user_id'";			
$results = mysqli_query($db, $query);	
$row = mysqli_fetch_assoc($results);

$random_password = $row['student_password'];
$message = "<span style = 'font-size:15px'>Dear Parent/Guardian Of " . $row['student_lname'] . ", " . $row['student_fname'] . ", <br/>You or your child has recently requested your child's password be sent to you for his/her Stop Being Bullied account. Please find your password below.<br/><br/><b> Password: $random_password</b><br/><br/>Login address: http://stopbeingbullied.org/login_panel.php <br/><br/>If this was not your doing, please change your password at once.<br/><br/>Sincerely,<br/>Stop Being Bullied</span>";
$to = $row['parent_email'];
if ($row['student_id'] == "") {
echo 'wronguserid';
}

}
$type = "HTML"; // or HTML
$charset = "utf-8";
$subject = "Password Retreival";
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