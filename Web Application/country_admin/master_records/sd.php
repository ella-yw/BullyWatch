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
			data: 'province_id_sd=' + val,
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
	
	<form method = "post" action="" enctype="multipart/form-data">
        <div class = "head">
       
          
         <h4 style = "color:black; margin-left:10px">        
        	<label>Overall Results For:</label>
                    
					<?php
					$result = mysqli_query($db,"SELECT * FROM country WHERE country_id = '$location'");
					$row = mysqli_fetch_assoc($result);
					$country_name = $row['country_name'];
					?>
					<input type = 'text' value = '<?php echo $country_name; ?>' disabled = 'disabled'/>
                
          </h4>
		  
       <h2 style = "color:black; margin-left:20px">        
        	Filter By:
		</h2>
		<h4 style = "color:black; margin-left:40px">        
        	<label>Province:</label>
           
              	<select name = 'province' onChange="getCity(this.value);" style = 'width:200px;' required>
				<option value = '' selected="true" disabled="disabled">Select Province...</option> 
					
                <?php
                $query ="SELECT * FROM province WHERE country_id = '" . $location . "'";
				$result = mysqli_query($db,$query);
				while ($row = mysqli_fetch_array($result)) {
					?>
						<option value = '<?php echo $row['province_id']; ?>'><?php echo $row['province_id'] . ", " . $row['province_name']; ?></option> 
					<?php
				}
				?>
				</select>
				</h4>
				<h4 style = "color:black; margin-left:40px">        
        	<label>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
           
              	<select name = 'city' id = "city-list" onChange="getSD(this.value);" style = 'width:200px;' required>
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
    $sql_statement .= "FROM sd JOIN city ON (city_id=city_name) JOIN province USING (province_id) WHERE country_id = '$location' ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
    
    
        $outputDisplay  = "<br/><h1>School Districts In: $country_name</h1>";
    
        $outputDisplay .= '<table style="color: black; margin: 0 auto">';
        $outputDisplay .= '<tr><th> &nbsp; SD &nbsp; </th><th> &nbsp; SD Address &nbsp; </th><th> &nbsp; SD Zip &nbsp; </th><th> &nbsp; SD Phone &nbsp; 
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
            
                
            $outputDisplay .= "<td>".$sd."</td>";
    
            $outputDisplay .= "<td>".$sd_address."</td>";
			
			$outputDisplay .= "<td>".$sd_zip."</td>";
			
			$outputDisplay .= "<td>".$sd_phone."</td>";
			
			$outputDisplay .= "<td>".$city_name."</td>";
            
            $outputDisplay .= "</tr>";
            
            
            
        }
        
        $outputDisplay .= "</table>";
       
    
    
    print $outputDisplay;
    
    ?>
    </form>  
    
    
     
</div></div>
</body>
</html>
