				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Date</th><th>Competition</th><th>Phasis</th><th>Teams</th><th>Score</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $game) {
				    echo "<tr>
                            <td>".$game->id."</td>
                            <td>".$game->gameDate."</td>
                            <td><A href='competitionEdition.php?idCompetition=".$game->competitionId."&idCompetitionEdition=".$game->competitionEditionId."'><img src='".$game->competition->country->flagurl."'/>  ".$game->competition->name."</A></td>
                            <td><A href='phasisEdition.php?phasisEdition=".$game->phasisEditionId."'>".$game->phaseName."</A></td>
                            <td><A href='rosters.php?id=".$game->localRosterId."'>".$game->localTeam."</A> - <A href='rosters.php?id=".$game->visitorRosterId."'>".$game->visitorTeam."</A></td>
                            <td>".$game->localScore." - ".$game->visitorScore."</td>
                            <td><A href='gameDetails.php?id=".$game->id."'>Detail</A></td>
                          </tr>";
				}?>
				</tbody>
				</table>