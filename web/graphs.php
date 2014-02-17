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

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>WSBN</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="web/js/jquery.min.js"></script>
<!-- start js -->
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
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
				
				
				//$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
	</script>
<!-- Add fancyBox main JS and CSS files -->
<script src="web/js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="web/css/magnific-popup.css" rel="stylesheet" type="text/css">
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
		
		<script language="javascript" type="text/javascript" src="js/flot/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="js/flot/jquery.flot.js"></script>
		<script language="javascript" type="text/javascript" src="js/flot/jquery.flot.navigate.js"></script>	
		
		<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>	
</head>
<body onLoad="initialize()">
    <div class="single-header">	
      <div class="wrap"> 
          <div class="logo">
			 <a href="index.html"><img src="web/images/logo.png" alt=""/></a>
		  </div>
		  <div class="header-right">
			 <div id='cssmenu'>
				<ul>
				   <li><a href='about.html'><span>About</span></a></li> | 
				   <!--<li><a><span>Graphs</span></a> 
				       <ul>
				         <li class='has-sub'><a href='graphs.php?id=1'><span>1</span></a></li>
				         <li class='has-sub'><a href='graphs.php?id=2'><span>2</span></a></li>
				      </ul>
				   </li> |-->
				   <li class='has-sub'><a href='maps.php'><span>Samples</span></a></li> |
				   <!--<li class='has-sub'><a href='blog.html'><span>Blog</span></a></li> |-->
				   <li class='last'><a href='contact.html'><span>Contact Us</span></a></li>
				</ul>
			 </div>
			 <div class="search_box">
				<form>
				   <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
			    </form>
			 </div>
		   </div>
		   <div class="clear"></div>
      </div>
      </div>
      
	 <div class="main">
	 	<center>
	 		
	 	<span>Location <?php echo $id; ?></span><br>
	    
	    <div id="map" style="width:90%; height: 400px; padding-top:20px;"> </div>
	    
	    
	    </center>
	    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
		<script type="text/javascript" src="js/jquery1.7.js"></script>
		<script language="javascript" type="text/javascript" src="http://people.iola.dk/olau/flot/jquery.flot.js"></script>
		<script type="text/javascript" src="js/graph.js"></script>
		 
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
</body>
</html>