<?php
$url = 'http://lucdian.alwaysdata.net/continents/';
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
?>

<html>
<body>
<h1>Continents</h1>
<table border='1'>
<thead>
<tr><th>Id</th><th>Code</th><th>Name</th></tr>
</thead>
<tbody>
<?php
$result = json_decode($response);
foreach ($result->items as $continent) {
    echo "<tr><td>".$continent->id."</td><td>".$continent->code."</td><td>".$continent->name."</td></tr>";
}?>
</tbody>
</table>
</body>
</html>