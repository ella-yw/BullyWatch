<?php
session_start();
$_SESSION['hello'] = "hello";
unset($_SESSION['hello']);
 if(isset($_SESSION['login_status_location_province_admin']) == ""  ) {
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
background: url(../img_project/backgrounds/background17.jpg)center 0 no-repeat fixed;
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

</style>
<title>Stop Being Bullied!</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/style_province_admin.css">


</head>
<body >
<a style = "float:right; color:blue" href = "../login_panel.php?msg=logout">LOG OUT</a>


<section class="page1_header">
<h1 style = "color:white; text-align:center; margin-top:10%">Welcome <?php $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$location =  $_SESSION['login_status_location_province_admin'];
$query = "SELECT * FROM `admin` WHERE location = '".$location."'"; 
$results = mysqli_query($db, $query); 
$row = mysqli_fetch_assoc($results);

echo $row['admin_lname'] . ", " . $row['admin_fname']; ?></h1><h5 style = "color:white; text-align:center; margin-bottom:4%">Administrator Of <?php $query = "SELECT * FROM `province` WHERE province_id = '".$location."'"; 
$results = mysqli_query($db, $query); 
$row = mysqli_fetch_assoc($results);  echo $row['province_name'] ?></h5>

<div style = "text-align:center" >
<div class="container">
<div class="row" >
<div class="grid_4" style = "margin-bottom:3%">
<br/><br/>
<a href = "master_records/master_records.php" style = "background-color:#3e495c" class="banner"><div>
<div class="fa fa-table"></div><strong>Data<br/>Records</strong></div>
</a>
<a href = "reporting/master_reports.php" style = "background-color:#2d64c5" class="banner"><div>
<div class="fa fa-flag"></div><strong>Statistical<br/>Deliverables</strong></div>
</a>


</div>



</div></div>
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
text: ""+error+" An Email should have been sent to your email with a code, that you will have to enter below in order to change your password (it only lasts for 30 minutes)...!",
type: "success",
confirmButtonColor: '#009900',
confirmButtonText: 'Sounds Good!',
closeOnConfirm: false,
html: true,
});
}
}
xmlhttp.open("POST","index_admin_info_mail.php",true);
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
location.href = 'index_admin.php';
}
});

}


}
}
xmlhttp.open("GET","index_admin_info.php?q="+code+"&z="+password_a,true);
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