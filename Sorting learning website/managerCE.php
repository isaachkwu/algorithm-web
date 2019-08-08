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
   session_start();
?>
    <ul class="navbar">
      <li class="active navhead"><a href="index.html"><img src="img/icon.png" alt="icon" style="max-width:70%;height:auto;">SORTIT!</a></li>
      <li id="acbutton"><a href="managerView.php">Account/Progress</a></li>
	  <li id="cebutton"><a href="managerCE.php">Codes evaluation</a></li>
	  <li id="lobutton"><a href="logout.php">Logout</a></li>
    </ul>
	<?php
		include("connectdb.php");
		include("model/CEModel.php");
		include("controller/CEController.php");
		include("view/CEView.php");
		$controller = new CEController();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = array("codeid" => $_POST["codeid"], 
							"managername" => $_POST["managername"],
							"comment" => $_POST["comment"]);
			$controller->addData($data);
			$controller->call("evalCE");
		}
	?>
	?>
	<script type='text/javascript'>
		var button = document.getElementById("cebutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Codes evaluation</h1>
      </div>
      <div class="content">
	  
		<?php
			$controller->call("getAllCE");
		?>
		
		</div>
	</div>
	  <script>
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
			this.classList.toggle("colactive");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
			  content.style.maxHeight = null;
			} else {
			  content.style.maxHeight = content.scrollHeight + "px";
			} 
		  });
		}
		</script>
  </body>
</html>