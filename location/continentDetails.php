<html>
<body>
<?php
$configs = include('../config.php'); 
$id = $_GET["id"];
$url = $configs["endpoint.location"].$id;
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
echo "<h1>Continent : ".$result->name."</h1>";
echo "Code : ".$result->code."</br></br>";	
echo "<A href='continents.php'>List of continents</A>";	
?>
</body>
</html>