<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	   if(isset($_SESSION['login_status_student']) == ""  ) {
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
  background: url(../img_project/backgrounds/background19.jpg)center 0 no-repeat fixed;
  background-size: 100% 100%;
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
<link rel="stylesheet" href="../css/style_student.css">


</head>
<body >
<a style = "float:right; color:blue" href = "../login_panel.php?msg=logout">LOG OUT</a>


  <section class="page1_header">
  <h1 style = "color:grey; text-align:center; margin-top:10%; margin-bottom:4%">Welcome <?php $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$student_id =  $_SESSION['login_status_student'];
   $query = "SELECT * FROM `student` WHERE student_id = ".$student_id.""; 
								  $results = mysqli_query($db, $query); 
								  $row = mysqli_fetch_assoc($results);
								  
								  echo $row['student_lname'] . ", " . $row['student_fname']; ?></h1>

<div style = "text-align:center" >
<div class="container">
      <div class="row" >
        <div class="grid_4" style = "margin-bottom:3%">
          <br/><br/>
		  <a  href = "reporting_an_incident/reporting_an_incident.php" style = "background-color:#3e495c" class="banner "><div>
            <div class="fa fa-outdent"></div><strong>Report<br/>An Incident</strong></div>
          </a>
        </div>
        
                            
        
      </div>
	  </div>
	  </section>
    </div>

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
					text: "An Email should have been sent to your Parents/Guardians with a code, that you will have to enter below in order to change your password (it only lasts for 30 minutes)...!",
					type: "success",
					confirmButtonColor: '#009900',
					confirmButtonText: 'Sounds Good!',
					closeOnConfirm: false,
					html: true,
				});
            }
        }
		xmlhttp.open("POST","index_student_info_mail.php",true);
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
						location.href = 'index_student.php';
					}
					});
					
			}
					
				
            }
        }
		xmlhttp.open("GET","index_student_info.php?q="+code+"&z="+password_a,true);
        xmlhttp.send();
    
	}


}


</script>

  <div style = 'float:right;margin-right:2%;' id = 'todisable'>
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
  </div>
 </div>
   </div>


</body>
</html>