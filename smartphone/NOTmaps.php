<?php
require_once ("lib/php/util.php");
$m2mConnect = new M2MConnect();

/*
if(isset($_GET['id']))
	$id = $_GET['id'];
else
	echo 'ERROR';
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<title>WSBN</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="smartphone/css/style.css" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bluebox Iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(
hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<!-- jQuery -->
<script type="text/javascript" src="smartphone/js/jquery.min.js"></script>
<script src="smartphone/js/mobile.js"></script>
</script><script type="text/javascript">window.onload = function() { w3Init(); };</script>	
<!-- start js -->
<script type="text/javascript" src="smartphone/js/move-top.js"></script>
<script type="text/javascript" src="smartphone/js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
	<script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
	</script>
<!-- Add fancyBox main JS and CSS files -->
<script src="smartphone/js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="smartphone/css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>	
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>		
</head>
<body>
   <div class="wrap"> 	
     <div class="single-header">	
        <ul id="header">
    		<a href="index.html"><img src="smartphone/images/logo.png" alt=""></a>
    	</ul>
    	<div id="w3-mobile-options">
    		<li id="w3-menu-trigger" class=" ">
    			<a href="">Menu</a></li>
    			<li id="w3-search-trigger" class=" ">
    				<a href="contact.html">Search</a>
    			</li>
    	 </div>
    		<ul id="w3-menu-links" style="display: none;" class=" ">
    				<li><a href="index.html">Home</a></li> 
    			    <li><a href="about.html">About</a></li> 
					<li><a href="maps.php">Samples</a></li>
					<li><a href="contact.html">Contact</a></li>
					 
    		</ul>
    	  <div id="w3-search-module" style="display: none;" class="">
    		<form id="w3-search-form">
    			<p>
    			   <input type="text" value="">
    			   <input type="submit" id="w3-search" class="w3-btn-search" value="Submit" name="Submit">
    			</p>
    		</form>
    	 </div>
     </div>
    <div class="main">
	 	
	 	<center>
		    <script type="javascript" src="smartphone/js/maps.js"></script>
		 	<div id="map" style="width:90%; height: 400px; padding-top:20px;"> </div>  
	    </center>
	 	
	</div>
    
	<div class="footer">
   	    <div class="wrap">
   	    	<div class="footer-left">
		 		<ul class="footer-nav">
					<li><a href="index.html">Home</a></li> |
					<li><a href="about.html">About</a></li> | 
					<li><a href="maps.html">Samples</a></li> |					 
					<li><a href="contact.html">Contact</a></li>
				</ul>
				<div class="copy">
			       <p>© 2014 Filippo Di Gennaro, Mirko Mancin, Giovanni Franco</p>
		        </div>
			</div>
			<div class="social">	
	           <ul>	
				    <li class="facebook"><a href="#"><span> </span></a></li>
				    <li class="linkedin"><a href="#"><span> </span></a></li>
				    <li class="twitter"><a href="#"><span> </span></a></li>	 
				    <li class="pinterest"><a href="#"><span> </span></a></li>
				    <li class="dribble"><a href="#"><span> </span></a></li>			
					<li class="google"><a href="#"><span> </span></a></li>
			  </ul>
		   </div>
		   <div class="clear"></div>
	    </div>
   </div>
     <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
   </div>
</body>
</html>