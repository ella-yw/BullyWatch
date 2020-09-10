<?php
	session_start();
	$code = $_SESSION['code'];
	$student_id =  $_SESSION['login_status_student'];
	$q = $_GET["q"];
	$password = $_GET["z"];
	if ($q != $code) {
		echo "emailcodeno";
	}
	else {	
			 $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
			$query = "UPDATE `student` SET student_password = '$password' WHERE student_id = '$student_id'"; 
			 $results = mysqli_query($db, $query); 
	}
?>