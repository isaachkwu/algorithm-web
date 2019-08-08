<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" >
<title>Food Express</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
include("dbconfig.php");
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
session_start();
$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = mysqli_real_escape_string($conn,$_POST["username"]);
    $pw = mysqli_real_escape_string($conn,$_POST["pwd"]);
	$firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
	$lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
	$email = mysqli_real_escape_string($conn,$_POST["email"]);
	$address = mysqli_real_escape_string($conn,$_POST["address"]);
	$phno = mysqli_real_escape_string($conn,$_POST["phno"]);
	
	include("function/adduserss.php");
	
}
?>
<!-- Navbar -->
<ul class="nav">
	<li ><a href="homepage.php">Menu</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="cart.php">Cart</a></li>
</ul>

<div class="content">
	<form class="input" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<center><h1>Register : Please enter all information.</h1></center><br>
	<div class="error"><?php echo $error;?></div><br>
	Username : <br>
	<input type="text" name="username" placeholder="<20 english characters, numbers or symbels" required><br><br>
	Password : <br>
	<input type="password" name="pwd" placeholder="<30 english characters, numbers or symbels" required><br><br>
	Your first name :<br> 
	<input type="text" name="firstname" placeholder="e.g. Peter" required><br><br>
	Your last name : <br>
	<input type="text" name="lastname" placeholder="e.g. chan" required><br><br>
	Email address: <br>
	<input type="email" name="email" placeholder="e.g. chan123@abc.com" required><br><br>
	Home address : <br>
	<input style="width:100%" type="text" name="address" placeholder="e.g. Room 1, 1/F, Happy building, N.T." required><br><br>
	Mobile phone number (must have 8 digits): <br>
	<input type="tel" name="phno" placeholder="e.g. 12345678" minlength=8 maxlength=8 
	pattern="[0-9]{8}"required ><br><br>
	<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>