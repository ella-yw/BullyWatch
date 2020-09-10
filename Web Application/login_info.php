<?php

$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

if ($_GET['type'] == "Administrator") {
	
$sql = "SELECT * FROM admin where user_id = '".$_GET['username']."' AND admin_password = '".$_GET['password']."' ";
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_array($query);

if(!empty($row['user_id']) && !empty($row['admin_password'])) { 
session_start();
if ($row['admin_id'] == "super_user") {
$_SESSION['login_status_location_super_user'] = $row['location'];
}

elseif($row['admin_id'] == "country_admin") {
$_SESSION['login_status_location_country_admin'] = $row['location'];
}

elseif ($row['admin_id'] == "province_admin") {
$_SESSION['login_status_location_province_admin'] = $row['location'];
}

elseif ($row['admin_id'] == "sd_admin") {
$_SESSION['login_status_location_sd_admin'] = $row['location'];
}

elseif ($row['admin_id'] == "school_admin") {
$_SESSION['login_status_location_school_admin'] = $row['location'];
}

$folder = $row['admin_id'];
echo "$folder/index_admin.php";

}
else {
echo 'wrongpassword';
}


}

elseif ($_GET['type'] == "Teacher") {



$sql = "SELECT * FROM teacher where teacher_id = '".$_GET['username']."' AND teacher_password = '".$_GET['password']."' ";
$query = mysqli_query($db, $sql);

$row = mysqli_fetch_array($query);

if(!empty($row['teacher_id']) && !empty($row['teacher_password'])) { 
session_start();
$_SESSION['login_status_teacher'] = $row['teacher_id'];
echo "teacher/index_teacher.php";

}
else
{
echo 'wrongpassword';
}
}
elseif ($_GET['type'] == "Student/Parent") {


$sql = "SELECT * FROM student where student_id = ".$_GET['username']." AND student_password = '".$_GET['password']."' ";
$query = mysqli_query($db, $sql);

$row = mysqli_fetch_array($query);

if(!empty($row['student_id']) && !empty($row['student_password'])) { 

session_start();
$_SESSION['login_status_student'] = $row['student_id'];

echo "student/index_student.php";


}
else
{
echo 'wrongpassword';
}

}

	






?>