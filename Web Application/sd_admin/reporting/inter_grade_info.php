     <?php
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*
    //**********************************************
        error_reporting(0);
    
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
		
		$q = intval($_GET['q']);
		//Fetching Data OF ALL Feild Related to Action
		$sql_statement  = "SELECT * FROM `incident_reporting` JOIN `un_incident_reporting_victim` USING (report_id) JOIN `un_incident_reporting_bully` USING (report_id) WHERE un_incident_reporting_victim.victim_grade != un_incident_reporting_bully.bully_grade AND un_incident_reporting_bully.bully_school_id = $q";
		
		
		$result = mysqli_query($db, $sql_statement);
		if (!$result) {
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
			$outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
			$outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
			print $outputDisplay;
			print "error";
		}
		?>
			<div style='float:left; margin-left:20px'><h3 style = 'color:blue'><a onclick="<?php session_start(); $_SESSION['inter_grade_for_pdf'] = $q ?>" href = "inter_grade_pdf.php" >SAVE TO PDF</a></h3></div>
			<br/><br/><?php
		echo "<h1 style='text-align:center'>
			Inter-Grade Incidents </h1>";
		echo "<table style='text-align:center; font-size:12px; margin:0 auto; border: 1px solid black;'>
<tr >
<th >&nbsp;&nbsp; Report ID &nbsp;&nbsp;</th>
<th >&nbsp;&nbsp; Bullying Type &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;</th>
<th style = 'color:red'>&nbsp;&nbsp; Victim ID &nbsp;&nbsp;</th>
<th style = 'color:red'>&nbsp;&nbsp; Victim Name &nbsp;&nbsp;</th>
<th style = 'background-color:yellow'>&nbsp;&nbsp;<mark> Victim Grade </mark>&nbsp;&nbsp;</th>
<th style = 'color:blue'>&nbsp;&nbsp; Bully ID &nbsp;&nbsp;</th>
<th style = 'color:blue'>&nbsp;&nbsp; Bully Name &nbsp;&nbsp;</th>
<th style = 'background-color:yellow'>&nbsp;&nbsp;<mark> Bully Grade </mark>&nbsp;&nbsp;</th>

</tr>";
		while ($row = mysqli_fetch_assoc($result)) {	
		
		$outputDisplay = "";
		
		
			echo "<tr style='text-align:center'> <td>&nbsp; ".$row['report_id']." &nbsp;</td> 
			<td>&nbsp; ".$row['bullying_type']." &nbsp;</td > 
			<td>&nbsp;  &nbsp;&nbsp;  &nbsp;</td> 
			<td style = 'color:red'> &nbsp; ".$row['victim_id']." &nbsp;</td>
			<td style = 'color:red'> &nbsp; ".$row['victim_fname']." ".$row['victim_lname']." &nbsp;</td>
			<td style = 'background-color:yellow'> &nbsp; <mark>".$row['victim_grade']."</mark> &nbsp;</td>
			<td style = 'color:blue'> &nbsp; ".$row['bully_id']." &nbsp;</td>
			<td style = 'color:blue'> &nbsp; ".$row['bully_fname']." ".$row['bully_lname']." &nbsp;</td>
			<td style = 'background-color:yellow'> &nbsp; <mark>".$row['bully_grade']."</mark> &nbsp;</td>
			</tr>";
			
		
		}
		
		echo "</table>";
   ?>          

