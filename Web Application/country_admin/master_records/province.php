<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	error_reporting(0);
session_start();
	   if(isset($_SESSION['login_status_location_country_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location =  $_SESSION['login_status_location_country_admin'];
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

?>

<html>
<head>
  <title>Province</title>
  
  
  
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
	.margin {
		margin-top:5px;
		margin-bottom:5px;
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
	#delete {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		width: 60px;
		height: 30px;
		border-radius: 7px;
		background-color: pink;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#delete:hover {
		font-size: 20px;
		width: 170px;
		height: 45px;
		
	}
	#add {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		width: 120px;
		height: 30px;
		border-radius: 7px;
		background-color: orange;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#add:hover {
		font-size: 20px;
		width: 170px;
		height: 45px;
		
	}
	#update {
		font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Teacherbook L', 'Times New Roman', serif;
		width: 140px;
		height: 30px;
		border-radius: 7px;
		background-color: lightblue;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#update:hover {
		font-size: 20px;
		width: 200px;
		height: 45px;
		
	}
	a { cursor: pointer; text-decoration:none; font-weight:bold; color:purple}
	th {
		font-size: .8em;
	}

  </style>
</head>

<body >
<a  class = "logout" href = "master_records.php" style='position:absolute;margin-left:5px;margin-top:5px;'><img src = '../../img_project/open.png' style='width:80px;'></a>
<br/><br/><br/><br/>

<div style = "width:100%; margin:0 auto;">	
   <div id = "display_table" style = "text-align:center">
    
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
        # <input type='text' name='limit1' size='1' placeholder = "200" required/> row(s) from row #
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
		$limit1 = 200; 
		$limit2 = 0;  
   }
    
	
  	?>
    <?php 
	
	//**********************************************
    //*
    //*  DISPLAY AND DELETE PHP
    //*
    //**********************************************
    
    
    print "<form method='post' action=''><p>";
    
	    
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM province WHERE country_id= '$location' ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
      
        $outputDisplay  = "<br/><h1 style='color: red;'>Province Table Data</h1>";
    
        $outputDisplay .= '<table style="color: black;margin:0 auto">';
        $outputDisplay .= '<tr>
		<th><form method = "post" action = ""></th>
		<th> &nbsp; Province ID &nbsp; </th>
		<th> &nbsp; Province Name &nbsp; </th>
		<th> &nbsp; Country ID &nbsp; </th>
		</tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
            
    
            $row = mysqli_fetch_array($result);
    
            $province_id    = $row['province_id'];
			$province_name   = $row['province_name'];
			$country_id   = $row['country_id'];
			
            if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: #c2d9ff\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: #84b1ff\">";
            }
			   
            if (isset($_POST[$province_id]))
            {
                $checked = $_POST[$province_id];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                mysqli_query($db,"DELETE FROM province WHERE province_id = '$province_id'");
				echo "<script>alert('Province - $province_id has been successfully deleted!'); location.href = 'province.php'; </script>";
            } else {
            $outputDisplay .= "<td style = 'text-align:center'><input type='checkbox' name='".$province_id."' value='Y'></td>";
            
			$outputDisplay .= "<td>".$province_id."</td>";
			$outputDisplay .= "<td>".$province_name."</td>";
			$outputDisplay .= "<td>".$country_id."</td>";
			
            $outputDisplay .= "</tr>";
			}  
        }
		if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: #c2d9ff; text-align:center\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: #84b1ff; text-align:center\">";
            }
            $outputDisplay .= "<td><input id = 'delete' type='submit' value='Delete'/></td></form><form method = 'post' action = ''><td> <input type = 'text' class = 'margin' name = 'province_id' size='5'> </td>";
			
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'province_name' size='20'> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'country_id' value = '$location' disabled = 'disabled' size='5'> </td>";
			
            $outputDisplay .= "</tr>";
        $outputDisplay .= "</table>";
       $outputDisplay .= '<br/><input id = "add" type="submit" name = "submit" value="Add Province(s)"/> <br/></form>';
		
    print $outputDisplay;
	
		echo "<div>";
			echo "<br/><h2 style='color: red;'>Update Province</h2>";
				$result = mysqli_query($db, "SELECT * FROM province WHERE country_id = '$location'");
				echo "<h4 style='color: blue;'>Choose Province ID</h4>";
			
				echo "<form method = 'post' action = ''><select name = 'province_update'>";
					
				while($row = mysqli_fetch_assoc($result)){
					?>
						<option value = '<?php echo $row['province_id']; ?>'><?php echo $row['province_id']; ?></option> 
					<?php
					
				}
				echo "</select>";
				echo "<br/><h4 style='color: blue;'>New Province Name</h4>";
			
				echo '<input type="text" name = "province_new" ';
				
				echo '<br/><br/><br/><br/><input id = "update" type="submit" name = "update" value="Update Province(s)"/> <br/></form>';
		
		echo "</div>";
	
	
	
	
	
	
	if(($_POST['province_id'] != "" ) && ($_POST['province_name'] != "") && (isset ($_POST['submit']))) {
		
		$province_id = $_POST['province_id'];
		$province_name = $_POST['province_name'];
		
		$statement 	= "INSERT INTO province  ( `province_id` , `province_name` , `country_id` ) ";
        $statement .= "VALUES (";
        $statement .= "'".$province_id."', '".$province_name."', '".$location."')";
    
        $result = mysqli_query($db, $statement);
    
        if (!$result)
        {
            $errno = mysqli_errno($db);
    
            if ($errno == '1062') {
               echo "<script> alert('Province ID: $province_id, Is Already In The Table!'); </script>";
		
            }
			
        }
		else {
			echo "<script> alert('Province: $province_name ($province_id), Has Been Successfully Added!'); </script>";
		
			echo "<script> location.href = 'province.php' </script>";
		}
	}
	elseif(isset ($_POST['submit'])) {
		echo "<script> alert('Please Fill Out All Feilds To Add A New Province!'); </script>";
		
	}
	
	
	
	
	
	
	if(($_POST['province_update'] != "" ) && ($_POST['province_new'] != "") && (isset ($_POST['update']))) {
		
		$province_update = $_POST['province_update'];
		$province_new = $_POST['province_new'];
		
		$statement .= "UPDATE province SET province_name = '$province_new' WHERE province_id = '$province_update'";
    
        $result = mysqli_query($db, $statement);
		echo "<script> alert('Province: $province_update, Has Been Successfully Updated!'); </script>";
				
		echo "<script> location.href = 'province.php' </script>";
		
	}
	elseif(isset ($_POST['update'])) {
		echo "<script> alert('Please Enter A New Name To Update Province ID: " . $_POST['province_update'] . "!'); </script>";
		
	}
    
    ?>
	
    </div>
    </form>
      
    
    
     
</div>
</body>
</html>
