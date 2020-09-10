<!doctype html>
<html>
<head>
<style>
			
			html {
		background: url(../../img_project/backgrounds/background31.jpg) no-repeat fixed;
		background-size: 100% 100%;
		font-family: Baskerville Old Face;
		
	}
</style>

<?php
error_reporting(0);
	session_start();
   error_reporting(0);
   if(  isset($_SESSION['report']) == ""  ) {
		header('Location: reporting_an_incident.php');   
   }
	else {
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
		$sql_statement  = "DELETE FROM file WHERE name = '' ";
		$result = mysqli_query($db, $sql_statement);
		
		$report_id = $_SESSION['report'];
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM `incident_reporting` JOIN `un_incident_reporting_victim` USING (report_id)  JOIN `un_incident_reporting_bully` USING (report_id) ";
		$sql_statement .= "WHERE report_id = ".$report_id." ";
		
		
		$result = mysqli_query($db, $sql_statement);
		$row = mysqli_fetch_assoc($result);	
		?>
 <script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">
<script>
var report_id = <?php echo $report_id ?>;
window.onload = function () {
	swal({
		title: "ALL GOOD!<br/><em>Incident Successfully Reported!</em>",
		text: "Thank you for reporting this unfortunate incident that may have happend to you, <b>report has been successfully submitted</b>, and <b>email successfully sent to administrator</b>!",
		type: "success",
		confirmButtonColor: '#009900',
		confirmButtonText: 'Sounds Good!',
		closeOnConfirm: false,
		html: true,
	},
	function(isConfirm){
    if (isConfirm){
     swal({
		title: "For Reference",
		text: "Report ID Generated: <b>"+report_id+"</b>",
		type: "info",
		confirmButtonColor: '#3399ff',
		confirmButtonText: 'Alright!',
		html: true
	});
    }
	});
}   

</script>
</head>
<body>
			<a style = "color:red;float:right;margin-right:20px;" href="../index_student.php" style = 'font-size:15px;'>Student Homepage</a> <br/>
			<div style = "font-size:19px; color:white; text-align:center;font-weight:bold"><span style = "color:lightblue;font-size:27px">Dear <b><?php echo $row['victim_fname'] . " " . $row['victim_lname'] . ", "; ?></b></span><br/>Thank you for the faith you put into this system to solve your intended purpose of your initial bullying issue. A school official should be with you soon to discuss and ease this problem that you have communicated to us.<br/><span style='font-size:12px;'>An Email has been sent to the local school administrator regarding this, and a copy to your parents, and the bully's parents as well.</span><br/><span style='font-size:9px;'>Make sure to save a PDF of this incident abstract, for your own future reference.</span></div>
											<?php
     
		
		
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM `incident_reporting` JOIN `un_incident_reporting_victim` USING (report_id)  JOIN `un_incident_reporting_bully` USING (report_id) ";
		$sql_statement .= "WHERE report_id = ".$report_id." ";
		
		
		$result = mysqli_query($db, $sql_statement);
		$row = mysqli_fetch_assoc($result);	
		
		$outputDisplay = "";
		
		if (!$result) {
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
			$outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
			$outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
			print $outputDisplay;
		}
		else {
			?>
			<div style='float:left; margin-left:20px'><h4 style = 'color:blue'><a style = 'text-decoration:none;' onclick="<?php session_start(); $_SESSION['incident_id_for_pdf'] = $report_id; ?>" href = "incident_details_pdf.php" >SAVE AS PDF</a></h4></div>
			<br/><br/><br/><br/><?php
			echo "<div style='text-align:center; float:left; margin-left:20px'><span style = 'font-size:30px'>Victim Details</span><h4 style='color:red;text-align:center'>
			Victim School ID <input type = 'text' size = '' value = '".$row['victim_school_id']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Victim School <input type = 'text' size = '' value = '".$row['victim_school_name']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Victim Grade <input type = 'text' size = '' value = '".$row['victim_grade']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:purple;text-align:center'>
			Victim ID <input type = 'text' size = '' value = '".$row['victim_id']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:red;text-align:center'>
			Victim First Name <input type = 'text' size = '' value = '".$row['victim_fname']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Victim Last Name <input type = 'text' size = '' value = '".$row['victim_lname']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Victim Gender <input type = 'text' size = '' value = '".$row['victim_gender']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Victim Contact <input type = 'text' size = '' value = '".$row['victim_phone']."' disabled='disabled' />
			</h4></div>";
			echo "<div style='text-align:center; float:right; margin-right:20px'><span style = 'font-size:30px'>Bully Details</span><h4 style='color:red;text-align:center'>
			Bully School ID <input type = 'text' size = '' value = '".$row['bully_school_id']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Bully School <input type = 'text' size = '' value = '".$row['bully_school_name']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Bully Grade <input type = 'text' size = '' value = '".$row['bully_grade']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:purple;text-align:center'>
			Bully ID <input type = 'text' size = '' value = '".$row['bully_id']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:red;text-align:center'>
			Bully First Name <input type = 'text' size = '' value = '".$row['bully_fname']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Bully Last Name <input type = 'text' size = '' value = '".$row['bully_lname']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Bully Gender <input type = 'text' size = '' value = '".$row['bully_gender']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Bully Contact <input type = 'text' size = '' value = '".$row['bully_phone']."' disabled='disabled' />
			</h4></div>";
			echo "<h1 style='text-align:center'>
			Incident/Report ID <br/><input type = 'text' size = '4' value = '$report_id' disabled='disabled' />
			</h1>";
			
			
			echo "<div style='text-align:center'><span style = 'font-size:30px'>Incident Details</span><h3 style='color:red;text-align:center'>
			Report Date <input type = 'text' size = '' value = '".$row['report_date']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Bullying Type <input type = 'text' size = '30' value = '".$row['bullying_type']."'  disabled='disabled' />
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Bullying Description <br/><textarea disabled='disabled' rows='8' cols='30'>".$row['bullying_description']."</textarea>
			</h4>";
	$sql="SELECT * FROM file WHERE report_id = '$report_id'";
	$result_set=mysqli_query($db,$sql);
	$row=mysqli_fetch_assoc($result_set);
	if ($row['name'] == "") {
		echo "<h2 style = 'text-align:center'>No Media Provided</h2>";
	}
	else {
	$sql="SELECT * FROM file WHERE report_id = '$report_id'";
	$result_set=mysqli_query($db,$sql);
	
		echo "<table class = 'table' style = 'text-align:center;margin:0 auto'>";
		echo "<h2 style = 'text-align:center'>Media Provided</h2>";
		
	?>
		<tr style = "background-color: pink; color:white">
		<th>&nbsp;&nbsp;File Name&nbsp;&nbsp;</th>
        <td>&nbsp;&nbsp;File Type&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;File Size (KB)&nbsp;&nbsp;</th>
        <th>&nbsp;&nbsp;Download&nbsp;&nbsp;</th>
		</tr>
	<?php
	while($row=mysqli_fetch_assoc($result_set))
	{
		?>
        
        <tr style = "background-color: green; color:white">
        <td>&nbsp;&nbsp;<?php echo $row['name'] ?>&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;<?php echo $row['mime'] ?>&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;<?php echo $row['size'] ?>&nbsp;&nbsp;</td>
        <td>&nbsp;&nbsp;<a href="get_file.php?report_id=<?php echo $row['report_id']; ?>">Download Provided Media</a>&nbsp;&nbsp;</td>
        </tr>
        <?php
	}
	echo "</table>";

			
		
       }

	}
	}
	?>
  </body>


</html>