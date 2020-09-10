<?php
error_reporting(0);
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["school"])) {
	$query ="SELECT * FROM un_incident_reporting_victim WHERE victim_school_id = '" . $_POST["school"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Report ID...</option>
<?php
	foreach($results as $report_id) {
?>
	<option value="<?php echo $report_id["report_id"]; ?>"><?php echo $report_id["report_id"]; ?></option>
<?php
	}
}
?>