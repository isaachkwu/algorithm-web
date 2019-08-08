<?php
	$conn = new mysqli( "localhost", "root", "12345678", "ccomp3421" );
	if ($conn -> connect_errno) {
		$message = "Connect failed";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>