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
$sql = "SELECT foodid,foodname,description,category,ingredients,price,amount,image FROM Food";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo $row["foodid"]." - ".$row["foodname"]." - ".$row["description"]." - ".$row["category"]." - ".$row["ingredients"]." - ".$row["price"]." - ".$row["amount"]." - ".$row["image"]." - "."<br>";
}
} else {
echo "0 results";
}
?>