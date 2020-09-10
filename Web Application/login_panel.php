<?php
ob_start();
session_start();
$_SESSION['hello'] = "hello";
unset($_SESSION['hello']);
session_destroy();
?>
<script>
window.onload = function() {
<?php
if ($_GET['msg'] == 'logout') {
?>
swal({
title: "Logged Out!",
text: "You have successfully logged out and ended your session!",
type: "success",
confirmButtonColor: '#009900',
confirmButtonText: 'Sounds Good!',
closeOnConfirm: false,
html: true,
},
function (isConfirm) {
	if (isConfirm) {
		location.href = 'login_panel.php';
	}
});
<?php 
}
elseif ($_GET['msg'] == 'info'){
?>
swal({
title: "LOGIN PANEL!",
text: "<div style = \"text-align:center; position:relative;font-size:14px;font-weight:bold\"><span style = \"color:grey\">This software has the great potential to benifit our community.</span><br/><span style = \"color:green\">That's why we encourage you to try this out, and for this purpose we have provided a list of sample usernames and passwords so that you can discover the full purpose of this application, as it is very dynamic.</span><br/><span style = \"color:orange\">Keep in mind that all of the data inputted is fake for the purpose of showing the implemented functionalities.</span><br/><span style = \"color:purple;font-size:14px;\"><br/>The main features of this website are: <br/><span style = 'color:red;text-align:left'><span style = \"color:red\"><ul><li>Report an Incident</li></span> <li><span style = \"color:blue\">Assign the Incident</span></li> <li><span style = \"color:#00eeee\">Deny the Incident</span></li> <li><span style = \"color:orange\">Take An Action</span></li> <li><span style = \"color:lightblue\">Monitor Behavior <img src='img_project/graph.JPG' style='width:40px;'/></span></li> <li><span style = \"color:purple\">Statistical Deliverables</span></li> <li><span style = \"color:pink\">Master Forms & Data</span></li></ul></span></span></div>",
imageUrl: "img_project/login_icon.png",
confirmButtonColor: 'blue',
confirmButtonText: 'Alright!',
closeOnConfirm: false,
html: true,
},
function (isConfirm) {
	if (isConfirm) {
		location.href = 'login_panel.php';
	}
});
<?php
}
?>
}
</script>
<script>
function validation() {
	var username = document.getElementById('form-username').value;
	var password = document.getElementById('form-password').value;
	var type = document.getElementById('form-select').value;
	if (type == "") {
		swal({
		title: "Identify yourself!",
		text: "You must identify yourself to LOG IN!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	}
	else if (username == "") {
		swal({
		title: "Required Username!",
		text: "You must enter your username to LOG IN!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	}
	else if (password == "") {
		swal({
		title: "Required Password!",
		text: "You must enter your password to LOG IN!",
		type: "warning",
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
				var href = xmlhttp.responseText;
				if (href == 'wrongpassword') {
					swal({
						title: "Invalid Credentials!",
						text: "Your username and password are incorrect!",
						type: "error",
						confirmButtonColor: 'red',
						confirmButtonText: 'Okay!',
						html: true
					});
				}
				else {
				location.href = href;
				}
            }
        }
		xmlhttp.open("GET","login_info.php?type="+type+"&username="+username+"&password="+password,true);
        xmlhttp.send();
	}
}
function validation_forgot() {
	var user_id = document.getElementById('form-user-id').value;
	var type = document.getElementById('form-type').value;
	if (type == "") {
		swal({
		title: "Identify yourseelf!",
		text: "You must identify yourself to send youself the email regarding the forgotten password!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	}
	else if (user_id == "") {
		swal({
		title: "Required User ID!",
		text: "You must enter your User ID to send youself the email regarding the forgotten password!",
		type: "warning",
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
				var href = xmlhttp.responseText;
				if (href == 'wronguserid') {
					swal({
						title: "Invalid Credentials!",
						text: "Your User ID is invalid!",
						type: "error",
						confirmButtonColor: 'red',
						confirmButtonText: 'Okay!',
						html: true
					});
				}
				else {
					swal({
						title: "Email Sent!",
						text: "An email has been sent at the appropriate address to the "+type+"!",
						type: "success",
						confirmButtonColor: '#009900',
						confirmButtonText: 'Sounds Good!',
						html: true
					});
				}
            }
        }
		xmlhttp.open("GET","login_forgot_info.php?type="+type+"&user_id="+user_id,true);
        xmlhttp.send();
	}
}

</script>



<!DOCTYPE html>
<html>
<head>
<style>
div,a {
font-family:sans-serif
}
#student_table {
width:50%;

}
#teacher_table {
width:50%;

}
#admin_table {
width:800px;
margin: 0 auto;
text-align:center
}
#admin_image {
height:200px;
}
@media only screen and (max-width: 847px) {
#student_table {
width:100%;
}
#teacher_table {
width:100%;
}
#admin_table {
width:100%;
margin: 0 auto;
text-align:center
}
#admin_image {
height:150px;
}
}

#subadmin,h4 {
font-size:25px;
color:white;

}

