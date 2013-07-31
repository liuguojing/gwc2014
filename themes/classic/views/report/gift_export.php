<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cagegory</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gift Type</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user){?>
		<tr>
			<td><?php echo 'W'.$user->id?></td>
			<td><?php echo $user->type?></td>
			<td><?php echo $user->first_name?></td>
			<td><?php echo $user->last_name?></td>
			<td><?php echo $user->headset?></td>
		</tr>
		<?php }?>
		<?php foreach($guests as $guest){?>
		<tr>
			<td><?php echo 'W'.$guest->user->id. 'G';?></td>
			<td><?php echo $guest->user->type?></td>
			<td><?php echo $guest->first_name?></td>
			<td><?php echo $guest->last_name?></td>
			<td><?php echo $guest->headset?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
