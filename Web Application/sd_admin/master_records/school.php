<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	   if(isset($_SESSION['login_status_location_sd_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location =  $_SESSION['login_status_location_sd_admin'];

?>
<html>
<head>
  <title>School</title>
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
		window.open ('master_records.php', 'newwindow', 'height=600px, width=300px');
	}
    function deletealert(school_id, school_name){
		document.getElementById("del").innerHTML = "<br/><br/><b><div style='text-align:center'><mark>School: "+school_name+" ("+school_id+") has been successfully deleted!</mark></div></b><br/>";
		alert("Specified School & All Associated Records Have Been Successfully Deleted!");	
	}
	   
	function addalert() {
		
		alert("School Successfully Added!");
		
	}
	function updatealert() {
		
		alert("School Successfully Updated!");
		
	}
    </script>

		
  <style>
	body {
		background: url(background.jpg) no-repeat fixed;
		background-size: 100% 100%;
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Studentbook L', 'Times New Roman', serif; 
		color: red;
	}
	
	#update_school {
		color:blue;
		float:left;
	}
	#add_school {
		margin-left:30px;
		color:green;
		float:left;
		
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
</head>

<body >
<a  class = "logout" href = "master_records.php" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/open.png' style='width:80px;'></a>
<br/><br/><br/><br/>
<div>   
  <div id = "del">
    </div>  
<div style = "width:100%;margin:0 auto;text-align:center;">	
	 <?php
    //**********************************************
    //*
    //*  FUNCTIONS
    //*
    //**********************************************
       
    
	function deleteschool($db, $school_id, $school_name)
    {
        $statement 	= "DELETE FROM school ";
        $statement .= "WHERE school_id = ".$school_id." ";
    
        $result = mysqli_query($db, $statement);
        
        
        if ($result)
        {
            echo "<script> deletealert($school_id, '$school_name'); </script>";
        } else {
            $outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
            $outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
            $outputDisplay .= "<b><br>SQL: ".$statement."<br></b>";
            $outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
        }
    }
    
    function insertschool($db,  $school_id_add, $school_name_add, $school_address_add, $school_zip_add,  $school_phone_add, $sd_add)
    {
    
        $statement 	= "INSERT INTO school  ( `school_id` , `school_name`, `school_address` , `school_zip`, `school_phone`, `sd` ) ";
        $statement .= "VALUES (";
        $statement .= "NULL, '".$school_name_add."', '".$school_address_add."', '".$school_zip_add."', '".$school_phone_add."', '".$sd_add."'";
        $statement .= ")";
    
        $result = mysqli_query($db, $statement);
    
        if ($result)
        {
            return $school_id_add;
        } else {
            $errno = mysqli_errno($db);
    
            if ($errno == '1062') {
                echo "<p style='color: red'><b><mark>School ID - ".$school_id_add. " is already in Table </mark></b> ";
            }
			elseif ($errno == '1452') {
				print "<mark>SD: '".$sd_add."', Not Found In Table</mark>";
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
    
    function updateschool($db, $school_id, $school_name, $school_address, $school_zip,  $school_phone, $sd)
    {
    
        //First check if school_id exists
    
        $sql_statement  = "SELECT school_id ";
        $sql_statement .= "FROM school ";
        $sql_statement .= "WHERE school_id = '".$school_id."' ";
    
        $result = mysqli_query($db, $sql_statement);  // Run SELECT
    
        $numresults = mysqli_num_rows($result);
    
    
        // If school exists then Update the school Info
    
        if ($numresults > 0)
        {
    
            $statement 	= "UPDATE `school` ";
            $statement .= "SET `school_name` = '".$school_name."', ";
			$statement .= "`school_address` = '".$school_address."', ";
			$statement .= "`school_zip` = '".$school_zip."', ";
            $statement .= "`school_phone` = '".$school_phone."', ";
            $statement .= "`sd` = '".$sd."' ";
			$statement .= "WHERE `school_id` = '".$school_id."' ";
    
            $result = mysqli_query($db, $statement);
    		$errno = mysqli_errno($db);
			
            if ($result)
            {
                return $school_id;
            } 
			
			else {
                    
                if ($errno == '1452')
				{
					print "<mark>SD: '".$sd."', Not Found In Table</mark>";
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
    
            return 'schoolNotFound';
        }
    }
    
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
    ?>
	<?php
    
    //**********************************************
    //*
    //*  UPDATE PHP
    //*
    //**********************************************
    
    if (isset($_POST['changebutton']))
    {
    
        if (isset($_POST['school_id']))
        {
    -		$school_id = trim($_POST['school_id']);
        } else {
            $school_id = '';
        }
    	if (isset($_POST['school_name']))
        {
    -		$school_name = trim($_POST['school_name']);
        } else {
            $school_name = '';
        }
        if (isset($_POST['school_address']))
        {
            $school_address = trim($_POST['school_address']);
        } else {
            $school_address = '';
        }
		if (isset($_POST['school_zip']))
        {
            $school_zip = trim($_POST['school_zip']);
        } else {
            $school_zip = '';
        }
		if (isset($_POST['school_phone']))
        {
            $school_phone = trim($_POST['school_phone']);
        } else {
            $school_phone = '';
        }
		$sd = $location;
               
           $school_zip = strtoupper($school_zip);
		   
		    $rtninfo = updateschool($db, $school_id, $school_name, $school_address, $school_zip, $school_phone, $sd);
    
            if ($rtninfo == "schoolNotFound")
            {
                print "<p style='color: red'><b><mark>School Not Found - Check School ID</p><br/></mark></b>";
            } else {
                if ($rtninfo == "NotUpdated")
                {
                    print "<p style='color: red'><b><mark>School Not Updated</p><br/></mark></b>";
                } else {
                    print "<p style='color: blue'><mark><b>School - $school_name in district #$sd has been successfully updated!</b><br/></mark>";
					echo "<script> updatealert(); </script>";
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
    
        if (isset($_POST['school_id_add']))
        {
            $school_id_add = trim($_POST['school_id_add']);
        } else {
            $school_id_add = '';
        }
    	if (isset($_POST['school_name_add']))
        {
            $school_name_add = trim($_POST['school_name_add']);
        } else {
            $school_name_add = '';
        }
        if (isset($_POST['school_address_add']))
        {
            $school_address_add = trim($_POST['school_address_add']);
        } else {
            $school_address_add = '';
        }
		if (isset($_POST['school_zip_add']))
        {
            $school_zip_add = trim($_POST['school_zip_add']);
        } else {
            $school_zip_add = '';
        }
		if (isset($_POST['school_phone_add']))
        {
            $school_phone_add = trim($_POST['school_phone_add']);
        } else {
            $school_phone_add = '';
        }
		
            $sd_add = $location;
       
    	
		$school_zip_add = strtoupper($school_zip_add);
		
            $rtninfo = insertschool($db,  $school_id_add, $school_name_add, $school_address_add, $school_zip_add, $school_phone_add, $sd_add);
    
            if ($rtninfo == "NotAdded")
            {
                print "<p style='color: red'><b><mark>School Not Added</p></mark></b>";
            } else {
                print "<p style='color: green'><mark><b>School - $school_name_add in district #$sd_add has been successfully added!</b></mark>";
				echo "<script> addalert(); </script>";
            }
        
    }
    ?>
       
	
     
    
   <div id = "display_table" style = "width:100%;margin:0 auto;text-align:center;">
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
		$limit1 = 1000000; 
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
    $sql_statement .= "FROM school WHERE sd = $location ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
    
    if (!$result) {
        $outputDisplay .= "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
        $outputDisplay .= "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
        $outputDisplay .= "<b><br>SQL: ".$sql_statement."<br></b>";
        $outputDisplay .= "<b><br>MySQL Affected Rows: ".mysqli_affected_rows($db)."</font><br></b>";
    } else {
    
        $outputDisplay  = "<br/><h1>School Table Data</h1>";
    
        $outputDisplay .= '<table border=0 style="color: black;text-align:center;margin:0 auto">';
        $outputDisplay .= '<tr><th> &nbsp; Delete? &nbsp; </th><th> &nbsp; School ID &nbsp; </th><th> &nbsp; School Name &nbsp; </th><th> &nbsp; School Address &nbsp; </th><th> &nbsp; School Zip &nbsp; </th><th> &nbsp; School Phone &nbsp; 
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
            
            if (isset($_POST[$school_id]))
            {
                $checked = $_POST[$school_id];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                deleteschool($db, $school_id, $school_name);
            } else {
            $outputDisplay .= "<td><input type='checkbox' name='".$school_id."' value='Y'></td>";
                
            $outputDisplay .= "<td>".$school_id."</td>";
			
			$outputDisplay .= "<td>".$school_name."</td>";
    
            $outputDisplay .= "<td>".$school_address."</td>";
			
			$outputDisplay .= "<td>".$school_zip."</td>";
			
			$outputDisplay .= "<td>".$school_phone."</td>";
			
			$outputDisplay .= "<td>".$sd."</td>";
            
            $outputDisplay .= "</tr>";
            
            }
            
        }
        
        $outputDisplay .= "</table>";
        $outputDisplay .= '<br/><input id = "delete" type="submit" value="Delete School(s)"/> <a href="#" id="toTop" class="fa fa-chevron-up"></a><br/>';
		
    }
    
    
    print $outputDisplay;
    
    ?>
	 </div>
    </form>
<?php
    //**********************************************
    //*
    //*  UPDATE FORM
    //*
    //**********************************************
    ?>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    
    <div id='update_school' style = "width:50%;margin:0 auto;text-align:center;">
        
        <h1>Update School</h1>
    
        <p>Enter School ID:<br>
            <input type='number' name='school_id' placeholder = "10,000+" min = "10001" size='11'required/>
        </p>
        <p>Enter School Name:<br>
            <input type='text' name='school_name' pattern = "[a-zA-Z ]+" title="Alphabetical (No Numbers!)" size='11'required/>
        </p>
        <p>New School Address:<br>
            <input type='text' name='school_address' size='20'required/>
        </p>
        <p>New School Zip:<br>
            <input class = "zip" type='text' placeholder = "A1A 1A1" name='school_zip' size='20'required/>
        </p>
        <p>New School Phone:<br>
            <input class = "phone" type='text' placeholder = "(XXX) XXX-XXXX" name='school_phone' size='20'required/>
        </p>
    	<p>SD:<br>
            <input type='text' value = "<?php echo $location; ?>" name = 'sd' disabled = "disabled"/>
        
        </p>
        <br><span><input id = "submit" type="submit" name="changebutton" value="Change School" /></span><br/><br/>
    
    </form>
      </div>

    
   <?php
    //**********************************************
    //*
    //*  ADD FORM
    //*
    //**********************************************
    ?>
        
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    
    <div id='add_school' style = "width:50%;margin:0 auto;text-align:center;">
    
    <h1>Add New School</h1>
    
        <p>Enter School Name:<br>
            <input type='text' name='school_name_add' pattern = "[a-zA-Z ]+" title="Alphabetical (No Numbers!)" size='11' required/>
        </p>
        
        <p>Enter School Address:<br>
            <input type='text' name='school_address_add' size='20' required/>
        </p>
        
         <p>Enter School Zip:<br>
            <input class = "zip" type='text' placeholder = "A1A 1A1" name='school_zip_add' size='20' required/>
        </p>
        
         <p>Enter School Phone:<br>
            <input class = "phone" type='text' placeholder = "(XXX) XXX-XXXX" name='school_phone_add' size='20' required/>
        </p>
        
       <p>SD:<br>
            <input type='text' value = "<?php echo $location; ?>" name = 'sd_add' disabled = "disabled"/>
        
        </p>
        
        <br><span><input id = "submit" type="submit" name="addbutton" value="Add School" /></span><br/><br/>
    
    </div>  <!-- End add_school DIV -->
    </form>	
    
    
    
</div>
</body>
</html>
