<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" >
<title>Manager page</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php session_start();?>
<!-- Navbar -->
<ul class="nav">
	<li ><a href="addfoodm.php">Add Food</a></li>
	<li><a href="editfood.php">Edit Food</a></li>
	<li><a href="checkorder.php">Check Order</a></li>
	<li><a href="mcheckuser.php">Check User</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
<div class="content">
<center><h1>Welcome! <?php echo $_SESSION['managername']?></h1></center><br>
</div>
</body>
</html>