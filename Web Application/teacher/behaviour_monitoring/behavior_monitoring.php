<?php
    ob_start();
  session_start();
   if(  isset($_SESSION['behavior_monitoring']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   else
   {
	 $teacher_id =  $_SESSION['login_status_teacher'];
    
    //**********************************************
    //*
    //*  Connect to MySQL and Database
    //*
    //**********************************************
    
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Monitor Bully's Behavior</title>
<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>
<link href="../../css/font-awesome.min.css" rel="stylesheet" />
<script src=" ../../js/zingchart.min.js"></script>
  <script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">
<script>

		function relocate() {
			location.href = '../index_teacher.php';
		}
		
		function validation() {
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
			var intensity = getRadioVal( document.getElementById('main'), 'intensity' );
			var frequency = getRadioVal( document.getElementById('main'), 'frequency' );
			var behavior = document.getElementById('behavior').value;
			var comments = document.getElementById('comments').value;
			var bully_id = document.getElementById('bully_id').value;
			var ease = document.getElementById('ease');
			if (ease.checked == true)
				{
					var ease = 'YES';
					
				}
				else {
					var ease = '';
				}
			
			
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var rating = xmlhttp.responseText;
					swal({
						title: "ALL GOOD!<br/><em>Rating Successfully Added!</em>",
						text: "Thank you for adding a auto-generated (averaged) rating of: <b>"+rating+"</b>, on the respected bully, the rating has been successfully recorded! To avoid duplicate ratings for this current month, this rating has been averaged out with a previous behavior rating inputted for this month on this bully (if there was any).",
						type: "info",
						confirmButtonColor: '#009900',
						confirmButtonText: 'Sounds Good!',
						closeOnConfirm: false,
						html: true
					},
					function(isConfirm){
					if (isConfirm){
						
						if (ease == 'YES'){
							swal({
							title: "Monitoring Ended for Bully!",
							text: "This rating was the last you inputted for this bully as you chose to end monitoring for him/her! <div style = 'color:grey;font-size:10px'> If you have any more bully's to monitor you should do so. Make sure you save this graph as a PNG, SVG, JPG, PDF or print it. (You can do this by right-clicking on the graph) </div>",
							type: "warning",
							confirmButtonColor: '#ff9933',
							confirmButtonText: 'Okay!',
							html: true
							},
							function(isConfirm){
							if (isConfirm){
							location.href = 'behavior_monitoring_aftergraph.php';
							}
							});
						}
						else {
						var month = '<?php $month = date('F'); echo $month; ?>';
						swal({
						title: "That's it for "+month+"!",
						text: "You've successfully completed your task for "+month+", for this bully! Please come back next month to input more ratings for this bully. In the meantime, if you have any more bully's to monitor you should do so. <div style = 'color:grey;font-size:10px'> Make sure you save this graph as a PNG, SVG, JPG, PDF or print it. (You can do this by right-clicking on the graph) </div>",
						type: "warning",
						confirmButtonColor: '#ff9933',
						confirmButtonText: 'Okay!',
						html: true
						},
						function(isConfirm){
						if (isConfirm){
						location.href = 'behavior_monitoring_aftergraph.php';
						}
						});
						}
						}	
						});
						
				}
			};
			xmlhttp.open("GET","behavior_monitoring_info.php?intensity="+intensity+"&frequency="+frequency+"&behavior="+behavior+"&comments="+comments+"&bully_id="+bully_id+"&ease="+ease,true);
			xmlhttp.send(); 
		}
	</script>
<style>
html {
	font-family: cursive;
	background: url(background.jpg)  no-repeat fixed;
	background-size:100% 100%;
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
}
select {
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
}
.left {
	
	margin-left: 45px;
	float: left;
	
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
#submit_a {
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
	width: 160px;
	height: 30px;
	border-radius: 7px;
	background-color: orange;
	-webkit-transition: 0.5s ease;
	transition: 0.5s ease;
}
#submit_a:hover {
	font-size: 20px;
	width: 220px;
	height: 45px;
	background-color: blue;
	color: white;
}
#button {
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
	width: 295px;
	font-weight: bolder;
	height: 30px;
	border-radius: 7px;
	background-color: yellow;
	-webkit-transition: 0.5s ease;
	transition: 0.5s ease;
	color: blue;
}
#button:hover {
	background-color: orange;
	color: red;
}

