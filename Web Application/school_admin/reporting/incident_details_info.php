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
			
			?>
			<div style='float:left; margin-left:20px'><h3 style = 'color:blue'><a onclick="<?php session_start(); $_SESSION['incident_id_for_pdf'] = $q; ?>" href = "incident_details_pdf.php" >SAVE TO PDF</a></h3></div>
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
			Incident/Report ID <br/><input type = 'text' size = '4' value = '$q' disabled='disabled' />
			</h1>";
			
			
			echo "<div style='text-align:center'><span style = 'font-size:30px'>Incident Details</span><h3 style='color:red;text-align:center'>
			Report Date <input type = 'text' size = '' value = '".$row['report_date']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Bullying Type <input type = 'text' size = '' value = '".$row['bullying_type']."' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Bullying Description <br/><textarea disabled='disabled' >".$row['bullying_description']."</textarea>
			</h4>";
			
			
		}
	  
   ?>