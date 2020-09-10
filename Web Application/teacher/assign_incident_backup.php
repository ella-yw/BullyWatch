 <?php
 $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
 for ($i = 101; $i < 481; $i++)
 {
	$query = 'INSERT INTO assign_incident (teacher_id) VALUES ('.$i.')';
	$mysqli = mysqli_query($db, $query);
	$query = 'DELETE FROM assign_incident WHERE teacher_id > 180 && teacher_id < 401';
	$mysqli = mysqli_query($db, $query);
 }
 ?>