input[type=range] {
	/*removes default webkit styles*/
	-webkit-appearance: none;
	/*fix for FF unable to apply focus style bug */
	border: 1px solid white;
	/*required for proper track sizing in FF*/
	width: 190px;
}
input[type=range]::-webkit-slider-runnable-track {
 width: 190px;
 height: 5px;
 background: grey;
 border: none;
 border-radius: 3px;
}
input[type=range]::-webkit-slider-thumb {
 -webkit-appearance: none;
 border: none;
 height: 16px;
 width: 16px;
 border-radius: 50%;
 background: goldenrod;
 margin-top: -4px;
}
input[type=range]:focus {
	outline: none;
}
input[type=range]:focus::-webkit-slider-runnable-track {
 background: grey;
}
 input[type=range]::-moz-range-track {
 width: 190px;
 height: 5px;
 background: #grey;
 border: none;
 border-radius: 3px;
}
input[type=range]::-moz-range-thumb {
 border: none;
 height: 16px;
 width: 16px;
 border-radius: 50%;
 background: goldenrod;
}

/*hide the outline behind the border*/
input[type=range]:-moz-focusring {
 outline: 1px solid grey;
 outline-offset: -1px;
}
}
input[type=range]::-ms-fill-lower {
 background: grey;
 border-radius: 10px;
}
input[type=range]::-ms-fill-upper {
 background: grey;
 border-radius: 20px;
}
input[type=range]::-ms-thumb {
 border: none;
 height: 16px;
 width: px;
 border-radius: 50%;
 background: grey;
}
input[type=range]:focus::-ms-fill-lower {
 background: #888;
}
input[type=range]:focus::-ms-fill-upper {
 background: grey;
}
a {
	text-decoration: none
}

span {
	left: 0px
}
.top {
	margin-left:70px;
	margin-top: 400px	
}
font-size: 20px;	
 }
 a:hover{
	 cursor: pointer;
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
 input[type=text],select {
	width:200px;
}
#myChart {
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
}

        </style>
	</head>
	<body style="margin:0;">
<body style="margin:0;">
<div style="display:block;" id="myDiv" class="animate-bottom">
<div style = "position:relative; margin:0 auto; width: 900px; height:1120px; border:5px solid black ">
<a  class = "logout" onclick="relocate()" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/close.png' style='width:80px;'></a>
  <div style="text-align: center;">     
<br/><h1 style = "position:relative; text-align: center; color: lightblue">
Monitoring Behavior
    			 
</h1>
		<h3 style = "position:relative; text-align: center; color: blue">
       				Welcome: <?php $query = "SELECT * FROM `teacher` JOIN `school` ON (posted_school_id = school_id) JOIN `sd` ON ( school.sd = sd.sd ) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE teacher_id = ".$teacher_id.""; 
								  $results = mysqli_query($db, $query); 
								  $row = mysqli_fetch_assoc($results);
								  $country = $row['country_name'];
								  $province = $row['province_name'];
								  $city = $row['city_name'];
								  $sd = $row['sd'];
								  $school_id = $row['school_id'];
								  $school_name = $row['school_id'] ." | ". $row['school_name'];
								  $teacher = $row['teacher_id'] . " | " . $row['teacher_lname'] . ", " . $row['teacher_fname'];
								  $teacher_id = $row['teacher_id'];
								  echo $row['teacher_lname'] . ", " . $row['teacher_fname'];
								
								 ?> 
					</h3>
				 </div>
				  <div id='myChart' style = "position:absolute; margin-left:450px; width:430px;height:310px;"></div>
		<div id='tobedisplayed' style = "position:absolute; margin-left:485px; width:430px;height:310px;color:white;font-weight:bold;font-size:30px"><br/>Graph Will Be <br/>Displayed Here...</div>
		
        <div class = "head">
        
         <h3 style = "color:black; margin-left:40px">        
        	<label>Province:</label>
