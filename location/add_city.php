<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
	content="A layout example that shows off a responsive bball layout.">
<link rel="stylesheet"
	href="https://unpkg.com/purecss@2.1.0/build/pure-min.css"
	integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH"
	crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
if(isset($_POST["cityName"]) && isset($_POST["countryName"])){
    $configs = include('../config.php');
    $cityName = $_POST["cityName"];
    $countryName = $_POST["countryName"];
    $url = $configs["endpoint.location.city"];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array("Accept: application/json","Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = "{\"name\": \"".$cityName."\",\"countryname\": \"".$countryName."\"}";
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $resp = curl_exec($curl);
    curl_close($curl);
}

?>


	<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
			<div class="bball-content">
				

				<?php
				   $color = 'green';
				   if(isset($resp)){
				      echo "<table border='1' style='border-color: gray;'><tr><td>";
				      $json = json_decode($resp, true);
				      $color = "red";
				      if(isset($json['status'])){
				          echo '<font color='.$color.'>'.$json['status']." ".$json['title'].' '.$json['detail'].'</font>';
				      }
				      else{
				          $color = "green";
				          echo '<font color='.$color.'>Success : '.$resp.'</font>';
				      }
                      echo "</td></tr></table>";
				   }
				   
				?>
				



				<div class="bball-content-header pure-g">
					<div class="pure-u-1-2">
						<h1>Add new city</h1>
					</div>
									

					
					
				</div>

				<form action="add_city.php" method="post">
					<label for="cityName">City Name:</label> <input type="text"
						id="cityName" name="cityName"><br>
					<br> <label for="countryName">Country name:</label> <input type="text"
						id="countryName" name="countryName"><br>
					<br> <input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
