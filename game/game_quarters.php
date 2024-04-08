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