<?php
if (!$conn) {
die("Connection failed: " . mysqli_error());
}
$sql = "SELECT foodid,foodname,description,ingredients,price,amount FROM Food WHERE category='$cuisine'";
$result = mysqli_query($conn,$sql);
if(!isset($_SESSION['loginuser'])){
	$discount=1.0;
}else{
	$discount=0.9;}
if (mysqli_num_rows($result) > 0) {
	echo "<table class='menutable'><h2>".$cuisine." Cuisine</h2>";
	while($row = mysqli_fetch_assoc($result)) {
		if($row["amount"]>0){
			$imgname="foodimage/".$row["foodid"].".jpg";
			echo "<tr><td class='pic'>
					<img src='$imgname' height='90' width='160'></td>
					<td class='big'><b><strong>".$row["foodname"]."</strong></b> <br><i> ".$row["description"]." </i><br> ".$row["ingredients"]." <br> $".$row["price"]*$discount.
					"</td><td class=small>".
					"<button type='submit' onclick='getfood(".$row["foodid"].");'>Add to Cart</button></td></tr>";
		}
	}	
	echo "</table><br>";
} else {
	echo "no results";
}
mysqli_close($conn);
?>