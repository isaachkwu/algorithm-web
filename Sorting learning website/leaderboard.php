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
		include("model/LBModel.php");
		include("controller/LBController.php");
		include("view/LBView.php");
	?>
	<script type='text/javascript'>
		var button = document.getElementById("lbbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Leaderboard</h1>
        <h2>Compete your score!</h2>
      </div>
      <div class="content">
      <?php
		$controller = new LBController();
		$controller->call("getLB");
	  ?>
	  </div>
	</div>  
  </body>
</html>
