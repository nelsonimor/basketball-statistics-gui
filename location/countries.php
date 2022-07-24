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
$url = $configs["endpoint.location.country"];
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
                    <h1>List of countries</h1>
                </div>
            </div>
			<div class="bball-content-body">
				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Name</th><th>Fullname</th><th>Continent</th><th>Region</th><th>Flag</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $country) {
				    echo "<tr><td>".$country->id."</td><td>".$country->name."<br/><font size='1' color='gray'>".$country->codeiso2." / ".$country->codeiso3." / ".$country->number."</font></td>
<td>".$country->fullname." </td><td><A href='continentDetails.php?id=".$country->continent->id."'/>".$country->continent->name."</A></td><td><A href='regionDetails.php?id=".$country->region->id."'/>".$country->region->name."</A></td><td><img src='../flags/16x16/".$country->codeiso2.".png'/></td><td><A href='countryDetails.php?id=".$country->id."'>Detail</A></td></tr>";
				}?>
				</tbody>
				</table>
			</div>
        </div>
    </div>
</div>

</body>
</html>
