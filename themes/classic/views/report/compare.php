<div class="container top">
		<div class="row">
			<div class="span12" style="text-align:center">
				<h1>Housing and Travel dates – compare report / process</h1>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>Type</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>travel arrival date</th>
							<th>hotel arrival date</th>
							<th>departure date</th>
							<th>hotel departure date</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $user){?>
						<tr>
							<td>Winner</td>
							<td><?php echo $user->first_name?></td>
							<td><?php echo $user->last_name?></td>
							<td><?php echo $user->departure_date?></td>
							<td><?php echo $user->hotel_arrival_date?></td>
							<td><?php echo $user->return_date?></td>
							<td><?php echo $user->hotel_departure_date?></td>
						</tr>
						<?php }?>
						<?php foreach($guests as $guest){?>
						<tr>
							<td>Guest</td>
							<td><?php echo $user->first_name?></td>
							<td><?php echo $user->last_name?></td>
							<td><?php echo $user->departure_date?></td>
							<td><?php echo $user->hotel_arrival_date?></td>
							<td><?php echo $user->return_date?></td>
							<td><?php echo $user->hotel_departure_date?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>