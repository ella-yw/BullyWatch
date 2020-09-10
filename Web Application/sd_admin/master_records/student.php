<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	   if(isset($_SESSION['login_status_location_sd_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location =  $_SESSION['login_status_location_sd_admin'];
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

?>

<html>
<head>
  <title>Student</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
  <script src="../../js/jquery.js"></script>
  <script src="../../js/jquery.maskedinput.min.js" type="text/javascript"></script>
  
  <script type = "text/javascript">

 jQuery(function($){ // 9 = [0-9], a = [a-z A-Z], * = [a-z A-Z 0-9]
   
   $(".date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
   $(".phone").mask("(999) 999-9999");
   $(".zip").mask("a9a 9a9");
   $(".phn").mask("9999 999 999");
   
   });

	
    function deletealert(student_id, student_lname, student_fname) {
		
		document.getElementById("del").innerHTML = "<br/><br/><b><mark style='text-align:center'>Student: "+student_lname+", "+student_fname+" ("+student_id+") has been successfully deleted!</mark></b><br/>";
		alert("Specified Student & All Associated Records Have Been Successfully Deleted!");
		
	}
	function addalert() {
		
		alert("Student Successfully Added!");
		
	}
	function updatealert() {
		
		alert("Student Successfully Updated!");
		
	}

    </script>
   
  <style>
	body {
		background: url(background.jpg) no-repeat fixed;
		background-size: 100% 100%;
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif; 
		color: red;
	}
	option {
		border-bottom: 1px dotted #010101;
	}
	#update_student {
		color:blue;
		float:left
	}
	#add_student {
		color:green;
		float:left
		
	}

	
	container {
		height: 1px;
		color: purple;
	}
	#submit {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif;
		width: 120px;
		height: 30px;
		border-radius: 7px;
		background-color: #00a7ff;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#submit:hover {
		font-size: 20px;
		width: 180px;
		height: 45px;
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
	#limit {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif;
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
	
	
  </style>
    <script>
  
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
        	<label>Overall Results For SD:</label>
                    
					<?php
					?>
					<input type = 'text' value = '<?php echo $location; ?>' disabled = 'disabled'/>
                
          </h4>
		  
       <h2 style = "color:black; margin-left:20px">        
        	Filter By:
		</h2>
		
				<h4 style = "color:black; margin-left:40px">        
        	<label>School:&nbsp;&nbsp;&nbsp;</label>
           
              	<select name = 'school' id = "school-list" onChange="getGrade(this.value);" style = 'width:200px;' required>
				<option value = '' selected="true" disabled="disabled">Select School...</option> 
					
                <?php
                $query ="SELECT * FROM school WHERE sd = '" . $location . "'";
				$result = mysqli_query($db,$query);
				while ($row = mysqli_fetch_array($result)) {
					?>
						<option value = '<?php echo $row['school_id']; ?>'><?php echo $row['school_id'] . ", " . $row['school_name']; ?></option> 
					<?php
				}
				?>
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

<div id = 'main'>    
  <div id = "del">
    </div>  
<div style = "margin:0 auto;width:100%;text-align:center">	
	<?php
    //**********************************************
    //*
    //*  FUNCTIONS
    //*
    //**********************************************
       
    
	function deletestudent($db, $student_id, $student_lname, $student_fname)
    {
       	
	    $sql = "DELETE FROM student\n";
    	$sql .= "WHERE student_id = '".$student_id."' ";
    
        $result = mysqli_query($db, $sql);  
        
		if ($result)
        {
           echo "<script> deletealert($student_id,'$student_lname', '$student_fname'); </script>";
		} else {
            $outputDisplay = "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
            $outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
            $outputDisplay .= "<b><br>SQL: ".$sql."<br></b>";
            $outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
        }
		 
    }
    
    function insertstudent($db, $student_lname_add, $student_mname_add, $student_fname_add, $student_gender_add, $student_grade_add, $parent_contact_add, $parent_email_add, $password_add, $school_id_add)
    {
    
        $statement 	= "INSERT INTO student  (`student_id`, `student_lname`, `student_mname`, `student_fname`, `student_gender`, `student_grade`, `parent_contact`, `parent_email`, `student_password`, `school_id`) ";
        $statement .= "VALUES (";
        $statement .= " NULL, '".$student_lname_add."', '".$student_mname_add."', '".$student_fname_add."'
		, '".$student_gender_add."', '".$student_grade_add."', '".$parent_contact_add."'
		, '".$parent_email_add."', '".$password_add."'
		, ".$school_id_add." ";
        $statement .= ")";
    
        $result = mysqli_query($db, $statement);
    
        if ($result)
        {
            return $student_id_add;
        } else {
            $errno = mysqli_errno($db);
    
            if ($errno == '1062') {
                echo "<p style='color: red'><b><mark>Student of ID - ".$student_id_add." is already in Table </mark> </b>";
            }
			elseif ($errno == '1452') {
				print "<mark>School ID: '".$school_id_add."', Not Found In Table</mark>";
			}
			else {
                echo("<b>MySQL No: ".mysqli_errno($db)."</b>");
                echo("<b>MySQL Error: ".mysqli_error($db)."</b>");
                echo("<b>SQL: ".$statement."</b>");
                echo("<b>MySQL Affected Rows: ".mysqli_affected_rows($db)."</b>");
            }
    
            return 'NotAdded';
        }
    
    
    }
    
    function updatestudent($db, $student_id, $student_lname, $student_mname, $student_fname, $student_gender, $student_grade, $parent_contact, $parent_email, $password, $school_id)
    {
    
        //First check if student_id exists
    
        $sql_statement  = "SELECT student_id ";
        $sql_statement .= "FROM student ";
        $sql_statement .= "WHERE student_id = '".$student_id."' ";
    
        $result = mysqli_query($db, $sql_statement);  // Run SELECT
    
        $numresults = mysqli_num_rows($result);
    
    
        // If student exists then Update the student Info
    
        if ($numresults > 0)
        {
    
            $statement 	= "UPDATE `student` ";
            $statement .= "SET `student_lname` = '".$student_lname."', ";
			$statement .= "`student_mname` = '".$student_mname."', ";
			$statement .= "`student_fname` = '".$student_fname."', ";
			$statement .= "`student_gender` = '".$student_gender."', ";
			$statement .= "`student_grade` = '".$student_grade."', ";
			$statement .= "`parent_contact` = '".$parent_contact."', ";
			$statement .= "`parent_email` = '".$parent_email."', ";
			$statement .= "`student_password` = '".$password."', ";
            $statement .= "`school_id` = '".$school_id."' ";
			$statement .= "WHERE `student_id` = '".$student_id."' ";
    
            $result = mysqli_query($db, $statement);
    		$errno = mysqli_errno($db);
			
            if ($result)
            {
                return $student_id;
            } 
			
			else {
                    
                if ($errno == '1452')
				{
					print "<mark>School ID: '".$school_id."', Not Found In Table</mark>";
				}
				else {
					echo("<b>MySQL No: ".mysqli_errno($db)."</b>");
					echo("<b>MySQL Error: ".mysqli_error($db)."</b>");
					echo("<b>SQL: ".$statement."</b>");
					echo("<b>MySQL Affected Rows: ".mysqli_affected_rows($db)."</b>");
				}
				return 'NotUpdated';
            }
        } else {
    
            return 'studentNotFound';
        }
    }
    
    ?>
	
    
	<?php
    
    //**********************************************
    //*
    //*  UPDATE PHP
    //*
    //**********************************************
    
	
    if (isset($_POST['changebutton']))
    {
    
        if (isset($_POST['student_id']))
        {
    -		$student_id = trim($_POST['student_id']);
		} else {
            $student_id = '';
        }
    	if (isset($_POST['student_lname']))
        {
    -		$student_lname = trim($_POST['student_lname']);
			$student_lname = strtolower($student_lname);
			$student_lname = ucfirst($student_lname);
        } else {
            $student_lname = '';
        }
		if (isset($_POST['student_mname']))
        {
    -		$student_mname = trim($_POST['student_mname']);
			$student_mname = strtolower($student_mname);
			$student_mname = ucfirst($student_mname);
        } else {
            $student_mname = '';
        }
		if (isset($_POST['student_fname']))
        {
    -		$student_fname = trim($_POST['student_fname']);
			$student_fname = strtolower($student_fname);
			$student_fname = ucfirst($student_fname);
        } else {
            $student_fname = '';
        }
		if (isset($_POST['student_gender']))
        {
            $student_gender = trim($_POST['student_gender']);
        } else {
            $student_gender = '';
        }
		if (isset($_POST['student_grade']))
        {
            $student_grade = trim($_POST['student_grade']);
        } else {
            $student_grade = '';
        }
		if (isset($_POST['parent_contact']))
        {
            $parent_contact = trim($_POST['parent_contact']);
        } else {
            $parent_contact = '';
        }
		if (isset($_POST['parent_email']))
        {
            $parent_email = trim($_POST['parent_email']);
        } else {
            $parent_email = '';
        }
		if (isset($_POST['school_id']))
        {
    		$school_id = trim($_POST['school_id']);
        } else {
            $school_id = '';
        }
		
		$query = "SELECT * FROM student WHERE student_id = ".$student_id."";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_assoc($result);
		$password = $row['student_password'];
		
		            
            $rtninfo = updatestudent($db, $student_id, $student_lname, $student_mname, $student_fname, $student_gender, $student_grade, $parent_contact, $parent_email, $password, $school_id);
    
            if ($rtninfo == "studentNotFound")
            {
                print "<p style='color: red'><b><mark>Student Not Found - Check Student ID</p><br/></mark></b>";
            } else {
                if ($rtninfo == "NotUpdated")
                {
                    print "<p style='color: red'><b><mark>Student Not Updated</p><br/></mark></b>";
                } else {
                    print "<p style='color: blue'><mark><b>Student - $student_lname, $student_fname in school, $school_id (ID) has been successfully updated!</b><br/></mark>";
					echo "<script> updatealert(); </script>";
					 echo "<script> location.href = 'student.php'; </script>";
				}
            }
        
    }
    
    ?>
    <?php
    //**********************************************
    //*
    //*  ADD PHP
    //*
    //**********************************************
   
   
    if (isset($_POST['addbutton']))
    {
    
    	if (isset($_POST['student_lname_add']))
        {
    -		$student_lname_add = trim($_POST['student_lname_add']);
			$student_lname_add = strtolower($student_lname_add);
			$student_lname_add = ucfirst($student_lname_add);
        } else {
            $student_lname_add = '';
        }
		if (isset($_POST['student_mname_add']))
        {
    -		$student_mname_add = trim($_POST['student_mname_add']);
			$student_mname_add = strtolower($student_mname_add);
			$student_mname_add = ucfirst($student_mname_add);
        } else {
            $student_mname_add = '';
        }
		if (isset($_POST['student_fname_add']))
        {
    -		$student_fname_add = trim($_POST['student_fname_add']);
			$student_fname_add = strtolower($student_fname_add);
			$student_fname_add = ucfirst($student_fname_add);
        } else {
            $student_fname_add = '';
        }
		if (isset($_POST['student_gender_add']))
        {
            $student_gender_add = trim($_POST['student_gender_add']);
        } else {
            $student_gender_add = '';
        }
		if (isset($_POST['student_grade_add']))
        {
            $student_grade_add = trim($_POST['student_grade_add']);
        } else {
            $student_grade_add = '';
        }
		if (isset($_POST['parent_contact_add']))
        {
            $parent_contact_add = trim($_POST['parent_contact_add']);
        } else {
            $parent_contact_add = '';
        }
		if (isset($_POST['parent_email_add']))
        {
            $parent_email_add = trim($_POST['parent_email_add']);
        } else {
            $parent_email_add = '';
        }
		$school_id_add = $_POST['school_id_add'];
		$password_add = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5);
                    
            $rtninfo = insertstudent($db, $student_lname_add, $student_mname_add, $student_fname_add, $student_gender_add, $student_grade_add, $parent_contact_add, $parent_email_add, $password_add, $school_id_add);
        
       if ($rtninfo == "NotAdded")
            {
                print "<p style='color: red'><b><mark>Student Not Added</p></mark><b>";
            } else {
                print "<p style='color: blue'><b><mark><b>Student - $student_lname_add, $student_fname_add in school, $school_id_add (ID) has been successfully added!</b><br/></mark><b>";
				print "<p style = 'color:blue;'><b>Student Password Generated:</b><br/>
            				<input type='text' disabled = 'disabled' value = $password_add name='student_phn' size='12'/><br/><br/></p>";
				echo "<script> addalert(); </script>";
				 echo "<script> location.href = 'student.php' </script>";
			}
       
    }
    ?>
	<?php
    //**********************************************
    //*
    //*  UPDATE FORM
    //*
    //**********************************************
    ?>
  
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    
    <div id='update_student' style = "margin:0 auto;width:50%;text-align:center">
        
        <h1>Update Student</h1>
        
        <p>Enter Student's ID:<br>
            <input type='number' name='student_id' placeholder = "50,000+" min = "50001" size='11'required/>
        </p>
        <p>New Student Last Name:<br>
            <input type='text' name='student_lname'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New Student Middle Name:<br>
            <input type='text' name='student_mname'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
         <p>New Student First Name:<br>
            <input type='text' name='student_fname'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New Student Gender:<br>
            <select name = "student_gender">
            	<option value = "Male">Male</option>
                <option value = "Female">Female</option>
                <option value = "Other...">Other...</option>
            </select>
        </p>
       <p>New Student Grade:<br>
            <select name = "student_grade">
            	<option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
            </select>
        </p>
       <p>New Parent Contact:<br>
            <input type='text' class = "phone"  name='parent_contact' placeholder = "(XXX) XXX-XXXX" size='20'required/>
        </p>
        <p>New Parent Email:<br>
            <input  type='email' placeholder = "XXXXXXXX@XXX.XXX" name='parent_email' size='20'required/>
        </p>
        
      	<p>School ID:<br>
                 <?php
		//**********************************************
		//SELECT from table and select
		//**********************************************
		
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM school ";
		$sql_statement .= "WHERE sd = ".$location." ";
		$sql_statement .= "ORDER BY school_id ";
		
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
			$outputDisplay  = " <select name = 'school_id' size = '1'>";
		
			$numresults = mysqli_num_rows($result);
		
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		
				$outputDisplay .= "<option value='".$row['school_id']."'>".$row['school_id'].", ".$row['school_name']."</option>";
			}
			$outputDisplay .= "</select>";
		
		}
			print $outputDisplay;
		
		?>
        
        
        </p>
        <br><span><input id = "submit" type="submit" name="changebutton" value="Change Student" /></span><br/><br/>
    
    </form>
      
    
    
    </div>  <!-- End update_student DIV -->
    
   <?php
    //**********************************************
    //*
    //*  ADD FORM
    //*
    //**********************************************
    ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    
    <div id='add_student' style = "margin:0 auto;width:50%;text-align:center">
        
        <h1>Add Student</h1>
        
       
        <p>Enter Student Last Name:<br>
            <input type='text' name='student_lname_add'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>Enter Student Middle Name:<br>
            <input type='text' name='student_mname_add'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
         <p>Enter Student First Name:<br>
            <input type='text' name='student_fname_add'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>Enter Student Gender:<br>
            <select name = "student_gender_add">
            	<option value = "Male">Male</option>
                <option value = "Female">Female</option>
                <option value = "Other...">Other...</option>
            </select>
        </p>
       <p>Enter Student Grade:<br>
            <select name = "student_grade_add">
            	<option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
                <option value = "6">6</option>
                <option value = "7">7</option>
                <option value = "8">8</option>
                <option value = "9">9</option>
                <option value = "10">10</option>
                <option value = "11">11</option>
                <option value = "12">12</option>
            </select>
        </p>
       <p>Enter Parent Contact:<br>
            <input type='text' class = "phone"  placeholder = "(XXX) XXX-XXXX" name='parent_contact_add' size='20'required/>
        </p>
        <p>Enter Parent Email:<br>
            <input  type='email' placeholder = "XXXXXXXX@XXX.XXX" name='parent_email_add' size='20'required/>
        </p>
        
      	<p>School ID:<br>
                 <?php
		//**********************************************
		//SELECT from table and select
		//**********************************************
		
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM school ";
		$sql_statement .= "WHERE sd = ".$location." ";
		$sql_statement .= "ORDER BY school_id ";
		
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
			$outputDisplay  = " <select name = 'school_id_add' size = '1'>";
		
			$numresults = mysqli_num_rows($result);
		
						
			for ($i = 1; $i <= $numresults; $i++)
			{
				$row = mysqli_fetch_array($result);
		
				$outputDisplay .= "<option value='".$row['school_id']."'>".$row['school_id'].", ".$row['school_name']."</option>";
			}
			$outputDisplay .= "</select>";
		
		}
			print $outputDisplay;
		
		?>
        
        
        </p>
        <br><span><input id = "submit" type="submit" name="addbutton" value="Add Student" /></span><br/><br/><br/><br/><br/><br/>
   </form>
  
    </div>
