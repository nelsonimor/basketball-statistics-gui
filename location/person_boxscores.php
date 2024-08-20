<?php 
$url = $configs["endpoint.location.player.boxline"]."?personId=".$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
?>
<table class="pure-table">
<thead>
<tr>
<th>#</th>
<th>Date</th>
<th>Competition</th>
<th>Team</th>
<th>Game</th>
<th>Score</th>
<th>Starter</th>
<th>Duration</th>
<th>Points</th>
<th>Rebonds</th>
<th>Assists</th>
<th>FG</th>
<th>FT</th>
<th>3pts</th>
<th>Block</th>
<th>Steal</th>
<th>Foul</th>
<th>Turnover</th>
<th>Boxscore</th></tr>
</thead>

				
				
<tbody>
<?php 
$k=1;
foreach ($result->boxscoresLineDto->items as $item) {
    echo "<tr><td>".$k."</td><td>".$item->game->gameDate."</td>";
    
    if ($item->game->competition->country->id > 0) {
        echo "<td width='150px'><A href='competitionEdition.php?idCompetition=" . $item->game->competitionId . "&idCompetitionEdition=" . $item->game->competitionEditionId . "'><img src='" . $item->game->competition->country->flagurl . "'/>  " .$item->game->competition->name . "</A></td>";
    } else {
        echo "<td width='150px'><A href='competitionEdition.php?idCompetition=" . $item->game->competitionId . "&idCompetitionEdition=" . $item->game->competitionEditionId . "'><img src='../icon/world.png' width='20px' height='20px'/>  " . $item->game->competition->name . "</A></td>";
    }

    echo "<td width='150px'>".$item->teamName."</td>";
    echo "<td>".$item->game->localTeam." vs ".$item->game->visitorTeam."</td>";
    echo "<td>".$item->game->localScore." - ".$item->game->visitorScore."</td>";
    echo "<td>";
    if($item->starter == 1){
        echo "<img src = '../icon/starter.png' height='20px' width='20px'/>";
    }
    echo "</td>";
    echo "<td>".gmdate("i:s", $item->duration)."</td>";
    echo "<td>".$item->points."</td>";
    echo "<td>".($item->offRebound+$item->defRebound)."</td>";
    echo "<td>".$item->assist."</td>";
    echo "<td>".$item->fieldGoalMade."/".$item->fieldGoalAttempts."</td>";
    echo "<td>".$item->freeThrowMade."/".$item->freeThrowAttempts."</td>";
    echo "<td>".$item->threePtsMade."/".$item->threePtsAttempts."</td>";
    echo "<td>".$item->block."</td>";
    echo "<td>".$item->steal."</td>";
    echo "<td>".$item->fouls."</td>";
    echo "<td>".$item->turnover."</td>";
    echo "<td><A href='gameDetails.php?id=".$item->game->id."'>Boxscore</A></td>";
    $k++;
}?>

</tbody>
</table>