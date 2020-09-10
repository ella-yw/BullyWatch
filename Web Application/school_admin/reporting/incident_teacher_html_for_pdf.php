 <?php
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*
    //**********************************************
        error_reporting(0);
    session_start(); 
	$q = $_SESSION['teacher_id_for_pdf'];
	$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		$sql_statement  = "SELECT * FROM `action_taking` WHERE teacher_id = ".$q;
		$result = mysqli_query($db, $sql_statement);
		$row_head = mysqli_fetch_assoc($result);
	
		$sql_statement  = "SELECT * FROM `teacher` WHERE teacher_id = ".$q;
		$resultsa = mysqli_query($db, $sql_statement);
		$row_head = mysqli_fetch_assoc($resultsa);
	
		
				echo "<h1 style='text-align:center'>Incidents Handled By ".$row_head['teacher_lname'].", ".$row_head['teacher_fname']."</h1><br/><br/>";
		echo "<table style='text-align:center;  margin:0 auto; border: 1px solid black;'>
			<tr >
			<th >&nbsp;&nbsp; Report ID &nbsp;&nbsp;</th>
			<th >&nbsp;&nbsp; Action ID &nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp; Action Date &nbsp;&nbsp;</th>
			</tr>";
		while ($row = mysqli_fetch_assoc($result)) {	
		
		$outputDisplay = "";
		
		
			echo "<tr style='text-align:center'> <td>&nbsp; ".$row['report_id']." &nbsp;</td> <td>&nbsp; ".$row['action_id']." &nbsp;</td > <td>&nbsp; ".$row['action_date']." &nbsp;</td> </tr>";
			
		
		}
		echo "</table>";
		
		echo "<h1 style='text-align:center'>
			Bullies Currently Being Monitored By ".$row_head['teacher_lname'].", ".$row_head['teacher_fname']."</h1><br/><br/>";
		$sql="SELECT * FROM assign_incident WHERE teacher_id = $q";
					$result = mysqli_query($db,$sql);
					$row = mysqli_fetch_assoc($result);
					$bully_id_feild = $row['current_bully'];
					echo "<table style='text-align:center;  margin:0 auto; border: 1px solid black;'>
			<tr >
			<th >&nbsp;&nbsp; Bully ID &nbsp;&nbsp;</th>
			<th >&nbsp;&nbsp; Bully First Name &nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp; Bully Last Name &nbsp;&nbsp;</th>
			</tr>";
					
					if ($bully_id_feild != '') {
						$bully_array = explode(", ", $bully_id_feild);
						
					foreach ($bully_array as $bully) {
						$sql="SELECT * FROM student WHERE student_id = $bully";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_assoc($result);
						echo "<tr style='text-align:center'> <td>&nbsp; ".$row['student_id']." &nbsp;</td> <td>&nbsp; ".$row['student_fname']." &nbsp;</td > <td>&nbsp; ".$row['student_lname']." &nbsp;</td> </tr>";
					}
					}	
	
echo "</table>";


		echo "<h1 style='text-align:center'>
			Past Bullies Monitored By ".$row_head['teacher_lname'].", ".$row_head['teacher_fname']."</h1>";
		$sql="SELECT * FROM assign_incident WHERE teacher_id = $q";
					$result = mysqli_query($db,$sql);
					$row = mysqli_fetch_assoc($result);
					$bully_id_feild = $row['end_bully'];
					echo "<table style='text-align:center;  margin:0 auto; border: 1px solid black;'>
			<tr >
			<th >&nbsp;&nbsp; Bully ID &nbsp;&nbsp;</th>
			<th >&nbsp;&nbsp; Bully First Name &nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp; Bully Last Name &nbsp;&nbsp;</th>
			</tr>";
					
					if ($bully_id_feild != '') {
						$bully_array = explode(", ", $bully_id_feild);
						
					foreach ($bully_array as $bully) {
						$sql="SELECT * FROM student WHERE student_id = $bully";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_assoc($result);
						echo "<tr style='text-align:center'> <td>&nbsp; ".$row['student_id']." &nbsp;</td> <td>&nbsp; ".$row['student_fname']." &nbsp;</td > <td>&nbsp; ".$row['student_lname']." &nbsp;</td> </tr>";
					}
					}	
	
echo "</table>";
   ?>          
