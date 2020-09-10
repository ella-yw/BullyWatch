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
  <title>SD</title>
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
  <script src="../../js/jquery.js"></script>
  <script src="../../js/jquery.maskedinput.min.js" type="text/javascript"></script>
  
  <script type = "text/javascript">

 jQuery(function($){ // 9 = [0-9], a = [a-z A-Z], * = [a-z A-Z 0-9]
   
   $(".date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
   $(".phone").mask("(999) 999-9999");
   $(".zip").mask("a9a 9a9");
   $(".phn").mask("9999 999 999");
   
   });

      function getSD(val) {
			$.ajax({
			type: "POST",
			url: "city-wise.php",
			data: 'city_sd=' + val,
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
	<?php
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM city ";
		$sql_statement .= "WHERE province_id = '".$location."' ";
		
		$result = mysqli_query($db, $sql_statement); // code has ran
		$city_select = "";
		$city_select .= "<select name = 'city_id' size = '1'>";
		    
		while ($row = mysqli_fetch_assoc($result)) {
			$city_select .= "<option value='".$row['city_name']."'>".$row['city_name']."</option>";
		}
		$city_select .= "</select>";
		?>
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
    
    
    print "<form method='post' action=''><p>";
    
	    
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM sd JOIN city ON (city_id = city_name) WHERE province_id= '$location' ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
    $outputDisplay  = "<br/><h1>School Districts In: $province_name</h1>";
    
        $outputDisplay .= '<table style="color: black; margin: 0 auto">';
        $outputDisplay .= '<tr><th>  </th><th> &nbsp; SD &nbsp; </th><th> &nbsp; SD Address &nbsp; </th><th> &nbsp; SD Zip &nbsp; </th><th> &nbsp; SD Phone &nbsp; 
		</th><th>&nbsp; City ID &nbsp;</th></tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
             if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: #ffdddd\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: #ffbbdd\">";
            }
    
            
    
            $row = mysqli_fetch_array($result);
    
            $sd    = $row['sd'];
            $sd_address  = $row['sd_address'];
			$sd_zip  = $row['sd_zip'];
			$sd_phone  = $row['sd_phone'];
			$city_name    = $row['city_id'];
            
			if (isset($_POST[$sd]))
            {
                $checked = $_POST[$sd];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                mysqli_query($db,"DELETE FROM sd WHERE sd = '$sd'");
				echo "<script> alert('SD: $sd, Has Been Successfully Deleted!'); location.href = 'sd.php'; </script>";
            } else {
            $outputDisplay .= "<td style = 'text-align:center'><input type='checkbox' name='".$sd."' value='Y'></td>";
            
                
            $outputDisplay .= "<td>".$sd."</td>";
    
            $outputDisplay .= "<td>".$sd_address."</td>";
			
			$outputDisplay .= "<td>".$sd_zip."</td>";
			
			$outputDisplay .= "<td>".$sd_phone."</td>";
			
			$outputDisplay .= "<td>".$city_name."</td>";
            
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
            $outputDisplay .= "<td><input id = 'delete' type='submit' value='Delete'/></td></form><form method = 'post' action = ''><td> <input type = 'text' class = 'margin' name = 'sd' size='5'> </td>";
			
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'sd_address' size='20' required> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin zip' name = 'sd_zip' size='8' required> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin phone' name = 'sd_phone' size='11' required> </td>";
			$outputDisplay .= "<td> $city_select </td>";
			
            $outputDisplay .= "</tr>";
        $outputDisplay .= "</table>";
       $outputDisplay .= '<br/><input id = "add" type="submit" name = "submit" value="Add SD(s)"/> <br/></form>';
		
    print $outputDisplay;
	
		echo "<div>";
			echo "<br/><h2 style='color: red;'>Update SD</h2>";
				$result = mysqli_query($db, "SELECT * FROM sd JOIN city ON (city_id = city_name) WHERE province_id = '$location'");
				echo "<h4 style='color: blue;'>Choose SD</h4>";
			
				echo "<form method = 'post' action = ''><select name = 'sd_update'>";
					
				while($row = mysqli_fetch_assoc($result)){
					?>
						<option value = '<?php echo $row['sd']; ?>'><?php echo $row['sd']; ?></option> 
					<?php
					
				}
				echo "</select>";
				echo "<br/><h4 style='color: blue;'>New SD Address</h4>";
			
				echo '<input type="text" name = "sd_new_address" ';
				echo "<br/><h4 style='color: blue;'>New SD Zip</h4>";
			echo '<input type="text" name = "sd_new_zip" class="zip">';
				echo "<br/><h4 style='color: blue;'>New SD Phone</h4>";
			echo '<input type="text" name = "sd_new_phone" class="phone">';
				
				echo '<br/><br/><br/><br/><input id = "update" type="submit" name = "update" value="Update SD(s)"/> <br/></form>';
		
		echo "</div>";
	
	
	
	
	
	
	if(($_POST['sd'] != "" ) && ($_POST['sd_address'] != "") && ($_POST['sd_zip'] != "") && ($_POST['sd_phone'] != "") && ($_POST['city_id'] != "") && (isset ($_POST['submit']))) {
		
		$sd = $_POST['sd'];
		$sd_address = $_POST['sd_address'];
		$sd_zip = $_POST['sd_zip'];
		$sd_phone = $_POST['sd_phone'];
		$city_id = $_POST['city_id'];
		
		$statement 	= "INSERT INTO sd  ( `sd` , `sd_address` , `sd_zip` , `sd_phone` , `city_id` ) ";
        $statement .= "VALUES (";
        $statement .= "'".$sd."', '".$sd_address."', '".$sd_zip."' , '".$sd_phone."' , '".$city_id."' )";
    
        $result = mysqli_query($db, $statement);
    
        if (!$result)
        {
            $errno = mysqli_errno($db);
    
            if ($errno == '1062') {
               echo "<script> alert('SD: $sd, Is Already In The Table!'); </script>";
		
            }
			
        }
		else {
			echo "<script> alert('SD: $sd, Has Been Successfully Added!'); </script>";
		
			echo "<script> location.href = 'sd.php' </script>";
		}
	}
	elseif(isset ($_POST['submit'])) {
		echo "<script> alert('Please Fill Out All Feilds To Add A New SD!'); </script>";
		
	}
	
	
	
	
	
	
	if(($_POST['sd_update'] != "" ) && ($_POST['sd_new_address'] != "") && ($_POST['sd_new_zip'] != "") && ($_POST['sd_new_phone'] != "") && (isset ($_POST['update']))) {
		
		$sd_update = $_POST['sd_update'];
		$sd_new_address = $_POST['sd_new_address'];
		$sd_new_zip = $_POST['sd_new_zip'];
		$sd_new_phone = $_POST['sd_new_phone'];
		
		$statement .= "UPDATE `sd` SET `sd_address`='$sd_new_address',`sd_zip`='$sd_new_zip',`sd_phone`='$sd_new_phone' WHERE sd = '$sd_update'";
    
        $result = mysqli_query($db, $statement);
		echo "<script> alert('SD: $sd_update, Has Been Successfully Updated!'); </script>";
				
		echo "<script> location.href = 'sd.php' </script>";
		
	}
	elseif(isset ($_POST['update'])) {
		echo "<script> alert('Please Enter All the Required New Information To Update SD: " . $_POST['sd_update'] . "!'); </script>";
		
	}
    
    ?>
	
    </div>
    </form>
      
    
    
     
</div>
</body>
</html>
