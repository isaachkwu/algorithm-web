<?php
$sqlcheck = "SELECT username FROM Userss WHERE username = '$username'";
$result = mysqli_query($conn,$sqlcheck);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active']; 
$count = mysqli_num_rows($result);  
if($count >0) {
     $error = "This username has been used.";
}else {
	$sql = "INSERT INTO Userss (username,firstname,lastname,email,pw,address,phno) 
	VALUES ('$username','$firstname','$lastname','$email','$pw','$address','$phno')";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['notifymsg'] = "Your account is created successfully!";
		header("location: notify.php");
	} else {
		$error = "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
mysqli_close($conn);
?>