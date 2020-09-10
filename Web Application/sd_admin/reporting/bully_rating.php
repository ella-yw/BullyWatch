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
  
require_once("dbcontroller.php");
$db_handle = new DBController();


?>
<!DOCYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bullies (Gender Based Report) Report</title>
<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>

<script>
function showInfo(str) {
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
                document.getElementById("info").innerHTML = xmlhttp.responseText
				}
        };
		
		xmlhttp.open("GET","bully_rating_info.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script>
	
			function getGrade(val) {
			$.ajax({
			type: "POST",
			url: "get_grade.php",
			data: val,
			success: function(data){
				$("#grade-list").html(data);
			}
			});
		}
			function getBully(val) {
			
			var school = document.getElementById('school-list').value;
			
			$.ajax({
			type: "POST",
			url: "get_bully_monitor.php",
			data: 'grade=' + val + '&school='+school,
			success: function(data){
				$("#bully-list").html(data);
			}
			});
		}
		
		
		
	</script>
<style>
html {
	background: url(background.jpg) no-repeat fixed;
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

.logout {
	float:right;
	margin-right:10px	 
 }
</style>
</head>
<body>

<form method = "post" action="" >
  <promo>
   <a class = "logout" onclick="<?php  ?>" href="master_reports.php">GO TO ANOTHER REPORT</a>
     <br/>
  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>GRAPHED RATINGS FOR BULLIES REPORT</h1></div>
 
  <promo >
    <h4 style = "color:black;margin-left:20px"> Choose Bully School:
      <select id = 'school-list' name = 'school' onChange="getGrade(this.value);" required>
        <?php 	$query ="SELECT * FROM school WHERE sd = $location";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select School...</option>
<?php
	foreach($results as $school) {
?>
	<option value="<?php echo $school["school_id"]; ?>"><?php echo $school["school_id"]; ?> | <?php echo $school["school_name"]; ?></option>
<?php
	}
	?>
      </select>
    </h4>
  </promo>
  <h4 style = "color:black;margin-left:40PX"> Choose Bully Grade:
        <select id = 'grade-list' name = 'grade' onChange="getBully(this.value);" required>
          <option value=''>---</option>
        </select>
      </h4>
   <h4 style = "color:black;margin-left:60PX"> Choose Bully:
        <select id = 'bully-list' name = 'bully' required>
          <option value=''>---</option>
        </select>
      </h4>
 
  </div>
 <input type = 'submit' id = 'submit' style = 'margin-left:80px' name = 'submit' value = 'View Graph!'><br/><br/><br/>
</form>
	
			<?php
   if (isset($_POST['bully']) ) {
 $bully_id = $_POST['bully'];
		
	
echo " <div id='myChart' style='min-width:100%'></div>";
    
	  $row = mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM student WHERE student_id = ".$bully_id." "));	
		  
	  $bully_name = $row['student_lname'] . ", " . $row['student_fname'];
	  $data=mysqli_query($db,"SELECT * FROM behavior_monitoring WHERE bully_id = ".$bully_id." ");


	?>

<!-- To make the data compatible with our chart, we must create JavaScript objects from the data. To do this, we will use PHP while loops to loop through our data to create JavaScript arrays from our result set. -->
<script src=" ../../js/zingchart.min.js"></script>

<script>
    var myData=[<?php 
    while($info=mysqli_fetch_array($data))
        echo $info['behavior_rating'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
    ?>];
   <?php $data=mysqli_query($db,"SELECT * FROM behavior_monitoring WHERE bully_id = ".$bully_id." ");
    if (!$data) {
	print "<p style='color: red;'>MySQL No: ".mysqli_errno($db)."<br>";
	print "MySQL Error: ".mysqli_error($db)."<br>";
	print "<br>SQL: ".$query."<br>";
}?>
    var myLabels=[<?php 
    
    while($info=mysqli_fetch_array($data))
        echo '"'.$info['month'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
    ?>];
    </script>
 
<script>
var myConfig = {
    "graphset":[
        {
            "type":"bar",
            "title":{
                 "text":"Current Ratings For: <?php echo $bully_name; ?>"
            },
            "scale-x":{
                "labels":myLabels
            },
            "series":[
                {
                    "values":myData
                }
            ]
        }
    ]
};

zingchart.render({ 
	id : 'myChart', 
	data : myConfig, 
	height : 400, 
	width: "100%"
});   
  
</script>


   <?php } ?>
</div>
<br/>
</body>
</html>
