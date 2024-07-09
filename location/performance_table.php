				<table class="pure-table">
				<thead>
				<tr><th>#</th><th>Date</th><th>Competition</th><th>Player</th><th><?php echo $category;?></th><th>Team</th><th>Game</th><th>Score</th><th>Boxscore</th></tr>
				</thead>
				<tbody>
				<?php

				$k=1;
				
				foreach ($result->boxscoresLineDto->items as $item) {
				    echo "<tr><td>".$k."</td><td>".$item->game->gameDate."</td>";
				    
				    if ($item->game->competition->country->id > 0) {
				        echo "<td><A href='competitionEdition.php?idCompetition=" . $item->game->competitionId . "&idCompetitionEdition=" . $item->game->competitionEditionId . "'><img src='" . $item->game->competition->country->flagurl . "'/>  " .$item->game->competition->name . "</A></td>";
				    } else {
				        echo "<td><A href='competitionEdition.php?idCompetition=" . $item->game->competitionId . "&idCompetitionEdition=" . $item->game->competitionEditionId . "'><img src='../icon/world.png' width='20px' height='20px'/>  " . $item->game->competition->name . "</A></td>";
				    }
				    
				    
				    echo "<td>".$item->playerFirstname." ".$item->playerLastname."</td>";
				    
				    
				    if($category == "points"){
				        echo "<td>".$item->points."</td>";
				    }
				    else if($category == "assist"){
				        echo "<td>".$item->assist."</td>";
				    }
				    else if($category == "block"){
				        echo "<td>".$item->block."</td>";
				    }
				    else if($category == "turnover"){
				        echo "<td>".$item->turnover."</td>";
				    }
				    else if($category == "steal"){
				        echo "<td>".$item->steal."</td>";
				    }
				    else if($category == "fieldGoalMade"){
				        echo "<td>".$item->fieldGoalMade."</td>";
				    }
				    else if($category == "fieldGoalAttempts"){
				        echo "<td>".$item->fieldGoalAttempts."</td>";
				    }
				    else if($category == "freeThrowMade"){
				        echo "<td>".$item->freeThrowMade."</td>";
				    }
				    else if($category == "freeThrowAttempts"){
				        echo "<td>".$item->freeThrowAttempts."</td>";
				    }
				    else if($category == "threePtsMade"){
				        echo "<td>".$item->threePtsMade."</td>";
				    }
				    else if($category == "threePtsAttempts"){
				        echo "<td>".$item->threePtsAttempts."</td>";
				    }
				    else if($category == "offRebound"){
				        echo "<td>".$item->offRebound."</td>";
				    }
				    else if($category == "defRebound"){
				        echo "<td>".$item->defRebound."</td>";
				    }
				    else if($category == "duration"){
				        echo "<td>".gmdate("i:s", $item->duration)."</td>";
				    }

				    echo "<td>".$item->teamName."</td>";
				    echo "<td>".$item->game->localTeam." vs ".$item->game->visitorTeam."</td>";
				    echo "<td>".$item->game->localScore." - ".$item->game->visitorScore."</td>";
				    echo "<td><A href='gameDetails.php?id=".$item->game->id."'>Boxscore</A></td>";
				    $k++;
				}?>
				</tbody>
				</table>
