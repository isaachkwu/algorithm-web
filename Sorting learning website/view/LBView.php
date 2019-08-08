<?php
	class LBView {
		public function output( $data ) {
			$data = json_decode( $data);
			$rank = 1;
			$output = "<table class='pure-table pure-table-bordered'>
						<thead>
						<tr>
							<th>Rank</th>
							<th>User Name</th>
							<th>Marks</th>
						</tr>
						</thead>
						<tbody>";
			foreach ($data as $person){
				$lbusername = $person->username;
				$lbmarks = $person->totalmarks;
				$output .= "<td>".$rank."</td>
						<td>".$lbusername."</td>
						<td>".$lbmarks."</td>";
				$output .= "</tr>";
				$rank=$rank+1;
			}
			$output .=  "</tbody></table>";
			return $output;
		}
	}
?>
