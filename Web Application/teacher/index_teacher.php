<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	  if(isset($_SESSION['login_status_teacher']) == ""  ) {
		header('Location: ../login_panel.php');   
   }
		 
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <script src="../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../js/sweetalert/dist/sweetalert.css">
<style>
body {
  background: url(../img_project/backgrounds/background18.jpg)center 0 no-repeat fixed;
  background-size: 100% 100%;
}
#delete {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif;
		width: 120px;
		height: 30px;
		margin: 0 auto;
		display:block;
		border-radius: 7px;
		background-color: #00cc00;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#delete:hover {
		font-size: 20px;
		width: 180px;
		height: 45px;
	}
a { cursor: pointer; }
#changeform {
	font-family:Times New Roman;
	display:none;
	text-align:center
}
#submit {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif;
		width: 140px;
		height: 30px;
		border-radius: 7px;
		background-color: #00cc00;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
#submit:hover {
		background-color: orange;

	}
</style>
<title>Stop Being Bullied!</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/style_teacher.css">


</head>
<body >

<a style = "float:right; color:blue" href = "../login_panel.php?msg=logout">LOG OUT</a>

<br/><br/><br/>
  <section class="page1_header">
  <h1 style = "color:grey; text-align:center; margin-top:2%;">Welcome <?php $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

   $teacher_id =  $_SESSION['login_status_teacher'];
		 
   $query = "SELECT * FROM `assign_incident` JOIN teacher USING (teacher_id) WHERE teacher_id = ".$teacher_id.""; 
								  $results = mysqli_query($db, $query); 
								  $row = mysqli_fetch_assoc($results);
								  
								  echo $row['teacher_lname'] . ", " . $row['teacher_fname']; ?></h1> <h5 style = "color:grey; text-align:center; margin-bottom:2%"><?php 
										
										if ($row['current_incident'] != ''){
										echo "Current Assigned Incident(s): <b>".$row['current_incident']."</b><br/><br/>";
										$test = "yes";			
										}
										else{
										echo "You Have No Assigned Incidents!<br/><br/>";
										$test = "no";				
										}
										
									
										if ($row['current_bully'] == '') {
											echo "You Have No Bully To Monitor!<br/><br/>";
										}
										else {
											echo "Current Bully Under Monitoring: <b>".$row['current_bully']."</b><br/><br/>";
										}
									
												 
								  ?></h5>
								  
  <span>
    <form action = "" method = "post">
								<h4 style = "color:grey; text-align:center">
								<?php if ($row['current_incident'] != ""){
								 
								?>
								Deny Incident? <br/>
									<select name="report_id" >
								<?php
					$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
					$result = mysqli_query($db,$sql);
					$row = mysqli_fetch_array($result);
					$report_id_feild = $row['current_incident'];
					
					$incident_array = explode(", ", $report_id_feild);

					foreach ($incident_array as $incident) {
						
						?>
						<option value = '<?php echo $incident; ?>'><?php echo $incident; ?></option>
						<?php
					}
					?>
										
									</select>

								  </h4>
								  <textarea rows="6" cols="60" style = 'display:block;margin:0 auto' name = "deny_description">Explain Reasoning...</textarea>
								  
								<br/><input type = 'submit' id = "delete" name = "submit" value = 'Deny Incident!'/>
								</form>
								<?php 
									
								}
								else {
								?>
								
								<h2 style = "color:grey; text-align:center">
								
								No Incidents to Deny!
								
								<?php 
								}
								?>
								</h2>
		</span>
