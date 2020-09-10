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
<title>School-Wise Incident Ratio & Comparison</title>
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

  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>SCHOOL-WISE INCIDENT RATIO & COMPARISON</h1></div>
  
  
</form>
<div id = 'maindiv'>
	
 <div id='myChart' style = 'width:100%;margin:0 auto'></div>

<?php

$query = "SELECT * FROM school
WHERE sd = ".$location;
$result = mysqli_query($db, $query); 
$pieChart = array();
$legendNames = array();

$numresults = mysqli_num_rows($result);
		
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		
				$query = "SELECT COUNT( * ) FROM incident_reporting JOIN `un_incident_reporting_bully` USING(report_id)
WHERE un_incident_reporting_bully.bully_school_id = ".$row['school_id'];
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

window.onload=function(){

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
        height:500,
        
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

};
</script>  


</div>

</body>
</html>

