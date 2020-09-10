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
			?>
			<div style='float:left; margin-left:20px'><h3 style = 'color:blue'><a onclick="<?php session_start(); $_SESSION['action_id_for_pdf'] = $q; ?>" href = "action_details_pdf.php" >SAVE TO PDF</a></h3></div>
			<br/><br/><?php
		echo "<h1 style='text-align:center'>
			Action ID <br/><input type = 'text' size = '4' value = '$q' disabled='disabled' />
			</h1>";
			echo "<h4 style='text-align:center'>
			Report ID (initializer)<br/><input type = 'text' size = '4' value = '$row[9]' disabled='disabled' />
			</h4>";
			
			echo "<div style='text-align:center'><h4 style='color:red;text-align:center'>
			Action Date <input type = 'text' size = '' value = '$row[10]' disabled='disabled' />
			</h4>";
			echo "<h4 style='color:purple;text-align:center'>
			Action Taked By Teacher of ID... <input type = 'text' size = '' value = '$row[5]' disabled='disabled' />
			</h4>";	
			echo "<h4 style='color:green;text-align:center'>
			Issue Described By Victim <br/><textarea type = 'text' size = '' disabled='disabled' >$row[1]</textarea>
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Issue Described By Bully <br/><textarea type = 'text' size = '' disabled='disabled' >$row[2]</textarea>
			</h4>";
			echo "<h4 style='color:green;text-align:center'>
			Action Taken On Victim <br/><textarea type = 'text' size = '' disabled='disabled' >$row[3]</textarea>
			</h4>";
			echo "<h4 style='color:blue;text-align:center'>
			Action Taken On Bully <br/><textarea type = 'text' size = '' disabled='disabled' >$row[4]</textarea>
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