<div id = "display_table" style = "margin:0 auto;width:100%;text-align:center;">
   	
	<?php
    //**********************************************
    //*
    //*  LIMIT FORM
    //*
    //**********************************************
    ?>
   <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div style = "color:blue" >
       <b><br/><br/><br><input id = "limit" type="submit" name="limit" value="Show: " /> &nbsp;&nbsp;
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
		}
		
   }
   else {
		$limit1 = 10000000; 
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
    $sql_statement .= "FROM student JOIN school USING (school_id) WHERE school.sd = $location ";
    $sql_statement .= "ORDER BY student_grade ASC "; 
	$sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
    
    if (!$result) {
        $outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
        $outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
        $outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
        $outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
    } else {
    
    $outputDisplay  = "<br/><h1>Student Table Data</h1>";
    
        $outputDisplay .= '<table style="color: black;margin: 0 auto;text-align:center">';
        $outputDisplay .= '<tr>
		<th>  Delete? &nbsp; </th>
		<th>  ID &nbsp; </th>
		<th>  Last Name &nbsp; </th>
		<th>  Middle Name &nbsp; </th>
		<th>  First Name &nbsp; </th>
		<th>  Gender &nbsp; </th>
		<th>  Parent Contact &nbsp; </th>
		<th>  Parent Email &nbsp; </th>
		<th>  Password &nbsp; </th>
		<th>  Grade &nbsp; </th>
		</th><th> School ID &nbsp;</th>
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
               $outputDisplay .= "<tr style=\"background-color: #ffffff;\">";
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
               $outputDisplay .= "<tr style=\"background-color: #ccaaff\">";
            }
			elseif ($student_grade == 11) 
            {
               $outputDisplay .= "<tr style=\"background-color: #00FFA8\">";
            }
			elseif ($student_grade == 12) 
            {
               $outputDisplay .= "<tr style=\"background-color: #ccddff\">";
            }
			
            if (isset($_POST[$student_id]))
            {
                $checked = $_POST[$student_id];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                deletestudent($db, $student_id, $student_lname, $student_fname);
            } else {
            $outputDisplay .= "<td><input type='checkbox' name='".$student_id."' value='Y'/></td>";
                
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
            
        }
        
        $outputDisplay .= "</table>";
        $outputDisplay .= '<br/><input id = "delete" type="submit" value="Delete Student(s)"/> <br/>';
		
    }
		print $outputDisplay;
    ?>
    </div>
    </form>
      
    </div></div>
    
    

</body>
</html>
