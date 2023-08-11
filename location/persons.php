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
                    <h1>List of persons <A href='add_person.php'><img src="../icon/add.png" width='32px' height='32px'/></A></h1>
                </div>
            </div>
			<div class="bball-content-body">
				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Name</th><th>Height</th><th>Hand</th><th>Birth place</th><th>Nationality</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $person) {
				echo "<tr>
                    <td>".$person->id."</td>
                    <td>".$person->lastname." ".$person->firstname."</td>
                    <td>".$person->height."</td>
                    <td>".$person->hand."</td>
                    <td><img src='".$person->birthplacecity->country->flagurl."'/> ".$person->birthplacecity->name.", ".$person->birthplacecity->country->name."</td>
                    <td>
                    <img src='".$person->firstnationality->flagurl."'/>";
				if (isset($person->secondnationality->flagurl))echo " <img src='".$person->secondnationality->flagurl."'/>";
				if (isset($person->thirdnationality->flagurl))echo " <img src='".$person->thirdnationality->flagurl."'/>";
                echo    "<td><A href='personDetails.php?id=".$person->id."'>Detail</th></td>
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
