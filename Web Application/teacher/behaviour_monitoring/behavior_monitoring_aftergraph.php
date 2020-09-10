<?php
    session_start();
   if(  (!isset($_SESSION['after_graph'])) && ($_SESSION['after_graph'] == "")  ) {
		header('Location: ../../login_panel.php');   
   }
  $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
  ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Monitor Bully's Behavior</title>
<script src=" ../../js/zingchart.min.js"></script>
  <script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">
  	<link href="../../css/font-awesome.min.css" rel="stylesheet" />
 <script>

<?php
	$bully_id = $_SESSION['after_graph'];
	$teacher_id = $_SESSION['login_status_teacher'];
	$js_labels = "";
	
	$row=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM student WHERE student_id = '".$bully_id."' "));
	$bully = $row['student_id'] . ' | ' . $row['student_lname'] . ', ' . $row['student_fname'];
	
	$data=mysqli_query($db,"SELECT * FROM behavior_monitoring WHERE bully_id = '".$bully_id."' ");

	while($info=mysqli_fetch_array($data)) {
		$js_labels .= '"' . $info['month'] . '",';
    }
	$js_labels = rtrim( $js_labels, ',' );
		
	
	$js_data = "";
	
	$data=mysqli_query($db,"SELECT * FROM behavior_monitoring WHERE bully_id = '".$bully_id."' ");

	while($info=mysqli_fetch_array($data)) {
		$js_data .= '' . $info['behavior_rating'] . ',';
    }
	$js_data = rtrim( $js_data, ',' );
		
?>

var month = [<?php echo $js_labels; ?>];
var bully = [<?php echo $js_data; ?>];

 var myConfig = {
    "graphset":[
        {
            "type":"bar3d",
            "title":{
                 "text":"Behavior Ratings For: <?php echo $bully ?>",
            },
            "scale-x":{
                "labels":month
            },
            "series":[
			  {
				  "values":bully
			  }
            ]
        }
    ]
};
window.onload = function() {
zingchart.render({ 
	id : 'myChart', 
	data : myConfig, 
	height : "100%", 
	width: "100%"
}); 
}
</script>
</head>
<body>

<a  class = "logout" href='../index_teacher.php'><i class="fa fa-sign-out" style = "color: blue; position:absolute; font-size:50px;margin-left:10px;margin-top:10px;"></i></a><br/><br/><br/>
	<div id='myChart' style = "display:inline;margin:0 auto;width:100%;height:100%;"></div>
	
</body>
</html>