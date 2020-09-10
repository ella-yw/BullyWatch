<?php 

    $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

    print "<form method='post' action=''>";
     error_reporting(0);
	
	$sd = $_POST['sd'];    
	$sd_teacher = $_POST['sd_teacher'];    
	$sd_school = $_POST['sd_school'];    
	
	if ($sd != "") {
	
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM student JOIN school USING (school_id) ";
	$sql_statement .= "WHERE sd = ".$sd." ";
    $sql_statement .= "ORDER BY student_grade ASC "; 
	
	
    $result = mysqli_query($db, $sql_statement);
    $outputDisplay = "";
    $row = mysqli_fetch_array($result);
	  
	
       $outputDisplay  = "<br/><h4><a href = 'student.php'>Quit Filter...</a></h4><h1>Students In SD: " . $sd . " </h1>";
    
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
	}
	elseif ($sd_teacher != "") {
	
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM teacher JOIN school ON (posted_school_id=school_id) WHERE school.sd= $sd_teacher ";
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
      
        $outputDisplay  = "<br/><h4><a href = 'teacher.php'>Quit Filter...</a></h4><h1>Teachers In SD: " . $sd_teacher . "</h1>";
    
        $outputDisplay .= '<table style="color: black;margin:0 auto">';
        $outputDisplay .= '<tr>
		<th> &nbsp; ID &nbsp; </th>
		<th> &nbsp; Last Name &nbsp; </th>
		<th> &nbsp; First Name &nbsp; </th>
		<th> &nbsp; Gender &nbsp; </th>
		<th> &nbsp; Grade &nbsp; </th>
		<th> &nbsp; Role &nbsp; </th>
		<th> &nbsp; Email &nbsp; </th>
		<th> &nbsp; Password &nbsp; </th>
		<th> &nbsp; Posted School &nbsp; </th>
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
               $outputDisplay .= "<tr style=\"background-color: #dac2ff\">";
            }
			else
            {
               $outputDisplay .= "<tr style=\"background-color: #00FFA8\">";
            }
			   
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
            
        
        $outputDisplay .= "</table>";
       
    print $outputDisplay;
	}
	elseif ($sd_school != "") {
	
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM school WHERE school.sd= $sd_school ";
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
      
        $outputDisplay  = "<br/><h4><a href = 'school.php'>Quit Filter...</a></h4><h1>Schools In SD: " . $sd_school . "</h1>";
    
        $outputDisplay .= '<table style="color: black;margin: 0 auto;">';
        $outputDisplay .= '<tr><th> &nbsp; School ID &nbsp; </th><th> &nbsp; School Name &nbsp; </th><th> &nbsp; School Address &nbsp; </th><th> &nbsp; School Zip &nbsp; </th><th> &nbsp; School Phone &nbsp; 
		</th><th>&nbsp; SD &nbsp;</th></tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
            if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: #c3ffeb;\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: #7dffd3\">";
            }
    
            
    
            $row = mysqli_fetch_array($result);
    
            $school_id    = $row['school_id'];
			$school_name   = $row['school_name'];
            $school_address  = $row['school_address'];
			$school_zip  = $row['school_zip'];
			$school_phone  = $row['school_phone'];
			$sd    = $row['sd'];
            
            
                
            $outputDisplay .= "<td>".$school_id."</td>";
			
			$outputDisplay .= "<td>".$school_name."</td>";
    
            $outputDisplay .= "<td>".$school_address."</td>";
			
			$outputDisplay .= "<td>".$school_zip."</td>";
			
			$outputDisplay .= "<td>".$school_phone."</td>";
			
			$outputDisplay .= "<td>".$sd."</td>";
            
            $outputDisplay .= "</tr>";
            
            
            
        }
        
        $outputDisplay .= "</table>";
      
    
    
    print $outputDisplay;
	}
    ?>