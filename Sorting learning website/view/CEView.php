<?php
	class CEView {
		public function userOutput( $data ){
			$output = "";
			$data = json_decode( $data);
			$start = 0;
			foreach ($data as $post){
				$cecontent = $post->content;
				$cestatus = $post->status;
				$cecomment = $post->comment;
				$cecourseid = $post->courseid;
				$cemanager = $post->managername;
				$output .= "<button class='collapsible'>
						Course $cecourseid exercise
						</button>
							<div class='colcontent'>
							<p>
							Attempt :<br>
							$cecontent<br>
							<hr>";
				if($cestatus == 1){
					$output .= "Comment :<br>
							$cecomment
							<br>
							Graded and commented by : $cemanager<br>
						</p></div>";
				}else{
					$output .= "Still waiting to comment.</p></div>";
				}
			}
			return $output;
		}
		
		public function manOutput( $data ) {
			$output = "";
			$data = json_decode( $data);
			$nowuser = $_SESSION['loginuser'];
			$nowhtml = htmlspecialchars($_SERVER['PHP_SELF']);
			foreach ($data as $post){
				$cecontent = $post->content;
				$ceuserid = $post->userid;
				$cecourseid = $post->courseid;
				$cecodeid = $post->codeid;
				$output .= "
						<button class='collapsible'>$ceuserid : $cecourseid</button>
							<div class='colcontent'>
							<p>Content
							<br>$cecontent</p>
						<hr>Reply here:<br>
						<form class='pure-form' method='post' action='$nowhtml'>
						<fieldset>
						<textarea name='comment' class='pure-input-1' placeholder='Content'></textarea>
						<input type='hidden' name='managername' value='$nowuser'>
						<input type='hidden' name='codeid' value='$cecodeid '>
						</fieldset>
						<button type='submit' class='pure-button  pure-button-primary'>Submit</button>
						</form>
						<br>
						</div>
						";
				}
				return $output;
			}
		}
?>
