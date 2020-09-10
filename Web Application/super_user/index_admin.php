<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	session_start();
	   if(isset($_SESSION['login_status_location_super_user']) == ""  ) {
		header('Location: ../login_panel.php');   
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>
body {
  background: url(../img_project/backgrounds/super_user.jpg)center 0 no-repeat fixed;
  background-size: 100% 100%;
}
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
	}td {
		font-size: .7em;
		font-weight:100
	}

</style>
<title>Stop Being Bullied!</title>
<link rel="stylesheet" href="../css/style_super_user.css">
<body >
<a style = "float:right; color:blue" onclick="<?php session_start(); $_SESSION['logout'] = "alert" ?>" href = "../login_panel.php">LOG OUT</a>
<br/><br/>
  <h1 style = "color:black; text-align:center">Welcome <?php $db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

$location =  $_SESSION['login_status_location_super_user'];
   $query = "SELECT * FROM `admin` WHERE location = '".$location."'"; 
								  $results = mysqli_query($db, $query); 
								  $row = mysqli_fetch_assoc($results);
								  
								  echo $row['admin_lname'] . ", " . $row['admin_fname']; ?></h1><h5 style = "color:black; text-align:center;">Super User Of This System</h5>

<div style = "text-align:center" >
<div style = "width:100%; margin:0 auto;">	
  <div id = "display_table" style = "text-align:center">
    <br/><br/>
	
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
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM admin_type";
		
		$result = mysqli_query($db, $sql_statement); // code has ran
		$type_select = "";
		$type_select .= "<select name = 'user_type' size = '1'>";
		  $type_select .= "<option value=''>---</option>";
		  
		while ($row = mysqli_fetch_assoc($result)) {
			$type_select .= "<option value='".$row['admin_id']."'>".$row['admin_type']."</option>";
		}
		$type_select .= "</select>";
		?><?php
		$sql_statement  = "SELECT * ";
		$sql_statement .= "FROM admin_type";
		
		$result = mysqli_query($db, $sql_statement); // code has ran
		$type_select_new = "";
		$type_select_new .= "<select name = 'user_type_new' size = '1'>";
		  $type_select_new .= "<option value=''>---</option>";
		  
		while ($row = mysqli_fetch_assoc($result)) {
			$type_select_new .= "<option value='".$row['admin_id']."'>".$row['admin_type']."</option>";
		}
		$type_select_new .= "</select>";
		?>
    <?php 
	
	//**********************************************
    //*
    //*  DISPLAY AND DELETE PHP
    //*
    //**********************************************
    
    
    print "<form method='post' action=''><p>";
    
	    
	$sql_statement  = "SELECT * ";
    $sql_statement .= "FROM admin JOIN admin_type USING(admin_id) WHERE location != '$location' ORDER BY user_id ";
    $sql_statement .= "LIMIT ".$limit2.", ".$limit1.""; 
	
	
    
    $result = mysqli_query($db, $sql_statement);
    
    $outputDisplay = "";
    
      
        $outputDisplay  = "<br/><h1 style='color: red;'>Administrators</h1>";
    
        $outputDisplay .= '<table style="color: black;margin:0 auto">';
        $outputDisplay .= '<tr><th></th>
		<th><form method = "post" action = ""> &nbsp; User ID &nbsp; </th>
		<th> &nbsp; User Password &nbsp; </th>
		<th> &nbsp; First Name &nbsp; </th>
		<th> &nbsp; Last Name &nbsp; </th>
		<th> &nbsp; Email &nbsp; </th>
		<th> &nbsp; Location &nbsp; </th>
		<th> &nbsp; Level/Type &nbsp; </th>
		</tr>';
    
        $numresults = mysqli_num_rows($result);
    
        for ($i = 0; $i < $numresults; $i++)
        {
            
    
            $row = mysqli_fetch_array($result);
    
            $user_id    = $row['user_id'];
			$admin_type   = $row['admin_type'];
			$admin_password   = $row['admin_password'];
			$location   = $row['location'];
			$admin_fname   = $row['admin_fname'];
			$admin_lname   = $row['admin_lname'];
			$admin_email   = $row['admin_email'];
			
            if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: white\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: black;color:white\">";
            }
			   
            if (isset($_POST[$user_id]))
            {
                $checked = $_POST[$user_id];
            } else {
                $checked = 'N';
            }
    
            if ($checked == 'Y')
            {
                mysqli_query($db,"DELETE FROM admin WHERE user_id = '$user_id'");
				echo "<script> alert('User ID: $user_id Has Been Successfully Deleted!'); </script>";
		
				echo "<script> location.href = 'index_admin.php' </script>";
            } else {
            $outputDisplay .= "<td style = 'text-align:center'><input type='checkbox' name='".$user_id."' value='Y'></td>";
            
			$outputDisplay .= "<td><img src = 'user.png' style = 'width:20px;height:20px'> &nbsp; <span style = 'font-size:20px;'>".$user_id."</span></td>";
			$outputDisplay .= "<td>".$admin_password."</td>";
			$outputDisplay .= "<td>".$admin_fname."</td>";
			$outputDisplay .= "<td>".$admin_lname."</td>";
			$outputDisplay .= "<td>".$admin_email."</td>";
			$outputDisplay .= "<td>".$location."</td>";
			$outputDisplay .= "<td>".$admin_type."</td>";
			
            $outputDisplay .= "</tr>";
			}  
        }
		if (($i % 2) == 0)
            {
               $outputDisplay .= "<tr style=\"background-color: white; text-align:center\">";
            } 
            else
            {
               $outputDisplay .= "<tr style=\"background-color: black; text-align:center\">";
            }
			$result = mysqli_query($db,"SELECT * FROM admin ORDER BY user_id DESC LIMIT 0,1");
			$row = mysqli_fetch_assoc($result);
			$user_id = $row['user_id'] + 1;
            $outputDisplay .= "<td><input id = 'delete' type='submit' value='Delete'/></td></form><form method = 'post' action = ''><td> <input type = 'text' class = 'margin' name = 'user_id' disabled = 'disabled' value = '$user_id' size='5'> </td>";
			
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'admin_password' size='20'> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'admin_fname' size='20'> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'admin_lname' size='20'> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'admin_email' size='20'> </td>";
			$outputDisplay .= "<td> <input type = 'text' class = 'margin' name = 'location' size='20'> </td>";
			$outputDisplay .= "<td> $type_select </td>";
			
            $outputDisplay .= "</tr>";
        $outputDisplay .= "</table>";
       $outputDisplay .= '<br/><input id = "add" type="submit" name = "submit" value="Add Admin"/> <br/></form>';
		
    print $outputDisplay;
	
		echo "<div>";
			echo "<br/><h2 style='color: red;'>Update Admin</h2>";
				$result = mysqli_query($db, "SELECT * FROM admin JOIN admin_type USING(admin_id) WHERE location != '$location' ORDER BY user_id");
				echo "<h4 style='color: black;'>Choose User ID</h4>";
			
				echo "<form method = 'post' action = ''><select name = 'user_id_new'>";
					
				while($row = mysqli_fetch_assoc($result)){
					?>
						<option value = '<?php echo $row['user_id']; ?>'><?php echo $row['user_id'] . ' | ' . $row['admin_lname'] . ', ' . $row['admin_fname']; ?></option> 
					<?php
					
				}
				echo "</select>";
				echo "<br/><h4 style='color: black;'>New Admin Password<br/>";
				echo '<input type="text" name = "admin_password_new"> ';
				
				echo "<br/><h4 style='color: black;'>New Admin First Name<br/>";
			    echo '<input type="text" name = "admin_fname_new"> ';
				
				echo "<br/><h4 style='color: black;'>New Admin Last Name<br/>";
			    echo '<input type="text" name = "admin_lname_new"> ';
				
				echo "<br/><h4 style='color: black;'>New Admin Email<br/>";
			    echo '<input type="text" name = "admin_email_new"> ';
				
				echo "<br/><h4 style='color: black;'>New Admin Location<br/>";
			    echo '<input type="text" name = "admin_location_new"> ';
				
				echo "<br/><h4 style='color: black;'>New Admin Type<br/>";
				echo $type_select_new . "</h4>";
				
				echo '<br/><input id = "update" type="submit" name = "update" value="Update Admin"/> <br/></form>';
		
		echo "</div>";
	
	
	
	
	
	
	if(($_POST['admin_password'] != "" ) && ($_POST['admin_fname'] != "") && ($_POST['admin_lname'] != "") && ($_POST['admin_email'] != "") && ($_POST['location'] != "") && ($_POST['user_type'] != "") && (isset ($_POST['submit']))) {
		
		$admin_password = $_POST['admin_password'];
		$admin_fname = $_POST['admin_fname'];
		$admin_lname = $_POST['admin_lname'];
		$admin_email = $_POST['admin_email'];
		$location = $_POST['location'];
		$user_type = $_POST['user_type'];
		
		$statement 	= "INSERT INTO `admin`(`user_id`, `admin_id`, `admin_password`, `location`, `admin_fname`, `admin_lname`, `admin_email`) ";
        $statement .= "VALUES (";
        $statement .= "'".$user_id."', '".$user_type."', '".$admin_password."', '".$location."', '".$admin_fname."', '".$admin_lname."', '".$admin_email."')";
    
        $result = mysqli_query($db, $statement);
    
        
			echo "<script> alert('User ID: $user_id ($admin_lname, $admin_fname), Has Been Successfully Added!'); </script>";
		
			echo "<script> location.href = 'index_admin.php' </script>";
		
	}
	elseif(isset ($_POST['submit'])) {
		echo "<script> alert('Please Fill Out All Feilds To Add A New User!'); </script>";
		
	}
	
	
	
	
	
	
