<html>
<head>

<style>


h1 {
  font-family: cursive;
  display: block;
  font-size: 2em;
  margin-top: 0.50em;
  margin-bottom: 0.50em;
  margin-left: 0;
  margin-right: 0;
  font-weight: bold;
}

h2 {
  font-family: cursive;
  display: block;
  font-size: 1.4em;
  margin-top: 0.50em;
  margin-bottom: 0.50em;
  margin-left: 0;
  margin-right: 0;
  font-weight: bold;
}



#customers {
  font-family: cursive;
  border-collapse: collapse;
  width: 90%;
}

#customers td, #customers th {
  border: 1px solid #eee;
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #eee;}

#customers th {
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: left;
  background-color: #4682B4;
  color: white;
}

#customers tfoot {
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: left;
  background-color: #e2e2e2;
  color: black;
}


 /* Style the tab */
.tab {
  overflow: hidden;
  border: 0px solid #000;
  background-color: #ffffff;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 5px;
  transition: 0.1s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #4682B4;
  font-family: cursive;
  color: white;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 1px 6px;
  border: 0px solid #ccc;
  border-top: none;
} 

.tabcontent {
  animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

.myDivTeam {
  color: #000;
  display: inline-block;
  opacity:.8;
  font-family: cursive;
  text-align: center;
  font-weight:bold;
  padding: 5px;
  margin-bottom:10px;
  font-size:50px;
}


.myDiv {
  background-color:  #2980b9 ;
  color: #fff;
  display: inline-block;
  opacity:.7;
  font-family: cursive;
  text-align: center;
  font-weight:bold;
  padding: 15px;
  border-radius: 20px;
}

.myDivWin {
  background-color: rgba(0,0,0,1);
  color:  #2ecc71 ;
  display: inline-block;
  font-family: fantasy, sans-serif;
  text-align: center;
  font-weight:bold;
  font-size:50px;
  padding: 15px;
  border-radius: 20px;
}

.myDivLoss{
  background-color: rgba(0,0,0,1);
  color: #fff;
  display: inline-block;
  font-family: fantasy, sans-serif;
  text-align: center;
  font-weight:bold;
  padding: 15px;
  border-radius: 20px;
  font-size:50px;
}




/* Go from zero to full opacity */
@keyframes fadeEffect {
  from {opacity: 0;}
  to {opacity: 1;}
}
</style>



<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

</head>


<body>

<?php
//$url = "http://krislewis.alwaysdata.net/games/";
$url = "http://localhost:8080/poc/hello/";
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response);
;
?>






<div>
<table width="90%">
<tr>
	<td>	
		<table width="100%" border="0">
		<tr>
			<td width="10%"><img src="euroleague.svg" width="150px" height="75px" /></td>
			<td width="90%" align="center"><div class="myDiv"><?php echo $result->gameInfo->league?> <?php echo $result->gameInfo->season?> - <?php echo $result->gameInfo->phasis?> - <?php echo $result->gameInfo->date?> - <?php echo $result->gameInfo->arenaName?> (<?php echo $result->gameInfo->arenaCity?>) - Attendance: <?php echo $result->gameInfo->attendance?> - Officials: N/A</div></td></tr>
		<tr>
		</table>
	</td>
</tr>
<tr>
	<td>
	<table width="100%" border="0">
	<tr>
	<td width="10%">&nbsp;</td>
	<td width="30%" align="right">
	<table>
	<tr>
	<td><img src='<?php echo $result->localTeamMainLogo?>'></td>
	<td><div class="myDivTeam"><?php echo $result->localTeam?></div></td>
	</tr>
	</table>
	</td>
	
	<td width="30%" align="center">
	<table>
	<tr>
	<td><div class="myDivLoss"><?php echo $result->localScore?></div></td>
	<td><div class="myDivWin"><?php echo $result->visitorScore?></div></td>
	</tr>
	</table>
	
	</td>
	<td width="30%" align="left"><table><tr><td><div class="myDivTeam"><?php echo $result->visitorTeam?></div></td>
	<td><img src='<?php echo $result->visitorTeamMainLogo?>'></td></tr></table></td>
	</tr>
	</table>
</td>
</tr>
</table>






