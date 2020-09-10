<?php ?><option value = '' selected="true" disabled="disabled">Select City...</option> 
<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$query ="SELECT * FROM city WHERE province_id = '" . $_POST["province_id"] . "'";
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_array($result)) {
	?>
		<option value = '<?php echo $row['city_name']; ?>'><?php echo $row['city_name']; ?></option> 
	<?php
}
?>