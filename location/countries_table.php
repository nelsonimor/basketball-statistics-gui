				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Name</th><th>Fullname</th><th>Continent</th><th>Region</th><th>Flag</th><th></th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				//echo $response;
				foreach ($result->items as $country) {
				    echo "<tr><td>".$country->id."</td>
                        <td>".$country->name."<br/><font size='1' color='gray'>".$country->codeiso2." / ".$country->codeiso3." / ".$country->number."</font></td>
                        <td>".$country->fullname." </td>
                        <td><A href='continentDetails.php?id=".$country->continent->id."'/>".$country->continent->name."</A></td>
                        <td><A href='regionDetails.php?id=".$country->region->id."'/>".$country->region->name."</A></td>
                        <td><img src='".$country->flagurl."'/> </td>
                        <td><A href='countryDetails.php?id=".$country->id."'><img src='../icon/detail.png' height='16px' width='16px'/></A></td></tr>";
				}?>
				</tbody>
				</table>

