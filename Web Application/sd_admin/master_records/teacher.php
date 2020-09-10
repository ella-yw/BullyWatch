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
  <title>Teacher</title>
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

	function open_master_records(){			 
		window.open ('master_records.php', 'newwindow', 'height=600px, width=300px', 'menubar=no');
	}
    function deletealert(teacher_id, teacher_lname, teacher_fname) {
		
		document.getElementById("del").innerHTML = "<br/><br/><b><div style='text-align:center'><mark>Teacher: "+teacher_lname+", "+teacher_fname+" ("+teacher_id+") has been successfully deleted!</mark></div></b><br/>";
		alert("Specified Teacher & All Associated Records Have Been Successfully Deleted!");
		
	}
	function addalert() {
		
		alert("Teacher Successfully Added!");
		
	}
	function updatealert() {
		
		alert("Teacher Successfully Updated!");
		
	}

    </script>

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
	#update_teacher {
		color:blue;
		float:left;
	}
	#add_teacher {
		margin-left:30px;
		color:green;
		float:left;
		
	}

	container {
		height: 1px;
		color: purple;
	}
	#submit {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
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
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
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
	#note {
		color:orange;
		font-size:10.5px;	
	}
	#note2 {
		color:purple;
		font-size:10.5px;	
	}
	a { cursor: pointer; text-decoration:none; font-weight:bold; color:purple}
	th {
		font-size: .8em;
	}

  </style>
      <script>
  
		function getGrade(val) {
			$.ajax({
			type: "POST",
			url: "school-wise.php",
			data: 'school_id_teacher=' + val,
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
			data: 'school_id_teacher=' + school + '&grade_teacher=' + val,
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

<div id = 'main'>   <div id = "del">
    </div>
<div style = "margin-left:10px;">	
    
    <?php
    //**********************************************
    //*
    //*  FUNCTIONS
    //*
    //**********************************************
       
    
	function deleteteacher($db, $teacher_id, $teacher_lname, $teacher_fname)
    {
       	
	    $sql = "DELETE FROM teacher\n";
    	$sql .= "WHERE teacher_id = ".$teacher_id." ";
		$result = mysqli_query($db, $sql);  
        $statement .= "DELETE FROM assign_incident WHERE teacher_id = ".$teacher_id."";
		 $result = mysqli_query($db, $statement);
        
		if ($result)
        {
           echo "<script> deletealert($teacher_id,'$teacher_lname', '$teacher_fname'); </script>";
		} else {
            $outputDisplay = "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
            $outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
            $outputDisplay .= "<b><br>SQL: ".$sql."<br></b>";
            $outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
        }
		 
    }
    
    function insertteacher($db, $teacher_id_add, $teacher_lname_add, $teacher_fname_add, $teacher_gender_add, $teacher_grade_add, $teacher_role_add, $email_add, $password_add, $posted_school_id_add) {
    
        $statement 	= "INSERT INTO `teacher`(`teacher_id`, `teacher_lname`, `teacher_fname`, `teacher_gender`, `teacher_grade`, `teacher_role`, `teacher_email`, `teacher_password`, `posted_school_id`) ";
        $statement .= "VALUES (";
        $statement .= " '".$teacher_id_add."', '".$teacher_lname_add."', '".$teacher_fname_add."', '".$teacher_gender_add."'
		, '".$teacher_grade_add."', '".$teacher_role_add."'
		, '".$email_add."', '".$password_add."', '".$posted_school_id_add."'";
        $statement .= ") ";
    
        $result = mysqli_query($db, $statement);
		
		$statement 	= "INSERT INTO `assign_incident`(`teacher_id`) ";
        $statement .= "VALUES (";
        $statement .= " '".$teacher_id_add."'";
        $statement .= ") ";
		 $result = mysqli_query($db, $statement);
		
		
        if ($result)
        {
            return $teacher_id_add;
        } else {
            $errno = mysqli_errno($db);
    
            if ($errno == '1062') {
                echo "<p style='color: red'><b><mark>Teacher of ID - ".$teacher_id_add." is already in Table </mark> </b>";
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
    
    function updateteacher($db, $teacher_id, $teacher_lname, $teacher_fname, $teacher_gender, $teacher_grade, $teacher_role, $email, $password, $posted_school_id)
    {
    
        //First check if teacher_id exists
    
        $sql_statement  = "SELECT teacher_id ";
        $sql_statement .= "FROM teacher ";
        $sql_statement .= "WHERE teacher_id = '".$teacher_id."' ";
    
        $result = mysqli_query($db, $sql_statement);  // Run SELECT
    
        $numresults = mysqli_num_rows($result);
    
    
        // If teacher exists then Update the teacher Info
    
        if ($numresults > 0)
        {
    
            $statement 	= "UPDATE `teacher` ";
            $statement .= "SET `teacher_lname` = '".$teacher_lname."', ";
			$statement .= "`teacher_fname` = '".$teacher_fname."', ";
			$statement .= "`teacher_gender` = '".$teacher_gender."', ";
			$statement .= "`teacher_grade` = '".$teacher_grade."', ";
			$statement .= "`teacher_role` = '".$teacher_role."', ";
		    $statement .= "`teacher_email` = '".$email."', ";
            $statement .= "`teacher_password` = '".$password."', ";
			$statement .= "`posted_school_id` = '".$posted_school_id."' ";
			$statement .= "WHERE `teacher_id` = '".$teacher_id."' ";
    
            $result = mysqli_query($db, $statement);
    		$errno = mysqli_errno($db);
			
            if ($result)
            {
                return $teacher_id;
            } 
			
			else {
                    
               		echo("<b>MySQL No: ".mysqli_errno($db)."</b>");
					echo("<b>MySQL Error: ".mysqli_error($db)."</b>");
					echo("<b>SQL: ".$statement."</b>");
					echo("<b>MySQL Affected Rows: ".mysqli_affected_rows($db)."</b>");
				return 'NotUpdated';
            }
        } else {
    
            return 'teacherNotFound';
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
    
        if (isset($_POST['teacher_id']))
        {
    -		$teacher_id = trim($_POST['teacher_id']);
		} else {
            $teacher_id = '';
        }
    	if (isset($_POST['teacher_lname']))
        {
    -		$teacher_lname = trim($_POST['teacher_lname']);
			$teacher_lname = strtolower($teacher_lname);
			$teacher_lname = ucfirst($teacher_lname);
        } else {
            $teacher_lname = '';
        }
		if (isset($_POST['teacher_fname']))
        {
    -		$teacher_fname = trim($_POST['teacher_fname']);
			$teacher_fname = strtolower($teacher_fname);
			$teacher_fname = ucfirst($teacher_fname);
        } else {
            $teacher_fname = '';
        }
		
       	if (isset($_POST['teacher_gender']))
        {
            $teacher_gender = trim($_POST['teacher_gender']);
        } else {
            $teacher_gender = '';
        }
		
		if (isset($_POST['teacher_grade']))
        {
            $teacher_grade = trim($_POST['teacher_grade']);
        } else {
            $teacher_grade = '';
        }
		if (isset($_POST['teacher_role']))
        {
            $teacher_role = trim($_POST['teacher_role']);
        } else {
            $teacher_role = '';
        }
		
		$posted_school_id = $_POST['school_id'];
		
		$teacherf =  strtolower($teacher_fname);
		$teacherf = substr($teacherf, 0, 2);
		$teacherl =  strtolower($teacher_fname);
		$teacherl = substr($teacherl, 0, 2);
		$password = "".$teacher_id."".$teacherf."".$teacherl;
		
		//$email = "".$teacher_id."_".$teacherf."".$teacherl."@district".$sd.".ca";
		$email = "test_teacher@stopbeingbullied.org";
		
		
     
		
		$rtninfo = updateteacher($db, $teacher_id, $teacher_lname, $teacher_fname, $teacher_gender, $teacher_grade, $teacher_role, $email, $password, $posted_school_id);
    
            if ($rtninfo == "teacherNotFound")
            {
                print "<p style='color: red;text-align:center'><b><mark>Teacher Not Found - Check Teacher ID</p><br/></mark></b>";
            } else {
                if ($rtninfo == "NotUpdated")
                {
                    print "<p style='color: red'><b><mark>Teacher Not Updated</p><br/></mark></b>";
                } else {
                    print "<div style='text-align:center'><p style='color: blue'><mark><b>Teacher - $teacher_lname, $teacher_fname in school, $posted_school_id has been successfully updated!</b><br/></mark>";
					print "<p style = 'color:blue'><b>New Teacher Password Generated:<b><br/>
            				<input type='text' disabled = 'disabled' value = $password name='teacher_password' size='12'/><br/><br/>";
							print "<p style = 'color:blue'><b>New Teacher Email Generated:<b><br/>
            				<input type='text' disabled = 'disabled' value = $email name='teacher_email' size='25'/><br/><br/></div>";
					echo "<script> updatealert(); </script>";
															 echo "<script> location.href = 'teacher.php'; </script>";

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
    
        if (isset($_POST['teacher_id_add']))
        {
    -		$teacher_id_add = trim($_POST['teacher_id_add']);
		} else {
            $teacher_id_add = '';
        }
    	if (isset($_POST['teacher_lname_add']))
        {
    -		$teacher_lname_add = trim($_POST['teacher_lname_add']);
			$teacher_lname_add = strtolower($teacher_lname_add);
			$teacher_lname_add = ucfirst($teacher_lname_add);
        } else {
            $teacher_lname = '';
        }
		if (isset($_POST['teacher_fname_add']))
        {
    -		$teacher_fname_add = trim($_POST['teacher_fname_add']);
			$teacher_fname_add = strtolower($teacher_fname_add);
			$teacher_fname_add = ucfirst($teacher_fname_add);
        } else {
            $teacher_fname = '';
        }
		
       	if (isset($_POST['teacher_gender_add']))
        {
            $teacher_gender_add = trim($_POST['teacher_gender_add']);
        } else {
            $teacher_gender_add = '';
        }
		
		if (isset($_POST['teacher_grade_add']))
        {
            $teacher_grade_add = trim($_POST['teacher_grade_add']);
        } else {
            $teacher_grade_add = '';
        }
		if (isset($_POST['teacher_role_add']))
        {
            $teacher_role_add = trim($_POST['teacher_role_add']);
        } else {
            $teacher_role_add = '';
        }
		
		
		
		
		$teacherf_add =  strtolower($teacher_fname_add);
		$teacherf_add = substr($teacherf_add, 0, 2);
		$teacherl_add =  strtolower($teacher_fname_add);
		$teacherl_add = substr($teacherl_add, 0, 2);
		$password_add = "".$teacher_id_add."".$teacherf_add."".$teacherl_add;
		
		//$email_add = "".$teacher_id_add."_".$teacherf_add."".$teacherl_add."@district".$sd_add.".ca";
		 $email_add = "test_teacher@stopbeingbullied.org";
		
		$posted_school_id_add = $_POST['school_id_add'];
		
        $rtninfo = insertteacher($db, $teacher_id_add, $teacher_lname_add, $teacher_fname_add, $teacher_gender_add, $teacher_grade_add, $teacher_role_add, $email_add, $password_add, $posted_school_id_add);
        
       if ($rtninfo == "NotAdded")
            {
                print "<p style='color: red'><b><mark>Teacher Not Added</p></mark><b>";
            } else {
                print "<div style='text-align:center'><p style='color: blue'><b><mark><b>Teacher - $teacher_lname_add, $teacher_fname_add in school, $posted_school_id_add has been successfully added!</b><br/></mark><b>";
				print "<p style = 'color:blue;'><b>Teacher Password Generated:</b><br/>
            				<input type='text' disabled = 'disabled' value = '$password_add' name='teacher_password_add' size='12'/><br/><br/></p>";
				print "<p style = 'color:blue'><b>New Teacher Email Generated:<b><br/>
            				<input type='text' disabled = 'disabled' value = '$email_add' name='teacher_email' size='25'/><br/><br/> </div>";
					echo "<script> addalert(); </script>";
										 echo "<script> location.href = 'teacher.php'; </script>";

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
    
    <div id='update_teacher' style = "margin:0 auto;width:50%;text-align:center">
        
        <h1>Update Teacher</h1>
        
        <b id = "note">*Note: You cannot change the Teacher ID (Primary Key)!</b>
        <p>Enter Teacher's ID:<br>
            <input type='number' name='teacher_id' placeholder = "100+" min = "101" size='11'required/>
        </p>
        <p>New Teacher Last Name:<br>
            <input type='text' name='teacher_lname'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New Teacher First Name:<br>
            <input type='text' name='teacher_fname'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New Teacher Gender:<br>
            <select name = "teacher_gender">
            	<option value = "Male">Male</option>
                <option value = "Female">Female</option>
                <option value = "Other...">Other...</option>
            </select>
        </p>
        <p>New Teacher Grade:<br>
            <select name = "teacher_grade">
            	<option value = "0">Administration</option>
            	<option selected='selected' value = "1">1</option>
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
        <p>New Teacher Role:<br>
            <select name = "teacher_role">
            	<option value = "Teaching">Teaching</option>
                <option value = "Vice Principle">Vice Principle</option>
                <option value = "Principle">Principle</option>
                <option value = "Pre-Teaching (Student)">Pre-Teaching (Student)</option>
                <option value = "TOC">TOC</option>
            </select>
        </p>
        <p>New Posted School:<br>
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
        <br><span><input id = "submit" type="submit" name="changebutton" value="Change Teacher" /></span>
    
    </form>
      
   
    
    </div>  <!-- End update_teacher DIV -->
    
   <?php
    //**********************************************
    //*
    //*  ADD FORM
    //*
    //**********************************************
    ?>
    
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    
    <div id='add_teacher' style = "margin:0 auto;width:50%;text-align:center">
        
        <h1>Add Teacher Information</h1>
        
       <p>New Teacher Last Name:<br>
            <input type='text' name='teacher_lname_add'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New Teacher First Name:<br>
            <input type='text' name='teacher_fname_add'  pattern = "[a-zA-Z]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New Teacher Gender:<br>
            <select name = "teacher_gender_add">
            	<option value = "Male">Male</option>
                <option value = "Female">Female</option>
                <option value = "Other...">Other...</option>
            </select>
        </p>
        <p>New Teacher Grade:<br>
            <select name = "teacher_grade_add">
            	<option value = "0">Administration</option>
            	<option selected='selected' value = "1">1</option>
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
        <p>New Teacher Role:<br>
            <select name = "teacher_role_add">
            	<option value = "Teaching">Teaching</option>
                <option value = "Vice Principle">Vice Principle</option>
                <option value = "Principle">Principle</option>
                <option value = "Pre-Teaching (Student)">Pre-Teaching (Student)</option>
                <option value = "TOC">TOC</option>
            </select>
        </p>
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
        <br><span><input id = "submit" type="submit" name="addbutton" value="Add Teacher" /></span><br/><br/><br/><br/><br/><br/><br/><br/>
    </form>
   </div>
   
  <div id = "display_table" style = "margin:0 auto;width:100%;text-align:center">
    
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
		}
		
   }
   else {
		$limit1 = 100000; 
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
    $sql_statement .= "FROM teacher JOIN school ON (posted_school_id=school_id) WHERE school.sd = $location ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
    
    if (!$result) {
        $outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
        $outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
        $outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
        $outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
    } else {
    
        $outputDisplay  = "<br/><h1 style='color: red'>Teacher Table Data</h1>";
    
        $outputDisplay .= '<table style="color: black;; margin: 0 auto; text-align:center">';
        $outputDisplay .= '<tr>
		<th>  Delete? &nbsp; </th>
		<th>  ID &nbsp; </th>
		<th>  Last Name &nbsp; </th>
		<th>  First Name &nbsp; </th>
		<th>  Gender &nbsp; </th>
		<th>  Grade &nbsp; </th>
		<th>  Role &nbsp; </th>
		<th>  Email &nbsp; </th>
		<th>  Password &nbsp; </th>
		<th>  Posted School &nbsp; </th>
		</tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
            
    
            $row = mysqli_fetch_array($result);
    
            $teacher_id    = $row['teacher_id'];
			$teacher_lname   = $row['teacher_lname'];
			$teacher_fname   = $row['teacher_fname'];
			$teacher_gender  = $row['teacher_gender'];
			$teacher_grade  = $row['teacher_grade'];
			$teacher_role  = $row['teacher_role'];
			$teacher_email  = $row['teacher_email'];
           	$teacher_password  = $row['teacher_password'];
			$posted_school_id  = $row['posted_school_id'];
			
			
			if ($teacher_grade == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: #abffe3\">";
            }
			else
            {
               $outputDisplay .= "<tr style=\"background-color: #ccddff\">";
            }
            
    
            
			
            if (isset($_POST[$teacher_id]))
            {
                $checked = $_POST[$teacher_id];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                deleteteacher($db, $teacher_id, $teacher_lname, $teacher_fname);
            } else {
            $outputDisplay .= "<td><input type='checkbox' name='".$teacher_id."' value='Y'/></td>";
                
            $outputDisplay .= "<td>".$teacher_id."</td>";
			$outputDisplay .= "<td>".$teacher_lname."</td>";
			$outputDisplay .= "<td>".$teacher_fname."</td>";
    
			$outputDisplay .= "<td>".$teacher_gender."</td>";
			$outputDisplay .= "<td>".$teacher_grade."</td>";
			$outputDisplay .= "<td>".$teacher_role."</td>";
			$outputDisplay .= "<td>".$teacher_email."</td>";
			$outputDisplay .= "<td>".$teacher_password."</td>";
			
			$outputDisplay .= "<td>".$posted_school_id."</td>";
			
            $outputDisplay .= "</tr>";
            
            }
            
        }
        
        $outputDisplay .= "</table>";
        $outputDisplay .= '<br/><input id = "delete" type="submit" value="Delete Teacher(s)"/> <br/>';
		
    }
    
    
    print $outputDisplay;
    
    ?>
    </div>
    </form>
      
    
    
     
</div>
</body>
</html>
