<?php
error_reporting(0);
require_once("dbcontroller.php");
$db_handle = new DBController();

	$query = "SELECT * FROM teacher WHERE posted_school_id = " . $_POST["school"];
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Teacher...</option>
<?php
	foreach($results as $teacher) {
?>
	<option value="<?php echo $teacher["teacher_id"]; ?>"><?php echo $teacher["teacher_id"]; ?> | <?php echo $teacher["teacher_lname"]; ?>, <?php echo $teacher["teacher_fname"]; ?></option>
<?php
	}

?>