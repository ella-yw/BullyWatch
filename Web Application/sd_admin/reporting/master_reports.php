<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	   if(isset($_SESSION['login_status_location_sd_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location = $_SESSION['login_status_location_sd_admin'];
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Master Reports</title>
			
			
		<style>
			body {
		background: url(background.jpg) no-repeat fixed;
		background-size: 100% 100%;
		font-family:verdana; 
		color: red;
	}
			option { 
				border-bottom: .5px dotted #000; 
				}
				.select {
					display: block;
					 margin: auto;
					 font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', serif;
					  padding: 5px 5px 5px 5px;
					}
					#good{
					border: 2px solid green;
					text-align: center;
					background-color: lightgreen;
				}
    	</style>
	</head>
	
    <body>
	         <a style = "float:right; color:blue; text-decoration:none; cursor:pointer;" href="../index_admin.php"><img src='../../img_project/close_cross.png' style="width:70px;margin:0 auto"/></a>
		<br/><br/><br/><br/><br/><br/>
			  <div style = "text-align:center; font-size:25px; color:purple;font-weight:bold">
             	Statistics/Reports:
             </div>
			 </b>
             <br/><br/>
			 <form>
            
               <select id = 'all_tables' class = "select" size="12">
                <optgroup label="Please Select :-">
                <option value = 'incident_details.php'>Incident (Parameter) </option>
                <option value = 'action_details.php'>Action (Parameter) </option>
                <option value = 'total_bullies.php'>Bullies No. Of Incidents </option>
                <option value = 'under_monitoring_bullies.php'>Bullies Under Monitoring </option>
                <option value = 'victim_gender.php'>Victims (Gender Based) </option>
                <option value = 'bully_gender.php'>Bullies (Gender Based) </option>
				<option value = 'bully_rating.php'>Specific Bully Ratings </option>
                <option value = 'types_per_school.php'>School-Wise Bullying Type Ratio </option>
                <option value = 'types_per_sd.php'>SD-Wise Bullying Type Ratio </option>
                <option value = 'incident_teacher.php'>Incidents Handled By Specific Teacher &nbsp; &nbsp;</option>
                <option value = 'inter_grade.php'>Inter-Grade Bullying </option>
                <option value = 'inter_school.php'>Inter-School Bullying </option>
                <option value = 'main_school_incident.php'>School-Wise Incident Ratio & Comparison </option>
                <option value = 'fake_complaints.php'>SD-Wise Fake Complaints</option>
              
           </select>
          </form>
        <script type="text/javascript">
			var selectmenu=document.getElementById("all_tables");
				
			selectmenu.onchange = function(){ //run some code when "onchange" event fires
			 	var chosenoption = this.options[this.selectedIndex]; //gets values(urls') of the options
			 	if (chosenoption.value!="nothing"){
			  		location.href = ''+chosenoption.value+''; //opens target site (based on option's value attr) in new window
						}
			}
		</script>


        
            
           	
</body>
</html>
