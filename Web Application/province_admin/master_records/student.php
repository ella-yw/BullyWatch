<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	error_reporting(0);
session_start();
	   if(isset($_SESSION['login_status_location_province_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location =  $_SESSION['login_status_location_province_admin'];
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

?>

<html>
<head>
  <title>Student</title>
  <style>
	body {
		background: url(background.jpg) no-repeat fixed;
		background-size: 100% 100%;
	font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif; 
		color: red;
	}
	option {
		border-bottom: 1px dotted #010101;
	}
	

	#display_table {
		margin:0 auto;
		
	}
	
	#limit {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		width: 120px;
		height: 30px;
		border-radius: 7px;
		background-color: #cccc00;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#limit:hover {
		font-size: 20px;
		width: 170px;
		height: 45px;
		
	}
	
	a { cursor: pointer; text-decoration:none; font-weight:bold; color:purple}
	th {
		font-size: .8em;
	}

  </style>
  <script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>
    
  <script>
  
		function getSD(val) {
			$.ajax({
			type: "POST",
			url: "city-wise.php",
			data: 'city=' + val,
			success: function(data){
				$("#main").html(data);
			}
			});
			$.ajax({
			type: "POST",
			url: "get_sd.php",
			data: 'city=' + val,
			success: function(data){
				$("#sd-list").html(data);
			}
			});
		}
		function getSchool(val) {
			$.ajax({
			type: "POST",
			url: "sd-wise.php",
			data: 'sd=' + val,
			success: function(data){
				$("#main").html(data);
			}
			});
			$.ajax({
			type: "POST",
			url: "get_school.php",
			data: 'sd=' + val,
			success: function(data){
				$("#school-list").html(data);
			}
			});
		}
		function getGrade(val) {
			$.ajax({
			type: "POST",
			url: "school-wise.php",
			data: 'school_id=' + val,
			success: function(data){
				$("#main").html(data);
			}
			});
			$.ajax({
			type: "POST",
			url: "get_grade.php",
			data: val,
			success: function(data){
				$("#grade-list").html(data);
			}
			});
		}
		function getGradeWise(val) {
			var school = document.getElementById('school-list').value;
			
			$.ajax({
			type: "POST",
			url: "grade-wise.php",
			data: 'school_id=' + school + '&grade=' + val,
			success: function(data){
				$("#main").html(data);
			}
			});
			
		}
		
  </script>
</head>

<body >
<a  class = "logout" href = "master_records.php" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/open.png' style='width:80px;'></a>
<br/><br/><br/><br/>
<div>
	
	<form method = "post" action="" enctype="multipart/form-data">
        <div class = "head">
       
          
         <h4 style = "color:black; margin-left:10px">        
        	<label>Overall Results For:</label>
                    
					<?php
					$result = mysqli_query($db,"SELECT * FROM province WHERE province_id = '$location'");
					$row = mysqli_fetch_assoc($result);
					$province_name = $row['province_name'];
					?>
					<input type = 'text' value = '<?php echo $province_name; ?>' disabled = 'disabled'/>
                
          </h4>
		  
       <h2 style = "color:black; margin-left:20px">        
        	Filter By:
		</h2>
		<h4 style = "color:black; margin-left:40px">        
        	<label>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           
              	<select name = 'city' onChange="getSD(this.value);" style = 'width:200px;' required>
				<option value = '' selected="true" disabled="disabled">Select City...</option> 
					
                <?php
                $query ="SELECT * FROM city WHERE province_id = '" . $location . "'";
				$result = mysqli_query($db,$query);
				while ($row = mysqli_fetch_array($result)) {
					?>
						<option value = '<?php echo $row['city_name']; ?>'><?php echo $row['city_name']; ?></option> 
					<?php
				}
				?>
				</select>
				</h4>
				
				<h4 style = "color:black; margin-left:40px">        
        	<label>SD:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           
              	<select name = 'sd' id = "sd-list" onChange="getSchool(this.value);" style = 'width:200px;' required>
				<option value = ''></option> 
				</select>
				</h4>
				<h4 style = "color:black; margin-left:40px">        
        	<label>School:&nbsp;&nbsp;&nbsp;</label>
           
              	<select name = 'school' id = "school-list" onChange="getGrade(this.value);" style = 'width:200px;' required>
				<option value = ''></option> 
				</select>
				</h4>
				<h4 style = "color:black; margin-left:40px">        
        	<label>Grade:&nbsp;&nbsp;&nbsp;&nbsp;</label>
           
              	<select name = 'grade' id = "grade-list" onChange="getGradeWise(this.value);" style = 'width:200px;' required>
				<option value = ''></option> 
				</select>
				</h4>
	</form>
</div>
<div style = "width:100%; margin:0 auto;">	
  
	
  <div id = "display_table" style = "text-align:center">
    <div id = 'main'>
   	<?php
    //**********************************************
    //*
    //*  LIMIT FORM
    //*
    //**********************************************
    ?>
   <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div style = "color:blue" >
       <b><br><input id = "limit" type="submit" name="limit" value="Show: " /> &nbsp;&nbsp;
        # <input type='text' name='limit1' size='1' placeholder = "ALL" required/> row(s) from row #
        <input type='text' name='limit2'  size='1' placeholder = "1" required/> 
        </b>
    </div>  
    </form> 
    
    <?php
    //**********************************************
    //*
    //*  LIMIT PHP
    //*
    //**********************************************
    
  if (isset($_POST['limit']))
  {
    	if (!(empty($_POST['limit1'])) &&  (empty($_POST['limit2']))) {
		echo "<script> showlimit(); </script>";	
	}
        if (isset($_POST['limit1']))
        {
            $limit1 = $_POST['limit1'];
		}
        if (isset($_POST['limit2']))
        {
            $limit2 = $_POST['limit2'] - 1;
			if ($limit2 == -1) {
				$limit2++;
			}
		}
		
   }
   else {
		$limit1 = 100000000; 
		$limit2 = 0;  
   }
    
	
  	?>
	
    <?php 
	
	//**********************************************
    //*
    //*  DISPLAY AND DELETE PHP
    //*
    //**********************************************
    
    
    print "<form method='post' action=''>";
    
	    
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM student JOIN school USING (school_id) JOIN sd ON (school.sd=sd.sd) JOIN city ON (city_id=city_name) JOIN province USING (province_id)";
	$sql_statement .= "WHERE province_id = '".$location."'";
    $sql_statement .= "ORDER BY student_grade ASC "; 
	$sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
        $outputDisplay  = "<br/><h1>Students In: " . $province_name . "</h1>";
    
        $outputDisplay .= '<table  style="color: black;margin: 0 auto">';
        $outputDisplay .= '<tr>
		<th> &nbsp; ID &nbsp; </th>
		<th> &nbsp; Last Name &nbsp; </th>
		<th> &nbsp; Middle Name &nbsp; </th>
		<th> &nbsp; First Name &nbsp; </th>
		<th> &nbsp; Gender &nbsp; </th>
		<th> &nbsp; Parent Contact &nbsp; </th>
		<th> &nbsp; Parent Email &nbsp; </th>
		<th> &nbsp; Password &nbsp; </th>
		<th> &nbsp; Grade &nbsp; </th>
		</th><th> &nbsp; School ID &nbsp;</th>
		</tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
            
			$row = mysqli_fetch_array($result);
            $student_id    = $row['student_id'];
			$student_lname   = $row['student_lname'];
			$student_mname   = $row['student_mname'];
			$student_fname   = $row['student_fname'];
			$student_gender  = $row['student_gender'];
			$student_grade  = $row['student_grade'];
			$parent_contact  = $row['parent_contact'];
			$parent_email  = $row['parent_email'];
			$student_password  = $row['student_password'];
           	$school_id    = $row['school_id'];
            
			if ($student_grade == 5)
            {
               $outputDisplay .= "<tr style=\"background-color: #dcfff3;\">";
            } 
            elseif ($student_grade == 6) 
            {
               $outputDisplay .= "<tr style=\"background-color: #c3ffeb\">";
            }
            elseif ($student_grade == 7) 
            {
               $outputDisplay .= "<tr style=\"background-color: #abffe3\">";
            }
			elseif ($student_grade == 8) 
            {
               $outputDisplay .= "<tr style=\"background-color: #7dffd3\">";
            }
			elseif ($student_grade == 9) 
            {
               $outputDisplay .= "<tr style=\"background-color: #55fdc4\">";
            }
			elseif ($student_grade == 10) 
            {
               $outputDisplay .= "<tr style=\"background-color: #00FFA8\">";
            }
			elseif ($student_grade == 11) 
            {
               $outputDisplay .= "<tr style=\"background-color: #dac2ff\">";
            }
			elseif ($student_grade == 12) 
            {
               $outputDisplay .= "<tr style=\"background-color: #ccddff\">";
            }
			
             
               
            $outputDisplay .= "<td>".$student_id."</td>";
			$outputDisplay .= "<td>".$student_lname."</td>";
			$outputDisplay .= "<td>".$student_mname."</td>";
			$outputDisplay .= "<td>".$student_fname."</td>";
			
			$outputDisplay .= "<td>".$student_gender."</td>";
			
            $outputDisplay .= "<td>".$parent_contact."</td>";
			$outputDisplay .= "<td>".$parent_email."</td>";
			$outputDisplay .= "<td>".$student_password."</td>";
			$outputDisplay .= "<td>".$student_grade."</td>";
			
			$outputDisplay .= "<td>".$school_id."</td>";
            
            $outputDisplay .= "</tr>";
            
            }
            
       
        
        $outputDisplay .= "</table>";
        
    print $outputDisplay;
    
    ?>
    </div></div>
    </form>
      
    
    
    

</body>
</html>
