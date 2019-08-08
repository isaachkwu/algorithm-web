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
$sql = "SELECT username, firstname, lastname, email, pw,level,address,phno FROM Userss";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
// output data of each row
while($row = mysql_fetch_assoc($result)) {
echo "username: " . $row["username"]. " - firstname: " . $row["firstname"]. " - lastname " . $row["lastname"].
" - email : ".$row["email"]." - pw: ".$row["pw"]." - level: ".$row["level"]." - address : ".$row["address"]." - phno: ".$row["phno"]."<br>";
}
} else {
echo "0 results";
}
?>