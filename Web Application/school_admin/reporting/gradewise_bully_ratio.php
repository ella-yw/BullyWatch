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


?>
<!DOCYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Grade-Wise Bully Ratio</title>
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
  <promo>
  <a class = "logout" onclick="<?php  ?>" href="master_reports.php">GO TO ANOTHER REPORT</a>
     <br/>

  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>GRADE-WISE BULLY RATIO</h1></div>
 
   </form>
	<?php
   
 $query ="SELECT * FROM school WHERE school_id = $location";
	$results = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($results);
	$school = $row['school_name'];
	
 ?>
  
  </div><div id='myChart' style = 'width:100%;margin:0 auto'></div>
   <?php
   
 $query = "SELECT DISTINCT incident_reporting.bully_id FROM incident_reporting JOIN un_incident_reporting_bully USING (report_id) WHERE bully_school_id=$location";

$result = mysqli_query($db, $query);
$row_cnt = mysqli_num_rows($result);

 
 ?>
<?php


$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '1' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	$pieChart = array();
	$legendNames = array();
	array_push($pieChart, $row[0]);
	array_push($legendNames, "1");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '2' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);
	array_push($legendNames, "2");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '3' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);
	array_push($legendNames, "3");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '4' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($pieChart, $row[0]);
	array_push($legendNames, "4");	

$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '5' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($legendNames, "5");	
	array_push($pieChart, $row[0]);
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '6' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
	array_push($legendNames, "6");	
array_push($pieChart, $row[0]);	 
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '7' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
array_push($legendNames, "7");	
	array_push($pieChart, $row[0]);
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '8' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
array_push($legendNames, "8");	
	array_push($pieChart, $row[0]);
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '9' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
array_push($legendNames, "9");	
	array_push($pieChart, $row[0]);
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '10' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
array_push($legendNames, "10");	
	array_push($pieChart, $row[0]); 
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '11' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
array_push($legendNames, "11");	
	array_push($pieChart, $row[0]);
$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_grade = '12' AND un_incident_reporting_bully.bully_school_id = ".$location;
	$result = mysqli_query($db, $query); 
    $row = mysqli_fetch_row($result);
array_push($legendNames, "12");	
	array_push($pieChart, $row[0]);
		
?>
<script src=" ../../js/zingchart.min.js"></script>

 
<script>
var myData = [<?php echo $pieChart[0]; ?>, <?php echo $pieChart[1]; ?>, <?php echo $pieChart[2]; ?>, <?php echo $pieChart[3]; ?>, <?php echo $pieChart[4]; ?>, <?php echo $pieChart[5]; ?>, <?php echo $pieChart[6]; ?>, <?php echo $pieChart[7]; ?>, <?php echo $pieChart[8]; ?>, <?php echo $pieChart[9]; ?>, <?php echo $pieChart[10]; ?>, <?php echo $pieChart[11]; ?>];

window.onload=function(){
	
    zingchart.render({
        id:"myChart",
        width:"100%",
        height:500,
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
			"legend":{

	},
	"title": {
  "text":"Showing Results For: <?php echo $school; ?>",
  "color":"green"
  
},
"subtitle": {
  "text":"Total Distinct Bully(s) At School: <?php echo $row_cnt; ?>",
  "color":"blue"
},
            "type":"bar", 
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
      
                }
                
            ]
        }
    });
};
  
</script> 
  
</form>
</body>
</html>

