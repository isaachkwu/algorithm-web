<?php
	class QAModel {
		public function getQA() {
			include("connectdb.php");
			$sql = "SELECT user.username, qapost.topic,qapost.content , qapost.time, qapost.replyid
					FROM qapost,user 
					WHERE user.userid = qapost.userid
					ORDER BY qapost.replyid asc, qapost.type asc, qapost.time asc";
			$result = mysqli_query($conn,$sql);
			$dbdata = array();
			while ( $row = $result->fetch_assoc())  {
				$dbdata[]=$row;
			}
			return json_encode($dbdata);
			mysqli_close($conn);
		}
		
		public function postQA( $data ) {
			include("connectdb.php");
			$email=$data['userid'];
			$type = $data['type'];
			$content = $data['content'];
			$topic = $data['topic'];
			$replyid = $data['replyid'];
			$sql = "SELECT userid FROM user WHERE email ='$email'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$userid =$row['userid'];
			if(strcmp($topic,"")==0){
				$sql = "INSERT INTO qapost (type,content,userid,replyid) VALUES ($type,'$content',$userid,$replyid)";
				$result2 = mysqli_query($conn,$sql);
				if(!$result2){
					echo "<script>
						alert('".mysqli_error($conn)."');
						window.location.href='index.html';
						</script>";
				}else{
						echo "<script>
							alert('Post creation successful!');
							window.location.href='index.html';
							</script>";
				}
			}else{
				$sql = "INSERT INTO qapost (type,content,topic,userid) VALUES ($type,'$content','$topic',$userid)";
				$result2 = mysqli_query($conn,$sql);
				if(!$result2){
					echo "<script>
						alert('".mysqli_error($conn)."');
						window.location.href='index.html';
						</script>";
				}else{
					$sql = "UPDATE qapost SET replyid = idpost WHERE topic='$topic'";
					$result3 = mysqli_query($conn,$sql);
					if(result3){
						echo "<script>
							alert('Post creation successful!');
							window.location.href='index.html';
							</script>";
					}
				}
			}
			mysqli_close($conn);
		}
	}
?>
 
 