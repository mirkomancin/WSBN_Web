<?php 
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */
include "app/config.php";
include "app/detect.php";

if ($page_name=='') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='index.html') {
	include $browser_t.'/index.html';
	}
elseif ($page_name=='services.html') {
	include $browser_t.'/services.html';
	}
elseif (0 === strpos($page_name, 'graphs.php')) {
//elseif ($page_name=='graphs.php') {
	if(isset($_GET['id']))
		$id = $_GET['id'];
	else
		$id = 1;
	//include $browser_t.'/graphs.php';
	include 'web/graphs.php';
	}
elseif (0 === strpos($page_name, 'details.php')) {
//elseif ($page_name=='graphs.php') {
	if(isset($_GET['device']))
		$id = $_GET['device'];	
	//include $browser_t.'/details.php';
	include 'web/details.php';
	}
elseif ($page_name=='blog.html') {
	include $browser_t.'/blog.html';
	}
elseif ($page_name=='single.html') {
	include $browser_t.'/single.html';
	}
elseif ($page_name=='about.html') {
	include $browser_t.'/about.html';
	}
elseif ($page_name=='archives.html') {
	include $browser_t.'/archives.html';
	}
elseif ($page_name=='contact.html') {
	include $browser_t.'/contact.html';
	}
elseif ($page_name=='404.html') {
	include $browser_t.'/404.html';
	}
elseif ($page_name=='maps.php') {
	//include $browser_t.'/maps.php';
	include 'web/maps.php';
	}
elseif ($page_name=='contact-post.html') {
	include $browser_t.'/contact.html';
	include 'app/contact.php';
	}
else
	{
		include $browser_t.'/404.html';
	}

?>
