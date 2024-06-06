				<table class="pure-table">
				<thead>
				<tr><th>Date</th><th>League</th><th>Local</th><th>Score</th><th>Vistor</th><th>Link</th><th>Status</th><th>Integration Date</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				
				
				
				
				foreach ($result->items as $game) {
				    echo "<tr><td>".$game->date."</td><td>".$game->league."</td>";
				    if($game->localScore>$game->visitorScore){
				        echo "<td><b><font color='#2980b9'>".$game->localTeam."</font></b></td><td><b><font color='#2980b9'>".$game->localScore."</font></b> - ".$game->visitorScore."</td><td>".$game->visitorTeam."</td>";
				    }
				    else{
				        echo "<td>".$game->localTeam."</td><td>".$game->localScore." - <b><font color='#2980b9'>".$game->visitorScore."</font></b></td><td><b><font color='#2980b9'>".$game->visitorTeam."</font></b></td>";
				    }
				    
				    echo "<td><A href='".$game->link."'>Link</A></td>";
				    echo "<td>";
				    
				    if($game->status == "CREATED"){
				        echo "<span class='bball-label-personal'></span>";
				        echo $game->status."</td>";
				    }
				    else if($game->status == "VALIDATED"){
				        echo "<span class='bball-label-travel'></span>";
				        echo $game->status."</td>";
				    }
				    else{
				        echo "<span class='bball-label-error'></span>";
				        echo $game->status." (".$game->processingAttempt.")<br><font size='1'>".$game->errorMessage."</font></td>";
				    }
				           
				    

				            
				    echo "<td>".$game->integrationDate."</td></td></tr>";
				    

				}?>
				</tbody>
				</table>