</div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Boxscore')" id="defaultOpen">Boxscore</button>
  <button class="tablinks" onclick="openCity(event, 'Quarters')" id="defaultOpen">Score By Quarters</button>
  <button class="tablinks" onclick="openCity(event, 'TeamStats')">Team Stats</button>
  <button class="tablinks" onclick="openCity(event, 'HighPerformer')">High performer</button>
</div>

<div id="Quarters" class="tabcontent">
<h1>Score by quarters</h1>
<table id="customers">
<thead>
<tr>
<th class="nosort">&nbsp;</th>
<th class="nosort">1</th>
<th class="nosort">2</th>
<th class="nosort">3</th>
<th class="nosort">4</th>
<th class="nosort">Final</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'> Monaco</td>
<td><?php echo $result->visitorScoreQt1?></td>
<td><?php echo $result->visitorScoreQt2?></td>
<td><font color="#2ecc71"><b><?php echo $result->visitorScoreQt3?></b></font></td>
<td><?php echo $result->visitorScoreQt4?></td>
<td><font color="#2ecc71"><b><?php echo $result->visitorScore?></b></font></td>
</tr>
<tr>
<td ><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'> Anadolou Efes</td>
<td><font color="#2ecc71"><b><?php echo $result->localScoreQt1?></font></td>
<td><font color="#2ecc71"><b><?php echo $result->localScoreQt2?></font></td>
<td><?php echo $result->localScoreQt3?></td>
<td><font color="#2ecc71"><b><?php echo $result->localScoreQt4?></font></td>
<td><?php echo $result->localScore?></td>
</tr>
</tbody>
</table>
<h1>Score at the end of quarters</h1>
<table id="customers">
<thead>
<tr>
<th class="nosort">&nbsp;</th>
<th class="nosort">1</th>
<th class="nosort">2</th>
<th class="nosort">3</th>
<th class="nosort">4</th>
<th class="nosort">Final</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'> Monaco</td>
<td><?php echo $result->visitorScoreQt1Cumul?></td>
<td><?php echo $result->visitorScoreQt2Cumul?></td>
<td><font color="#2ecc71"><b><?php echo $result->visitorScoreQt3Cumul?></b></font></td>
<td><font color="#2ecc71"><b><?php echo $result->visitorScoreQt4Cumul?></b></font></td>
<td><font color="#2ecc71"><b><?php echo $result->visitorScore?></b></font></td>
</tr>
<tr>
<td ><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'> Anadolou Efes</td>
<td><font color="#2ecc71"><b><?php echo $result->localScoreQt1Cumul?></b></font></td>
<td><font color="#2ecc71"><b><?php echo $result->localScoreQt2Cumul?></b></font></td>
<td><?php echo $result->localScoreQt3Cumul?></td>
<td><?php echo $result->localScoreQt4Cumul?></td>
<td><?php echo $result->localScore?></td>
</tr>
</tbody>
</table>
</div>

<div id="HighPerformer" class="tabcontent">

<table id = "customers">
<tr>
<td>
<h2>Points</h2>
<img src='https://basketball.realgm.com/images/nba/4.2/profiles/photos/2006/Okobo_Elie_phx19.jpg'/>
<table id="customers">
<thead>
<tr>
<th class="nosort"></th>
<th class="nosort">Player</th>
<th class="nosort">Points</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Okobo, Elie"><a href="/player/Elie-Okobo/Summary/65475">Elie Okobo</a></td>
<td>16</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="James, Mike"><a href="/player/Mike-James/Summary/22959">Mike James</a></td>
<td>16</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Beaubois, Rodrigue"><a href="/player/Rodrigue-Beaubois/Summary/1627">Rodrigue Beaubois</a></td>
<td>15</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Loyd, Jordan"><a href="/player/Jordan-Loyd/Summary/31657">Jordan Loyd</a></td>
<td>14</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Larkin, Shane"><a href="/player/Shane-Larkin/Summary/28945">Shane Larkin</a></td>
<td>14</td>
</tr>
</tbody>
</table>
</td>

