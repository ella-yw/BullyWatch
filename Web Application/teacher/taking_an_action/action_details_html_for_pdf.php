     <?php
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*
    //**********************************************
       
		session_start();
		$q = $_SESSION['action_id_for_pdf'];
		
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
		
		//Fetching Data OF ALL Feild Related to Action
		$sql_statement  = "SELECT * FROM `action_taking` WHERE action_id = ".$q;
		
		
		$result = mysqli_query($db, $sql_statement);
		$row = mysqli_fetch_row($result);	
		
		$outputDisplay = "";
		
		if (!$result) {
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
			$outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
			$outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
			print $outputDisplay;
			print "error";
		}
		else {
			echo "<h1 style='text-align:center'>
			Action ID: $q
			</h1>";
			echo "<h4 style='text-align:center'>
			Report ID (initializer): $row[9]
			</h4>";
			
			echo "<div style='text-align:center'><h4 style='color:red;text-align:center'>
			Action Date: $row[10]
			</h4>";
			echo "<h4 style='color:orange;text-align:center'>
			Action Taked By Teacher of ID: $row[5]
			</h4>";	
			echo "<h4 style='color:green;text-align:center'>
			Issue Described By Victim: <br/><div style = 'line-height:15px;margin-left:50px;margin-right:50px;font-size:8px;'>$row[1]</div>
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Issue Described By Bully: <br/><div style = 'line-height:15px;margin-left:50px;margin-right:50px;font-size:8px;'>$row[2]</div>
			</h4>";
			echo "<h4 style='color:green;text-align:center;'>
			Action Taken On Victim: <br/><div style = 'line-height:15px;margin-left:50px;margin-right:50px;font-size:8px;'>$row[3]</div>
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Action Taken On Bully: <br/><div style = 'line-height:15px;margin-left:50px;margin-right:50px;font-size:8px;'>$row[4]</div>
			</h4>";	
			if ($row[6] == "YES") {
				echo "<h3 style = 'color:purple'>This complaint has been judged to be FAKE!</h3>";
			}
			if ($row[7] == "YES") {
				echo "<h3 style = 'color:red'>The bully involved in this incident has been put under monthly monitoring!</h3>";
			}
			if ($row[8] == "YES") {
				echo "<h3 style = 'color:pink'>The parents of the bully involved were notified!</h3>";
			}
			
			
		}
	  
   ?>          