#forgot {
cursor:pointer
}
#forgotform {
display:none
}
</style>
<script src="js/sweetalert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="js/sweetalert/dist/sweetalert.css">
<script>
function makevisible() {
var form = document.getElementById('forgotform');
form.style.display = 'block';
var sform = document.getElementById('standardform');
sform.style.display = 'none';

var text = document.getElementById('forgot');
text.innerHTML = '';

}
</script>

<title>LOG IN</title>
<meta charset="utf-8">
<!--<link href="login_style.css" rel='stylesheet' type='text/css' />-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/form-elements.css">
<link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<a style = "float:right;margin-right:15px;margin-top:15px" href = "main.php"><img src='img_project/homebutton.gif' style="width:60px;margin:0 auto"/></a>
<br/><br/>
<div class="row">
<div class="col-sm-6 col-sm-offset-3 form-box">
<div class="form-top">
<div class="form-top-left" style="font-family:Georgia, serif;">
<h3 style = 'font-weight:bold;font-size:40px;'><i class="fa fa-sign-in" aria-hidden="true"></i> LOG IN</h3>
<span style='line-height:18px;'>View <a style = 'color:grey;font-weight:800;font-family:Georgia,serif;' target='_blank' href='img_project/student_image_sample.PNG'>Student</a>, <a style = 'color:grey;font-weight:800;font-family:Georgia,serif;' target='_blank' href='img_project/teacher_image_sample.PNG'>Teacher</a>, & <a style = 'color:grey;font-weight:800;font-family:Georgia,serif;' target='_blank' href='img_project/admin_image_sample.PNG'>Admin</a> Data</span>

</div>
<div class="form-top-right">
<div class="fa fa-key" style = 'margin-top:10px;'></div>

</div>
<br/><br/><br/>
<div style = 'float:right'><a id = 'forgot' style = 'color:blue;font-weight:800;font-size:14px;font-family:Georgia,serif;' onclick = 'makevisible()'>Forgot Password?</a></div>
</div>

<div id = 'form'>
<div class="form-bottom">
<div id = 'standardform'>
<form   method="post" action="" class="login-form" >
<div class="select" >
<span class="arr"></span>
<select name = "type" id='form-select'>
<option value = "" selected="true" disabled='disabled'>Identify Yourself...</option>
<option value = "Administrator">Administrator</option>
<option value = "Student/Parent">Student/Parent</option>
<option value = "Teacher">Teacher</option>

</select>
</div><br/><br/>
<div class="form-group">
<label class="sr-only" for="form-username">Username</label>
<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" >
</div>
<div class="form-group">
<label class="sr-only" for="form-password">Password</label>
<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" >
</div>
</form>

<button name = "submit"  class="btn" onClick='validation()' style = 'width:100%'>Sign in!</button>
</div>
<div id = 'forgotform'>
<form method = 'post' action = ''>
<div class="form-group">
<div style = 'font-size:15px;font-weight:400;text-align:center'><span style = 'font-weight:bold'>Forgot Your Password?</span> Enter Your User ID & Identify yourself!</div><br/>
<div class="select" >
<span class="arr"></span>
<select name = "type_a" id='form-type'>
<option value = "" selected="true" disabled='disabled'>Identify Yourself...</option>
<option value = "Administrator">Administrator</option>
<option value = "Student/Parent">Student/Parent</option>
<option value = "Teacher">Teacher</option>

