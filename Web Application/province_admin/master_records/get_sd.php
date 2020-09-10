<?php ?><option value = '' selected="true" disabled="disabled">Select SD...</option> 
<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$query ="SELECT * FROM sd WHERE city_id = '" . $_POST["city"] . "'";
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_array($result)) {
	?>
		<option value = '<?php echo $row['sd']; ?>'><?php echo $row['sd']; ?></option> 
	<?php
}
?>