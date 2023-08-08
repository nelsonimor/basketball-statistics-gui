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
$teamEditionId = $_GET["id"];
$url = $configs["endpoint.location.teams"]."edition/".$teamEditionId;
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
                    <h1><?php echo "<h1>Roster : ".$result->teamName." (".$result->startDate." to ".$result->endDate.")</h1>";?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.teams"]."edition/".$teamEditionId."/roster";
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
?>


<div id="layout" class="content pure-g">
    <div id="main" class="pure-u-1">
        <div class="bball-content">
			<div class="bball-content-body">
				<table class="pure-table">
				<thead>
				<tr><th>Player</th><th>Start</th><th>End</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $rosterLine) {
				    echo "<tr>
                        <td>".$rosterLine->playerLastname." ".$rosterLine->playerFirstname."</td>
                        <td>".$rosterLine->startDate."</td>
                        <td>".$rosterLine->endDate."</td>
                        <td><A href='xxx'>Detail</A></td>
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