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
if(isset($_POST["team_name"]) && 
    isset($_POST["team_type"]) && 
    isset($_POST["start_date"]) && 
    isset($_POST["end_date"])){
    $configs = include('../config.php');
    $team_name = $_POST["team_name"];
    $team_type = $_POST["team_type"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $url = $configs["endpoint.location.teams"]."/edition";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array("Accept: application/json","Content-Type: application/json",);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = "{\"teamName\": \"".$team_name."\",\"teamType\": \"".$team_type."\",\"startDate\": \"".$start_date."\",\"endDate\": \"".$end_date."\"}";
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
						<h1>Add new team edition</h1>
					</div>
									

					
					
				</div>

				<form action="add_team_edition.php" method="post">
					<label for="team_name">Team name:</label> <input type="text" id="team_name" name="team_name"><br><br>
					<label for="team_type">Team type:</label> <input type="text" id="team_type" name="team_type"><br><br>
					<label for="start_date">Start date:</label> <input type="text" id="start_date" name="start_date"><br><br> 
					<label for="end_date">End date:</label> <input type="text" id="end_date" name="end_date"><br><br> 
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
