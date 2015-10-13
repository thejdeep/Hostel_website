<?php
include('connect.php');
session_start();
if(isset($_SESSION['user']))
{
if(isset($_POST['subcomp'])){
$roomno = $_POST['roomno'];
$blkno = $_POST['blockno'];
$des = $_POST['des'];
$cat = $_POST['optionsRadios'];
$name = $_SESSION['user'];
$date = date("d/m/Y");
$query = "INSERT INTO `complaint` VALUES('$date','$name','$roomno','$blkno','$cat','$des');";
error_log($query);
$data = mysqli_query($connection,$query);
	if($data)
	{
		$msg = "Thank You";
	}
	else
	{
		$msg = "Failed. Please try again";
	}
	$query1 = "SELECT * FROM `complaint` INTO OUTFILE '/tmp/test.csv' FIELDS ENCLOSED BY ',' TERMINATED BY ';' ;";
	$test = mysqli_query($connection,$query1);
}
}
else
{
	header('Location: complaint.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Register Complaint</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();
			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>
<!----font-Awesome----->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!-- start light_box -->
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />

<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("div.fancyDemo a").fancybox();
		});
	</script>

</head>
<body>
<div class="header_bg" id="home"><!-- start header -->
<div class="container">
	<div class="row header text-center specials">
		<div class="h_logo">
			<a href="index.html"><img src="images/logo.png" alt="" class="responsive"/></a>
		</div>
		<nav class="top-nav">
			<ul class="top-nav nav_list">
								<li class="logo page-scroll"><a title="hexa" href="index.php"><img src="images/logo.gif" alt="" class="responsive" width="40px" height="40px" class="responsive"/></a></li>
				<li><a href="hostels.html">Hostels</a></li>
				<li><a href="council.html">Council Team</a></li>
			    <li><a href="message.html">Message</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="complaint.php">Register Complaint</a></li>
				<li><a href="logout.php"><?php echo $_SESSION['user'];echo " Logout"?></a></li>
			</ul>
			<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="container"><!-- start main -->
	<div class="main row">
 	 	<h2 class="style">Register Complaint</h2>
 	 	<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Room No</label>
    <input type="text" class="form-control" name="roomno" placeholder="Room No">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Block No</label>
    <input type="text" class="form-control" name="blockno" placeholder="Block No">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" rows="3" name="des"></textarea>
  </div>
      <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Water Supply Fittings" checked>
    Water Supply Fittings
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="Electrical Fittings">
    Electrical Fittings
  </label>
</div>
<div class="radio disabled">
  <label>
    <input type="radio" name="optionsRadios" id="optionsRadios3" value="Furniture fIXTURES">
    Furniture Fixtures
  </label>
</div>
  </div>
  <button type="submit" class="btn btn-default" name="subcomp">Submit</button>
</form>
<h5><?php if(isset($msg))
									{
										echo $msg;
									}?></h5>
	</div>

</div><!-- end main -->
<div class="footer1_bg"><!-- start footer1 -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>NITK Surathkal</span></p>
				<a href="#home" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<script type="text/javascript">
				$(function() {
				  $('a[href*=#]:not([href=#])').click(function() {
				    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			
				      var target = $(this.hash);
				      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				      if (target.length) {
				        $('html,body').animate({
				          scrollTop: target.offset().top
				        }, 1000);
				        return false;
				      }
				    }
				  });
				});
		</script>
		<!---- start-smoth-scrolling---->		
	</div>
</div>
</body>
</html>