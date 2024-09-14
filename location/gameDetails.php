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
$url = $configs["endpoint.location.games"]."id/".$id;
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
                    <?php echo "<h1>".$result->localTeam." - ".$result->visitorTeam."</h1>";?>
                    <?php echo "<h3>".$result->gameDate." - ".$result->competitionName." - ".$result->phaseName."</h3>";?>
                    
                    <table class="pure-table">
                    <thead>
                    
                    
                    <tr><th>Score</th><th>Qt1</th><th>Qt2</th><th>Qt3</th><th>Qt4</th><th>Ot1</th><th>Ot2</th><th>Ot3</th><th>Ot4</th><th>Ot5</th><th>Final</th>
                   	</thead>
                   
                    <tr>
                    <td><?php echo $result->localTeam?></td>
                    <td><?php echo $result->localScoreQt1?></td>
                    <td><?php echo $result->localScoreQt2?></td>
                    <td><?php echo $result->localScoreQt3?></td>
                    <td><?php echo $result->localScoreQt4?></td>
                    <td><?php echo $result->localScoreOt1?></td>
                    <td><?php echo $result->localScoreOt2?></td>
                    <td><?php echo $result->localScoreOt3?></td>
                    <td><?php echo $result->localScoreOt4?></td>
                    <td><?php echo $result->localScoreOt5?></td>
                    <td><b><?php echo $result->localScore?></b></td>
                    </tr>
                    
                    
                    
                    
                    <tr>
                    <td><?php echo $result->visitorTeam?></td>
                    <td><?php echo $result->visitorScoreQt1?></td>
                    <td><?php echo $result->visitorScoreQt2?></td>
                    <td><?php echo $result->visitorScoreQt3?></td>
                    <td><?php echo $result->visitorScoreQt4?></td>
                    <td><?php echo $result->visitorScoreOt1?></td>
                    <td><?php echo $result->visitorScoreOt2?></td>
                    <td><?php echo $result->visitorScoreOt3?></td>
                    <td><?php echo $result->visitorScoreOt4?></td>
                    <td><?php echo $result->visitorScoreOt5?></td>
                    <td><b><?php echo $result->visitorScore?></b></td>
                    </tr>
 
                    </table>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.boxscores"]."/gameId/".$id;
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
				<tr><th>Player</th><th>Starter</th><th>Duration</th><th>Points</th><th>Assists</th><th>Rebound (off/def)</th><th>FieldGoal</th><th>Free Throw</th><th>3pts</th><th>Steal</th><th>Block</th><th>Turnover</th><th>Foul</th></tr>
				</thead>
				<tbody>
				<?php
				foreach ($result->localBoxscoreLines->boxscoreLines as $line) {
				    echo "<tr>
                        <td width='300px'><A href='countryDetails.php?id=".$line->person->firstnationality->id."'><img src='".$line->person->firstnationality->flagurl."'/></A><A href='personDetails.php?id=".$line->person->id."'> ".$line->person->firstname." ".strtoupper($line->person->lastname)."</A></td><td>";
                        
				    if($line->starter == 1){
				       echo "<img src = '../icon/starter.png' height='20px' width='20px'/>"; 
				    }

                        echo "</td><td>".gmdate("i:s", $line->duration)."</td>
                        <td>".$line->points."</td>
                        <td>".$line->assist."</td>
                        <td>".$line->offRebound."/".$line->defRebound."</td>
                        <td>".$line->fieldGoalMade."/".$line->fieldGoalAttempts."</td>
                        <td>".$line->freeThrowMade."/".$line->freeThrowAttempts."</td>
                        <td>".$line->threePtsMade."/".$line->threePtsAttempts."</td>
                        <td>".$line->steal."</td>
                        <td>".$line->block."</td>
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
				<tr><th>Player</th><th>Starter</th><th>Duration</th><th>Points</th><th>Assists</th><th>Rebound (off/def)</th><th>FieldGoal</th><th>Free Throw</th><th>3pts</th><th>Steal</th><th>Block</th><th>Turnover</th><th>Foul</th></tr>
				</thead>
				<tbody>
				<?php
				foreach ($result->visitorBoxscoreLines->boxscoreLines as $line) {
				    echo "<tr>
                        <td width='300px'><A href='countryDetails.php?id=".$line->person->firstnationality->id."'><img src='".$line->person->firstnationality->flagurl."'/></A><A href='personDetails.php?id=".$line->person->id."'> ".$line->person->firstname." ".strtoupper($line->person->lastname)."</A></td><td>";
				    if($line->starter == 1){
				       echo "<img src = '../icon/starter.png' height='20px' width='20px'/>"; 
				    }
                       echo "</td><td>".gmdate("i:s", $line->duration)."</td>
                        <td>".$line->points."</td>
                        <td>".$line->assist."</td>
                        <td>".$line->offRebound."/".$line->defRebound."</td>
                        <td>".$line->fieldGoalMade."/".$line->fieldGoalAttempts."</td>
                        <td>".$line->freeThrowMade."/".$line->freeThrowAttempts."</td>
                        <td>".$line->threePtsMade."/".$line->threePtsAttempts."</td>
                        <td>".$line->steal."</td>
                        <td>".$line->block."</td>
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