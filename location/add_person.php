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
if(isset($_POST["person_first_name"]) && 
    isset($_POST["person_first_nat"]) && 
    isset($_POST["person_height"]) && 
    isset($_POST["person_birth_city_place"]) && 
    isset($_POST["person_birth_city_country"]) && 
    isset($_POST["person_profil_picture"]) && 
    isset($_POST["person_hand"])){
    $configs = include('../config.php');
    $person_first_name = $_POST["person_first_name"];
    $person_last_name = $_POST["person_last_name"];
    $person_first_nat = $_POST["person_first_nat"];
    $person_height = $_POST["person_height"];
    $person_birth_city_place = $_POST["person_birth_city_place"];
    $person_birth_city_country = $_POST["person_birth_city_country"];
    $person_profil_picture = $_POST["person_profil_picture"];
    $person_hand = $_POST["person_hand"];
    $url = $configs["endpoint.location.persons"];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array("Accept: application/json","Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = "{\"firstname\": \"".$person_first_name."\",\"lastname\": \"".$person_last_name."\",\"firstnationality\": \"".$person_first_nat."\",\"height\": \"".$person_height."\",\"birthcityplace\": \"".$person_birth_city_place."\",\"birthcitycountry\": \"".$person_birth_city_country."\",\"profilpictureurl\": \"".$person_profil_picture."\",\"hand\": \"".$person_hand."\"}";
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
						<h1>Add new person</h1>
					</div>
									

					
					
				</div>

				<form action="add_person.php" method="post">
					<label for="person_first_name">First name:</label> <input type="text" id="person_first_name" name="person_first_name"><br><br>
					<label for="person_last_name">Last name:</label> <input type="text" id="person_last_name" name="person_last_name"><br><br>
					<label for="person_first_nat">First nationality:</label> <input type="text" id="person_first_nat" name="person_first_nat"><br><br> 
					<label for="person_height">Height:</label> <input type="text" id="person_height" name="person_height"><br><br> 
					<label for="person_birth_city_place">Birth city place:</label> <input type="text" id="person_birth_city_place" name="person_birth_city_place"><br><br> 
					<label for="person_birth_city_country">Birth city country:</label> <input type="text" id="person_birth_city_country" name="person_birth_city_country"><br><br> 
					<label for="person_profil_picture">Profil picture:</label> <input type="text" id="person_profil_picture" name="person_profil_picture"><br><br> 
					<label for="person_hand">Hand:</label> <input type="text" id="person_hand" name="person_hand"><br><br>  
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