<td>
<h2>Rebounds</h2>
<img src='https://basketball.realgm.com/images/nba/4.2/profiles/photos/2006/Diallo_Alpha_prov.jpg'/>
<table id="customers">
<thead>
<tr>
<th class="nosort"></th>
<th class="nosort">Player</th>
<th class="nosort">Rebounds</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Diallo, Alpha"><a href="/player/Alpha-Diallo/Summary/85800">Alpha Diallo</a></td>
<td>9</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Oturu, Daniel"><a href="/player/Daniel-Oturu/Summary/121152">Daniel Oturu</a></td>
<td>6</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Pleiss, Tibor"><a href="/player/Tibor-Pleiss/Summary/8219">Tibor Pleiss</a></td>
<td>6</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Brown, John"><a href="/player/John-Brown/Summary/31183">John Brown</a></td>
<td>4</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Bryant, Elijah"><a href="/player/Elijah-Bryant/Summary/80581">Elijah Bryant</a></td>
<td>4</td>
</tr>
</tbody>
</table>
</td>

<td>
<h2>Assists</h2>
<img src='https://basketball.realgm.com/images/nba/4.2/profiles/photos/2006/Larkin_Shane_bos17.jpg'/>
<table id="customers">
<thead>
<tr>
<th class="nosort"></th>
<th class="nosort">Player</th>
<th class="nosort">Assists</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Larkin, Shane"><a href="/player/Shane-Larkin/Summary/28945">Shane Larkin</a></td>
<td>5</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Okobo, Elie"><a href="/player/Elie-Okobo/Summary/65475">Elie Okobo</a></td>
<td>3</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Diallo, Alpha"><a href="/player/Alpha-Diallo/Summary/85800">Alpha Diallo</a></td>
<td>3</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Beaubois, Rodrigue"><a href="/player/Rodrigue-Beaubois/Summary/1627">Rodrigue Beaubois</a></td>
<td>3</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Bryant, Elijah"><a href="/player/Elijah-Bryant/Summary/80581">Elijah Bryant</a></td>
<td>3</td>
</tr>
</tbody>
</table>
</td>

<td>
<h2>Steal</h2>
<img src='https://basketball.realgm.com/images/nba/4.2/profiles/photos/2006/Larkin_Shane_bos17.jpg'/>
<table id="customers">
<thead>
<tr>
<th class="nosort"></th>
<th class="nosort">Player</th>
<th class="nosort">Steal</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Larkin, Shane"><a href="/player/Shane-Larkin/Summary/28945">Shane Larkin</a></td>
<td>2</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Beaubois, Rodrigue"><a href="/player/Rodrigue-Beaubois/Summary/1627">Rodrigue Beaubois</a></td>
<td>1</td>
</tr>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Loyd, Jordan"><a href="/player/Jordan-Loyd/Summary/31657">Jordan Loyd</a></td>
<td>1</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="James, Mike"><a href="/player/Mike-James/Summary/22959">Mike James</a></td>
<td>1</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Jaiteh, Mouhammadou"><a href="/player/Mouhammadou-Jaiteh/Summary/26500">Mouhammadou Jaiteh</a></td>
<td>1</td>
</tr>
</tbody>
</table>
</td>

<td>
<h2>Block</h2>
<img src='https://basketball.realgm.com/images/nba/4.2/profiles/photos/2006/Thompson_Darius_ncaatn.jpg'/>
<table id="customers">
<thead>
<tr>
<th class="nosort"></th>
<th class="nosort">Player</th>
<th class="nosort">Block</th>
</tr>
</thead>
<tbody>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Thompson, Darius"><a href="/player/Darius-Thompson/Summary/56692">Darius Thompson</a></td>
<td>2</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Willis, Derek"><a href="/player/Derek-Willis/Summary/28227">Derek Willis</a></td>
<td>1</td>
</tr>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'></td>
<td rel="Oturu, Daniel"><a href="/player/Daniel-Oturu/Summary/121152">Daniel Oturu</a></td>
<td>1</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Diallo, Alpha"><a href="/player/Alpha-Diallo/Summary/85800">Alpha Diallo</a></td>
<td>1</td>
</tr>
<tr>
<td><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'></td>
<td rel="Blossomgame, Jaron"><a href="/player/Jaron-Blossomgame/Summary/42292">Jaron Blossomgame</a></td>
<td>1</td>
</tr>
</tbody>
</table>
</td>

</tr>

