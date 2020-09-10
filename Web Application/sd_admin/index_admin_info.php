<?php
	session_start();
	$code = $_SESSION['code'];
	$location =  $_SESSION['login_status_location_sd_admin'];
	$q = $_GET["q"];
	$password = $_GET["z"];
	if ($q != $code) {
		echo "emailcodeno";
	}
	else {	
			 $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
			$query = "UPDATE `admin` SET admin_password = '$password' WHERE location = '$location'"; 
			 $results = mysqli_query($db, $query); 
	}
?>