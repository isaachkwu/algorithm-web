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
		$loginemail = $_SESSION['loginuser'];
		$sql = "SELECT 
			progress.courseno, progress.level, progress.mark, progress.userid, user.username 
			FROM user,progress 
			WHERE (user.userid = progress.userid)";
		$result = mysqli_query($conn,$sql);
	?>
	<script type='text/javascript'>
		var button = document.getElementById("acbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Report</h1>
        <h2>check all data</h2>
      </div>
      <div class="content">
		<h2>Report</h2>
		<p>
			<table class="pure-table pure-table-bordered">
			<thead>
				<tr>
					<th>Course No.</th>
					<th>Level</th>
					<th>Marks</th>
					<th>user ID</th>
					<th>User name</th>
				</tr>
			</thead>
			<tbody>
		<?php
			while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
				echo "<td>".$row['courseno']."</td>
						<td>".$row['level']."</td>
						<td>".$row['mark']."</td>
						<td>".$row['userid']."</td>
						<td>".$row['username']."</td>
						";
				echo "</tr>";
			}
		?>
			</tbody>
		</table>
		</p>
    </div>
  </body>
</html>