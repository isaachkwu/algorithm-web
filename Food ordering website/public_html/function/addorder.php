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
$sql = "INSERT INTO Orderr (orderid,ousername,requesttime,arrivetime,status,orderfoodid) 
VALUES (NULL,1,CURRENT_TIMESTAMP,NULL,'A',1)";
if (mysqli_query($conn,$sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>