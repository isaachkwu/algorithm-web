<?php
   include("session.php");
?>
<html">
   
   <head>
	<title>Notice</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title>Food Express</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta http-equiv="refresh" content="2;homepage.php" />
   </head>
   
   <body>
<?php
if(!isset($_SESSION['loginuser'])){
?>
<ul class="nav">
	<li></li>
	<li></li>
	<li ><a href="homepage.php">Menu</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="cart.php">Cart</a></li>
</ul>
<?php
   }else{$checkuser = $_SESSION['loginuser'];
?>
<ul class="nav">
	<li><a href="homepage.php">Menu</a></li>
	<li><a href="logout.php">Logout</a></li>
	<li><a href="cart.php">Cart</a></li>
</ul>
<?php
}
?>
	<div class="content">
		<center><h1><?php echo $_SESSION['notifymsg']?></h1>
		this website will actomatically jump to the menu page.</center>
	</div>
   </body>
   
</html>