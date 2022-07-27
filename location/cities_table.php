				<table class="pure-table">
				<thead>
				<tr><th>Id</th><th>Name</th><th>Coordinate</th><th>State</th><th>County</th><th>Country</th><th>Flag</th><th>Continent</th><th>Region</th><th>Detail</th></tr>
				</thead>
				<tbody>
				<?php
				$result = json_decode($response);
				foreach ($result->items as $city) {
				    echo "<tr><td>".$city->id."</td>
                        <td>".$city->name."</td>
                        <td>".$city->latitude."/".$city->longitude."</td>
                        <td>".$city->state."</td>
                        <td>".$city->county."</td>
                        <td><A href='countryDetails.php?id=".$city->country->id."'/>".$city->country->name."</A></td>
                        <td><img src='../flags/16x16/".strtolower($city->country->codeiso2).".png'/></td>
                        <td><A href='continentDetails.php?id=".$city->country->continent->id."'/>".$city->country->continent->name."</A></td>
                        <td><A href='regionDetails.php?id=".$city->country->region->id."'/>".$city->country->region->name."</A></td>
                        <td><A href='cityDetails.php?id=".$city->id."'>Detail</A></td></tr>";
				}?>
				</tbody>
				</table>

