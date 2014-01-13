
			<table border=1 width=100%>
				<tr>
					<td>Winner First name</td>
					<td>Winner Last name</td>
					<td>Full Address</td>
					<td>Mobile Number</td>
					<td>Credit Card type</td>
					<td>Credit Number</td>
					<td>Credit Expiry Eate</td>
					<td>Credit Security Code</td>
					<td>Guest full name</td>
					<td>Comments fields</td>
					<td>Check in date</td>
					<td>Check out date</td>
					<td>Type </td>
					<td>Room type </td>
					<td>One bed / Two beds</td>
					<td>Billing Instruction</td>
					<td>Hotel Confirmation Number</td>
				</tr>
				<?php foreach ($model as $user){?>
				<tr>
					<td><?php echo $user->first_name;?></td>
					<td><?php echo $user->last_name;?></td>
					<td><?php echo $user->work_address1;?></td>
					<td><?php echo $user->telephone_number_cell;?></td>
					<td><?php echo $user->credit_card_type;?></td>
					<td><?php echo $user->credit_card_number;?></td>
					<td><?php echo $user->credit_card_expiration_date;?></td>
					<td><?php echo $user->csv_number;?></td>
					<td><?php echo empty($user->guest)?'':$user->guest->first_name . ' ' . $user->guest->last_name;?></td>
					<td><?php echo CHtml::encode($user->comment);?></td>
					<td><?php echo $user->hotel_arrival_date;?></td>
					<td><?php echo $user->hotel_departure_date;?></td>
					<td><?php echo $user->type;?></td>
					<td><?php echo $user->hotel_type;?></td>
					<td><?php echo $user->room_type;?></td>
					<td><?php echo $user->billing_instruction;?></td>
					<td></td>
					
				<?php }?>
			</table>
