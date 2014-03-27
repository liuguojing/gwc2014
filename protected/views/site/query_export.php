<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Full Name</th>
			<th>Contact Telephone</th>
			<th>Contact Email</th>
			<th>Hotel / Room Number</th>
			<th>NATURE OF QUERY</th>
			<th>Details Of Query</th>
			<th>Outcome Of Query</th>
			<th>Authorised By</th>
			<th>Authorised At</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($querys as $query){?>
		<tr>
			<td><?php echo $query->id;?></td>
			<td><?php echo $query->full_name;?></td>
			<td><?php echo $query->contact_telephone;?></td>
			<td><?php echo $query->contact_email;?></td>
			<td><?php echo $query->hotel;?></td>
			<td><?php echo $query->nature;?></td>
			<td><?php echo $query->details;?></td>
			<td><?php echo $query->outcome;?></td>
			<td><?php echo $query->staff_name;?></td>
			<td><?php echo $query->created_at;?></td>
		</tr>
		<?php }?>
	</tbody>
</table>
