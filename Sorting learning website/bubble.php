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
    <script  src="https://code.jquery.com/jquery-3.3.1.js"></script>
  </head>
  <body>
	<?php include("navbar.php"); ?>
	<?php
	include("connectdb.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_SESSION['loginuser'])){
			$mark = $_POST["mark"];
			$sql = "SELECT userid FROM user WHERE email ='".$_SESSION['loginuser']."'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$sql2 = "INSERT INTO progress (userid,courseno,level,mark) VALUES (".$row['userid'].",100001,1,$mark)";
			$result=mysqli_query($conn,$sql2);
			if($result){
				echo "<script>
				alert('Your mark is $mark . Progress is saved.');
				window.location.href='index.html';
				</script>";
		}else{
			echo "<script>
			alert('".mysqli_error($conn)."');
			window.location.href='bubble.php';
			</script>";
		}
		mysqli_close($conn);
	}
	}
  ?>
	<script type='text/javascript'>
		var button = document.getElementById("bbbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Bubble Sort</h1>
        <h2>the easiest, but make-sense sorting algorithm</h2>
      </div>
      <div class="content">
        <h2>What is bubble sort?</h2>
        <p>Bubble Sort is the simplest sorting algorithm that works by repeatedly swapping the adjacent elements if they are in wrong order.</p>
        <p>Here is a video explaining the logic of bubble sort algorithm.</p>
        <iframe align="middle" width="560" height="315" src="https://www.youtube.com/embed/yIQuKSwPlro" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h2>Detailed Example</h2>
        <p>
First Pass:<br>
( 5 1 4 2 8 ) –> ( 1 5 4 2 8 ), Here, algorithm compares the first two elements, and swaps since 5 > 1.<br>
( 1 5 4 2 8 ) –>  ( 1 4 5 2 8 ), Swap since 5 > 4<br>
( 1 4 5 2 8 ) –>  ( 1 4 2 5 8 ), Swap since 5 > 2<br>
( 1 4 2 5 8 ) –> ( 1 4 2 5 8 ), Now, since these elements are already in order (8 > 5), algorithm does not swap them.<br>
<br>
Second Pass:<br>
( 1 4 2 5 8 ) –> ( 1 4 2 5 8 )<br>
( 1 4 2 5 8 ) –> ( 1 2 4 5 8 ), Swap since 4 > 2<br>
( 1 2 4 5 8 ) –> ( 1 2 4 5 8 )<br>
( 1 2 4 5 8 ) –>  ( 1 2 4 5 8 )<br>
Now, the array is already sorted, but our algorithm does not know if it is completed. The algorithm needs one whole pass without any swap to know it is sorted.<br>
<br>
Third Pass:<br>
( 1 2 4 5 8 ) –> ( 1 2 4 5 8 )<br>
( 1 2 4 5 8 ) –> ( 1 2 4 5 8 )<br>
( 1 2 4 5 8 ) –> ( 1 2 4 5 8 )<br>
( 1 2 4 5 8 ) –> ( 1 2 4 5 8 )<br>
</p>
        <h2>Quiz!</h2>
            <div id='quiz'><br></div>
            <div class="pure-g">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
              <div class="pure-u-1-4"><button type="submit" id='submit'>Get Results</button>
			  <input type="hidden" name="mark" id="mark">
			  </form>
			  </div>
              <div class="pure-u-3-4"><div id='results'><br></div></div>
      </div>
      <script src="js/quiz.js"></script>
      <script src="js/bubblequiz.js"></script>
  </body>
</html>