</table>

</div>

<div id="TeamStats" class="tabcontent">
<h2>Team Stats</h2>
<table id="customers">
<thead>
<tr>
<th class="nosort"><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/euroleague/anadolu-efes.png'> Anadolou Efes</th>
<th class="nosort">Stats</th>
<th class="nosort"><img src='https://basketball.realgm.com/images/basketball/5.0/team_logos/international/other/mona.png'> Monaco</th>
</tr>
</thead>
<tbody>
<tr>
<td>78</td>
<td>Points</td>
<td>80</td>
</tr>
<tr>
<td>28-62 (45.2%)</td>
<td>FGM-A</td>
<td><b>30-66 (45.5%)</b></td>
</tr>
<tr>
<td><b>11-24 (45.8%)</b></td>
<td>3PM-A</td>
<td>9-26 (34.6%)</td>
</tr>
<tr>
<td>11-15 (73.3%)</td>
<td>FTM-A</td>
<td><b>11-14 (78.6%)</b></td>
</tr>
<tr>
<td>32</td>
<td>Reb</td>
<td><b>36</b></td>
</tr>
<tr>
<td>12</td>
<td>Ast</td>
<td><b>15</b></td>
</tr>
<tr>
<td><b>19</b></td>
<td>PF</td>
<td>18</td>
</tr>
<tr>
<td><b>7</b></td>
<td>STL</td>
<td>5</td>
</tr>
<tr>
<td><b>12</b></td>
<td>TO</td>
<td>10</td>
</tr>
<tr>
<td><b>4</b></td>
<td>BLK</td>
<td>3</td>
</tr>
<tr>
<td>1pt  : 11pts (14%)<br/>2pts : 34pts (44%)</br/>3pts : 33pts (42%)</td>
<td>Répartition</td>
<td>1pt : 11pts (14%)<br/>2pts : 42pts (52%)</br/>3pts : 27pts (34%)</td>
</tr>
</tbody>
</table>





</div>

<div id="Boxscore" class="tabcontent">


<h2><img src='<?php echo $result->localContent->teamlogo?>'><?php echo $result->localContent->teamname?></h2>
<table id="customers">
<thead>
<tr>
<th width='3%'></th>
<th width='10%'>Player</th>
<th width='3%'>Nat</th>
<th width='5%'>Pos</th>
<th width='5%'>Min</th>
<th width='10%'>FGM-A</th>
<th width='10%'>3PM-A</th>
<th width='10%'>FTM-A</th>
<th width='5%'>Off</th>
<th width='5%'>Def</th>
<th width='5%'>Reb</th>
<th width='5%'>Ast</th>
<th width='5%'>PF</th>
<th width='5%'>STL</th>
<th width='5%'>TO</th>
<th width='5%'>BLK</th>
<th width='5%'>PTS</th></tr>
</thead>
<tbody>
<?php 
foreach ($result->localContent->boxscorelines as $line){?>
    <tr class="even">
    <td>
    <?php if ($line->starter == false) {?>
    <img src='basketball-bench.png' width='20px' height='20px'/>
    <?php } else {?>
    <img src='basketball.png' width='20px' height='20px'/>
    <?php }?>
    </td>
    <td><a href="<?php echo $line->urlref?>?>"><?php echo $line->firstname." ".$line->lastname?></a></td>
    <td><img src='<?php echo $line->urlflagnat?>'/></td>
    <td><?php echo $line->position?></td>
    <td><?php echo $line->min?></td>
    <td><?php echo $line->fgm."-".$line->fga?></td>
    <td><?php echo $line->threem."-".$line->threea?></td>
    <td><?php echo $line->ftm."-".$line->fta?></td>
    <td><?php echo $line->off?></td>
    <td><?php echo $line->def?></td>
    <td><?php echo $line->reb?></td>
    <td><?php echo $line->ast?></td>
    <td><?php echo $line->pf?></td>
    <td><?php echo $line->stl?></td>
    <td><?php echo $line->to?></td>
    <td><?php echo $line->blk?></td>
    <td><?php echo $line->pts?></td>
    </tr>
<?php
}
?>
</tbody>
<tfoot>
<tr class="stattotals">
<td colspan="2">Team</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>200</td>
<td>28-62 (45.2%)</td>
<td>11-24 (45.8%)</td>
<td>11-15 (73.3%)</td>
<td>8</td>
<td>24</td>
<td>32</td>
<td>12</td>
<td>19</td>
<td>7</td>
<td>12</td>
<td>4</td>
<td>78</td>
</tr>
<tr class="stattotals">
<td colspan="2">Team</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>200</td>
<td><?php echo $result->localContent->totalfgm."-".$result->localContent->totalfga?> (45.2%)</td>
<td><?php echo $result->localContent->totalthreem."-".$result->localContent->totalthreea?> (45.8%)</td>
<td><?php echo $result->localContent->totalftm."-".$result->localContent->totalfta?> (73.3%)</td>
<td><?php echo $result->localContent->totalRebOff?></td>
<td><?php echo $result->localContent->totalRebDef?></td>
<td><?php echo $result->localContent->totalReb?></td>
<td><?php echo $result->localContent->totalAst?></td>
<td><?php echo $result->localContent->totalPf?></td>
<td><?php echo $result->localContent->totalStl?></td>
<td><?php echo $result->localContent->totalTo?></td>
<td><?php echo $result->localContent->totalBlks?></td>
<td><?php echo $result->localContent->totalPts?></td>
</tr>
<tr>
<td>Coach</td>
<td>Erdem Can</td>
<td><img src='http://paulemignoni.alwaysdata.net/flags/16x16/tr.png'/></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tfoot>
</table>

