<html>
<head>
<?php
   session_start();
   if (isset($_COOKIE["cart"])){
		setcookie("cart", "", time() - 3600);
	}
   if(session_destroy()) {
		echo "<script type='text/javascript'>alert('account has log out.');</script>";
      header("Location: notify.php");
   }
?>
</head>
</html>