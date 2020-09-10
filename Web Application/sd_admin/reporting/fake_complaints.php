<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
		if(isset($_SESSION['login_status_location_sd_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location = $_SESSION['login_status_location_sd_admin'];
?>
<?php
   

		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
  
?>
<!DOCYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Fake Complaints</title>
<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>


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

  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>SD-WISE FAKE COMPLAINTS</h1></div>
  	
</form>

 <div id='myChart'></div><div id='mySChart'></div>

<?php

$query = "SELECT * FROM school WHERE sd = '".$location."'";
$result = mysqli_query($db, $query); 
$pieChart = array();
$legendNames = array();
$numresults = mysqli_num_rows($result);			
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
				$query = "SELECT COUNT( * ) FROM incident_reporting JOIN `action_taking` USING(report_id) JOIN `un_incident_reporting_bully` USING(report_id) JOIN `school` ON (bully_school_id=school_id) WHERE school_id = '".$row['school_id']."' AND fake_complaint = 'YES'";
				$result_a = mysqli_query($db, $query); 
				$row_a = mysqli_fetch_row($result_a);
				array_push($pieChart, $row_a[0]);
				array_push($legendNames, $row['school_name']);	
		
			}
$js_array = json_encode($pieChart);
$js_array_l = json_encode($legendNames);
?>
<script src=" ../../js/zingchart.min.js"></script>
<script>
var myData = <?php echo $js_array; ?>;
var myData = myData.map(parseFloat);
var myLabels = <?php echo $js_array_l; ?>;



var colorCharacters = "ACDEF0123456789";
    var globalStylesArray = [];
     
    var myConfig = {
     	type: "bar", 
     	"scale-x":{
			"values":myLabels,
		},
		series : [
    		{
			"values" :myData, 
			}
    	]
    };
     
    zingchart.render({ 
    	id : 'myChart', 
    	data : myConfig, 
    	width:"100%",
        height:350,
        
    });
   
   zingchart.gload = function(p) {
      console.log(p);
      var graphId = p.id;
      var graphData = {};
	  graphData = zingchart.exec(graphId, 'getdata');
      graphData = graphData.graphset[0] ? graphData.graphset[0] : graphData;
      console.log(graphData);
      createColors(graphData.series[0].values.length);
     
	 zingchart.exec(graphId, 'modifyplot', {
        data: {
          styles: globalStylesArray
        }
      });
    }
     
   function createColors(seriesLength) {
      console.log('-------createColor seriesLength: ', seriesLength);
      globalStylesArray = [];
      for (var i = 0; i < seriesLength; i++) {
        var colorString = '#';
        for (var j = 0; j < 6; j++) {
          colorString += colorCharacters.charAt(Math.floor(Math.random() * (colorCharacters.length - 4)));
        }
        globalStylesArray.push(colorString);
      }
      
      console.log('-----globalStylesArray-------', globalStylesArray);
    }


</script>  

<?php
$query = "SELECT COUNT( * ) FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id) JOIN school ON (bully_school_id=school_id) WHERE sd = '".$location."'"; 

$results = mysqli_query($db, $query);
$row = mysqli_fetch_row($results);
$row_cnt = $row[0];


$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id) JOIN `action_taking` USING(report_id) JOIN school ON (bully_school_id=school_id) WHERE sd = '".$location."'  AND fake_complaint = 'YES'";
				$result_a = mysqli_query($db, $query); 
				$row_a = mysqli_fetch_row($result_a);
				$total_fake = $row_a[0];
?>
 
<?php
$query = "SELECT * FROM bullying_type";
$result = mysqli_query($db, $query); 
$pieChart = array();
$legendNames = array();
$numresults = mysqli_num_rows($result);			
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_assoc($result);
				$query = "SELECT COUNT( * )
FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id) JOIN `action_taking` USING(report_id) JOIN school ON (bully_school_id=school_id) WHERE sd = '".$location."' AND incident_reporting.bullying_type = '".$row['sub_bullying_type']."' AND fake_complaint = 'YES'";
				$result_a = mysqli_query($db, $query); 
				$row_a = mysqli_fetch_row($result_a);
				array_push($pieChart, $row_a[0]);
				array_push($legendNames, $row['sub_bullying_type']);	
		
			}

$js_array = json_encode($pieChart);
$js_array_l = json_encode($legendNames);
?>

<script>
var myData = <?php echo $js_array; ?>;
var myData = myData.map(parseFloat);
var myLabels = <?php echo $js_array_l; ?>;
		

 var myTheme = {
  "palette": {
    "vbar": [
      ["#ffffff", "#40beeb", "#40beeb", "#40beeb"], // First series palette...
      ["#ffffff", "#305f74", "#305f74", "#305f74"], // Second series palette...
      ["#ffffff", "#4492a8", "#4492a8", "#4492a8"], // Third series...
      ["#ffffff", "#8e8e8e", "#8e8e8e", "#8e8e8e"],
      ["#ffffff", "#85bdcd", "#85bdcd", "#85bdcd"]
    ],
    "line": [
      ["#ffffff", "#40beeb", "#40beeb", "#40beeb"], // First series palette...
      ["#ffffff", "#305f74", "#305f74", "#305f74"], // Second series palette...
      ["#ffffff", "#4492a8", "#4492a8", "#4492a8"], // Third series...
      ["#ffffff", "#8e8e8e", "#8e8e8e", "#8e8e8e"], 
      ["#ffffff", "#85bdcd", "#85bdcd", "#85bdcd"]
    ]
  }
 }  
var myConfig = {
 	type: "pie3d", 
     	title: {
		"text":"Showing Results For: <?php echo $location; ?>",
		"color":"green"

		},
		subtitle: {
		"text":"Out of <?php echo $row_cnt; ?> Bullying Incidents, <?php echo $total_fake; ?> of them were judged to be fake complaints",
		"color":"blue"
		}, 
     	series : [<?php
				$print = '';
				$result = count($pieChart);
				for ($i=0; $i<$result; $i++){
					$print .= '{"values":[ myData['.$i.'] ],"text":"'.$legendNames[$i].'",},';
				}
				$print = rtrim($print, ",");
				print $print;
			     ?>]
    
 };
   zingchart.render({ 
    	id : 'mySChart', 
    	data : myConfig, 
    	width:"100%",
        height:320,
		defaults: myTheme
        
    });

</script>
</div>

</body>
</html>


