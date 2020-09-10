<?php
	session_start();
	$_SESSION['hello'] = "hello";
	unset($_SESSION['hello']);
	  if(isset($_SESSION['login_status_location_sd_admin']) == ""  ) {
		header('Location: ../../login_panel.php');   
   }
   $location =  $_SESSION['login_status_location_sd_admin'];

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
			
		<title>Master Data Records</title>
			
			
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
             	Master Forms:
             </div>
			 </b>
             <br/><br/>
			 <form>
            
               <select id = 'all_tables' class = "select" size="3" style='width:150px;'>
               <optgroup label="Please Select :-">
			   <option value = 'school.php'>Schools</option>
               <option value = 'teacher.php'>Teachers</option>
               <option style = "border: none" value = 'student.php'>Students</option>
                
            
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
