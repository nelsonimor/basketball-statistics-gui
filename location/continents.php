<html>
<body>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
<?php
$configs = include('../config.php');
$url = $configs["endpoint.location"];
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

echo "<h1>List of continents</h1><br/>";
echo "<table class='pure-table pure-table-bordered'>";
echo "<thead><tr>";
echo "<td>Id</td>";
echo "<td>Code</td>";
echo "<td>Name</td>"; 
echo "<td>Detail</td>";
echo "</tr></thead>";	
	
echo "<tbody>";	
$result = json_decode($response);
foreach ($result->items as $continent) {
	echo "<tr>";
	echo "<td>".$continent->id."</td>";
	echo "<td>".$continent->code."</td>";
	echo "<td>".$continent->name."</td>";
	echo "<td><A href='continentDetails.php?id=".$continent->id."'>Detail</A></td>";
	echo "</tr>";
}	
echo "</tbody></table>";
?>
</body>
</html>