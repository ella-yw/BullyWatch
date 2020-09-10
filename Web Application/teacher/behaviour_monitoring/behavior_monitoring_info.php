<?php
		session_start();
	    $teacher_id =  $_SESSION['login_status_teacher'];
		$intensity = $_GET['intensity'];
		$frequency = $_GET['frequency'];
		$behavior_rating = $_GET['behavior'];
		$comments = $_GET['comments'];
		$ease = $_GET['ease'];
		$bully_id = $_GET['bully_id'];

		$rating = 99 - ($frequency * $intensity) + ($behavior_rating / 100);	
		if ($rating == 99.5) {
			$rating = 100;
		}
		$month = date("M");
		
		$db = mysqli_connect('localhost','omagarwa','Gangoh1976!', 'omagarwa_stopbeingbullied');

		$query ="SELECT * FROM `behavior_monitoring` WHERE bully_id = ".$bully_id." AND month = '".$month."'";
		$results = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($results);
		
		if ($row['month'] == "") {
			
		$query ="INSERT INTO `behavior_monitoring`(`rating_id`, `bully_id`, `teacher_id`, `behavior_rating`, `comments`, `month`) VALUES (NULL,".$bully_id.",".$teacher_id.",'".$rating."','".$comments."', '".$month."')";
		$results = mysqli_query($db, $query);
		$av_rating = $rating;
			
		}
		else {
			$prev_rating = $row['behavior_rating'];
			$av_rating = ($rating + $prev_rating) / 2;
			
			$query ="UPDATE behavior_monitoring SET behavior_rating = '".$av_rating."' WHERE bully_id = ".$bully_id." AND month = '".$month."'";
			$results = mysqli_query($db, $query);
			
		}
		
		if($ease == 'YES') {  
		$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
			$result = mysqli_query($db,$sql);
			$row_b = mysqli_fetch_array($result);
			if ($row_b['end_bully'] == ""){
				$query = "UPDATE `assign_incident` SET end_bully = ".$bully_id." WHERE teacher_id = $teacher_id";
				$result = mysqli_query($db, $query);
			}
			else {
				$query = "UPDATE `assign_incident` SET end_bully = concat(end_bully, ', ".$bully_id."') WHERE teacher_id = $teacher_id";
				$result = mysqli_query($db, $query);
			}
		$sql="SELECT * FROM assign_incident WHERE teacher_id = $teacher_id";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		$bully_id_feild = $row['current_bully'];
		
		$pos = strpos($bully_id_feild, $bully_id);

		if ($pos == 0) {
			$pos = strpos($bully_id_feild, $bully_id . ', ');
			if ($pos !== false) {
				  $bully_id_feild = str_replace($bully_id . ', ', '', $bully_id_feild);
			} else {
				  $bully_id_feild = str_replace($bully_id, '', $bully_id_feild);
				 
			}
			
		} else {
			 $bully_id_feild = str_replace(', ' . $bully_id . '', '', $bully_id_feild);
		}
		$queryd ="UPDATE `assign_incident` SET current_bully = '$bully_id_feild' WHERE teacher_id = ".$teacher_id."";
		$results = mysqli_query($db, $queryd);	
		
	}
		echo $av_rating . '%';
		$query = "SELECT * FROM `student` WHERE student_id = $bully_id";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$bully_lname = $row['student_lname'];
	$bully_fname = $row['student_fname'];
	$month_for_msg = date("F");
	$query = "SELECT * FROM `teacher` WHERE teacher_id = $teacher_id";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$teacher_lname = $row['teacher_lname'];
	$teacher_fname = $row['teacher_fname'];
		
			$message = "Dear $teacher_lname, $teacher_fname,<br/><br/>You have recently added a new rating for ".$bully_lname.", ".$bully_fname.".<br/><br/>Rating Provided: <b style='font-weight:bold'>$rating%</b>.<br/>Averaged Rating for $month_for_msg: <b style='font-weight:bold'>$av_rating%</b>.<br/><br/>Sincerely,<br/>Stop Being Bullied";
	
	$query = "SELECT * FROM `teacher` WHERE teacher_id = ".$row['teacher_id'];
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$to = $row['teacher_email'];
	$subject = "New Behavior Rating!";
	$type = "HTML"; // or HTML
	$charset = "utf-8";

	$mail     = "no-reply@".str_replace("www.", "", $_SERVER['SERVER_NAME']);
	$uniqid   = md5(uniqid(time()));
	$headers  = "From: ".$mail."\n";
	$headers .= "Reply-to: ".$mail."\n";
	$headers .= "Return-Path: ".$mail."\n";
	$headers .= "Message-ID: <".$uniqid."@".$_SERVER['SERVER_NAME'].">\n";
	$headers .= "MIME-Version: 1.0"."\n";
	$headers .= "Date: ".gmdate("D, d M Y H:i:s", time())."\n";
	$headers .= "X-Priority: 3"."\n";
	$headers .= "X-MSMail-Priority: Normal"."\n";
	$headers .= "Content-type: text/".$type.";charset=".$charset."\n";
	$headers .= "Content-transfer-encoding: 7bit";

	mail($to, $subject, $message, $headers);	
		error_reporting(0);
		session_start();
	$_SESSION['after_graph'] = $bully_id;
 unset($_SESSION['behavior_monitoring']);
				 
					
						
				?>	