if(($_POST['admin_password_new'] != "" ) && ($_POST['admin_fname_new'] != "") && ($_POST['admin_lname_new'] != "") && ($_POST['admin_email_new'] != "") && ($_POST['admin_location_new'] != "") && ($_POST['user_type_new'] != "") && (isset ($_POST['update']))) {
		
		$user_id_new = $_POST['user_id_new'];
		$admin_password = $_POST['admin_password_new'];
		$admin_fname = $_POST['admin_fname_new'];
		$admin_lname = $_POST['admin_lname_new'];
		$admin_email = $_POST['admin_email_new'];
		$location = $_POST['admin_location_new'];
		$user_type = $_POST['user_type_new'];
		
		$statement .= "UPDATE `admin` SET `admin_id`='$user_type',`admin_password`='$admin_password', `location`='$location', `admin_fname`='$admin_fname', `admin_lname`='$admin_lname', `admin_email`='$admin_email' WHERE user_id = '$user_id_new'";
    
        $result = mysqli_query($db, $statement);
		if($result) {
		echo "<script> alert('User: $user_id_new, Has Been Successfully Updated!'); </script>";
				
		echo "<script> location.href = 'index_admin.php' </script>";
		}
	}
	elseif(isset ($_POST['update'])) {
		$user_id_new = $_POST['user_id_new'];
		
		echo "<script> alert('Please Fill In All Feilds To Update User: $user_id_new!'); </script>";
		
	}
    
    ?>
	
    </div>
    </form>
		  
</div>

</body>

</html>