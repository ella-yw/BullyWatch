<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);

	   if(isset($_SESSION['login_status_location_country_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location = $_SESSION['login_status_location_country_admin'];
?>
<?php
   

		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
  
require_once("dbcontroller.php");
$db_handle = new DBController();


?>
<!DOCYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bullying Type Ratio</title>
<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>

<script>

function getTotal(str) {
       	if (str == "") {
        document.getElementById("info").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("info").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","types_info.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>

<style>
html {
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
<body">
<form method = "post" action="" >
 
  <a class = "logout" onclick="<?php  ?>" href="master_reports.php">GO TO ANOTHER REPORT</a>
     <br/>

  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>VICTIM GENDER-BASED BULLYING TYPE REPORT</h1></div>
   <h4 style = "color:black ; margin-left:20px"> Select Gender:
  
  <select name = 'gender'>
<option value="">Select Gender...</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>  
	<option value="Other">Other</option>  
</select>
     </h4>
<input type = 'submit' id = 'submit' style = 'margin-left:40px' name = 'submit' value = 'View Graph!'>


  
 </form>
<div id = 'maindiv'>
	 <?php
	 if (isset($_POST['gender']) ) {
 $gender = $_POST['gender'];
  $query ="SELECT * FROM country WHERE country_id = '$location'";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($results);
	$country = $row['country_name'];
	
 ?>
 <div id='myChart'></div><br><br>
 <span style = 'display:inline;'>
  <?php

 
 
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."' AND victim_gender = '$gender'"; 

$results = mysqli_query($db, $query);
$row = mysqli_fetch_row($results);
$row_cnt = $row[0];

 
 ?>
 </span>
<?php


$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."' AND incident_reporting.bullying_type = 'General Verbal Insults' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	$pieChart = array();
	$legendNames = array();
	array_push($pieChart, $row[0]);
	array_push($legendNames, "General Verbal Insults");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."' AND incident_reporting.bullying_type = 'General Beatings/Pushing' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);
	array_push($legendNames, "General Beatings/Pushing");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."' AND incident_reporting.bullying_type = 'Terrorizing/Threatening Remarks' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);
	array_push($legendNames, "Terrorizing/Threatening Remarks");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'False Gossip Inflation (Rumors)' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);
	array_push($legendNames, "False Gossip Inflation (Rumors)");	

	
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Discrimination' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	 
	array_push($legendNames, "Discrimination");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Rough Fighting' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	 
	array_push($legendNames, "Rough Fighting");	

	
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Sexual Utterance/Assaults' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	 
	array_push($legendNames, "Sexual Utterance/Assaults");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'General Exclusion' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	 
	array_push($legendNames, "General Exclusion");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Theft' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	 
	array_push($legendNames, "Theft");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Racist Utterance/Assaults' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	
array_push($legendNames, "Racist Utterance/Assaults");	
	
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Personal Property Damage'  AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);	
	array_push($legendNames, "Personal Property Damage");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Internet Related (Cyber)' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);		
	array_push($legendNames, "Internet Related (Cyber)");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_victim` USING(report_id) JOIN school ON (victim_school_id=school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN `province` USING(province_id)
WHERE country_id = '".$location."'
AND incident_reporting.bullying_type = 'Other/Unspecified' AND victim_gender = '$gender'";
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);			
	array_push($legendNames, "Other/Unspecified");	

?>
<script src=" ../../js/zingchart.min.js"></script>

 
<script>
var myData = [<?php echo $pieChart[0]; ?>, <?php echo $pieChart[1]; ?>, <?php echo $pieChart[2]; ?>, <?php echo $pieChart[3]; ?>, <?php echo $pieChart[4]; ?>, <?php echo $pieChart[5]; ?>, <?php echo $pieChart[6]; ?>, <?php echo $pieChart[7]; ?>, <?php echo $pieChart[8]; ?>, <?php echo $pieChart[9]; ?>, <?php echo $pieChart[10]; ?>, <?php echo $pieChart[11]; ?>, <?php echo $pieChart[12]; ?>, <?php echo $pieChart[13]; ?>];
window.onload=function(){
	
    zingchart.render({
        id:"myChart",
        width:"100%",
        height:400,
         data:{
		scaleX:{ 
 	  lineColor:"none", //this will make the line disappear 
 	  item:{ //this controls the text/lables below your bars
 	    visible: false
 	  },
 	  tick:{ //this controls the ticks on the x axis
 	    visible: false
 	  }
 	},	
	"type":"ring3d", 
	"title": {
  "text":"Showing Victim Results For: <?php echo $country; ?> (<?php echo $gender; ?>)",
  "color":"green"
  
},
"subtitle": {
  "text":"Total <?php echo $gender; ?> Victims Reported: <?php echo $row_cnt; ?>",
  "color":"blue"
}, 
        "series":[
                {
                    "values": [ myData[0] ],
					"text":"<?php echo $legendNames[0]; ?>",
					"background-color":"orange #323232",
                },
                {
                    "values": [ myData[1] ],
					"text":"<?php echo $legendNames[1]; ?>",
					"background-color":"red #323232",					
                },
                {
                    "values": [ myData[2] ],
					"text":"<?php echo $legendNames[2]; ?>",
					"background-color":"green #323232",
                },
				{
                    "values": [ myData[3] ],
					"text":"<?php echo $legendNames[3]; ?>",
					"background-color":"#5c1465 #323232",
      
                },
				{
                    "values": [ myData[4] ],
					"text":"<?php echo $legendNames[4]; ?>",
					"background-color":"#ff00ac #323232",
                },
                {
                    "values": [ myData[5] ],
					"text":"<?php echo $legendNames[5]; ?>",
					"background-color":"#450303 #323232",					
                },
                {
                    "values": [ myData[6] ],
					"text":"<?php echo $legendNames[6]; ?>",
					"background-color":"#4d7f17 #323232",
                },
				{
                    "values": [ myData[7] ],
					"text":"<?php echo $legendNames[7]; ?>",
					"background-color":"#aefe57 #323232",
      
                },
				{
                    "values": [ myData[8] ],
					"text":"<?php echo $legendNames[8]; ?>",
					"background-color":"#cd5b45 #323232",
                },
                {
                    "values": [ myData[9] ],
					"text":"<?php echo $legendNames[9]; ?>",
					"background-color":"#6495ed #323232",					
                },
                {
                    "values": [ myData[10] ],
					"text":"<?php echo $legendNames[10]; ?>",
					"background-color":"#f8f8ff #323232",
                },
				{
                    "values": [ myData[11] ],
					"text":"<?php echo $legendNames[11]; ?>",
					"background-color":"#636363 #323232",
      
                },
				{
                    "values": [ myData[12] ],
					"text":"<?php echo $legendNames[12]; ?>",
					"background-color":"blue #323232",
                }
            ]
        }
    });
};
  
</script>  
</div></div>
	 <?php } ?>
</body>
</html>

