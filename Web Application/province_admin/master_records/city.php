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
  <title>City</title>
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
<script src="../../js/jquery-2.1.1.js" type="text/javascript"></script>
    
  <script>
  function getCity(val) {
			$.ajax({
			type: "POST",
			url: "province-wise.php",
			data: 'province_id_city=' + val,
			success: function(data){
				$("#main").html(data);
			}
			});
			$.ajax({
			type: "POST",
			url: "get_city.php",
			data: 'province_id=' + val,
			success: function(data){
				$("#city-list").html(data);
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
    
    
    print "<form method='post' action=''><p>";
    
	    
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM city WHERE province_id= '$location' ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
    $outputDisplay  = "<br/><h1>City Table Data</h1>";
    
        $outputDisplay .= '<table style="color: black; margin: 0 auto">';
        $outputDisplay .= '<tr><th></th><th> &nbsp; City Name &nbsp; </th><th> &nbsp; Province ID &nbsp; </th></tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
             if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: #55fdc4\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: #ccddff\">";
            }
			$row = mysqli_fetch_array($result);
			if (isset($_POST[$city_id]))
            {
                $checked = $_POST[$city_id];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                mysqli_query($db,"DELETE FROM city WHERE city_name = '$city_id'");
				echo "<script>alert('City - $city_id has been successfully deleted!'); location.href = 'city.php' </script>";
            } else {
            $city_id  = $row['city_name'];
			$province_id    = $row['province_id'];
            
			$outputDisplay .= "<td style = 'text-align:center'><input type='checkbox' name='".$city_id."' value='Y'></td>";
            $outputDisplay .= "<td>".$city_id."</td>";
            $outputDisplay .= "<td>".$province_id."</td>";
            
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
            $outputDisplay .= "<td><input id = 'delete' type='submit' value='Delete'/></td></form><form method = 'post' action = ''><td> <input type = 'text' class = 'margin' name = 'city_id' size='7'> </td>";
			
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' disabled = 'disabled' value = '$location' name = 'province_id' size='3'> </td>";
			
            $outputDisplay .= "</tr>";
        $outputDisplay .= "</table>";
       $outputDisplay .= '<br/><input id = "add" type="submit" name = "submit" value="Add City(s)"/> <br/></form>';
		
    print $outputDisplay;
	
	if(($_POST['city_id'] != "" ) && (isset ($_POST['submit']))) {
		
		$city_id = $_POST['city_id'];
		
		$statement 	= "INSERT INTO city  ( `city_name` ,`province_id`) ";
        $statement .= "VALUES (";
        $statement .= "'".$city_id."', '".$location."' )";
    
        $result = mysqli_query($db, $statement);
    
        if (!$result)
        {
            $errno = mysqli_errno($db);
    
            if ($errno == '1062') {
               echo "<script> alert('City: $city_id, Is Already In The Table!'); </script>";
		
            }
			
        }
		else {
			echo "<script> alert('City: $city_id, Has Been Successfully Added!'); </script>";
		
			echo "<script> location.href = 'city.php' </script>";
		}
	}
	elseif(isset ($_POST['submit'])) {
		echo "<script> alert('Please Fill Out All Feilds To Add A New City!'); </script>";
		
	}
	
	
    ?>
	
    </div>
    </form>
      
    
    
     
</div>
</body>
</html>