<input type = 'text' value = '<?php echo $province; ?>' disabled = 'disabled'>                
		</h3>
		  <h3 style = "color:black; margin-left:60px">        
        	City: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<input type = 'text' value = '<?php echo $city; ?>' disabled = 'disabled'>                

        </h3>
		
        <h3 style = "color:black ; margin-left:80px">        
        	SD: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<input type = 'text' value = '<?php echo $sd; ?>' disabled = 'disabled'>                

       </h3>
<br/>
    <h3 style = "color:black ; margin-left:100px">        
        	Bully's School:&nbsp;
              	<input type = 'text' style = 'width:195px' value = '<?php echo $school_name; ?>' disabled = 'disabled'>                

       </h3>
	<form method = "post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
      <h3 style = "color:black ; margin-left:100px">        
        	Bully:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<select name = 'bully_id' id = 'bully_id'>
					<?php
					$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
					$result = mysqli_query($db,$sql);
					$row = mysqli_fetch_array($result);
					$bully_id_feild = $row['current_bully'];
					
					$bully_array = explode(", ", $bully_id_feild);

					foreach ($bully_array as $bully) {
						$sql="SELECT * FROM student WHERE student_id = $bully";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_array($result);
						$bully_name = $row['student_id'] . " | " . $row['student_lname'] . ", " . $row['student_fname'];
						
						?>
						<option value = '<?php echo $bully; ?>'><?php echo $bully_name; ?></option>
						<?php
					}
					?>
				</select>

       </h3>
			<input style = "margin-left:270px" type = "submit" id = "submit_a" name = "view" value = "View Rating!">
			</form>
    </div>
	<br/>
	<div style = "margin:0 auto; width:50%;float:left">
	
