<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cagegory</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Amount</th>
			<th>Sign</th>
			<th>Ticket</th>
			<th>Coupon</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $user){?>
		<tr>
			<td><?php echo 'W'.$user->id?></td>
			<td><?php echo $user->type?></td>
			<td><?php echo $user->first_name?></td>
			<td><?php echo $user->last_name?></td>
			<td><?php echo $user->amount?></td>
			<td><?php echo $this->domain .  'uploads/' . $user->id . '.png';?></td>
			<td><?php echo $user->travel_ticket==0?"No":"Yes";?></td>
			<td><?php echo $user->coupon==0?"No":"Yes";?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
