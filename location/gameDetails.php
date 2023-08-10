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
$id = $_GET["id"];
$url = $configs["endpoint.location.games"].$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
            <div class="bball-content-header pure-g">
                <div class="pure-u-1-2">
                    <h1><?php echo "<h1>Game : ".$result->localTeam." - ".$result->visitorTeam."</h1>";?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.boxscores"]."/".$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
			<div class="bball-content-body">
				<h2><?php echo $result->localBoxscoreLines->teamName;?></h2>
				<table class="pure-table">
				<thead>
				<tr><th>Player</th><th>Starter</th><th>Duration</th><th>Points</th><th>Assists</th><th>Rebound (off/def)</th><th>FieldGoal</th><th>Free Throw</th><th>3pts</th><th>Steal</th><th>Turnover</th><th>Foul</th></tr>
				</thead>
				<tbody>
				<?php
				foreach ($result->localBoxscoreLines->boxscoreLines as $line) {
				    echo "<tr>
                        <td>".$line->playerLastname." ".$line->playerFirstname."</td>
                        <td>".$line->starter."</td>
                        <td>".$line->duration."</td>
                        <td>".$line->points."</td>
                        <td>".$line->assist."</td>
                        <td>".$line->offRebound."/".$line->defRebound."</td>
                        <td>".$line->fieldGoalMade."/".$line->fieldGoalAttempts."</td>
                        <td>".$line->freeThrowMade."/".$line->freeThrowAttempts."</td>
                        <td>".$line->threePtsMade."/".$line->threePtsAttempts."</td>
                        <td>".$line->steal."</td>
                        <td>".$line->turnover."</td>
                        <td>".$line->fouls."</td>
                        </tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
			<div class="bball-content-body">
				<h2><?php echo $result->visitorBoxscoreLines->teamName;?></h2>
				<table class="pure-table">
				<thead>
				<tr><th>Player</th><th>Starter</th><th>Duration</th><th>Points</th><th>Assists</th><th>Rebound (off/def)</th><th>FieldGoal</th><th>Free Throw</th><th>3pts</th><th>Steal</th><th>Turnover</th><th>Foul</th></tr>
				</thead>
				<tbody>
				<?php
				foreach ($result->visitorBoxscoreLines->boxscoreLines as $line) {
				    echo "<tr>
                        <td>".$line->playerLastname." ".$line->playerFirstname."</td>
                        <td>".$line->starter."</td>
                        <td>".$line->duration."</td>
                        <td>".$line->points."</td>
                        <td>".$line->assist."</td>
                        <td>".$line->offRebound."/".$line->defRebound."</td>
                        <td>".$line->fieldGoalMade."/".$line->fieldGoalAttempts."</td>
                        <td>".$line->freeThrowMade."/".$line->freeThrowAttempts."</td>
                        <td>".$line->threePtsMade."/".$line->threePtsAttempts."</td>
                        <td>".$line->steal."</td>
                        <td>".$line->turnover."</td>
                        <td>".$line->fouls."</td>
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