<h3 style = 'color:pink;margin-left:40px'>Past Bullies You Have Monitored:</h3>
	 <marquee behavior="scroll" direction="up" style = 'width:350px;display:block;padding-left:0px;padding-right:0px' onmouseover="this.stop();" onmouseout="this.start();" scrollamount="3"  height="50" >
	 
    <ul  style = 'margin-left:10px;margin-top:0px;margin-bottom:0px;font-family:Baskerville Old Face;text-align:left' >

	<?php
				$sql = "SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
				$row = mysqli_fetch_assoc(mysqli_query($db,$sql));
				$bully_id_feild = $row['end_bully'];
				
				if ($bully_id_feild != "") {
					
						$bully_array = explode(", ", $bully_id_feild);
						foreach ($bully_array as $bully) {
							
						$sql="SELECT * FROM student WHERE student_id = $bully";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_assoc($result);
						$sql="SELECT * FROM behavior_monitoring WHERE bully_id = $bully AND teacher_id= $teacher_id";
						$result = mysqli_query($db,$sql);
						$row_a = mysqli_fetch_assoc($result);
						$bully_id = $row['student_id'];
						$bully_name = $row['student_id'] . " | " . $row['student_lname'] . ", " . $row['student_fname'];
						$month = $row_a['month'];
						
						$sql="SELECT AVG(behavior_rating) as behavior_rating FROM behavior_monitoring WHERE bully_id = $bully AND teacher_id= $teacher_id";
						$result = mysqli_query($db,$sql);
						$row_b = mysqli_fetch_assoc($result);
						$ave_rating = $row_b['behavior_rating'];
						
						$ave_rating = number_format($ave_rating, 5, '.', '');
						?>
					<li>
						<div  style = 'color:white'>
							<span style = 'font-weight:bold;font-size:15px;background-color:yellow;color:black'> <?php echo $bully_name; ?> </span><br/>
							<span style = 'font-size:11px;'><em>Ended in <?php echo $month; ?></em><br/></span>
							<span style = 'font-size:14px;'>Average Rating over the period: <b style = "background-color:yellow;color:black"> <?php echo $ave_rating; ?>% </b></span>
							<br/><br/>
						</div>
					</li>
					<?php
					}
					
				}
				else {
					?>
						<li>
							<div>
							<p style = 'color:red;font-size:17px;font-weight:bold'>You have never monitored any bullies in the past, in this school session!</p>
							</div>
						</li>
					<?php
				}
			?>
	 </ul>
	 </marquee>
	 <br/><br/>
	 </div>
	 
	 <div style = "margin:0 auto; width:50%;float:right">
	 <h3 style = 'color:orange;margin-right:20px'>Latest Bully Records That Can Influence Rating:</h3>

	 <marquee behavior="scroll" direction="up" style = 'width:410px;display:block;padding-left:0px;padding-right:0px' onmouseover="this.stop();" onmouseout="this.start();" scrollamount="3"  height="50" >
    <ul  style = 'margin-right:10px;margin-top:0px;margin-bottom:0px;font-family:Baskerville Old Face;text-align:right' >
	<?php
				$sql = "SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
				$row = mysqli_fetch_assoc(mysqli_query($db,$sql));
				$bully_id_feild = $row['current_bully'];
					
					$bully_array = explode(", ", $bully_id_feild);
					
					$sql="SELECT * FROM action_taking JOIN incident_reporting USING (report_id) WHERE bully_id = ".$bully_array[0]." AND teacher_id = $teacher_id AND need_monitoring = 'YES' ORDER BY action_id DESC";
					$result = mysqli_query($db,$sql);
					$row_a = mysqli_fetch_assoc($result);
					$action_date  = $row_a['action_date'];
					if ($action_date != "") {
							
					foreach ($bully_array as $bully) {
						$sql="SELECT * FROM action_taking JOIN incident_reporting USING (report_id) WHERE bully_id = $bully AND teacher_id = $teacher_id AND need_monitoring = 'YES' ORDER BY action_id DESC";
						$result = mysqli_query($db,$sql);
						$row_a = mysqli_fetch_assoc($result);
						$action_date  = $row_a['action_date'];
						if ($action_date != "") {
					
						$sql="SELECT * FROM incident_reporting JOIN action_taking USING (report_id) JOIN student ON (bully_id=student_id) WHERE bully_id = $bully AND report_date > $action_date ";
						$result = mysqli_query($db,$sql);
						$row = mysqli_fetch_assoc($result);
						$bully_name = $row['student_id'] . " | " . $row['student_lname'] . ", " . $row['student_fname'];
						$report_id = $row['report_id'];
						?>
							
							<li>
								<div  style = 'color:white'>
									<span style = 'font-weight:bold;font-size:15px;background-color:yellow;color:black'> Bully: <?php echo $bully_name; ?> </span><br/>
									<span style = 'font-size:11px;'>Commited Incident(s) after you chose to monitor his/her behavior<br/></span>
									<br/>
									<span style = 'font-size:14px;background-color:orange;color:black;margin-top:20px;'> Incident ID: <b><?php echo $report_id; ?> </b><br/></span>
									<div style = 'margin-top:3px;'>
									<a style = 'text-decoration:none;color:yellow;font-weight:bold;' href = 'incident_details_pdf.php?report_id=<?php echo $report_id; ?>'> Download PDF </a>
									</div>
									<br/>
								<?php 
								while ($row = mysqli_fetch_assoc($result)) {
									$report_id = $row['report_id'];
								?>
									<span style = 'font-size:14px;background-color:orange;color:black;margin-top:10px;'> Incident ID: <b><?php echo $report_id; ?> </b><br/></span>
									<div style = 'margin-top:3px;'>
									<a style = 'text-decoration:none;color:yellow;font-weight:bold;' href = 'incident_details_pdf.php?report_id=<?php echo $report_id; ?>'> Download PDF </a>
									</div>
									<br/>
								<?php
								}
								?>
								</div>
							</li>
							
							
						<?php
									
					}
					}
					}
					
					else {
					
					?>
						<li>
							<div>
							<p style = 'color:red;font-size:17px;font-weight:bold'>No related incidents relating to the bullies you are currently monitoring!</p>
							</div>
							
						</li>
					<?php
					
					}
						?>
	 </ul>
	 </marquee>
	 <br/><br/>
	 </div>
	 <form method = "post" id = 'main' action="<?php echo $_SERVER['PHP_SELF']; ?>" >  
     
    <div class = "left">
      <div style = "color:white; font-size:20px; font-weight:bold"> How Severe were noticed incidents (if any)? </div>
      <span style = "color:lightblue; font-size:10px; font-weight:bold"> Not At All
      <input type="radio" name = 'intensity' value="0" checked/>
      <br/>
      General Teasing and Taunting (Name Calling)
      <input type="radio" name = 'intensity' value="1"/>
      <br/>
      General Social Exclusion
      <input type="radio" name = 'intensity' value="2"/>
      <br/>
      Teasing and Exclusion
      <input type="radio" name = 'intensity' value="3"/>
      <br/>
      Theft of (Damage to) Personal Property
      <input type="radio" name = 'intensity' value="4"/>
      <br/>
      Threatening and Harassment
      <input type="radio" name = 'intensity' value="5"/>
      <br/>
      Minor (Common) Assault
      <input type="radio" name = 'intensity' value="6"/>
      <br/>
      Combination of Teasing, Exclusion, Assault, Theft, etc.
      <input type="radio" name = 'intensity' value="7"/>
      <br/>
      Serious Assault (With Weapon, most likely)
      <input type="radio" name = 'intensity' value="8"/>
      <br/>
      Very Serious Violence (Suicide Catching, Maiming)
      <input type="radio" name = 'intensity' value="9"/>
      <br/>
      
      </span>
      
    </div>
      
      <div class = "left">
      <div style = "color:white; font-size:20px; font-weight:bold"> How Frequent were these incidents? </div>
      <span style = "color:lightblue; font-size:10px; font-weight:bold"> 
      
      Not At All
      <input type="radio" name = 'frequency' value="0" checked/>
      <br/>
      Only Once
      <input type="radio" name = 'frequency' value="2"/>
      <br/>
      Infrequently (a few times)
      <input type="radio" name = 'frequency' value="4"/>
      <br/>
      Regularly (several times)
      <input type="radio" name = 'frequency' value="6"/>
      <br/>
      Frequently (ongoing, almost daily/weekly)
      <input type="radio" name = 'frequency' value="8"/>
      <br/>
      
      </span>
	  
	  <br/>
      <span style = "color:white;font-weight:bold;font-size:17px;">Your Opinion Rating (0% - 100%): <span>
	  <br/>
        <output style = "color:lightblue" id="rating">
        ( 50% )
        </output>
      </h3>
      <input type="range" id = 'behavior' name = 'behavior_rating' value = "50" min="0" max="100" oninput="outputUpdate(value)"/>
      <script>
