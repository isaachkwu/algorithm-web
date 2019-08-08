<html>
<head>
<?php
   session_start();
   if(session_destroy()) {
		echo "<script>
			alert('Account has logout. Bye!');
			window.location.href='index.html';
			</script>";
   }
?>
</head>
</html>