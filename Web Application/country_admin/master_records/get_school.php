<?php ?><option value = '' selected="true" disabled="disabled">Select School...</option> 
<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$query ="SELECT * FROM school WHERE sd = '" . $_POST["sd"] . "'";
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_array($result)) {
	?>
		<option value = '<?php echo $row['school_id']; ?>'><?php echo $row['school_id'] . ", " . $row['school_name']; ?></option> 
	<?php
}
?>