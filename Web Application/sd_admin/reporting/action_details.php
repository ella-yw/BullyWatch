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
  
require_once("dbcontroller.php");
$db_handle = new DBController();

// Initial Country Select
$query ="SELECT * FROM country";
$results = $db_handle->runQuery($query);
?>
<!DOCYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Action Report</title>
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
        xmlhttp.open("GET","action_details_info.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script>
	function getAction(val) {
			$.ajax({
			type: "POST",
			url: "get_action.php",
			data:'school='+val,
			success: function(data){
				$("#report-list").html(data);
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

.logout {
	float:right;
	margin-right:10px	 
 }
</style>
</head>
<body>
<form method = "post" action="" >
  <promo>
   <a class = "logout" style = "float:right;margin-right:10px" onclick="<?php  ?>" href="master_reports.php">GO TO ANOTHER REPORT</a>
    
<br/>
  <div style = 'background-color: lightblue; width:100%; hieght:30px'><h1 style='text-align:center'>ACTION REPORT</h1></div><div class = "left">
 
    
  <h4 style = "color:black;margin-left:20px"> Choose School:
      <select id = 'school-list' name = 'school' onChange="getAction(this.value);" required>
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
	
    <h4 style = "color:black;margin-left:40px"> Choose Action ID:
      <select id = 'report-list' name = 'report_id' onChange="showInfo(this.value)" required>
        <option value = "">---</option>
      </select>
    </h4>
  </promo>
  </div>
  <br/>
  
  <promo>
    <div id="info"></div>
  </promo>
</form>
</body>
</html>

