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
	<?php 
		include("navbar.php"); 
		if(!isset($_SESSION['loginuser'])){
			echo "<script>
							alert('Please Login first!');
							window.location.href='index.html';
							</script>";
		}
		include("model/CEModel.php");
		include("controller/CEController.php");
		include("view/CEView.php");
		$controller = new CEController();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = array("userid" => $_POST["userid"], 
							"courseid" => $_POST["courseid"],
							"content" => $_POST["content"]);
			$controller->addData($data);
			$controller->call("postCE");
		}
	?>
	<script type='text/javascript'>
		var button = document.getElementById("slbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Code Exercise 1</h1>
        <h2>You can do it!</h2>
      </div>
      <div class="content">
		<p>Write a program in any language to sort the array [157,23,45,12,65,85,123,5,3,23]. You can use any sorting algorithms you learnt.</p>
		<form class="pure-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<textarea class="pure-input-1" name="content" placeholder="Write your program here" rows="20" cols="70" required></textarea>
		<input type="hidden" name="userid" value="<?php echo $_SESSION['loginuser'];?>">
		<input type="hidden" name="courseid" value="100002">
		<button type="submit" class="pure-button  pure-button-primary">Submit</button>
		</form>
	  </div>
  </body>
</html>
