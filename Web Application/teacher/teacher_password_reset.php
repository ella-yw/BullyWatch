<?php
//SELECT teacher_id AS "Teacher ID", teacher_password AS "Teacher Password" FROM `teacher` WHERE 1
//SELECT user_id as "User ID", admin_id AS "Admin ID", admin_password AS "Admin Password", location AS "Location" FROM `admin` WHERE USER_ID = 2 || USER_ID = 4 || USER_ID = 5 || USER_ID = 9 || USER_ID = 10

$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
$query = "SELECT * FROM teacher";
$result = mysqli_query($db, $query); 

$numresults = mysqli_num_rows($result);
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		$teacher_id = $row['teacher_id'];
		$teacher_fname = $row['teacher_fname'];
		$teacher_lname = $row['teacher_lname'];
		
		$teacherf =  strtolower($teacher_fname);
		$teacherf = substr($teacherf, 0, 2);
		$teacherl =  strtolower($teacher_lname);
		$teacherl = substr($teacherl, 0, 2);
		$password = "".$teacher_id."".$teacherf."".$teacherl;
		
				$query = "UPDATE teacher SET teacher_password = '$password' WHERE teacher_id = ".$row['teacher_id'];
	$result_a = mysqli_query($db, $query); 
		
		
			}
?>