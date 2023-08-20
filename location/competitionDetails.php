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
$url = $configs["endpoint.location.competitions"].$id;
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
                    <h1><?php echo "<h1>Competition : ".$result->name."</h1>";?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.competitions"].$id."/editions";
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
				<h2>Editions</h2>
				<table class="pure-table">
				<thead>
				<tr><th>Competition</th><th>Start</th><th>End</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				//echo $response;
				foreach ($result->editions as $edition) {
				    echo "<tr>
                        <td>".$result->competition->name."</td>
                        <td>".$edition->startDate."</td>
                        <td>".$edition->endDate."</td>
                        <td><A href='competitionEdition.php?idCompetition=".$edition->competitionId."&idCompetitionEdition=".$edition->competitionEditionId."'>Detail</A></td></tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>

<?php
$url = $configs["endpoint.location.games"]."competition/".$id;
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