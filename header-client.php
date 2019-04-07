<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<head>
<title>Free Smart Store Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="header_top">
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<a href="/TH/tuan2_lab3/shopping_cart.php" title="View my shopping cart" rel="nofollow">
					</a>
					<div class="cart">
						
					</div>
		      	</div>
		      	<div class="currency" title="currency">
					<div id="currency" class="wrapper-dropdown" tabindex="1">$
						<strong class="opencart"> </strong>
						<ul class="dropdown">
							<li><a href="#"><span>$</span>Dollar</a></li>
							<li><a href="#"><span>€</span>Euro</a></li>
						</ul>
					</div>
						 <script type="text/javascript">
							function DropDown(el) {
								this.dd = el;
								this.initEvents();
							}
							DropDown.prototype = {
								initEvents : function() {
									var obj = this;

									obj.dd.on('click', function(event){
										$(this).toggleClass('active');
										event.stopPropagation();
									});	
								}
							}

							$(function() {

								var dd = new DropDown( $('#currency') );

								$(document).click(function() {
									// all dropdowns
									$('.wrapper-dropdown').removeClass('active');
								});

							});

						</script>
				   </div>
				
			   <div class="login">
			  
					<span><a href="login.html"><img src="images/login.png" alt="" title="login"/>
					</a></span>
			   </div>
			   <!-- <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow"> -->
						<?php
						session_start();
						
						if(isset($_SESSION['user'])!="")
						{
						echo "<h2>Xin chào: ".$_SESSION['user']."</h2><a href='/TH/tuan2_lab3/logout.php'>Logout</a>";
						}
						else
						{
						echo "<h2>Bạn chưa đăng nhập</h2>
						<a href='/TH/tuan2_lab3/login.php'>Login</a> - <a href='/TH/tuan2_lab3/register.php'>Register</a>";
						
						}
					?>
					<!-- </div>
		      	</div> -->
			  
		 	</div>
			
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 	
	