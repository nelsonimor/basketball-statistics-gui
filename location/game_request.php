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
$status = "ALL";
$configs = include('../config.php');
if (isset($_GET['status'])) $status = $_GET['status'];
$url = $configs["endpoint.location.game_request"] . "?status=" . $status;
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
                    <h1>List of game requests (<?php echo count(json_decode($response)->items)?>)</h1>
                </div>
                
                <div class="pure-u-1-2">
						<form action="game_request.php" method="get" id="a">

							<label for="b">Status:</label> 
							
							<select name="status">
								<option value="ALL"  <?php if($status == 'ALL') echo " selected";?>>ALL</option>
								<option value="CREATED"   <?php if($status == 'CREATED') echo " selected";?>>CREATED</option>
								<option value="CREATION_FAILURE"   <?php if($status == 'CREATION_FAILURE') echo " selected";?>>CREATION_FAILURE</option>
								<option value="SERIALIZATION_ERROR"   <?php if($status == 'SERIALIZATION_ERROR') echo " selected";?>>SERIALIZATION_ERROR</option>
								<option value="NO_COMPETITION_FOUND"   <?php if($status == 'NO_COMPETITION_FOUND') echo " selected";?>>NO_COMPETITION_FOUND</option>
								<option value="WRONG_NATIONALITIES"   <?php if($status == 'WRONG_NATIONALITIES') echo " selected";?>>WRONG_NATIONALITIES</option>
								<option value="WRONG_SCORES"   <?php if($status == 'WRONG_SCORES') echo " selected";?>>WRONG_SCORES</option>
								<option value="VALIDATED"   <?php if($status == 'VALIDATED') echo " selected";?>>VALIDATED</option>
							</select> 
	
							<input type="submit">
						</form>
					</div>
                
                
                
            </div>
			<div class="bball-content-body">
				<?php include('game_request_table.php');?>
			</div>
        </div>
    </div>
</div>

</body>
</html>
