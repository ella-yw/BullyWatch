<!doctype html>
<html>
<head>
<style>
			
			html {
		background: url(../../img_project/backgrounds/background32.jpg) no-repeat fixed;
		background-size:100% 100%;
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		
	}
</style>
<?php
error_reporting(0);
	session_start();
   if(  isset($_SESSION['action']) == ""  ) {
		header('Location: taking_an_action.php');   
   }
	else {
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
$toomanybullies = $_GET['toomanybullies'];
		
		$action_id = $_SESSION['action'];
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM `action_taking` WHERE action_id = ".$action_id." ";
		
		
		$result = mysqli_query($db, $sql_statement);
		$row = mysqli_fetch_assoc($result);	
		$teacher_id = $row['teacher_id'];
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM `teacher` WHERE teacher_id = ".$teacher_id." ";
		
		
		$result = mysqli_query($db, $sql_statement);
		$row = mysqli_fetch_assoc($result);	
		?>
			<script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">
<script>
var action_id = <?php echo $action_id ?>;
window.onload = function () {
	swal({
		title: "ALL GOOD!<br/><em>Action Successfully Recorded!</em>",
		text: "Thank you for taking an action on the respected incident, <b>action has been successfully submitted</b>, and <b>email successfully sent to administrator</b>!",
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
		text: "Action ID Generated: <b>"+action_id+"</b>",
		type: "info",
		confirmButtonColor: '#3399ff',
		confirmButtonText: 'Alright!',
		closeOnConfirm: <?php if ($toomanybullies == "true") { echo	"false,"; } else { echo "true,"; } ?>
		html: true
	},
	function(isConfirm){
    if (isConfirm){
   	<?php
		if ($toomanybullies == "true") {
			?>
		swal({
		title: "More than 5 Bullies!",
		text: "Since you are already monitoring 5 bullies, your request to monitor another has been denied!",
		type: "info",
		confirmButtonColor: '#3399ff',
		confirmButtonText: 'Alright!',
		html: true
		});
		<?php
		
		}
		else {
		?>
			
		<?		
		}
	?>
	}
	});
	}
	});
	
}   

</script>
</head>
<body>
			<a style = "color:red;float:right;margin-right:20px;" href="../index_teacher.php" style = 'font-size:15px;'>Teacher Homepage</a> <br/>
			<div style = "font-size:19px; color:white; text-align:center;font-weight:bold"><span style = "color:lightblue;font-size:27px">Dear <b><?php echo $row['teacher_fname'] . " " . $row['teacher_lname'] . ", "; ?></b></span><br/>hank you for taking the responibility of taking an action on a bullying incident that had been previously assigned to you.<br/><span style='font-size:12px;'>An Email has been sent to the local school administrator regarding this, and a copy to you as well.</span><br/><span style='font-size:9px;'>Make sure to save a PDF of this action abstract, for your own future reference.</span></div>
			
											<?php
     
		
		
		$sql_statement  = "SELECT * FROM `action_taking` WHERE action_id = ".$action_id;
		
		
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
			
			<div style='float:left; margin-left:20px'><h4 style = 'color:blue'><a style = 'text-decoration:none;' onclick="<?php session_start(); $_SESSION['action_id_for_pdf'] = $action_id; ?>" href = "action_details_pdf.php" >SAVE AS PDF</a></h4></div><br/><br/><br/><br/>
			<?php
			echo "<h1 style='text-align:center'>
			Action ID <br/><input type = 'text' size = '4' value = '$action_id' disabled='disabled' />
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
</div>
		<?php
	}
	?>
    </body>


</html>