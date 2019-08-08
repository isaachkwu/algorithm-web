<?php
	class CEModel {
		public function getAllCE() {
			include("connectdb.php");
			$sql = "SELECT * FROM codes WHERE status = 0";
			$result = mysqli_query($conn,$sql);
			$dbdata = array();
			while ( $row = $result->fetch_assoc())  {
				$dbdata[]=$row;
			}
			return json_encode($dbdata);
			mysqli_close($conn);
		}
		
		public function getMyCE() {
			include("connectdb.php");
			$me= NULL;
			if(isset($_SESSION['loginuser'])){
				$me = $_SESSION['loginuser'];
			}
			$sql = "SELECT userid FROM user WHERE email ='$me'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$userid =$row['userid'];
			$sql = "SELECT * FROM codes WHERE userid = $userid";
			$result1 = mysqli_query($conn,$sql);
			$dbdata = array();
			while ( $row1 = $result1->fetch_assoc())  {
				$dbdata[]=$row1;
			}
			return json_encode($dbdata);
			mysqli_close($conn);
		}
		
		public function evalCE($data) {
			include("connectdb.php");
			$managername = $data['managername'];
			$comment = $data['comment'];
			$codeid = $data['codeid'];
			$sql = "UPDATE codes SET managername='$managername', comment = '$comment', status = 1 WHERE codeid = $codeid";
			$result = mysqli_query($conn,$sql);
			if(!$result){
				echo "<script>
							alert('Comment is rated successful!$managername $comment $codeid');
							window.location.href='managerView.php';
							</script>";
			}else{
				echo "<script>
							failed!
							</script>";
			}
			mysqli_close($conn);
		}
		
		public function postCE( $data ) {
			include("connectdb.php");
			$email=$data['userid'];
			$content = $data['content'];
			$courseid=$data['courseid'];
			$sql = "SELECT userid FROM user WHERE email ='$email'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$userid =$row['userid'];
			if(strcmp($topic,"")==0){
				$sql = "INSERT INTO codes (content,userid,courseid) VALUES ('$content', $userid, $courseid)";
				$result2 = mysqli_query($conn,$sql);
				if(!$result2){
					echo "<script>
						alert('".mysqli_error($conn)."');
						window.location.href='index.html';
						</script>";
				}else{
						echo "<script>
							alert('Exercise is handed in successful!');
							window.location.href='index.html';
							</script>";
				}
			mysqli_close($conn);
			}
		}
	}
?>

 