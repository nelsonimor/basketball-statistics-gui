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