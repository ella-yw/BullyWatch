<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["grade"])) {
	$query ="SELECT * FROM student WHERE student_grade = " . $_POST["grade"] . " AND school_id = " . $_POST["school"] . " ORDER BY student_id ASC";
	$results = $db_handle->runQuery($query);
?>
	<option value="" selected = 'true' disabled='disabled'>Select Bully...</option>
<?php
	foreach($results as $student) {
?>
	<option value="<?php echo $student["student_id"]; ?>"><?php echo $student["student_id"]; ?> | <?php echo $student["student_lname"]; ?>, <?php echo $student["student_fname"]; ?></option>
<?php
	}
}
?>