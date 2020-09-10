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
<title>Bullies (Gender Based Report) Report</title>
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
		
        xmlhttp.open("GET","incident_teacher_info.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>
<script>
	
			function getGender(val) {
			$.ajax({
			type: "POST",
			url: "get_gender.php",
			data: val,
			success: function(data){
				$("#gender-list").html(data);
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

  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>INCIDENTS HANDLED BY SPECIFIC TEACHER REPORT</h1></div>
 

	   <h4 style = "color:black; margin-left:20px"> Choose Teacher ID:
        <select id = 'teacher-list' name = 'teacher_id' onChange="getTotal(this.value);" required>
          <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
	$query = "SELECT * FROM teacher WHERE posted_school_id = " . $location;
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Teacher...</option>
<?php
	foreach($results as $teacher) {
?>
	<option value="<?php echo $teacher["teacher_id"]; ?>"><?php echo $teacher["teacher_id"]; ?> | <?php echo $teacher["teacher_lname"]; ?>, <?php echo $teacher["teacher_fname"]; ?></option>
<?php
	}

?></select>
      </h4>
	<div id = "info">
	 
  </div>
  <br/>
   </div>
 
</form>
</body>
</html>
