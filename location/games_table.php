
<table class="pure-table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Date</th>
			<th>Competition</th>
			<th>Phasis</th>
			<th>Teams</th>
			<th>Score</th>
			<th>Overtime</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
				<?php
    $result = json_decode($response);
    foreach ($result->items as $game) {
        echo "<tr>
                            <td>" . $game->id . "</td>
                            <td>" . $game->gameDate . "</td>";

        if ($game->competition->country->id > 0) {
            echo "<td><A href='competitionEdition.php?idCompetition=" . $game->competition->id . "&idCompetitionEdition=" . $game->competitionEditionId . "'><img src='" . $game->competition->country->flagurl . "'/>  " . $game->competition->name . "</A></td>";
        } else {
            echo "<td><A href='competitionEdition.php?idCompetition=" . $game->competition->id . "&idCompetitionEdition=" . $game->competitionEditionId . "'><img src='../icon/world.png' width='20px' height='20px'/>  " . $game->competition->name . "</A></td>";
        }

        echo "<td><A href='phasisEdition.php?phasisEdition=" . $game->phasisEditionId . "'>" . $game->phaseName . "</A></td>";
        
        

        
        
        
        
        
        

        
        
        if($game->localScore>$game->visitorScore){
            echo "<td><A href='rosters.php?id=" . $game->localRosterId . "'><b><font color='#2980b9'>" . $game->localTeam->name . "</font></b></A> - <A href='rosters.php?id=" . $game->visitorRosterId . "'><font color='#000000'>" . $game->visitorTeam->name . "</font></A></td>";
            echo "<td><b><font color='#2980b9'>" . $game->localScore . "</font></b> - " . $game->visitorScore . "</td>";
        }
        else{
            echo "<td><A href='rosters.php?id=" . $game->localRosterId . "'><font color='#000000'>" . $game->localTeam->name . "</font></A> - <A href='rosters.php?id=" . $game->visitorRosterId . "'><b><font color='#2980b9'>" . $game->visitorTeam->name . "</font></b></A></td>";
            echo "<td>" . $game->localScore . " - <b><font color='#2980b9'>" . $game->visitorScore . "</font></b></td>";
        }
        
        if($game->overtime == true){
            echo "<td><img src='../icon/overtime.png' width='20px' height='20px'/></td>";
        }
        else{
            echo "<td>&nbsp;</td>";
        }
        

        echo "<td><A href='gameDetails.php?id=" . $game->id . "'>Detail</A></td></tr>";
    }
    ?>
				</tbody>
</table>