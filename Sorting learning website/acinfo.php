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
		include("connectdb.php");
		include("model/CEModel.php");
		include("controller/CEController.php");
		include("view/CEView.php");
		$loginemail = $_SESSION['loginuser'];
		$sql = "SELECT userid,username FROM user WHERE email ='".$_SESSION['loginuser']."'";
		$result4 = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result4,MYSQLI_BOTH);
		$usernamename = $row['username'];
		$userid = $row['userid'];
		$sql = "SELECT courseno, level, mark FROM progress WHERE userid = $userid";
		$result = mysqli_query($conn,$sql);
	?>
	<script type='text/javascript'>
		var button = document.getElementById("acbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Account Information</h1>
        <h2>check your account information and learning progress</h2>
      </div>
      <div class="content">
		<h2>Account Information</h2>
		<p>
		User Name : <?php echo $usernamename;?> <br>
		email : <?php echo $loginemail;?><br>
		</p>
		<h2>Coding Exercise</h2>
		<?php
			$controller = new CEController();
			$controller->call("getMyCE");
		?>
		<h2>Learning Progress</h2>
		<p>
				<table class="pure-table pure-table-bordered">
			<thead>
				<tr>
					<th>courseno</th>
					<th>Level</th>
					<th>Mark</th>
				</tr>
			</thead>
			<tbody>
		<?php
			while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
				echo "<td>".$row['courseno']."</td>
						<td>".$row['level']."</td>
						<td>".$row['mark']."</td>";
				echo "</tr>";
			}
		?>
			</tbody>
		</table>
		</p>
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