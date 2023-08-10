<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive bball layout.">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
$configs = include('../config.php');
$url = $configs["endpoint.location.games"];
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
            <div class="bball-content-header pure-g">
                <div class="pure-u-1-2">
                    <h1>List of games</h1>
                </div>
            </div>
			<div class="bball-content-body">
				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Date</th><th>Competition</th><th>Phasis</th><th>Teams</th><th>Score</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $game) {
				    echo "<tr>
                            <td>".$game->gameId."</td>
                            <td>".$game->gameDate."</td>
                            <td><A href='competitionEdition.php?idCompetition=".$game->competitionId."&idCompetitionEdition=".$game->competitionEditionId."'>".$game->competitionName."</A></td>
                            <td><A href='phasisEdition.php?phasisEdition=".$game->phasisEditionId."'>".$game->phaseName."</A></td>
                            <td><A href='rosters.php?id=".$game->localRosterId."'>".$game->localTeam."</A> - <A href='rosters.php?id=".$game->visitorRosterId."'>".$game->visitorTeam."</A></td>
                            <td>".$game->localScore." - ".$game->visitorScore."</td>
                            <td><A href='gameDetails.php?id=".$game->gameId."'>Detail</A></td>
                          </tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>

</body>
</html>