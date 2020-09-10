<?php
//SELECT student_id AS "Student ID", student_password AS "Student Password" FROM `student` WHERE 1
//SELECT user_id as "User ID", admin_id AS "Admin ID", admin_password AS "Admin Password", location AS "Location" FROM `admin` WHERE USER_ID = 2 || USER_ID = 4 || USER_ID = 5 || USER_ID = 9 || USER_ID = 10

$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
$query = "SELECT * FROM student";
$result = mysqli_query($db, $query); 

$numresults = mysqli_num_rows($result);
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		$password = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
        
				$query = "UPDATE student SET student_password = '$password' WHERE student_id = ".$row['student_id'];
	$result_a = mysqli_query($db, $query); 
		
		
			}
?>