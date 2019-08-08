<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" >
<title>Food Express</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript">
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function delfood(foodid){
	var nowcart = getCookie("cart");
	for(i=0;i<nowcart.length;i++){
		if(nowcart.charAt(i)==foodid){
			nowcart= nowcart.slice(0,i)+nowcart.slice(i+2,nowcart.length);
			break;
		}
	}
	document.cookie="cart="+nowcart+";";
	alert("Items deleted.");
	location.reload();
}
</script>
</head>
<body>

<!-- Navbar -->
<?php include("checkuser.php");?>
<div class="content">
<h1>Your Cart</h1><br>
	<?php
		include("dbconfig.php");
		if(!isset($_COOKIE["cart"])){echo "empty cart";}elseif($_COOKIE["cart"]==""){echo "empty cart";}else{
			$foodlist = $_COOKIE["cart"];
			$foodarray = [];
			for($x=0;$x<strlen($foodlist);$x++){
				if($x%2==0){
					array_push($foodarray,substr($foodlist,$x,1));
				}
			}
			if (!$conn) {
				die("Connection failed: " . mysqli_error());
			}
			echo "<table class='menutable'>";
			$totalprice=0;
			if(!isset($_SESSION['loginuser'])){
				$discount=1.0;
			}else{
				$discount=0.9;}
			for($x=0;$x<count($foodarray);$x++){
				$tfoodid=$foodarray[$x];
				$sql = "SELECT foodid,foodname,description,ingredients,price,amount FROM Food WHERE foodid=$tfoodid and amount>0";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				$imgname="foodimage/".$row["foodid"].".jpg";
				$itemprice=$row["price"]*$discount;
				$totalprice+=$itemprice;
				echo "<tr><td class='pic'>
						<img src='$imgname' height='90' width='160'></td>
						<td class='big'><b><strong>".$row["foodname"]."</strong></b> <br><i> ".$row["description"]." </i><br> ".$row["ingredients"]." <br> $".$itemprice.
						"</td><td class=small>".
						"<button type='submit' onclick='delfood(".$row["foodid"].");'>delete</button></td></tr>";
				
			}
			echo "</table>
				<div style='text-align:right;width:100%;font-size:20px;'>Total Price:$$totalprice";
			mysqli_close($conn);
	?>
<br><a style="-webkit-appearance: button;-moz-appearance: button;appearance: button;text-decoration: none;color: initial;" href= "makeorder.php">Checkout</a>
<?php } ?>
</div>
</div>
</body>
</html>