<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
 error_reporting(0);
session_start();
$location = $_SESSION['login_status_location_school_admin'];
	$query = "SELECT DISTINCT bully_id, bully_fname, bully_lname
FROM `action_taking`
JOIN `un_incident_reporting_bully`
USING ( report_id )
WHERE un_incident_reporting_bully.bully_school_id = " . $location . "
AND un_incident_reporting_bully.bully_grade = " . $_POST["grade"] . "
AND action_taking.need_monitoring = 'YES'";

	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Bully...</option>
<?php
	foreach($results as $student) {
?>
	<option value="<?php echo $student["bully_id"]; ?>"><?php echo $student["bully_id"]; ?> | <?php echo $student["bully_lname"]; ?>, <?php echo $student["bully_fname"]; ?></option>
<?php
	}

?>