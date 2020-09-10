<?php
$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');
		
		if (!$db)
		{
			print "<h1>Unable to Connect to MySQL</h1>";
		}
		

    if (getenv('HTTP_X_FORWARDED_FOR')) {
        $pipaddress = getenv('HTTP_X_FORWARDED_FOR');
        $ipaddress = getenv('REMOTE_ADDR');
$IP = $pipaddress. "(via $ipaddress)" ;
    } else {
        $ipaddress = getenv('REMOTE_ADDR');
       $IP = "$ipaddress";
	 
    }
	
	$yesno = $_POST['radio'];
	$rating = $_POST['rating'];
	$comments = $_POST['comments'];
	$today = date("Y-m-d");
	
	
		
$query ="INSERT INTO `poll` ( `IP` , `Yes/No` , `Rating` , `Comments` , `Date` ) VALUES ('".$IP."', '".$yesno."',".$rating.", '".$comments."', '".$today."')";
				$results = mysqli_query($db, $query);
				if($results) {
				echo "<script> alert('Thank you for your valuable feedback! It really helps!'); </script>";
				
				
				}
				else {
					
			print "<p style='color: red;'><b>MySQL No: ".mysqli_errno($db)."<br></b>";
			print "<b>MySQL Error: ".mysqli_error($db)."<br></b>";
			print "<b><br>Failed SQL Statement`: ".$query."<br></b>";
		
				}
	echo '<script type="text/javascript"> window.location = "main.php" </script>';
			
 
 ?>