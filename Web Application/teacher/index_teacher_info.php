<?php
	session_start();
	$code = $_SESSION['code'];
	$teacher_id =  $_SESSION['login_status_teacher'];
	$q = $_GET["q"];
	$password = $_GET["z"];
	if ($q != $code) {
		echo "emailcodeno";
	}
	else {	
			 $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
			 $query = "UPDATE `teacher` SET teacher_password = '$password' WHERE teacher_id = '$teacher_id'"; 
			 $results = mysqli_query($db, $query); 
	}
?>