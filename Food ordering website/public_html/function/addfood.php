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
$sql = "INSERT INTO Food (foodid,foodname,description,category,ingredients,price,amount,image) 
VALUES (NULL,'Pasta Carbonara','This simple Roman pasta dish derives its name from \'carbone\' meaning coal. It was a pasta popular with the coal miners.','Italian','Spaghetti, Bacon, eggs, cheese, salt and pepper',150,1,NULL)";
if (mysqli_query($conn,$sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>