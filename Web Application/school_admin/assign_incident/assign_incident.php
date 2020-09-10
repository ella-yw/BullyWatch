<?php
ob_start();
session_start();
if(  isset($_SESSION['login_status_location_school_admin']) == ""  ) {
header('Location: ../../login_panel.php');   
}
$location =  $_SESSION['login_status_location_school_admin'];


//**********************************************
//*
//*  Connect to MySQL and Database
//*
//**********************************************

$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assign An Incident</title>
<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>
<link href="../../css/font-awesome.min.css" rel="stylesheet" />
<script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">

<script>

function relocate() {
location.href = '../index_admin.php';
}
function validation_unassign() {
var report_id_unassign = document.getElementById('report_id_unassign').value;
if (report_id_unassign == "") {
swal({
title: "Unable to process input!",
text: "You pick the <b>incident to be unassigned</b>",
type: "warning",
confirmButtonColor: '#ff9933',
confirmButtonText: 'Okay!',
html: true
},
function(isConfirm){
if(isConfirm) {
location.href = 'assign_incident.php';
}
}
);
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

var report_id = xmlhttp.responseText;
swal({
title: "Incident Unassigned!",
text: "Incident (<b>"+report_id+"</b>) has been successfully unassigned, and the appropriate teacher has been notified!",
type: "success",
confirmButtonColor: '#009900',
confirmButtonText: 'Sounds Good!',
html: true
},
function(isConfirm){
if(isConfirm) {
location.href = 'assign_incident.php';
}
}
);
}
};
xmlhttp.open("GET","unassign_info.php?report_id_unassign="+report_id_unassign,true);
xmlhttp.send(); 
}
}
function validation_assign() {

function getRadioVal(form, name) {
var val;
// get list of radio buttons with specified name
var radios = form.elements[name];

// loop through list of radio buttons
for (var i=0, len=radios.length; i<len; i++) {
if ( radios[i].checked ) { // radio checked?
val = radios[i].value; // if so, hold its value in val
break; // and break out of for loop
}
}
return val; // return value of checked radio or undefined if none checked
}
var report_id_assign = getRadioVal( document.getElementById('main'), 'incident_radio' );
var teacher_id_assign = getRadioVal( document.getElementById('main'), 'teacher_radio' );


if (report_id_assign == undefined) {
swal({
title: "Unable to process input!",
text: "You must pick the <b>incident to be assigned</b>.",
type: "warning",
confirmButtonColor: '#ff9933',
confirmButtonText: 'Okay!',
html: true
});
}
else if (teacher_id_assign == undefined) {
swal({
title: "Unable to process input!",
text: "You must pick the <b>teacher to whom the incident is going to be assigned to</b>.",
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

var report_id = xmlhttp.responseText;
swal({
title: "Incident Assigned!",
text: "Incident (<b>"+report_id+"</b>) has been successfully assigned, and the appropriate teacher has been notified!",
type: "success",
confirmButtonColor: '#009900',
confirmButtonText: 'Sounds Good!',
html: true
},
function(isConfirm){
if(isConfirm) {
location.href = 'assign_incident.php';
}
}
);
}
};
xmlhttp.open("GET","assign_info.php?report_id_assign="+report_id_assign+"&teacher_id_assign="+teacher_id_assign,true);
xmlhttp.send(); 
}
}
</script>
<style>
table
{
margin:0 auto;

position:relative;
margin-bottom:30px;
}
#delete {
font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif;
width: 120px;
height: 30px;
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
td,th
{
text-align:center;
border: solid #9fa8b0 1px;
border-collapse:collapse;
}
html {
background: url(background.jpg) FIXED no-repeat;
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
.left {
float: left;
margin-left: 10px;
font-size:12px;
}
.left_two {
float: left;
margin-left: 60px
}


.blink {
animation: blink-animation 1s steps(5, start) infinite;
-webkit-animation: blink-animation 1s steps(5, start) infinite;
font-size: 20px;
}
@keyframes blink-animation {
to {
visibility: hidden;
}
}
@-webkit-keyframes blink-animation {
to {
visibility: hidden;
}
}
a:hover{
cursor: pointer;
}
</style>
</head>
<body style="margin:0;">
<div style="display:block;" id="myDiv" class="animate-bottom">
<div style = "position:relative; margin:0 auto; width: 900px; height:1600px; border:5px solid black ">
<a  class = "logout" onclick="relocate()" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/close.png' style='width:80px;'></a>
<div style="text-align: center;">     
<br/><h1 style = "position:relative; text-align: center; color: #00cdcd">
Assign An Incident
</h1>
<h3 style = "position:relative; text-align: center; color: blue">
Welcome School Administrator <h5 style = "text-align:center">Provided to you is a list of unassigned bullying incidents that have been reported in your school, and a list of free teachers who are currently handling 4 or less incidents.<br/><span style = "color:red">Make sure no incident has been left unassigned for more than</span> <span style = "color:blue">5 buisness days</span>. 
</h3>
</div>
<div style = 'margin:0 auto; text-align:center;align:center'>
<div style = 'margin:0 auto; text-align:center;align:center'>
<form method = "post" action="" id='main' >

<div style = 'margin:0 auto; text-align:center;align:center'>
<h2 style = 'text-align:center'>Unassigned Incidents</h2>
<?php 

$query = "SELECT * FROM un_incident_reporting_bully JOIN un_incident_reporting_victim USING(report_id) JOIN incident_reporting USING(report_id) WHERE bully_school_id = $location || victim_school_id = $location HAVING status = 'UNASSIGNED'"; 
$results = mysqli_query($db, $query); 
echo "<table >
<tr style = 'background-color: yellow'>

<th>Assign</th>
<th>Incident/Report ID</th>
<th>Victim Grade</th>
<th>Incident/Report Date</th>
</tr>";
while ($row = mysqli_fetch_assoc($results)) {
echo "<tr style = 'background-color: orange'>";
echo "<td> <input type = 'radio' name = 'incident_radio' value = '".$row['report_id']."'> </td>";
echo "<td><b>" . $row['report_id'] . "</b></td>";
echo "<td><b>" . $row['victim_grade'] . "</b></td>";
echo "<td><b>" . $row['report_date'] . "</b></td>";

} ?> </table > 

<h2 style = 'text-align:center'>Teachers</h2>

<?php 
$query = "SELECT * FROM teacher JOIN assign_incident USING (teacher_id) WHERE end_incident = 'NO' AND posted_school_id = $location AND teacher_role = 'TEACHING'"; 
$results = mysqli_query($db, $query); 

echo "<table >
<tr style = 'background-color: black;color:white'>
<th>Assign</th>
<th>Teacher ID</th>
<th>Teacher First Name</th>
<th>Teacher Last Name</th>
<th>Teacher Grade</th>
<th style = 'background-color: red'>&nbsp;ID 1&nbsp;</th>
<th style = 'background-color: red'>&nbsp;ID 2&nbsp;</th>
<th style = 'background-color: red'>&nbsp;ID 3&nbsp;</th>
<th style = 'background-color: red'>&nbsp;ID 4&nbsp;</th>
<th style = 'background-color: red'>&nbsp;ID 5&nbsp;</th>
</tr>";

while ($row = mysqli_fetch_assoc($results)) {
echo "<tr style = 'background-color: pink'>";
echo "<td> <input type = 'radio' name = 'teacher_radio' value = '".$row['teacher_id']."'> </td>";
echo "<td><b>" . $row['teacher_id'] . "</b></td>";
echo "<td><b>" . $row['teacher_fname'] . "</b></td>";
echo "<td><b>" . $row['teacher_lname'] . "</b></td>";
echo "<td><b>" . $row['teacher_grade'] . "</b></td>";

$teacher_id = $row['teacher_id'];

$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
$result = mysqli_query($db,$sql);
$row_b = mysqli_fetch_array($result);
$incident_feild = $row_b['current_incident'];

if ($incident_feild != "") {
$incident_array = explode(", ", $incident_feild);
$counter = 0;
foreach ($incident_array as $incident) {
	$counter++;
	if ($counter==1){
	echo "<td><b> $incident </b></td>";

	}
	elseif ($counter==2){
	echo "<td><b> $incident </b></td>";

	}
	elseif ($counter==3){
	echo "<td><b> $incident </b></td>";
	
	}
	elseif ($counter==4){
	echo "<td><b> $incident </b></td>";

	}
	elseif ($counter==5){
	echo "<td><b> $incident </b></td>";
	}

}
if ($counter==1){
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	
}
elseif ($counter==2){
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	
}
elseif ($counter==3){
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	
}
elseif ($counter==4){
	echo "<td><b> --- </b></td>";
	
}
else {
	
}

echo "</tr>";
}
else {
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";
	echo "<td><b> --- </b></td>";

}

}
echo "</table > ";
?>

</form>		  

</div>
<button id = "delete" style="background-color:red" onClick='validation_assign()'>Assign</button>


<br/><br/><br/><br/><br/>

<div style = "text-align:center; font-size:22px; color:black;font-weight:bold">
Unassign An Incident:
</div>
<p style = 'color:blue'>Choose An Assigned Incident ID<br>
<?php
//**********************************************
//SELECT from table and select
//**********************************************

$sql_statement  = "SELECT * FROM un_incident_reporting_bully JOIN un_incident_reporting_victim USING(report_id) JOIN incident_reporting USING(report_id) WHERE victim_school_id = $location HAVING status = 'ASSIGNED'";

$result = mysqli_query($db, $sql_statement); // code has ran
$outputDisplay = ""; //printed at the end

if (!$result) //runs if there is error 
{
$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br><b>";
$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br><b>";
$outputDisplay .= "<b><br>Failed SQL Statement`: ".$sql_statement."<br><b>";
} 
else //if code and syntax is ok
{
$outputDisplay  = " <select name = 'report_id' id = 'report_id_unassign' size = '1' >";

$numresults = mysqli_num_rows($result);


for ($i = 1; $i <= $numresults; $i++)
{
$row = mysqli_fetch_array($result);

$outputDisplay .= "<option value='".$row['report_id']."'>".$row['report_id']."</option>";
}
$outputDisplay .= "</select>";

}
print $outputDisplay;
?>

<br/><br/>



</div>
<button id = "delete" onClick='validation_unassign()'>Unassign</button>
</body>
</html>

