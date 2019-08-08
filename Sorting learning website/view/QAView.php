<?php
	class QAView {
		public function output( $data ) {
			$output = "";
			$data = json_decode( $data);
			$start = 0;
			$x=0;
			$previousid=0;
			$nowuser = $_SESSION['loginuser'];
			$nowhtml = htmlspecialchars($_SERVER['PHP_SELF']);
			foreach ($data as $post){
				$qaname = $post->username;
				$qatopic = $post->topic;
				$qacontent = $post->content;
				$qatime = $post->time;
				$qareplyid = $post->replyid;
				$y=count($data);
				if ( strcmp ( $qatopic , "") != 0 ){
					if ($start != 0) {
						$output .= "
						<hr>Reply here:<br>
						<form class='pure-form' method='post' action='$nowhtml'>
						<fieldset>
						<textarea name='content' class='pure-input-1' placeholder='Content'></textarea>
						<input type='hidden' name='type' value='1'>
						<input type='hidden' name='userid' value='$nowuser'>
						<input type='hidden' name='replyid' value='$previousid'>
						<input type='hidden' name='topic' value=''>
						</fieldset>
						<button type='submit' class='pure-button  pure-button-primary'>Submit</button>
						</form>
						<br>
						</div>
						";
					}else{
						$start =1;
					}
					$output .= "
							<button class='collapsible'>$qatopic</button>
							<div class='colcontent'>
							<p>Question from $qaname : 
							<br>$qacontent
							<br>$qatime</p>";
				}else{
					$output .= "<hr>
								  <p>Reply form $qaname:
								  <br>$qacontent
								  <br>$qatime
								  </p>
								";
				}
				if(++$x == $y) {
					$output .= "
					<hr>Reply here:<br>
						<form class='pure-form' method='post' action='$nowhtml'>
						<fieldset>
						<textarea name='content' class='pure-input-1' placeholder='Content'></textarea>
						<input type='hidden' name='type' value='1'>
						<input type='hidden' name='userid' value='$nowuser'>
						<input type='hidden' name='replyid' value='$qareplyid'>
						<input type='hidden' name='topic' value=''>
						</fieldset>
						<button type='submit' class='pure-button  pure-button-primary'>Submit</button>
						</form>
						<br>
						</div>
					";
				}
				$previousid=$qareplyid;
			}
			
			return $output;
		}
	}
?>
