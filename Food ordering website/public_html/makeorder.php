<?php
include("dbconfig.php");
session_start();
$sql = "INSERT INTO Orders (orderid,ouserid,requesttime,arrivetime,status,orderfoodid,orderamount) 
VALUES (NULL,1,CURRENT_TIMESTAMP,NULL,'A',1,1)";

if (!$conn) {die("Connection failed: " . mysqli_error());}
if(!isset($_COOKIE["cart"])){
	echo "<script type='text/javascript'>alert('No item selected.');</script>";
	header("Location:/homepage.php");
	}elseif($_COOKIE["cart"]==""){
		echo "<script type='text/javascript'>alert('No item selected.');</script>";
		header("Location:/homepage.php");
	}else{
			$foodlist = $_COOKIE["cart"];
			$foodarray = [];
			for($x=0;$x<strlen($foodlist);$x++){
				if($x%2==0){
					array_push($foodarray,substr($foodlist,$x,1));
				}
			}
			$username="";
			if(isset($_SESSION['loginuser'])){
				$username=$_SESSION['loginuser'];
			}else{$username="XNoLoginX";}
			for($x=0;$x<count($foodarray);$x++){
				$tfoodid=intval($foodarray[$x]);
				$sql = "INSERT INTO Orderr (orderid,ousername,requesttime,arrivetime,status,orderfoodid) 
				VALUES (NULL,'$username',CURRENT_TIMESTAMP,0,'A',$tfoodid)";
			if (mysqli_query($conn,$sql)) {
			} else {
				$abc=mysqli_error($conn);
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
		$_SESSION['notifymsg'] = "Order is been created successfully!";
		setcookie("cart", "", time() - 3600);
		mysqli_close($conn);
		header("location: notify.php");
	}
		
?>