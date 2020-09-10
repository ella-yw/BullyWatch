<?php
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*
    //**********************************************
        error_reporting(0);
	   session_start();
		$q = $_SESSION['incident_id_for_pdf'];
		
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
		
		
		
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM `incident_reporting` JOIN `un_incident_reporting_victim` USING (report_id)  JOIN `un_incident_reporting_bully` USING (report_id) WHERE report_id = ".$q." ";
		
		
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
			
			echo "<h1 style='text-align:center;line-height:10px;'>
			Incident/Report ID: $q
			</h1>";
			
			echo "<h4 style='color:red;text-align:center;line-height:10px;'>Report Date: ".$row['report_date']."</h4>";
			echo "<h4 style='color:green;text-align:center;line-height:10px;'>
			Bullying Type: ".$row['bullying_type']."
			</h4>";
			echo "<h4 style='color:blue;text-align:center;line-height:10px;'>
			Bullying Description: <br/><br/><h6 style = 'line-height:10px;'>".$row['bullying_description']."</h6>
			</h4>";
			echo "<div style='text-align:center;'><span style = 'font-size:25px'>Victim Details</span>
			<div style='text-align:center;line-height:5px;'>
			";
					
			echo "<h4 style='color:green;text-align:center;'>
			Victim School: ".$row['victim_school_name']."
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Victim Grade: ".$row['victim_grade']."
			</h4>";
			echo "<h4 style='color:purple;text-align:center'>
			Victim ID: ".$row['victim_id']."
			</h4>";
			echo "<h4 style='color:red;text-align:center'>
			Victim Name: ".$row['victim_fname']." ".$row['victim_lname']."
			</h4>";
			
			echo "<h4 style='color:blue;text-align:center'>
			Victim Gender: ".$row['victim_gender']."
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Victim Contact: ".$row['victim_phone']."
			</h4></div></div>";
			
			echo "<br/><br/><div style='text-align:center'><span style = 'font-size:25px'>Bully Details</span>
			<div style='text-align:center;line-height:5px;'>
			";
			
			
			echo "<h4 style='color:green;text-align:center'>
			Bully School: ".$row['bully_school_name']."
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Bully Grade: ".$row['bully_grade']."
			</h4>";
			echo "<h4 style='color:purple;text-align:center'>
			Bully ID: ".$row['bully_id']."
			</h4>";
			echo "<h4 style='color:red;text-align:center'>
			Bully Name: ".$row['bully_fname']." ".$row['bully_lname']."
			</h4>";
			
			echo "<h4 style='color:blue;text-align:center'>
			Bully Gender: ".$row['bully_gender']."
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Bully Contact: ".$row['bully_phone']."
			</h4></div></div>";
			
			
			
		}
	  
   ?>