<div style = "text-align:center" >
<div class="container">
      <div class="row" >
        <div class="grid_4" >
          <br/><br/>
		   <div class="grid_4">
          <br/><br/>
		  <?php  
			     if ($test == "no") {
					 echo "<script> function open_action_form() { 	swal({
		title: \"No Assigned Incidents!\",
		text: \"You have no incidents that require action taking!\",
		type: \"warning\",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Alright!',
		closeOnConfirm: false,
		html: true,
	}); } </script>";
				 }
				 else {
					 ?>
					 <script> function open_action_form() { <?php $_SESSION['action_taking'] = 'true'; ?> location.href = 'taking_an_action/taking_an_action.php'; } </script>
					 <?php
				 }
		  ?>
		 <a onclick = "open_action_form()" style = "background-color:#3e495c" class="banner "><div class="maxheight">
            <div class="fa fa-credit-card"></div><strong>Take An<br/>Action</strong></div>
          </a>
		  <?php  
			      if ($row['current_bully'] == "") {
					 echo "<script> function open_behavior_form() {
						 
						 swal({
		title: \"No Assigned Bully!\",
		text: \"You have no bully to monitor!\",
		type: \"warning\",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Alright!',
		closeOnConfirm: false,
		html: true,
	}); } </script>";
				 }
				 else {
					?>
					<script> function open_behavior_form() {  <?php $_SESSION['behavior_monitoring'] = 'true'; ?> location.href = 'behaviour_monitoring/behavior_monitoring.php'; } </script>
					<?php
				 }
		  ?>
          <a onclick = "open_behavior_form()" style = "background-color:#41567c" class="banner "><div class="maxheight">
            <div class="fa fa-bar-chart-o"></div><strong>Monitor<br/>Behaviour</strong></div>
          </a>
          
    
          
         
       
        </div>
        
                            
        </div>
      </div>
    </div>
  </section>
  <br/><br/>

  
</div>
        <?php
			if (isset($_POST['submit'])) {
				
				$report_id = $_POST['report_id'];
				$reasoning = $_POST['deny_description'];
				
				if ($_POST['report_id'] != "") {
			    $query = "UPDATE incident_reporting SET status = 'UNASSIGNED' WHERE report_id = $report_id";
				$result = mysqli_query($db,$query);
				
					$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		$incident_id_feild = $row['current_incident'];
		
		$pos = strpos($incident_id_feild, $report_id);

		if ($pos == 0) {
			$pos = strpos($incident_id_feild, $report_id . ', ');
			if ($pos !== false) {
				  $incident_id_feild = str_replace($report_id . ', ', '', $incident_id_feild);
			} else {
				  $incident_id_feild = str_replace($report_id, '', $incident_id_feild);
				 
			}
			
		} 
		else {
			 $incident_id_feild = str_replace(', ' . $report_id . '', '', $incident_id_feild);
		}
		$queryd ="UPDATE `assign_incident` SET current_incident = '$incident_id_feild' WHERE teacher_id = ".$teacher_id."";
		$results = mysqli_query($db, $queryd);
	
	$query = "SELECT * FROM `teacher` WHERE teacher_id = $teacher_id";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$teacher_name = $row['teacher_lname'] . ", " . $row['teacher_fname'] . " ($teacher_id)";			
	$message .= "An Incident that you have previously assigned, has been denied, by Teacher: $teacher_name<br/>Incident ID: <b>$report_id</b>.<br/><br/>Teacher's Reason:<br/><span style='color:red;font-size:10'>$reasoning</span>";
	
	$query = "SELECT * FROM `admin` WHERE location = ".$row['posted_school_id'];
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	
	$to = $row['admin_email'];
	
	$subject = "Incident Denied!";
	$type = "HTML"; // or HTML
	$charset = "utf-8";

	$mail     = "no-reply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
	$uniqid   = md5(uniqid(time()));
	$headers  = "From: ".$mail."\n";
	$headers .= "Reply-to: ".$mail."\n";
	$headers .= "Return-Path: ".$mail."\n";
	$headers .= "Message-ID: <".$uniqid."@".$_SERVER['SERVER_NAME'].">\n";
	$headers .= "MIME-Version: 1.0"."\n";
	$headers .= "Date: ".gmdate("D, d M Y H:i:s", time())."\n";
	$headers .= "X-Priority: 3"."\n";
	$headers .= "X-MSMail-Priority: Normal"."\n";
	$headers .= "Content-type: text/".$type.";charset=".$charset."\n";
	$headers .= "Content-transfer-encoding: 7bit";

	mail($to, $subject, $message, $headers);	
					
					if ($result) {
					echo "<script> swal({
		title: \"Incident Denied!\",
		text: \"Incident - <b>$report_id</b>, has been successfully denied! An email of this has been sent to you local school administrator for reviewing.\",
		type: \"success\",
		confirmButtonColor: '#009900',
		confirmButtonText: 'Sounds Good!',
		closeOnConfirm: false,
		html: true,
	},
	function(isConfirm){
    if (isConfirm){
		location.href = 'index_teacher.php'; 
    }
	}); </script>";
					
					
				}
				
			}
		}
				
			
		?>
		<script>

