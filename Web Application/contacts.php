<!DOCTYPE html>
<html lang="en">
<head>
<title>Contacts</title>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" href="css/contact-form.css">
<link rel="stylesheet" href="css/style_contact.css">
<link rel="stylesheet" href="css/style_home.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="js/bootstrap.js"></script>
    <!--  Scrolling Script -->
    <script src="js/jquery.easing.min.js"></script>
    <!--  PrettyPhoto Script -->
    <script src="js/jquery.prettyPhoto.js"></script>
    <!--  knob Scripts -->
    <script src="js/jquery.knob.js"></script>
    <!--  Custom Scripts -->
    <script src="js/custom.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});  
 }); 
 

</script>
<style>
	#submit {
		width: 120px;
		height: 30px;
		border-radius: 7px;
		background-color: lightgrey;
		-webkit-transition: 0.5s ease;
  		transition: 0.5s ease;
	}
	#submit:hover {
		font-size: 20px;
		width: 180px;
		height: 45px;
	}
	@media (max-width: 316px) { 
		#margin {
			margin-top:40px;
		}
	}
  </style>
<!--[if lt IE 8]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<![endif]-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body >
<div id="wrapper" style="margin-bottom:100px;">
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div>

          <nav class = "isStuck" >
              <div class = "center">
			  <b><span id = "main_heading" >
           <div style="padding-top:20px;padding-bottom:10px;line-height:35px;color:white;font-size:40px;font-family:Georgia;">Take A Survey</div>
			</span></b>
         </div></li>
             

	</ul>
            </nav>
			
			</div>    
  </section>
 

<!--=====================
          Content
======================-->
<section>
  
  <a  class = "logout" href = "main.php" style='margin-left:5px;margin-top:5px;margin-bottom:10px;'><img src = 'img_project/close_cross.png' style='width:80px;'></a>

       
      <form  method="post" action="contact_backend.php" style="padding-top:20px;padding-right:20px;padding-left:20px;">
	  
       <div style="font-family:Sans-Serif;font-size:20px;font-weight:100;">Do you like/agree with this idea?<br/>Should this software be implemented, in local schools?</div>
       
                
                    <span>
<input type="radio" name="radio" value = 'YES' id="radio1" class="radio" checked/>
<label for="radio1">YES</label>
</span>

<span>
<input type="radio" name="radio" value = 'NO' id="radio2" class="radio"/>
<label for="radio2">NO</label>
</span>


	
              <br/><br/><br/><br/><br/><div style="font-family:Sans-Serif;font-size:20px;font-weight:100;" id="margin">What would you rate this web application<br/>(in terms of fuctionality implementation)?<br/>
             Give an opinionated rating <b style = "font-weight:bold">(0 being the least - 100 being the best):</b></div> <br/>
        <output style = "color:orange" id="rating">
        ( 50% )
        </output>
      
      <input type="range" id = 'behavior' name = 'rating' value = "50" min="0" max="100" oninput="outputUpdate(value)"/>
      <script>
function outputUpdate(vol) {
	document.querySelector('#rating').value = "( "+vol+"% )";
}
</script>
<br/><br/><br/>
                   <span id="contact-form">
                    <label class="message">
                      <textarea name="comments" placeholder="Additional Comments:" ></textarea>
                     
                    </label>
					</span>
                    <br><span><input id = "submit" type="submit" value="Submit" /></span><br/><br/>
	   </form>
 	  </div>
</body>
</html>