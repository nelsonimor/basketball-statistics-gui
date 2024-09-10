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
$url = $configs["endpoint.location.persons"]."?ids=".$id;

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
$person = array_shift($result->items);
?>

<div id="layout" class="content pure-g">
	<?php include('menu.php');?>
    <div id="main" class="pure-u-1">
        <div class="bball-content">
            <div class="bball-content-header pure-g">
                <div class="pure-u-1-2">
                    
                    <table border = '0' width='100%'>
                    <tr><td><b><font size='30px'><?php echo $person->firstname ." ". $person->lastname."";?></font></b></td><td><?php echo "<img src='".$person->profilpictureurl."'/>"?></td></tr>
                    <tr><td><b>Nationality :</b> <?php echo $person->firstnationality->name." <A href='countryDetails.php?id=".$person->firstnationality->id."'><img src='".$person->firstnationality->flagurl."'/></A>";?></td></tr>
                    <tr><td><b>Hand :</b> <?php echo $person->hand;?></td></tr>
                    <tr><td><b>Height :</b> <?php echo $person->height;?></td></tr>
                     
                     <?php 
                     if(isset($person->birthplacecity->name)){
                         ?>
                         <tr><td><b>Birthplace :</b> <?php echo "<A href='cityDetails.php?id=".$person->birthplacecity->id."'>".$person->birthplacecity->name."</A> (".$person->birthplacecity->country->name."<A href='countryDetails.php?id=".$person->firstnationality->id."'><img src='".$person->birthplacecity->country->flagurl."'/></A>)";?></td></tr>
                         <?php
                     }
                     ?>
                     
                     <?php 
                     if(isset($person->birthdate)){
                         ?>
                         <tr><td><b>Birthdate :</b> <?php echo $person->birthdate;?></td></tr>
                         <?php
                     }
                     ?>
                     
                     
                    </table>
                    
                    
                    
                    
					</div>

				</div>


				<div class="bball-content-body">
				<?php include('person_boxscores.php');?>
			</div>
			</div>
		</div>
	</div>

</body>
</html>