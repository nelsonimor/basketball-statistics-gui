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
echo "id = ".$id;
$url = $configs["endpoint.location.country"]."/id/".$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
$countryName = $result->name;
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
            <div class="bball-content-header pure-g">
                <div class="pure-u-1-2">
                    <h1><?php echo "<h1>Country : ".$countryName." (".$result->fullname.")</h1>";?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$configs = include('../config.php');
$url = $configs["endpoint.location.persons"]."?birthcountryId=".$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
			<div class="bball-content-body">
				<h2><?php echo "<h3>".count(json_decode($response)->items)." persons born in : ".$countryName."</h3>";?></h2>
				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Name</th><th>Height</th><th>Hand</th><th>Birth place</th><th>Birth date</th><th>Nationality</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $person) {
				echo "<tr>
                    <td>".$person->id."</td>
                    <td>".$person->lastname." ".$person->firstname."</td>";
                echo "<td>";
                if(isset($person->height) && $person->height!=null){
                    echo $person->height;
                }
                echo "</td>";
                echo   "<td>".$person->hand."</td>";
               
				if(isset($person->birthplacecity->country)){
				    echo "<td><img src='".$person->birthplacecity->country->flagurl."'/> ".$person->birthplacecity->name.", ".$person->birthplacecity->country->name."</td>";
				}
				else{
				    echo "<td></td>";
				}
				

                    



                echo "<td>".$person->birthdate."</td>
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






<?php 
$url = $configs["endpoint.location.city"]."?countryId=".$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
			<div class="bball-content-body">
			<h2><?php echo "<h3>".count(json_decode($response)->items)." cities declared in  : ".$countryName."</h3>";?></h2>
			<?php include('cities_table.php');?>
			</div>
        </div>
    </div>
</div>

</body>
</html>