function makevisible() {


	var form = document.getElementById('changeform');
	form.style.display = 'block';
var text = document.getElementById('todisable');
	text.innerHTML = '<span style = "color:black;font-weight:bold;font-size:22px;">Fill Out All Feilds</span>';


	    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var error = xmlhttp.responseText;
					swal({
						title: "Email Sent!",
						text: ""+error+" An Email should have been sent to your email with a code, that you will have to enter below in order to change your password (it only lasts for 30 minutes)...!",
						type: "success",
						confirmButtonColor: '#009900',
						confirmButtonText: 'Sounds Good!',
						closeOnConfirm: false,
						html: true,
					});
            }
        }
		xmlhttp.open("POST","index_teacher_info_mail.php",true);
        xmlhttp.send();
	
}
function validation() {

var code = document.getElementById('code').value;
var password_a = document.getElementById('password_a').value;
var password_b = document.getElementById('password_b').value;

if (code == "") {

	swal({
		title: "Required Email Code!",
		text: "Please enter the code we have recently sent to you by email!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	
}
else if (password_a == "") {

		swal({
		title: "Required New Password!",
		text: "Please enter a new password to overwrite the current one!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
}
else if (password_b == "") {

	swal({
		title: "Required Password Re-Type!",
		text: "Please re-type the new password to overwrite the current one!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
}
else if (password_b != password_a) {

	swal({
		title: "Passwords Don't Match!",
		text: "Passwords need to Match</em><br/><p>Make sure the password you entered is the same as what you re-typed!",
		type: "info",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	
}
else {
	
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "emailcodeno") {
					swal({
						title: "Email Codes Don't Match!",
						text: "Email Code needs to Match</em><br/><p>Make sure the email code you entered is the same as in the email!",
						type: "info",
						confirmButtonColor: '#ff9933',
						confirmButtonText: 'Okay!',
						html: true
					});
				}
				else {
					 swal({
						title: "ALL GOOD!<br/><em>Password Successfully Changed!</em>",
						text: "Your password has been successfully changed to \"<b>"+password_a+"</b>\"!",
						type: "success",
						confirmButtonColor: '#009900',
						confirmButtonText: 'Sounds Good!',
						closeOnConfirm: false,
						html: true,
					},
					function(isConfirm){
					if (isConfirm){
						location.href = 'index_teacher.php';
					}
					});
					
			}
					
				
            }
        }
		xmlhttp.open("GET","index_teacher_info.php?q="+code+"&z="+password_a,true);
        xmlhttp.send();
    
	}


}


</script>

  <div style = 'float:right;margin-right:2%;dislay:inline' id = 'todisable'>
  <a style = "color:black;font-weight:bold;font-size:22px;" onclick="makevisible()" id = 'todisable'>Change Password</a>
 </div>
  <br/><br/>
   <div style = 'float:right;margin-right:2%;'>
 <div id = 'changeform'>
 <form action = '' method= 'post'  >

 <div style = 'font-size:11px;text-align:right'>Enter Email Code:</div><br/><input type = 'text' name = 'code' id = 'code'><br/><br/>
  <div style = 'font-size:11px;text-align:right'>Enter New Password:</div><br/><input type = 'password' name = 'password_a' id = 'password_a'><br/><br/>
  <div style = 'font-size:11px;text-align:right'>Re-Type Password:</div><br/><input type = 'password' name = 'password_b' id = 'password_b'><br/><br/>

</form>
  <div>
  &nbsp;&nbsp;<button id = 'submit' style = '' name = 'submit' onclick = 'validation()'>Change Password!</button>
  <br/><br/><br/>
  </div>
 </div>
   </div>
</body>
</html>