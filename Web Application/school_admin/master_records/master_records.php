<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	   if(isset($_SESSION['login_status_location_school_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location =  $_SESSION['login_status_location_school_admin'];

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		
		<title>Master Data Records</title>
			
			
		<style>
			body {
		background: url(background.jpg) no-repeat fixed;
		background-size: 100% 100%;
		font-family:verdana; 
		color: red;
	}
			option { 
				border-bottom: .5px dotted #000; 
				}
				.select {
					display: block;
					 margin: auto;
					 font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', serif;
					 padding: 5px 5px 5px 5px;
					}
					#good{
					border: 2px solid green;
					text-align: center;
					background-color: lightgreen;
				}
					#delete {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif;
		width: 120px;
		height: 30px;
		border-radius: 7px;
		background-color: #00cc00;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#delete:hover {
		font-size: 20px;
		width: 180px;
		height: 45px;
	}
    	</style>
	</head>
	
    <body>
	         <a style = "float:right; color:blue; text-decoration:none; cursor:pointer;" href="../index_admin.php"><img src='../../img_project/close_cross.png' style="width:70px;margin:0 auto"/></a>
		<br/><br/><br/><br/><br/><br/>
			  <div style = "text-align:center; font-size:25px; color:purple;font-weight:bold">
             	Master Forms:
             </div>
			 </b>
             <br/><br/>
			 <form>
            
               <select id = 'all_tables' class = "select" size="2" style='width:150px;'>
                <optgroup label="Please Select :-">
                <option style = "border: none" value = 'student.php'>Students</option>
                
            
           </select>
          
          </form>
        <script type="text/javascript">
			var selectmenu=document.getElementById("all_tables");
				
			selectmenu.onchange = function(){ //run some code when "onchange" event fires
			 	var chosenoption = this.options[this.selectedIndex]; //gets values(urls') of the options
			 	if (chosenoption.value!="nothing"){
			  		location.href = ''+chosenoption.value+''; //opens target site (based on option's value attr) in new window
					
				}
			}
		</script>
		<div style = 'margin:0 auto; text-align:center;align:center'><br/><br/><br/>
		<form action = "" method = "POST">
		<div style = "text-align:center; font-size:18px; color:blue;font-weight:bold">
             	Change Teacher Grade:
             </div>
		<p style = 'color:blue'>Choose Teacher<br>
                 <?php
		//**********************************************
		//SELECT from table and select
		//**********************************************
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
	
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM teacher ";
		$sql_statement .= "WHERE posted_school_id = ".$location." ";
		$sql_statement .= "ORDER BY teacher_id ";
		
		$result = mysqli_query($db, $sql_statement); // code has ran
		$outputDisplay = ""; //printed at the end
		
		if (!$result) //runs if there is error 
		{
			$outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br><b>";
			$outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br><b>";
			$outputDisplay .= "<b><br>Failed SQL Statement`: ".$sql_statement."<br><b>";
		} 
		else //if code and syntax is ok
		{
			$outputDisplay  = " <select name = 'teacher_id' size = '1' required>";
		
			$numresults = mysqli_num_rows($result);
		
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		
				$outputDisplay .= "<option value='".$row['teacher_id']."'>".$row['teacher_id']." | ".$row['teacher_lname'].", ".$row['teacher_fname']."</option>";
			}
			$outputDisplay .= "</select>";
		
		}
			print $outputDisplay;
		?>
		<p style = 'color:blue' >Choose Grade<br>
		<select name = 'grade' size = '1' required>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
		</select>
		<br/><br/>
		<input id = "delete" type="submit" name = "submit" value="Update Teacher"/>
		</form>
</div>
        <?php
			if (isset($_POST['submit'])) {
				
				$teacher = $_POST['teacher_id'];
				$grade = $_POST['grade'];
				
				$query = "SELECT * FROM teacher WHERE teacher_id = $teacher";
				$result = mysqli_query($db,$query);
				$row = mysqli_fetch_assoc($result);
				
				$teacher_name = $row['teacher_lname'] . ", " . $row['teacher_fname'];
				$query = "UPDATE teacher SET teacher_grade = $grade WHERE teacher_id = $teacher";
				$result = mysqli_query($db,$query);
				if ($result) {
					echo "<script> alert('Teacher - $teacher_name has been successfully updated'); </script>";
				}
				
				
			}
			
			
		?>
            
           	
</body>
</html>
