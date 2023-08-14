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
$idCompetition = $_GET["idCompetition"];
$idCompetitionEdition = $_GET["idCompetitionEdition"];
$url = $configs["endpoint.location.competitions"]."edition/".$idCompetitionEdition;
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
                    <h1><?php echo "<h1>".$result->competitionName." (from ".$result->startDate." to ".$result->endDate.")</h1>";?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.phasis"]."editions/".$idCompetitionEdition;
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
				<h2>Phasis</h2>
				<table class="pure-table">
				<thead>
				<tr><th>Phasis</th><th>Competition</th><th>Start</th><th>End</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				//echo $response;
				foreach ($result as $edition) {
				    echo "<tr>
                        <td>".$edition->phasisName."</td>
                        <td>".$edition->competitionName."</td>
                        <td>".$edition->startDate."</td>
                        <td>".$edition->endDate."</td>
                        <td><A href='phasisEdition.php?phasisEdition=".$edition->phasisEditionId."'>Detail</A></td></tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>


<?php
$url = $configs["endpoint.location.competitions"]."edition/".$idCompetitionEdition."/participants";
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
				<h2>Participants</h2>
				<table class="pure-table">
				<thead>
				<tr><th>Team</th><th>Roster</th><th>Team</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				//echo $response;
				foreach ($result as $participant) {
				    echo "<tr>
                        <td>".$participant->teamName."</td>
                        <td><A href='rosters.php?id=".$participant->rosterId."'>Roster</A></td><td><A href='teamDetails.php?id=".$participant->teamId."'>Team</A></td></tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>


</body>
</html>