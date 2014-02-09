<?php 
function formatCost($cost){
	$format = new CNumberFormatter('EN');
	return $format->format('#,##0.00', $cost);
}

?>
			<table border=1 width=100%>
				<tr>
					<td>ID</td>
					<td>Winner First name</td>
					<td>Winner Last name</td>
					<td>Work Address 1</td>
					<td>Work Address 2</td>
					<td>Work City</td>
					<td>Work State</td>
					<td>Work Zip Code</td>
					<td>Work Country</td>
					<td>Tel Number</td>
					<td>Mobile Number</td>
					<td>Credit Card type</td>
					<td>Credit Number</td>
					<td>Credit Expiry Eate</td>
					<td>Credit Security Code</td>
					<td>Guest full name</td>
					<td>Winners Comments</td>
					<td>Comments fields</td>
					<td>Hotel Venue</td>
					<td>Check in date</td>
					<td>Check out date</td>
					<td>Type </td>
					<td>Hotel Name</td>
					<td>Room type </td>
					<td>One bed / Two beds</td>
					<td>Room Rate</td>					
					<td>Billing Instruction</td>
					<td>Hotel Confirmation Number</td>
				</tr>
				<?php foreach ($users as $user){?>
				<tr>
					<td><?php echo $user->id;?></td>
					<td><?php echo $user->first_name;?></td>
					<td><?php echo $user->last_name;?></td>
					<td><?php echo $user->work_address1;?></td>
					<td><?php echo $user->work_address2;?></td>
					<td><?php echo $user->work_city;?></td>
					<td><?php echo $user->work_state;?></td>
					<td><?php echo $user->work_zip_code;?></td>
					<td><?php echo $user->work_country;?></td>
					<td><?php echo $user->daytime_phone;?></td>
					<td><?php echo $user->telephone_number_cell;?></td>
					<td><?php echo $user->credit_card_type;?></td>
					<td><?php echo $user->credit_card_number;?></td>
					<td><?php echo $user->credit_card_expiration_date;?></td>
					<td><?php echo $user->csv_number;?></td>
					<td><?php echo empty($user->guest)?'':$user->guest->first_name . ' ' . $user->guest->last_name;?></td>
					<td><?php echo $user->requirements;?></td>
					<td><?php echo CHtml::encode($user->comment);?></td>
					<td><?php echo $user->hotel_venue;?></td>
					<td><?php echo $user->hotel_arrival_date;?></td>
					<td><?php echo $user->hotel_departure_date;?></td>
					<td><?php echo $user->type;?></td>
					<td><?php echo substr($user->hotel_type,0,strpos($user->hotel_type,' - '));?></td>
					<td><?php echo $user->hotel_type;?></td>
					<td><?php echo $user->room_type;?></td>
					<td><?php
						$hotel = Hotel::model()->findBySql("select sell_rate from hotels where concat(hotel_name,' - ',name) in (select hotel_type from users where id=" . $user->id . ")");
		            if(isset($hotel)){
		              echo   "$".formatCost($hotel->sell_rate);
		            }
		            else {echo '';}
		 ?></td>
					<td><?php echo $user->billing_instruction;?></td>
					<td></td>
					
				<?php }?>
			</table>
