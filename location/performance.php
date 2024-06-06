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
$period = "last_day";
$category = "points";


if (isset($_GET['period'])) $period = $_GET['period'];
if (isset($_GET['category']))$category = $_GET['category'];


$configs = include ('../config.php');



$url = $configs["endpoint.location.performance"] . "?periodicityRequest=" . $period."&statCategory=".$category;
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response);
?>



<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">



			<div class="bball-content">
				<div class="bball-content-header pure-g">
					<div class="pure-u-1-2">
						<h1>Best Performance (<?php echo count($result->boxscoresLineDto->items)?>)</h1>
						<font size='4' color='gray'><?php echo "Data : ".$result->totalGames." games / ".$result->totalBoxlines." boxlines / From ".$result->startDate." to ".$result->endDate;?></font>
					</div>

					<div class="pure-u-1-2">
						<form action="performance.php" method="get" id="a">
							<label for="b">Periodicity:</label> 
							
							<select name="period">
								<option value="all_time" <?php if($period == 'all_time') echo " selected";?>>all_time</option>
								<option value="this_week" <?php if($period == 'this_week') echo " selected";?>>this_week</option>
								<option value="last_week" <?php if($period == 'last_week') echo " selected";?>>last_week</option>
								<option value="last_day" <?php if($period == 'last_day') echo " selected";?>>last_day</option>
								<option value="this_month" <?php if($period == 'this_month') echo " selected";?>>this_month</option>
								<option value="last_month" <?php if($period == 'last_month') echo " selected";?>>last_month</option>
								<option value="this_year" <?php if($period == 'this_year') echo " selected";?>>this_year</option>
								<option value="last_year" <?php if($period == 'last_year') echo " selected";?>>last_year</option>
							</select> 
							
							<label for="b">Category:</label> 
							
							<select name="category">
								<option value="points"  <?php if($category == 'points') echo " selected";?>>points</option>
								<option value="assist"   <?php if($category == 'assist') echo " selected";?>>assist</option>
								<option value="block"   <?php if($category == 'block') echo " selected";?>>block</option>
								<option value="turnover"   <?php if($category == 'turnover') echo " selected";?>>turnover</option>
								<option value="steal"   <?php if($category == 'steal') echo " selected";?>>steal</option>
								
								<option value="fieldGoalMade"  <?php if($category == 'fieldGoalMade') echo " selected";?>>fieldGoalMade</option>
								<option value="fieldGoalAttempts"   <?php if($category == 'fieldGoalAttempts') echo " selected";?>>fieldGoalAttempts</option>
								<option value="freeThrowMade"   <?php if($category == 'freeThrowMade') echo " selected";?>>freeThrowMade</option>
								<option value="freeThrowAttempts"   <?php if($category == 'freeThrowAttempts') echo " selected";?>>freeThrowAttempts</option>
								<option value="threePtsMade"   <?php if($category == 'threePtsMade') echo " selected";?>>threePtsMade</option>								
								<option value="threePtsAttempts"  <?php if($category == 'threePtsAttempts') echo " selected";?>>threePtsAttempts</option>
								<option value="offRebound"   <?php if($category == 'offRebound') echo " selected";?>>offRebound</option>
								<option value="defRebound"   <?php if($category == 'defRebound') echo " selected";?>>defRebound</option>
								<option value="duration"   <?php if($category == 'duration') echo " selected";?>>duration</option>	
							</select> 
							
							
							<input type="submit">
						</form>
					</div>

				</div>



				<div class="bball-content-body">
				<?php include('performance_table.php');?>
			</div>
			</div>
		</div>
	</div>

</body>
</html>
