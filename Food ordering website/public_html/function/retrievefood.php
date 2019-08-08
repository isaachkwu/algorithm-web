<?php
if (!$conn) {
die("Connection failed: " . mysqli_error());
}
$sql = "SELECT foodid,foodname,description,ingredients,price FROM Food WHERE category='$cuisine'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
	echo "<table class='menutable'>";
	while($row = mysqli_fetch_assoc($result)) {
		$imgname="foodimage/".$row["foodid"].".jpg";
		echo "<tr><td class='big'>
				<img src='$imgname' height='90' width='160'><br><b>".$row["foodname"]."</b> <br> ".$row["description"]." <br> ".$row["ingredients"]." <br> $".$row["price"].
				"</td><td class=small>lkjlkj</td>";
	}
	echo "</table>";
} else {
	echo "no results";
}
?>