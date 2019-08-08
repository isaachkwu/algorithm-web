mcheckuser<!DOCTYPE html>
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
	<li><a class="active" href="checkorder.php">Check Order</a></li>
	<li><a href="mcheckuser.php">Check User</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
<div class="content">
<center><h1>Check order</h1></center><br>
<?php
	$servername = "mysql.comp.polyu.edu.hk";
	$username = "16075843d";
	$password = "isfsadqs";
	$dbname = "16075843d";
	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection
	if (!$conn) {
	die("Connection failed: " . mysql_error());
	}
	mysql_select_db($dbname, $conn);
	$sql = "SELECT orderid,ousername,requesttime,arrivetime,status,orderfoodid FROM Orderr";
	$result = mysql_query($sql, $conn);
	if (mysql_num_rows($result) > 0) {
	// output data of each row
	echo "<table class='mview'><tr><th>orderId</th><th>ousername:<br>orderer username</th><th>request time</th><th>arrivetime</th><th>status</th><th>orderfooid:<br>ordered food id</th></tr>";
	while($row = mysql_fetch_assoc($result)) {
	echo "<tr><td>" . $row['orderid']. "</td><td>" . $row['ousername']. "</td><td>" . $row['requesttime'].
	"</td><td>".$row['arrivetime']."</td><td>".$row['status']."</td><td>".$row['orderfoodid']."</td></tr>";
	}
	echo "</table>";
	} else {
	echo "0 results";
}
?>
</div>
</body>
</html>