<h2><img src='<?php echo $result->visitorContent->teamlogo?>'><?php echo $result->visitorContent->teamname?></h2>

<table id="customers">
<thead>
<tr>
<th width='3%'></th>
<th width='10%'>Player</th>
<th width='3%'>Nat</th>
<th width='5%'>Pos</th>
<th width='5%'>Min</th>
<th width='10%'>FGM-A</th>
<th width='10%'>3PM-A</th>
<th width='10%'>FTM-A</th>
<th width='5%'>Off</th>
<th width='5%'>Def</th>
<th width='5%'>Reb</th>
<th width='5%'>Ast</th>
<th width='5%'>PF</th>
<th width='5%'>STL</th>
<th width='5%'>TO</th>
<th width='5%'>BLK</th>
<th width='5%'>PTS</th></tr>
</thead>
<tbody>
<?php 
foreach ($result->visitorContent->boxscorelines as $line){?>
    <tr class="even">
    <td>
    <?php if ($line->starter == false) {?>
    <img src='basketball-bench.png' width='20px' height='20px'/>
    <?php } else {?>
    <img src='basketball.png' width='20px' height='20px'/>
    <?php }?>
    </td>
    <td><a href="<?php echo $line->urlref?>?>"><?php echo $line->firstname." ".$line->lastname?></a></td>
    <td><img src='<?php echo $line->urlflagnat?>'/></td>
    <td><?php echo $line->position?></td>
    <td><?php echo $line->min?></td>
    <td><?php echo $line->fgm."-".$line->fga?></td>
    <td><?php echo $line->threem."-".$line->threea?></td>
    <td><?php echo $line->ftm."-".$line->fta?></td>
    <td><?php echo $line->off?></td>
    <td><?php echo $line->def?></td>
    <td><?php echo $line->reb?></td>
    <td><?php echo $line->ast?></td>
    <td><?php echo $line->pf?></td>
    <td><?php echo $line->stl?></td>
    <td><?php echo $line->to?></td>
    <td><?php echo $line->blk?></td>
    <td><?php echo $line->pts?></td>
    </tr>
<?php
}
?>
</tbody>
<tfoot>
<tr>
<td colspan="2">Team</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>200</td>
<td>30-66 (45.5%)</td>
<td>9-26  (34.6%)</td>
<td>11-14 (78.6%)</td>
<td>11</td>
<td>25</td>
<td>36</td>
<td>15</td>
<td>18</td>
<td>5</td>
<td>10</td>
<td>3</td>
<td>80</td>
</tr>
<tr>
<td>Coach</td>
<td>Sasa Obradovic</td>
<td><img src='http://paulemignoni.alwaysdata.net/flags/16x16/rs.png'/></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tfoot>
</table>



</div>


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