function outputUpdate(vol) {
	document.querySelector('#rating').value = "( "+vol+"% )";
}
</script>
<br/><br/><p style = 'color:red; font-weight:bold'>End Monitoring For This Bully? <input type = 'checkbox' name = 'ease' id = 'ease'></p>
    </div>
	<div class = "left">
    <h2 style = "color:black;"> Have Any Additional Comments? </h2>
    <textarea rows="5" cols="70" name = "comments" id = "comments" placeholder="Add Comments If you like..."></textarea>
    
    <br/><br/>
	</form>
    </promo>
 
  </div>
  <div class = 'left'>
<button id = "submit" name = "submit"  onclick = 'validation()'>Add Rating!</button>
</div>
</div>

   <br/>
  <br/>
</body>
</html>

<?php 
?>

<script>

<?php
	if (isset($_POST['view'])) {
		?>
		
		var tobedisplayed = document.getElementById('tobedisplayed');
		tobedisplayed.style.display = 'none';
		
	<?php
	$bully_id = $_POST['bully_id'];
	$js_labels = "";
	
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
	}	
	else {
		?>
		
		var graph = document.getElementById('myChart');
		graph.style.display = 'none';
		
	<?php
	}
?>

var month = [<?php echo $js_labels; ?>];
var bully = [<?php echo $js_data; ?>];

 var myConfig = {
    "graphset":[
        {
            "type":"bar3d",
            "title":{
                 "text":"Behavior Ratings For: <?php echo $bully_id ?>",
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
window.onload = function ()  {
zingchart.render({ 
	id : 'myChart', 
	data : myConfig, 
	height : "100%", 
	width: "100%"
}); 
}
</script>


<?php

}
?>
