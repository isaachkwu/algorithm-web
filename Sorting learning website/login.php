<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>SortIT!</title>
    <!--[if lte IE 8]>
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">
    <!--<![endif]-->
  </head>
  <body>
	<?php include("navbar.php"); ?>
	<?php
	include("connectdb.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = mysqli_real_escape_string($conn,$_POST["email"]);
		$password = mysqli_real_escape_string($conn,$_POST["password"]);
		$sql = "SELECT username FROM user WHERE email = '$email' AND pw = '$password'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result); 
		if($count == 1) {
			$_SESSION['loginuser'] = $email;
			echo "<script>
			alert('Welcome back! " . $row['username'] . "');
			window.location.href='index.html';
			</script>";
		}else {
			echo "<script type='text/javascript'>alert('Wrong email or password.');</script>";
		}
	}
	mysqli_close($conn);
  ?>
	<script type='text/javascript'>
		var button = document.getElementById("acbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Account Login</h1>
		<h2>access to your personal learning progress easily</h2>
      </div>
      <div class="content">
		<form class="pure-form pure-form-stacked" method="post" 
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<fieldset>
				<label for="email">Email</label>
				<input name="email" type="email" placeholder="Email" requrired>
				<label for="password">Password</label>
				<input name="password" type="password" placeholder="Password" required>
				<button type="submit" class="pure-button pure-button-primary">Sign in</button>
				<button class="pure-button pure-button-primary" type="button" onclick="location.href='register.php';">Register</button>
			</fieldset>
		</form>
	  </div>
  </body>
</html>
