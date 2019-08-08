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
		include("model/QAModel.php");
		include("controller/QAController.php");
		include("view/QAView.php");
		$controller = new QAController();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = array("userid" => $_POST["userid"], 
							"topic" => $_POST["topic"],
							"content" => $_POST["content"],
							"type" => $_POST["type"],
							"replyid" => $_POST["replyid"]);
			$controller->addData($data);
			$controller->call("postQA");
		}
	?>
	<script type='text/javascript'>
		var button = document.getElementById("qabutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Q/A Forum</h1>
        <h2>Ask question or give replies!</h2>
      </div>
      <div class="content">
	  
		<?php
			$controller->call("getQA");
		?>
		
		
		<h2> Submit your question here! </h2>
		<form class="pure-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<fieldset>
				<input type="text" name="topic" class="pure-input-1" placeholder="Title">
				<textarea class="pure-input-1" name="content" placeholder="Content"></textarea>
				<input type="hidden" name="type" value="0">
				<input type="hidden" name="replyid" value="">
				 <input type="hidden" name="userid" value="<?php echo $_SESSION['loginuser'];?>">
			</fieldset>
			<button type="submit" class="pure-button  pure-button-primary">Submit</button>
			</form>
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
