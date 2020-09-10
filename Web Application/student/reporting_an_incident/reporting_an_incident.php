<?php
  	ob_start();
  session_start();
   if(  isset($_SESSION['login_status_student']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }

  $student_id =  $_SESSION['login_status_student'];
   
   
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
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

// Initial Country Select
$query ="SELECT * FROM country";
$results = $db_handle->runQuery($query);
?>

<!doctype html>

<html>

	<head>
		
		        
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
  
				<meta charset="utf-8">
		<title>Reporting An Incident</title>
		        
		
			    
		<style>
a { cursor: pointer; }
div#load_screen{
	display:none;
	opacity: 1;
	position: fixed;
    z-index:10;
	top: 0px;
	width: 100%;
	height: 1600px;
}
div#load_screen > div#loading{
	color:black;
	width:300px;
	height:300px;
	margin: 300px auto;
}
</style>		
			
		<style>
			a { cursor: pointer; }

			body {
		background: url(background.jpg) no-repeat fixed;
		background-size:100% 100%;
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		

	}

	select {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		

	}

	input[type=file] {
float: left;
margin: 0 auto;
width:200px;
margin-left:20px;
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
	article { float:left; margin-left:20px }
	



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
input[type=text] {
	width:200px;
}
        </style>
		<link href="../../css/font-awesome.min.css" rel="stylesheet" />
		<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>



  <script src="../../js/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../js/sweetalert/dist/sweetalert.css">

	<script>
		$.noConflict();
		function getGradebul(val) {
			jQuery.ajax({
			type: "POST",
			url: "get_grade.php",
			data: val,
			success: function(data){
				jQuery("#grade-list-bul").html(data);
			}
			});
		}
		function getStudentbul(val) {
			
			var school = document.getElementById('school-list-bul').value;
			
			jQuery.ajax({
			type: "POST",
			url: "get_student.php",
			data: 'grade=' + val + '&school='+school,
			success: function(data){
				jQuery("#student-list-bul").html(data);
			}
			});
		}
		function relocate() {
			location.href = '../index_student.php';
		}
		
	</script>

			<script>

function validation() {


var school = document.getElementById('school-list-bul').value;
var grade = document.getElementById('grade-list-bul').value;
var bully = document.getElementById('student-list-bul').value;
var type = document.getElementById('type').value;
var des = document.getElementById('des').value;

if (school == "") {

swal({
		title: "Unable to process input!",
		text: "Please choose the <b>bully's school</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
	
}
else if (grade == "") {

	swal({
		title: "Unable to process input!",
		text: "Please choose the <b>bully's grade</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
}
else if (bully == "") {

	swal({
		title: "Unable to process input!",
		text: "Please choose the <b>bully</b>!",
		type: "warning",
		confirmButtonColor: '#ff9933',
		confirmButtonText: 'Okay!',
		html: true
	});
}
else if (type == "") {
swal({
		title: "Unable to process input!",
		text: "Please choose the <b>type of bullying</b> that took place!",
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
						title: "Processing...",
						text: "Please wait, while your inputs are being processed.",
						type: "info",
						showConfirmButton: false
					});
				 }
			};
			xmlhttp.open("GET","reporting_an_incident_info.php?school="+school+"&grade="+grade+"&bully="+bully+"&type="+type+"&description="+des,true);
			xmlhttp.send(); 
			
	

	 var file_data = jQuery('#sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
                          
    jQuery.ajax({
                url: 'file_upload.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
					location.href = 'reporting_an_incident_backend.php';
                }
     });

	var main_screen = document.getElementById("main_screen");
	main_screen.style.display = 'none';
	
}

}

</script>
	</head>

	<body style="margin:0;" >


<div style="display:block;" id="myDiv" class="animate-bottom" id = 'main_screen'>
<div style = "position:relative; margin:0 auto; width: 800px; height:1180px; border:5px solid black ">
<a  class = "logout" onclick="relocate()" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/close.png' style='width:80px;'></a>
  <div style="text-align: center;">     
<br/><h1 style = "position:relative; text-align: center; color:	#00cdcd">
       				Reporting An Incident
       			 </h1>
				 <h3 style = "position:relative; text-align: center; color: blue">
       				Welcome: <?php 
								$query = "SELECT * FROM `student` JOIN `school` USING (school_id) JOIN `sd` USING (sd) JOIN `city` ON (city_id = city_name) JOIN `province` USING (province_id) JOIN `country` USING (country_id) WHERE student_id = ".$student_id.""; 
								  $results = mysqli_query($db, $query); 
								  $row = mysqli_fetch_assoc($results);
								  $country = $row['country_name'];
								  $province = $row['province_name'];
								  $city = $row['city_name'];
								  $sd = $row['sd'];
								  $victim_school_name = $row['school_id'] ." | ". $row['school_name'];
								  $victim_school_id = $row['school_id'];
								  $victim_grade = $row['student_grade'];
								  $student = $row['student_id'] . " | " . $row['student_lname'] . ", " . $row['student_fname'];
								  echo $row['student_lname'] . ", " . $row['student_fname'];
							 ?>
       			 </h3>
<h6 style = "text-align:center">Have experienced or been bullied? Don't worry, we are here for you, we'll sort it out. <br/>Just fill out the required info. and tell us what happened and action will be taken as soon as possible! <br/><span style = "color:pink; font-size:16px;">WARNING - If this is judged to be a fake complaint, disiplinary action will be taken against you.</span></h6>
				 </div>
		<form method = "post" action="" enctype="multipart/form-data">
        <div class = "head">
       
          
         <h3 style = "color:black; margin-left:40px">        
        	<label>Province:</label>
<input type = 'text' value = '<?php echo $province; ?>' disabled = 'disabled'>                
		</h3>
		  <h3 style = "color:black; margin-left:60px">        
        	City: &nbsp;&nbsp;&nbsp;
              	<input type = 'text' value = '<?php echo $city; ?>' disabled = 'disabled'>                

        </h3>
		
        <h3 style = "color:black ; margin-left:80px">        
        	SD: &nbsp;
              	<input type = 'text' value = '<?php echo $sd; ?>' disabled = 'disabled'>                

       </h3>
	   </div>
        
	  
	   
				  <article>
		<br/>
      
       <h4 style = "color:black;">        
        	Victim (Your) School:
              <input type = 'text' value = '<?php echo $victim_school_name; ?>' disabled = 'disabled'>                

       </h4>
       <h4 style = "color:black;">        
        	Victim (Your) Grade:&nbsp;
              	<input type = 'text' value = '<?php echo $victim_grade; ?>' disabled = 'disabled'>                

       </h4>
       <h4 style = "color:black;">        
        	Victim (You):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	 <input type = 'text' value = '<?php echo $student; ?>' disabled = 'disabled'>                
 </h4>
      
       
       </article>
       <article>
       <br/>
       <h4 style = "color:black;" id = 'bully_school'>        
        	Choose Bully School:
              	<select id = 'school-list-bul' name = 'bulschool' style = 'width:200px' onChange="getGradebul(this.value);" >
                <?php
                   $query ="SELECT * FROM school WHERE sd = '" . $sd . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="" selected = 'true' disabled='disabled'>Select School...</option>
<?php
	foreach($results as $school) {
?>
	<option value="<?php echo $school["school_id"]; ?>"><?php echo $school["school_id"]; ?> | <?php echo $school["school_name"]; ?></option>
<?php
	}

?>
				</select>
       </h4>
       
        <h4 style = "color:black;" >        
        	Choose Bully Grade:&nbsp;
              	<select id = 'grade-list-bul' name = 'bulgrade' style = 'width:200px' onChange="getStudentbul(this.value);" >
                </select>
       </h4>
       <h4 style = "color:black;" >        
        	Choose Bully: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              	<select id = 'student-list-bul' name = 'bully' style = 'width:200px' >
                </select>
      </h4>
       
       </article>
    	
        
       <br/><br/><br><br><br><br><br><br><br><br>
	   
      <div style = "margin-left:20px">
        <h4 style = "color:black;" class="type">        
        	Choose Bullying Type:
        
        <select name = "type" id = 'type'>
        	 <?php
		//**********************************************
		//SELECT from table and select
		//**********************************************
		
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM bullying_type ";
		$sql_statement .= "ORDER BY main_bullying_type ";
		
		$result = mysqli_query($db, $sql_statement); // code has ran
		
		if (!$result) //runs if there is error 
		{
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br><b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br><b>";
			$outputDisplay .= "<b><br>Failed SQL Statement`: ".$sql_statement."<br><b>";
		} 
		else //if code and syntax is ok
		{
			
			$numresults = mysqli_num_rows($result);
		echo "<option value='' selected='true' disabled='disabled'>Select Bullying Type...</option>";
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		
				echo "<option value='".$row['sub_bullying_type']."'>".$row['sub_bullying_type']."</option>";
			}
			
		}
			print $outputDisplay;
		
		?>
        </select>
        </h4>
		<br>
		<h4 style = "color:black;" class="type">        
        	Any Mental Illness:
        
        <select>
        	 <?php
		//**********************************************
		//SELECT from table and select
		//**********************************************
		
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM illness ";
		$sql_statement .= "ORDER BY id ASC;";
		
		$result = mysqli_query($db, $sql_statement); // code has ran
		
		if (!$result) //runs if there is error 
		{
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br><b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br><b>";
			$outputDisplay .= "<b><br>Failed SQL Statement`: ".$sql_statement."<br><b>";
		} 
		else //if code and syntax is ok
		{
			
			$numresults = mysqli_num_rows($result);
		echo "<option value='' selected='true' disabled='disabled'>Select Mental Illness...</option>";
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		
				echo "<option value='".$row['illness_name']."'>".$row['illness_name']."</option>";
			}
			
		}
			print $outputDisplay;
		
		?>
        </select>
        </h4>
		<br>
       <h2 style = "color:black;">        
        	Additional Media To Upload?
        </h2>
	 
	    <input type="file" name="uploaded_file" id="sortpicture"><br>
        <br/><br/>

        
        <h2 style = "color:black;">        
        	Optional Bullying Description <h5 style = "color:black;">(You can explain during the action meeting if not here)</h5>
        </h2>
         <textarea rows="8" cols="80" name = "description" id = 'des' placeholder="Enter Bullying Description Here..."></textarea>
        
        <br><br>
        </form>
        </div>
       <button id = "submit" name = "submit" onclick = 'validation()' style = 'margin-left:20px;'>Report Your Incident!</button>
     </div>
      
       
		</div>
    
	</body>
</html>
