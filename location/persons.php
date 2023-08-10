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
$url = $configs["endpoint.location.persons"];
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
                    <h1>List of persons</h1>
                </div>
            </div>
			<div class="bball-content-body">
				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Name</th><th>Birthplace</th><th>Birthplacecountry</th><th>Nationality</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $person) {
				echo "<tr>
                    <td>".$person->id."</td>
                    <td>".$person->lastname." ".$person->firstname."</td>
                    <td>".$person->birthplacecity->name."</td>
                    <td>".$person->birthplacecity->country->name."</td>
                    <td>".$person->firstnationality->name." <img src='".$person->firstnationality->flagurl."'/></td>
                    <td><A href='personDetails.php?id=".$person->id."'>Detail</th></td>
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
