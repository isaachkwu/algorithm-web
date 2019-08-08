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
		$sql = "SELECT user.username,SUM(progress.mark) AS totalmarks FROM progress, user WHERE (user.userid = progress.userid) GROUP BY progress.userid ORDER BY totalmarks asc";
		$result = mysqli_query($conn,$sql);
		$rank = 1;
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
        <p>
		<div class="pure-g">
		<div class="pure-u-1-1">
			<table class="pure-table pure-table-bordered">
			<thead>
				<tr>
					<th>Rank</th>
					<th>User Name</th>
					<th>Marks</th>
				</tr>
			</thead>
			<tbody>
		<?php
			while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
				echo "<td>".$rank."</td>
						<td>".$row['username']."</td>
						<td>".$row['totalmarks']."</td>";
				echo "</tr>";
				$rank=$rank+1;
			}
		?>
			</tbody>
			</table>
		</div>
		</div>
		</p>
	  </div>
  </body>
</html>
