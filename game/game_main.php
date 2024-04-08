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