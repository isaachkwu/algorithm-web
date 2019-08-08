<?php
   include("dbconfig.php");
   session_start();
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