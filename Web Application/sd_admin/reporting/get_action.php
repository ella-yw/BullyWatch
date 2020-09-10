<?php
error_reporting(0);
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["school"])) {
	$query ="SELECT * FROM `action_taking` JOIN un_incident_reporting_victim USING (`report_id`) WHERE victim_school_id = '" . $_POST["school"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Action ID...</option>
<?php
	foreach($results as $action_id) {
?>
	<option value="<?php echo $action_id["action_id"]; ?>"><?php echo $action_id["action_id"]; ?></option>
<?php
	}
}
?>