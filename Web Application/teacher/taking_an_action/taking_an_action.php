<?php
 ob_start();
  session_start();
   if(  isset($_SESSION['action_taking']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
  
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
<title>Take An Action</title>

<script src="../../js/jquery-2.1.1.min.js" type="text/javascript"></script>
<link href="../../css/font-awesome.min.css" rel="stylesheet" />
    
  <script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">
<?php require_once("dbcontroller.php");
$db_handle = new DBController(); ?>
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
                document.getElementById("info").innerHTML = xmlhttp.responseText + "";
            }
        };
		xmlhttp.open("GET","action_taking_info.php?q="+str,true);
        xmlhttp.send();
    }
}
function relocate() {
			location.href = '../index_teacher.php';
		}

function validation() {


var vicissue = document.getElementById('vicissue').value;
var bulissue = document.getElementById('bulissue').value;
var vicact = document.getElementById('vicact').value;
var bulact = document.getElementById('bulact').value;
var fake = document.getElementById('fake');
if (fake.checked == true)
    {
        var fake = 'YES';
    }
	else {
		var fake = '';
	}
var monitoring = document.getElementById('monitoring');
if (monitoring.checked == true)
    {
        var monitoring = 'YES';
    }
	else {
		var monitoring = '';
	}
var parents = document.getElementById('parents');
if (parents.checked == true)
    {
        var parents = 'YES';
    }
	else {
		var parents = '';
	}
var ease = document.getElementById('ease');
if (ease.checked == true)
    {
        var ease = 'YES';
    }
	else {
		var ease = '';
	}
var report_id = document.getElementById('report_id').value;

if (report_id == "") {

swal({
		title: "Unable to process input!",
		text: "Please choose the <b>Report ID</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	
}
else if (vicissue == "") {

swal({
		title: "Unable to process input!",
		text: "Please choose the <b>victim's issue</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	
}
else if (bulissue == "") {

	swal({
		title: "Unable to process input!",
		text: "Please choose the <b>bully's issue</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
}
else if (vicact == "") {

	swal({
		title: "Unable to process input!",
		text: "Please choose the <b>action for victim</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
}
else if (bulact == "") {
swal({
		title: "Unable to process input!",
		text: "Please choose the <b>action for bully</b>!",
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
			 
							swal({
						title: "Processing...",
						text: "Please wait, while your inputs are being processed.",
						type: "info",
						showConfirmButton: false
					});
					if (xmlhttp.responseText != '') {
					location.href = 'taking_an_action_backend.php?toomanybullies=true'; 
					}
					else {
						location.href = 'taking_an_action_backend.php?toomanybullies=false'; 
					}
				 }
			};
			xmlhttp.open("GET","action_taking_info_main.php?vicissue="+vicissue+"&bulissue="+bulissue+"&vicact="+vicact+"&bulact="+bulact+"&fake="+fake+"&monitoring="+monitoring+"&parents="+parents+"&ease="+ease+"&report_id="+report_id,true);
			xmlhttp.send(); 
			
	

	var main_screen = document.getElementById("main_screen");
	main_screen.style.display = 'none';
	
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
.table td,th
{
	padding:20px;
	border: solid #9fa8b0 1px;
	border-collapse:collapse;
}
html {
	background: url(background.jpg)  no-repeat fixed;
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
 input[type=text] {
	width:200px;
}

</style>
</head>
<body style="margin:0;" >
<div style="display:block;" id="myDiv" class="animate-bottom" id = 'main_screen'>
<div style = "position:relative; margin:0 auto; width: 800px; height:1310px; border:5px solid black ">
<a  class = "logout" onclick="relocate()" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/close.png' style='width:80px;'></a>
  <div style="text-align: center;">     
<br/><h1 style = "position:relative; text-align: center; color: #00eeee">
       				Taking An Action
       			 </h1>
				 <h3 style = "position:relative; text-align: center; color: blue">
       				Welcome: <?php 
								  
								  $query = "SELECT * FROM `teacher` JOIN assign_incident USING (teacher_id) JOIN `school` ON (posted_school_id = school_id) JOIN `sd` ON ( school.sd = sd.sd ) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE teacher_id = ".$teacher_id.""; 
								  $results = mysqli_query($db, $query); 
								  $row = mysqli_fetch_assoc($results);
								  $country = $row['country_name'];
								  $province = $row['province_name'];
								  $city = $row['city_name'];
								  $sd = $row['sd'];
								  $school_id = $row['school_id'];
								  $school_name = $row['school_id'] ." | ". $row['school_name'];
								  $teacher = $row['teacher_id'] . " | " . $row['teacher_lname'] . ", " . $row['teacher_fname'];
								 			 
								 echo $row['teacher_lname'] . ", " . $row['teacher_fname'];
								 
								  ?>
       			 </h3>
				 <h5 style = "text-align:center">We are very glad you are here to take an action on bullying incident(s) assigned to you. <br/>While taking the action make sure you take into acount all the <span style = "color:pink">media </span>and <span style = "color:pink">incident details</span> provided to you. <br/>
				 </div>
		<form method = "post" action="" >
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
	
    <h3 style = "color:black ; margin-left:100px">        
        	School:&nbsp;
              	<input type = 'text' value = '<?php echo $school_name; ?>' disabled = 'disabled'>                

       </h3>
  
    <h3 style = "color:black ; margin-left:120px"> Choose Report ID:
      	<select name="report_id" id = 'report_id' onchange = 'showInfo(this.value)'>
				  <?php
					$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$report_id_feild = $row['current_incident'];
					
					$incident_array = explode(", ", $report_id_feild);
					
					$first = $incident_array[0];
					
					foreach ($incident_array as $incident) {
						
						?>
						<option value = '<?php echo $incident; ?>'><?php echo $incident; ?></option>
						<?php
					}
					?>
        </select>
		<?php 
		
		?>
    </h3>
 
  <div id = 'info'>
  <?php


$sql="SELECT * FROM incident_reporting JOIN un_incident_reporting_victim USING(report_id) JOIN `un_incident_reporting_bully` USING (report_id) WHERE report_id = '$first'";
$result = mysqli_query($db,$sql);
echo "<br/><h2 style = 'text-align:center'>Brief Incident Details</h2>";
	
echo "<table >
<tr style = 'background-color: yellow'>
<th >Victim</th>
<th>Bully</th>
<th>Victim School</th>
<th>Bully School</th>
<th>Bullying Type</th>
<th>Description</th>
<th>Reporting Date</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr style = 'background-color: orange'>";
    echo "<td>" . $row['victim_id'] . "<br/>" . $row['victim_lname'] . ", " .$row['victim_fname']. "</td>";
echo "<td>" . $row['bully_id'] . "<br/>" . $row['bully_lname'] . ", " .$row['bully_fname']. "</td>";
    echo "<td>" . $row['victim_school_name'] . "</td>";
    echo "<td>" . $row['bully_school_name'] . "</td>";
    echo "<td>" . $row['bullying_type'] . "</td>";
    echo "<td>" . $row['bullying_description'] . "&nbsp;</td>";
    echo "<td>" . $row['report_date'] . "</td>";
    echo "</tr>";
}
$bully = $row['bully_id'];
echo "</table>";
?>
<?php
	$sql="SELECT * FROM file WHERE report_id = $first";
	$result_set=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result_set);
	if ($row == "") {
		echo "<h2 style = 'text-align:center'>No Media Provided</h2>";
	}
	else {
		$sql="SELECT * FROM file WHERE report_id = $first";
		$result_set=mysqli_query($db,$sql);
		echo "<table class = 'table'>";
		echo "<h2 style = 'text-align:center'>Media Provided</h2>";
		?>
			<tr style = "background-color: pink; color:white">
			<th>File Name</th>
			<td>File Type</th>
			<th>File Size (KB)</th>
			<th>Download</th>
			</tr>
		<?php
		while($row = mysqli_fetch_array($result_set))
		{
		?>
			
			<tr style = "background-color: green; color:white">
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['mime'] ?></td>
			<td><?php echo $row['size'] ?></td>
			<td><a href="get_file.php?report_id=<?php echo $row['report_id']; ?>">Download Provided Media</a></td>
			</tr>
			<?php
		}
		echo "</table>";
	}
	?>
 <promo class = 'left'><b><br/><span style='font-size:17px;'>Victim's Issue </b><br/> <textarea name = 'vicissue' id = 'vicissue' rows="7" placeholder="Enter Victim's Issue Here..."></textarea><br/><b><span style='font-size:17px;'>Bully's Issue </b><br/> <textarea name = 'bulissue' id = 'bulissue' rows="7" placeholder="Enter Bully's Issue Here..."></textarea></promo>        <promo class = 'left'><b><br/><span style='font-size:17px;'>Action For Victim </b><br/> <textarea name = 'vicact' id = 'vicact' rows="7" placeholder="Enter Victim's Action Here..."></textarea><br/><b><span style='font-size:17px;'>Action For Bully </b><br/> <textarea name = 'bulact' id = 'bulact' rows="7" placeholder="Enter Bully's Action Here..."></textarea></promo>       <promo class = 'left_two'>    <br/><br/>   <p style = 'color:red; font-weight:bold'>Is it a Fake complaint? <input type = 'checkbox' name = 'fake' id = 'fake' value = 'YES'> </promo> </p> <p style = 'color:orange; font-weight:bold'>Does Bully nees to be monitored by you? <input type = 'checkbox' name = 'monitoring' id = "monitoring" value = 'YES'></p> <p style = 'color:blue; font-weight:bold'>Were Parents Notified? <input type = 'checkbox' name = 'parents' id = 'parents' value = 'YES'></p> <p style = 'color:purple; font-weight:bold'>Has this incident been fully eased/resolved? <input type = 'checkbox' name = 'ease' id = 'ease' value = 'YES'></p></promo><br/><br/> 
  </div>
  </form> 
  </div>
  <button style = 'margin-left:50px' name = 'submit' id = 'submit' onclick='validation()'>Save Action!</button> <br/><br/>

  

</body>
</html>
