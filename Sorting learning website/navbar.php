<?php
   session_start();
   if(!isset($_SESSION['loginuser'])){
?>
    <ul class="navbar">
      <li class="active navhead"><a href="index.html"><img src="img/icon.png" alt="icon" style="max-width:70%;height:auto;">SORTIT!</a></li>
      <li id="acbutton"><a href="account.php">Login</a></li>
	  <li id="homebutton"><a href="index.html">Getting Started</a></li>
      <li id="sbbutton"><a href="basic.html">Sorting Basics</a></li>
      <li id="bbbutton"><a href="bubble.php">Bubble Sort</a></li>
      <li id="slbutton"><a href="selection.php">Selection Sort</a></li>
	  <li id="mnbutton"><a href="managerlogin.php">Manager Login</a></li>
    </ul>
<?php
   }else{$loginuser = $_SESSION['loginuser'];
?>
    <ul class="navbar">
      <li class="active navhead"><a href="index.html"><img src="img/icon.png" alt="icon" style="max-width:70%;height:auto;">SORTIT!</a></li>
      <li id="acbutton"><a href="account.php">Account/Progress</a></li>
	  <li id="lobutton"><a href="logout.php">Logout</a></li>
	  <li id="homebutton"><a href="index.html">Getting Started</a></li>
      <li id="sbbutton"><a href="basic.html">Sorting Basics</a></li>
      <li id="bbbutton"><a href="bubble.php">Bubble Sort</a></li>
      <li id="slbutton"><a href="selection.php">Selection Sort</a></li>
	  <li id="lbbutton"><a href="leaderboard.php">Leaderboard</a></li>
	  <li id="qabutton"><a href="qa.php">Q/A Forum</a></li>
    </ul>
<?php
}
?>


