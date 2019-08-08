<?php
$servername = "mysql.comp.polyu.edu.hk";
$username = "16075843d";
$password = "isfsadqs";
$dbname = "16075843d";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_error());
}
$sql = "INSERT INTO Userss (username,firstname,lastname,email,pw,address,phno,level) 
	VALUES ('simonlee77','simon','lee','simon@abc.abc','1234','shatin',23412341,'M')";
if (mysqli_query($conn,$sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>