</select>
</div><br/><br/>
<input type="text" name="user_id" placeholder="User ID..." class="form-password form-control" id="form-user-id" pattern = "[0-9]+" title="Numbers Only!" > </div>
</form>
<button onClick = "validation_forgot()" name = "email" style = "background-color:red;width:100%" class="btn" >Send Email!</button>
</div>

</div>

</div>
</div>
</div>
<!--
<img src='img_project/arrow_login.png' style="width:150px;margin:0 auto;margin-top:15px;"/>
<br/><br/>
<div id = 'admin_table' ><p style = 'color:lightblue;text-align:center;font-size:34px;font-weight:bold'>Admin's Data</p> 
<div style = 'margin:0 auto'>
<table style="color:white;text-align:center;" border = '1'>
	<tr style='font-size:20px;background-color:white;color:black;'>
		<th style="text-align:center;padding-top:5px;padding-bottom:5px;">&nbsp;Login Type&nbsp;</th>
		<th style="text-align:center;padding-top:5px;padding-bottom:5px;">&nbsp;Previlege 1&nbsp;</th>
		<th style="text-align:center;padding-top:5px;padding-bottom:5px;">&nbsp;Previlege 2&nbsp;</th>
		<th style="text-align:center;padding-top:5px;padding-bottom:5px;">&nbsp;Previlege 3&nbsp;</th>
	</tr>
	<tr style='font-size:14px;background-color:black'>
		<th style="text-align:center">&nbsp;admin_school&nbsp;</th>
		<td style = "padding: 10px 10px 10px 10px">View Master Data In Own School</td>
		<td style = "padding: 10px 10px 10px 10px">View Bullying Reports In Own School</td>
		<td style = "padding: 10px 10px 10px 10px">Assign Incidents to Teachers In Own School</td>
	</tr>
	<tr style='font-size:14px;background-color:black'>
		<th style="text-align:center">&nbsp;admin_sd&nbsp;</th>
		<td style = "padding: 10px 10px 10px 10px">View Master Data In Own SD</td>
		<td style = "padding: 10px 10px 10px 10px">View Bullying Reports In Own SD</td>
		<td style = "padding: 10px 10px 10px 10px"> --- </td>
	</tr>
	<tr style='font-size:14px;background-color:black'>
		<th style="text-align:center">&nbsp;admin_province&nbsp;</th>
		<td style = "padding: 10px 10px 10px 10px">View Master Data In Own Province</td>
		<td style = "padding: 10px 10px 10px 10px">View Bullying Reports In Own Province</td>
		<td style = "padding: 10px 10px 10px 10px"> --- </td>
	</tr>
	<tr style='font-size:14px;background-color:black'>
		<th style="text-align:center">&nbsp;country_admin&nbsp;</th>
		<td style = "padding: 10px 10px 10px 10px">View Master Data In Own Country</td>
		<td style = "padding: 10px 10px 10px 10px">View Bullying Reports In Own Country</td>
		<td style = "padding: 10px 10px 10px 10px"> --- </td>
	</tr>
	<tr style='font-size:14px;background-color:black'>
		<th style="text-align:center">&nbsp;super_user&nbsp;</th>
		<td style = "padding: 10px 10px 10px 10px">Manage All Users (Add, View, Update, Delete)</td>
		<td style = "padding: 10px 10px 10px 10px"> --- </td>
		<td style = "padding: 10px 10px 10px 10px"> --- </td>
	</tr>
</table><br/><img src = "img_project/admin_image_sample.PNG" id='admin_image'/></div><br/><br/></div>

<div>
<div id = 'student_table' style = "margin:0 auto;text-align:center;float:left;"><div><p style = 'color:lightblue;font-size:34px;font-weight:bold'>Sample Student Data <p style = 'color:white;font-size:16px;font-weight:bold;font-size:20px;'>(Report An Incident)</p></p><img src = "img_project/student_image_sample.PNG" style='height:600px;margin-bottom:40px;'/></div></div>

<div id = 'teacher_table' style = "margin:0 auto;text-align:center;float:left;"><div><p style = 'color:lightblue;font-size:34px;font-weight:bold'>Sample Teacher Data <p style = 'color:white;font-size:16px;font-weight:bold;font-size:20px;'>(Taking An Action| Behaviour Monitoring)</p></p><img  src = "img_project/teacher_image_sample.PNG" style='height:600px;margin-bottom:40px;'/></div></div>

</div>


-->

</body>

</html>