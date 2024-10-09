				<table class="pure-table">
				<thead>
				<tr><th>Status</th><th>Count</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				
				
				
				
				foreach ($result->recaps as $recap) {
				    echo "<tr><td>";
				    
				    if($recap->status == "CREATED"){
				        echo "<span class='bball-label-personal'></span>";
				        echo $recap->status."</td>";
				    }
				    else if($recap->status == "VALIDATED"){
				        echo "<span class='bball-label-travel'></span>";
				        echo $recap->status."</td>";
				    }
				    else if($recap->status == "DUPLICATED" || $recap->status == "MAX_ATTEMPT_REACHED"){
				        echo "<span class='bball-label-ko'></span>";
				        echo $recap->status."</td>";
				    }
				    else{
				        echo "<span class='bball-label-error'></span>";
				        echo $recap->status."</td>";
				    }
				    
				    echo "<td>".$recap->count."</td></tr>";
				    

				}?>
				</tbody>
				</table>