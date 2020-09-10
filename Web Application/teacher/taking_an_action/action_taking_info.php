<?php
$q = intval($_GET['q']);
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$sql="SELECT * FROM incident_reporting JOIN un_incident_reporting_victim USING(report_id) JOIN `un_incident_reporting_bully` USING (report_id) WHERE report_id = '$q'";
$result = mysqli_query($db,$sql);
echo "<br/><h2 style = 'text-align:center'>Brief Incident Details</h2>";
	
echo "<table >
<tr style = 'background-color: yellow'>
<th >Victim</th>
<th>Bully</th>
<th>Victim School</th>
<th>Bully School</th>
<th>Bullying Type</th>
<th>Description</th>
<th>Reporting Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr style = 'background-color: orange'>";
    echo "<td>" . $row['victim_id'] . "<br/>" . $row['victim_lname'] . ", " .$row['victim_fname']. "</td>";
echo "<td>" . $row['bully_id'] . "<br/>" . $row['bully_lname'] . ", " .$row['bully_fname']. "</td>";
    echo "<td>" . $row['victim_school_name'] . "</td>";
    echo "<td>" . $row['bully_school_name'] . "</td>";
    echo "<td>" . $row['bullying_type'] . "</td>";
    echo "<td>" . $row['bullying_description'] . "&nbsp;</td>";
    echo "<td>" . $row['report_date'] . "</td>";
    echo "</tr>";
}
$bully = $row['bully_id'];
echo "</table>";
?>
<?php
	$sql="SELECT * FROM file WHERE report_id = '$q'";
	$result_set=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result_set);
	if ($row == "") {
		echo "<h2 style = 'text-align:center'>No Media Provided</h2>";
	}
	else {
		$sql="SELECT * FROM file WHERE report_id = '$q'";
		$result_set=mysqli_query($db,$sql);
		echo "<table class = 'table'>";
		echo "<h2 style = 'text-align:center'>Media Provided</h2>";
		?>
			<tr style = "background-color: pink; color:white">
			<th>File Name</th>
			<td>File Type</th>
			<th>File Size (KB)</th>
			<th>Download</th>
			</tr>
		<?php
		while($row=mysqli_fetch_array($result_set))
		{
			?>
			
			<tr style = "background-color: green; color:white">
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['mime'] ?></td>
			<td><?php echo $row['size'] ?></td>
			<td><a href="get_file.php?report_id=<?php echo $row['report_id']; ?>">Download Provided Media</a></td>
			</tr>
			<?php
		}
		echo "</table>";
	}
	?>
 <promo class = 'left'><b><br/><span style='font-size:17px;'>Victim's Issue </b><br/> <textarea name = 'vicissue' id = 'vicissue' rows="7" placeholder="Enter Victim's Issue Here..."></textarea><br/><b><span style='font-size:17px;'>Bully's Issue </b><br/> <textarea name = 'bulissue' id = 'bulissue' rows="7" placeholder="Enter Bully's Issue Here..."></textarea></promo>        <promo class = 'left'><b><br/><span style='font-size:17px;'>Action For Victim </b><br/> <textarea name = 'vicact' id = 'vicact' rows="7" placeholder="Enter Victim's Action Here..."></textarea><br/><b><span style='font-size:17px;'>Action For Bully </b><br/> <textarea name = 'bulact' id = 'bulact' rows="7" placeholder="Enter Bully's Action Here..."></textarea></promo>       <promo class = 'left_two'>    <br/><br/>   <p style = 'color:red; font-weight:bold'>Is it a Fake complaint? <input type = 'checkbox' name = 'fake' id = 'fake' value = 'YES'> </promo> </p> <p style = 'color:orange; font-weight:bold'>Does Bully nees to be monitored by you? <input type = 'checkbox' name = 'monitoring' id = "monitoring" value = 'YES'></p> <p style = 'color:blue; font-weight:bold'>Were Parents Notified? <input type = 'checkbox' name = 'parents' id = 'parents' value = 'YES'></p> <p style = 'color:purple; font-weight:bold'>Has this incident been fully eased/resolved? <input type = 'checkbox' name = 'ease' id = 'ease' value = 'YES'></p></promo><br/><br/> 
 <br/> 