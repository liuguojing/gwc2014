<table>
<tr>
	<td>ID</td>
	<td>Type</td>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Team</td>
	<td>Hotel</td>
</tr>
	<?php foreach($users as $user){?>
	<?php if($user->has_checkin == 1){?>
	<tr>
		<td>W<?php echo $user->id;?></td>
		<td><?php echo $user->type;?></td>
		<td><?php echo $user->first_name;?></td>
		<td><?php echo $user->last_name;?></td>
		<td><?php echo $user->team_dinner;?></td>
		<td><?php echo substr($user->hotel_type,0,strpos($user->hotel_type,' - '));?></td>
	</tr>
	<?php }?>
	<?php if($user->has_guest && $user->guest->has_checkin == 1){?>
	<tr>
		<td>W<?php echo $user->id;?>G</td>
		<td><?php echo $user->type;?> Guest</td>
		<td><?php echo $user->guest->first_name;?></td>
		<td><?php echo $user->guest->last_name;?></td>
		<td><?php echo $user->team_dinner;?> Guest</td>
		<td><?php echo substr($user->hotel_type,0,strpos($user->hotel_type,' - '));?></td>
	</tr>
	<?php }?>
	<?php }?>
</table>