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

function getfood(foodid){
	var nowcart = getCookie("cart");
	if(nowcart==""){
		document.cookie="cart="+foodid+',';
	}else{
		document.cookie="cart="+nowcart+foodid+",;";
	}
	document.getElementById("notify").innerHTML="Item "+foodid+" is added to your cart.";
}
</script>
	
</head>
<body>

<!-- Navbar -->
<?php include("checkuser.php");?>

<div class="content">
<h1>Main Menu</h1><div id="notify" style="color:red">        Please select item.</div><br>
<div class="row">
	<div style="width:20%" class="column">
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<ul class="menu">
			<input type="hidden" id="cuisine" name="cuisine" value=""> 
			  <li><button onclick="document.getElementById('cuisine').value = 'European';" type="submit">European cuisine</button></li>
			  <li><button onclick="document.getElementById('cuisine').value = 'Chinese';" type="submit">Chinese cuisine</button></li>
			  <li><button onclick="document.getElementById('cuisine').value = 'Italian';" type="submit">Italian cuisine</button></li>
			  <li><button onclick="document.getElementById('cuisine').value = 'Japanese';" type="submit">Japanese cuisine</button></li>
		</ul>
		</form>
	</div>
	<div class=" menucon column"><?php 
			include("dbconfig.php");
			$cuisine="";
			if ($_SERVER["REQUEST_METHOD"]=="POST"){
				$cuisine = $_POST["cuisine"];
			}
			include("function/retrievefood2.php");
		?></div>
</div>
</div>
</body>
</html>