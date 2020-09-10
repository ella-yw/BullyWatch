     <?php
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*
    //**********************************************
       error_reporting(0);
	   session_start();
		$location = $_SESSION['school_id_for_pdf'];
		$grade = $_SESSION['grade_for_pdf'];
		$gender = $_SESSION['gender_for_pdf'];
		
    
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
		
		
		//Fetching Data OF ALL Feild Related to Action
		$sql_statement  = "SELECT DISTINCT `victim_id`,`victim_fname`,`victim_lname` FROM `un_incident_reporting_victim` WHERE victim_school_id = $location AND victim_grade = $grade AND victim_gender = '$gender' ";
		
		
		$result = mysqli_query($db, $sql_statement);
		
		$outputDisplay = "";
		
		if (!$result) {
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
			$outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
			$outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
			print $outputDisplay;
			print "error";
		}
		if ($gender == "Male") {
			$title = "Male Victims of Bullying (School ID: $location | Grade: $grade)";
		}
		elseif ($gender == "Female") {
			$title = "Female Victims of Bullying (School ID: $location | Grade: $grade)";
		}
		else {
			$title = "Other Victims of Bullying (School ID: $location | Grade: $grade)";
		}
		echo "<h1 style='text-align:center'>
			$title </h1>";
		echo "<table style='text-align:center;  margin:0 auto; border: 1px solid black;'>
<tr >
<th >&nbsp;&nbsp; Victim ID &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp; Victim Last Name &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp; Victim First Name &nbsp;&nbsp;</th>
</tr>";
		while ($row = mysqli_fetch_row($result)) {	
		
		
		
			echo "<tr style='text-align:center'> <td>&nbsp; $row[0] &nbsp;</td> <td>&nbsp; $row[1] &nbsp;</td > <td>&nbsp; $row[2] &nbsp;</td>  </tr>";
			
		
		}
		echo "</table>";
			
   ?>          
