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
// sql to create table
$sql = "CREATE TABLE Orderr (
orderid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ousername VARCHAR(20) NOT NULL,
requesttime TIMESTAMP NOT NULL,
arrivetime TIMESTAMP,
status CHAR(1) NOT NULL DEFAULT 'A',
orderfoodid INT(6) UNSIGNED NOT NULL
)";
if (mysql_query($sql, $conn)) {
echo "Table MyGuests created successfully";
} else {
echo "Error creating table: " . mysql_error($conn);
}
mysql_close($conn);
?>