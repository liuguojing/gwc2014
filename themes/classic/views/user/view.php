<?php 
	if($model->type == 'Gartner Crew'){
		$title = 'Gartner Crew Information';
		$model->team_dinner = 'Event Sales';
	}elseif($model->type =="Crew"){
		$title = 'Crew Information';		
	}elseif($model->type =='Operating Committee'){
		$title = 'Operating Committee Information';
		if(empty($model->team_dinner)){
			$model->team_dinner = 'Operating Committee';
		}
	}else{
		$title = 'Winner Information';
	}?>
<div class="container top">
		<div class="row">
			<div class="span12" style="text-align:center">
				<h1>View User Information</h1>
				<p></p>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo $title;?></h2>
						<?php $winner_total = 30;
							$winner_fill = 0;
							$winnerAttributes  = explode(',','first_name,last_name,email,daytime_phone,evening_phone,telephone_number_cell,work_address1,work_address2,work_city,work_state,work_zip_code,work_country,managers_name,emergency_contact_name,emergency_contact_tel_number,relationship_with_the_emergency_contact,ga_passport,ga_dateofbirth,ga_firstname,ga_lastname,ga_gender,ga_card_number,ga_card_country,ga_card_expiration_date,ga_card_issue_date,ga_redress_number,previous_winners,times,years,has_guest');
							foreach($winnerAttributes as $attribute){
								if(!empty($model->$attribute))
									$winner_fill++;
							}
							
							$winner_persent = Yii::app()->numberFormatter->format('#.##',100*$winner_fill/$winner_total);
						?>
					</caption>
					<thead>
						<tr>
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						<tr >
							<td>First Name</td><td><?php echo CHtml::encode($model->first_name);?></td>
						</tr>
						<tr>
							<td>Last Name</td><td><?php echo CHtml::encode($model->last_name);?></td>
						</tr>
						<tr>
							<td>Email Address</td><td><?php echo CHtml::encode($model->email);?></td>
						</tr>
						
						<tr>
							<td>Daytime Phone</td><td><?php echo CHtml::encode($model->daytime_phone);?></td>
						</tr>
						<tr>
							<td>Evening Phone</td><td><?php echo CHtml::encode($model->evening_phone);?></td>
						</tr>
						<tr>
							<td>Telephone Number (cell)</td><td><?php echo CHtml::encode($model->telephone_number_cell);?></td>
						</tr>
						<tr><td><?php echo $model->getAttributeLabel('work_address1')?></td><td><?php echo CHtml::encode($model->work_address1);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('work_address2')?></td><td><?php echo CHtml::encode($model->work_address2);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('work_city')?></td><td><?php echo CHtml::encode($model->work_city);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('work_state')?></td><td><?php echo CHtml::encode($model->work_state);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('work_zip_code')?></td><td><?php echo CHtml::encode($model->work_zip_code);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('work_country')?></td><td><?php echo CHtml::encode($model->work_country);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('managers_name')?></td><td><?php echo CHtml::encode($model->managers_name);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('emergency_contact_name')?></td><td><?php echo CHtml::encode($model->emergency_contact_name);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('emergency_contact_tel_number')?></td><td><?php echo CHtml::encode($model->emergency_contact_tel_number);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('relationship_with_the_emergency_contact')?></td><td><?php echo CHtml::encode($model->relationship_with_the_emergency_contact);?></td></tr>
						<?php if($model->type!='Gartner Crew' && $model->type!='Crew'){?>
						<tr><td><?php echo $model->getAttributeLabel('ga_passport')?></td><td><?php echo CHtml::encode($model->ga_passport);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_dateofbirth')?></td><td><?php echo CHtml::encode($model->ga_dateofbirth);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_firstname')?></td><td><?php echo CHtml::encode($model->ga_firstname);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_lastname')?></td><td><?php echo CHtml::encode($model->ga_lastname);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_gender')?></td><td><?php echo CHtml::encode($model->ga_gender);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_card_number')?></td><td><?php echo CHtml::encode($model->ga_card_number);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_card_country')?></td><td><?php echo CHtml::encode($model->ga_card_country);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_card_expiration_date')?></td><td><?php echo CHtml::encode($model->ga_card_expiration_date);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_card_issue_date')?></td><td><?php echo CHtml::encode($model->ga_card_issue_date);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('ga_redress_number')?></td><td><?php echo CHtml::encode($model->ga_redress_number);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('previous_winners')?></td><td><?php echo CHtml::encode($model->previous_winners);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('times')?></td><td><?php echo CHtml::encode($model->times);?></td></tr>
						<tr><td><?php echo $model->getAttributeLabel('years')?></td><td><?php echo CHtml::encode($model->years);?></td></tr>
						<tr>
							<td>Has Guest?</td><td><?php $options = $model->getHasGuestOptions(); echo CHtml::encode($options[$model->has_guest]);?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
				<?php if($model->has_guest == 1){?>
				<table id='guest' class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Guest Information</h2>
						<?php $guest_total = 12;
							$guest_fill = 0;
							$guestAttributes  = explode(',','first_name,last_name,ga_passport,ga_dateofbirth,ga_firstname,ga_lastname,ga_gender,ga_card_number,ga_card_country,ga_card_expiration_date,ga_card_issue_date,ga_redress_number');
							foreach($guestAttributes as $attribute){
								if(!empty($guest->$attribute))
									$guest_fill++;
							}
							
							$guest_persent = Yii::app()->numberFormatter->format('#.##',100*$guest_fill/$guest_total);
						?>
					</caption>
					<thead>
						<tr>
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($guestAttributes as $attribute){?>
							<tr><td><?php echo $guest->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($guest->$attribute);?></td></tr>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
				<?php if($model->type!='Operating Committee' && $model->type!='Gartner Crew' && $model->type!='Crew'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Travel Information</h2>
						<?php 
							$total = 9;
							$fill = 0;
							$travelAttributes  = explode(',','departure_date,return_date,airport_name,destination_city,preferred_seat_request,frequent_flyer_number,other,need_visa,visa_letter');
							foreach($travelAttributes as $attribute){
								if(!empty($model->$attribute))
									$fill++;
							}
							$persent = Yii::app()->numberFormatter->format('#.##',100*$fill/$total);
						?>
					</caption>
					<thead>
						<tr>
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($travelAttributes as $attribute){?>
							<tr><td><?php echo $model->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($model->$attribute);?></td></tr>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
				<?php if($model->has_guest==1){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Guest Travel Information</h2>
						<?php 
							$total = 9;
							$fill = 0;
							$travelAttributes  = explode(',','departure_date,return_date,airport_name,destination_city,preferred_seat_request,frequent_flyer_number,other,need_visa,visa_letter');
							foreach($travelAttributes as $attribute){
								if(!empty($guest->$attribute))
									$fill++;
							}
							$persent = Yii::app()->numberFormatter->format('#.##',100*$fill/$total);
						?>
					</caption>
					<thead>
						<tr>
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($travelAttributes as $attribute){?>
							<tr><td><?php echo $guest->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($guest->$attribute);?></td></tr>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Hotel Information</h2>
						<?php 
							$total = 8;
							$fill = 0;
							$attributes  = explode(',','room_type,hotel_arrival_date,hotel_departure_date,hotel_venue,credit_card_number,credit_card_type,credit_card_expiration_date,cardholders_name');
							foreach($attributes as $attribute){
								if(!empty($model->$attribute))
									$fill++;
							}
							$persent = Yii::app()->numberFormatter->format('#.##',100*$fill/$total);
						?>
					</caption>
					<thead>
						<tr>
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($attributes as $attribute){?>
							<tr><td><?php echo $model->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($model->$attribute);?></td></tr>
						<?php }?>
					</tbody>
				</table>
				<?php if($model->type!='Gartner Crew' && $model->type!='Crew'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Other Information</h2>
						<?php 
							$total = 2;
							$fill = 0;
							$attributes  = explode(',','team_dinner_menu,gala_dinner_menu');
							foreach($attributes as $attribute){
								if(!empty($model->$attribute))
									$fill++;
							}
							$persent = Yii::app()->numberFormatter->format('#.##',100*$fill/$total);
						?>
					</caption>
					<thead>
						<tr class="">
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						
							<tr><td><?php echo $model->getAttributeLabel('team_dinner_menu')?></td><td><?php echo CHtml::encode($model->team_dinner_menu);?></td></tr>
							<tr><td><?php echo $model->getAttributeLabel('gala_dinner_menu')?></td><td><?php echo CHtml::encode($model->gala_dinner_menu);?></td></tr>
					</tbody>
				</table>
				<?php if($model->has_guest == 1){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Guest Other Information</h2>
					<div class="progress">
						<?php 
							$total = 2;
							$fill = 0;
							$attributes  = explode(',','team_dinner_menu,gala_dinner_menu');
							foreach($attributes as $attribute){
								if(!empty($guest->$attribute))
									$fill++;
							}
							$persent = Yii::app()->numberFormatter->format('#.##',100*$fill/$total);
						?>
					</div>
					</caption>
					<thead>
						<tr class="">
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
							<tr><td><?php echo $guest->getAttributeLabel('team_dinner_menu')?></td><td><?php echo CHtml::encode($guest->team_dinner_menu);?></td></tr>
							<tr><td><?php echo $guest->getAttributeLabel('gala_dinner_menu')?></td><td><?php echo CHtml::encode($guest->gala_dinner_menu);?></td></tr>
					</tbody>
				</table>
				<?php }?>
				<?php }?>
				
				<?php if($model->type=='Gartner Crew'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2>Dinner Information</h2>
						<?php 
							$travelAttributes  = explode(',','crew_diet_requirements,crew_other_info,crew_menu_choice,crew_unifrom_size');
						?>
					</caption>
					<thead>
						<tr>
							<th>TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($travelAttributes as $attribute){?>
							<tr><td><?php echo $model->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($model->$attribute);?></td></tr>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
				
				</div>
		</div>
		<footer class="row">
			<div class="span12">&nbsp;</div>
		</footer>
	</div>