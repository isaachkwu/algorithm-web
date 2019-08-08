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
		if(isset($_SESSION['loginuser'])){
			$mark =$_POST["mark"];
			$sql = "SELECT userid FROM user WHERE email ='".$_SESSION['loginuser']."'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$sql2 = "INSERT INTO progress (userid,courseno,level,mark) VALUES (".$row['userid'].",100002,1,$mark)";
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
		var button = document.getElementById("slbutton");
		button.setAttribute("class","active");
	</script>
    <div class="main">
      <div class="header">
        <h1>Selection Sort</h1>
        <h2>a slightly advanced version of bubble sort</h2>
      </div>
      <div class="content">
        <h2>What is selection sort?</h2>
        <p>The selection sort algorithm sorts an array by repeatedly finding the minimum element (considering ascending order) from unsorted part and putting it at the beginning. </p>
        <p>Here is a video again explains the logic behind...</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/R_f3PJtRqUQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h2>How it works?</h2>
        <p> The algorithm maintains two subarrays in a given array:<br>
          <label style="padding-left:5em">1) The subarray which is already sorted.</label><br>
          <label style="padding-left:5em">2) Remaining subarray which is unsorted.</label><br>
          In every iteration of selection sort, the minimum element (considering ascending order) from the unsorted subarray is picked and moved to the sorted subarray.</p>
        <h2>Detailed Example</h2>
        <p>
          arr[] = 64 25 12 22 11<br>
  <br>
  // Find the minimum element in arr[0...4]<br>
  // and place it at beginning<br>
  11 25 12 22 64<br>
  <br>
  // Find the minimum element in arr[1...4]<br>
  // and place it at beginning of arr[1...4]<br>
  11 12 25 22 64<br>
  <br>
  // Find the minimum element in arr[2...4]<br>
  // and place it at beginning of arr[2...4]<br>
  11 12 22 25 64<br>
  <br>
  // Find the minimum element in arr[3...4]<br>
  // and place it at beginning of arr[3...4]<br>
  11 12 22 25 64 <br></p>
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
	  <p>A test that combines two chapters' knowledge is here! Click the button below to start coding!<br></p>
	  <a class="pure-button" href="codeExercise.php">GO!</a>
      <script src="js/quiz.js"></script>
      <script src="js/bubblequiz.js"></script>
  </body>
</html>
