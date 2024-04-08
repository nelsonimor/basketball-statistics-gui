<html>
<head>
<link rel="stylesheet" href="game_style.css">
</head>

<body>

<?php
$url = "http://localhost:8080/poc/hello/";
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
?>

<?php include('game_main.php');?>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Boxscore')" id="defaultOpen">Boxscore</button>
  <button class="tablinks" onclick="openCity(event, 'Quarters')" id="defaultOpen">Score By Quarters</button>
  <button class="tablinks" onclick="openCity(event, 'TeamStats')">Team Stats</button>
  <button class="tablinks" onclick="openCity(event, 'HighPerformer')">High performer</button>
</div>


<?php include('game_quarters.php');?>
<?php include('game_highperformer.php');?>
<?php include('game_teamstats.php');?>
<?php include('game_boxscore.php');?>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</body>


</html>