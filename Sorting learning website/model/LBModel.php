<?php
	class LBModel {
		public function getLB() {
			include("connectdb.php");
			$sql = "SELECT user.username,SUM(progress.mark) AS totalmarks FROM progress, user WHERE (user.userid = progress.userid) GROUP BY progress.userid ORDER BY totalmarks asc";
			$result = mysqli_query($conn,$sql);
			$dbdata = array();
			while ( $row = $result->fetch_assoc())  {
				$dbdata[]=$row;
			}
			return json_encode($dbdata);
			mysqli_close($conn);
		}
	}
?>

