<table>
<tr>
	<th>ID</th><th>Table No</th><th>First Name</th><th>Last Name</th><th>Preferred Name</th><th>Type</th><th>Team</th><th>Hotel</th>
</tr>

<?php foreach($users as $user){?>
<tr>
	<td>W<?php echo $user->id;?></td>
	<td><?php echo $user->table_no;?></td>
	<td><?php echo $user->first_name;?></td>
	<td><?php echo $user->last_name;?></td>
	<td><?php echo $user->preferred_name;?></td>
	<td><?php echo $user->type;?></td>
	<td><?php if($user->team_dinner=='Emerging Markets - India & CEEMEA') { echo "Emerging Markets"; } else { echo $user->team_dinner; } ?></td>
	<td><?php echo substr($user->hotel_type,0,strpos($user->hotel_type,' - '));?></td>
	
	
					
				</tr>
				<?php if($user->has_guest==1 && $user->guest){?>
				<tr>
					<td>W<?php echo $user->id;?>G</td>
					<td><?php echo $user->table_no;?></td>
					<td><?php echo $user->guest->first_name;?></td>
					<td><?php echo $user->guest->last_name;?></td>
					<td><?php echo $user->guest->preferred_name;?></td>
					<td>Guest</td>
					<td><?php if($user->team_dinner=='Emerging Markets - India & CEEMEA') { echo "Emerging Markets"; } else { echo $user->team_dinner; } ?></td>
					<td><?php echo substr($user->hotel_type,0,strpos($user->hotel_type,' - '));?></td>
					
					
				</tr>
</tr>
<?php }}?>
</table>