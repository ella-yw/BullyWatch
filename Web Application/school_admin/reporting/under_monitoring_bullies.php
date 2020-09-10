<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	   if(isset($_SESSION['login_status_location_school_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location = $_SESSION['login_status_location_school_admin'];
?>
<?php
   
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
  
require_once("dbcontroller.php");
$db_handle = new DBController();

 error_reporting(0);
?>
<!DOCYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bullies Under Monitoring Report</title>

<style>
html {
	background: url(background.jpg) no-repeat fixed;
	background-size: 100% 100%;
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
}
select {
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
}
#submit {
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
	width: 160px;
	height: 30px;
	border-radius: 7px;
	background-color: #FF0004;
	-webkit-transition: 0.5s ease;
	transition: 0.5s ease;
}
#submit:hover {
	font-size: 20px;
	width: 220px;
	height: 45px;
	background-color: blue;
	color: white;
}

.logout {
	float:right;
	margin-right:10px	 
 }
</style>
</head>
<body>
<form method = "post" action="action_taking_backend.php" >
  <promo>
   <a class = "logout" onclick="<?php  ?>" href="master_reports.php">GO TO ANOTHER REPORT</a>
    
<br/>

  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>BULLIES UNDER MONITORING REPORT</h1></div>
 <?php
    	$sql_statement  = "SELECT DISTINCT `bully_id`,`bully_fname`,`bully_lname`, `bully_grade` FROM `action_taking` JOIN `un_incident_reporting_bully` USING (report_id) WHERE action_taking.need_monitoring = 'YES' AND un_incident_reporting_bully.bully_school_id = ".$location;
		
		
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
			<div style='float:left; margin-left:20px'><h3 style = 'color:blue'><a onclick="<?php session_start(); $_SESSION['school_id_for_pdf'] = $location; ?>" href = "under_monitoring_pdf.php" >SAVE TO PDF</a></h3></div>
			<br/><br/><?php
		echo "<h1 style='text-align:center'>
			Bullies Currently Under Monitoring </h1>";
		echo "<table style='text-align:center;  margin:0 auto; border: 1px solid black;'>
<tr >
<th >&nbsp;&nbsp; Bully ID &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp; Bully Last Name &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp; Bully First Name &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp; Bully Grade &nbsp;&nbsp;</th>
<th>&nbsp;&nbsp; Under Monitoring! &nbsp;&nbsp;</th>
</tr>";
		while ($row = mysqli_fetch_row($result)) {	
		
		$outputDisplay = "";
		
		
			echo "<tr style='text-align:center'> <td>&nbsp; $row[0] &nbsp;</td> <td>&nbsp; $row[1] &nbsp;</td > <td>&nbsp; $row[2] &nbsp;</td> <td>&nbsp; $row[3] &nbsp;</td><td> <input type = 'checkbox' checked/> </td> </tr>";
			
		
		}
		echo "</table>"
      ?>

 
  </div>
  <br/>
  
</form>
</body>
</html>

