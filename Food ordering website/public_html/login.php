<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" >
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include("checkuser.php");?>
<?php
include("dbconfig.php");
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ausername = mysqli_real_escape_string($conn,$_POST["username"]);
    $apassword = mysqli_real_escape_string($conn,$_POST["pwd"]);	
	$sql = "SELECT username, firstname FROM Userss WHERE username = '$ausername' AND pw = '$apassword'";
	$result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active']; 
    $count = mysqli_num_rows($result);  
    if($count == 1) {
       $_SESSION['loginuser'] = $ausername;
	   $_SESSION['notifymsg'] = "Welcome back, ".$row['firstname'].".";
       header("location: notify.php");
    }else {
       $error = "Your Username or Password is invalid";
    }
}
mysqli_close($conn);
?>

<!-- form -->
<div class="content">
<center>
<h1>Please enter your username and password</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="input">
Username<br>
<input type="text" name="username" placeholder="Username" required><br><br>
Password<br>
<input type="password" name="pwd" placeholder="Password" required><br>
<div class="error"><?php echo $error;?></div><br>
<input type="submit" value="Login">
<input type="button" value="Register" onclick="location.href='register.php';">
</form>
</center>
</div>

</body>
</html>