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
$idPhasisEdition = $_GET["phasisEdition"];
$url = $configs["endpoint.location.phasis"]."edition/".$idPhasisEdition;
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
                    <h1><?php echo "<h1>".$result->competitionName." / ".$result->phasisName." (from ".$result->startDate." to ".$result->endDate.")</h1>";?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.phasis"]."edition/".$idPhasisEdition."/participants";
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
                         <td><A href='XXX'>Roster</A></td><td><A href='XXX'>Team</A></td></tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.games"]."phasisEdition/".$idPhasisEdition;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
			<div class="bball-content-body">
				<h2>Games</h2>
					<?php include('games_table.php');?>
			</div>
        </div>
    </div>
</div>

</body>
</html>