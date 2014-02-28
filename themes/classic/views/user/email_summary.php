<?php

 	$night_f='Team Dinner';
 	$night_s='Gala Dinner and Awards';

if (in_array($model->team_dinner,array('Americas Major Accounts - EU Public Sector','Americas Major Accounts - HTTP East','Americas Major Accounts - HTTP West','Americas Major Accounts - Northeast EU/Invest','Americas Major Accounts - Northwest EU','Americas Major Accounts - South EU','Americas Major Accounts - Brazil Sales','Americas Major Accounts - Supply Chain','Americas SAO')))
{$hotel_assign='Sheraton';
 	$team_dinner='Friday April 11 2014';
 	$gala_dinner='Sunday April 13 2014';
 	$night_f='Team Dinner';
 	$night_s='Gala Dinner and Awards';
	 }

if (in_array($model->team_dinner,array('Europe Sales','Event Sales')))
{$hotel_assign='Hilton'; 
if ($model->team_dinner=='Europe Sales')
{
$team_dinner='Sunday April 13 2014';
$gala_dinner='Friday April 11 2014';
$night_s='Team Dinner';
 	$night_f='Gala Dinner and Awards';
	}
else
{$team_dinner='Friday April 11 2014';
$gala_dinner='Sunday April 13 2014';
	$night_f='Team Dinner';
 	$night_s='Gala Dinner and Awards';
	}
	}


if (in_array($model->team_dinner,array('ANZ','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales','Specialists')))
{$hotel_assign='Shangri-La';
	if (in_array($model->team_dinner,array('Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
	{
		$team_dinner='Sunday April 13 2014';
$gala_dinner='Friday April 11 2014';
$night_s='Team Dinner';
 	$night_f='Gala Dinner and Awards';
		}
  else
  {
  	$team_dinner='Friday April 11 2014';
$gala_dinner='Sunday April 13 2014';
$night_f='Team Dinner';
 	$night_s='Gala Dinner and Awards';
  	}
	
	
	 }
if ($model->type=="Operating Committee")	 
{
	$night_f='Gala Dinner and Awards';
 	$night_s='Gala Dinner and Awards';
	
	}
?>


<style>
#User_team_dinner_menu label{width:400px;} 
#Guest_team_dinner_menu label{width:400px;} 
.form-horizontal .control-label{width:440px;}
.form-horizontal .controls {margin-left: 460px;}
</style>
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
<div class="row">
			<div class="span12" style="text-align:center;">
				<h1>Review your Information</h1>
				<p class="alert alert-info" style="float:right;">‘Right click mouse’ for printing options</p>
			</div>
</div>
<div class="container top">
<div class="row">
<div class="span12">

<div class="row">
	<div class="span12">
		<div class="btn-group" data-toggle="buttons-radio" style="text-align:center">
		  <button type="button" class="btn btn-info active" onclick="showDiv('RI')"><i class="gwc-icon-reg"></i>&nbsp;Registration Information</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('HI')"><i class="gwc-icon-hotel"></i>&nbsp;Hotel Information</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('TI')"><i class="gwc-icon-air"></i>&nbsp;Travel Information</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('TOI')"><i class="gwc-icon-tour"></i>&nbsp;Tours Calendar</button>
		  <br/><br/>
		</div>
	
	</div>
</div>
<div class="row" id="RI" style="margin-top:0px;">
	<div class="span12">
		<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo $title?></h2>
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
						<?php if($model->type!='Gartner Crew'&&$model->type!='Crew'){?>
						<tr><td><?php echo $model->getAttributeLabel('team_dinner')?></td><td><?php echo CHtml::encode($model->team_dinner);?></td></tr>
						<?php }?>
						<tr><td><?php echo $model->getAttributeLabel('team_dinner_dietary')?></td><td><?php echo CHtml::encode($model->team_dinner_dietary);?></td></tr>
						<?php if($model->type!='Crew' && $model->type!='Gartner Crew'&& $model->type!='Operating Committee'){?>
						<?php if($model->type=='Gartner Crew'||$model->type=='Crew'){?>
						<tr><td>Uniform Choice</td><td><?php echo CHtml::encode($model->crew_menu_choice);?></td></tr>
						<?php }?>
						<?php if($model->type=='Gartner Crew'||$model->type=='Crew'){?>
						<tr><td>Uniform Size</td><td><?php echo CHtml::encode($model->crew_unifrom_size);?></td></tr>
						<?php }?>
						
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
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo 'Guest Information'?></h2>
						<?php $guest_total = 12;
							$guest_fill = 0;
							if($model->type!='Crew' && $model->type!='Gartner Crew'&& $model->type!='Operating Committee'){
								$guestAttributes  = explode(',','first_name,last_name,ga_passport,ga_dateofbirth,ga_firstname,ga_lastname,ga_gender,ga_card_number,ga_card_country,ga_card_expiration_date,ga_card_issue_date,ga_redress_number');
							}else{
								$guestAttributes  = explode(',','first_name,last_name');
							}
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
				<?php if($model->type!='Crew'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo 'Additional Information'?></h2>
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
							<th width="400px">TITLE</th><th>INFO</th>
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
					<h2><?php echo 'Guest Additional Information'?></h2>
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
							<th width="400px">TITLE</th><th>INFO</th>
						</tr>
					</thead>
					<tbody>
							<tr><td><?php echo $guest->getAttributeLabel('team_dinner_menu')?></td><td><?php echo CHtml::encode($guest->team_dinner_menu);?></td></tr>
							<tr><td><?php echo $guest->getAttributeLabel('gala_dinner_menu')?></td><td><?php echo CHtml::encode($guest->gala_dinner_menu);?></td></tr>
					</tbody>
				</table>
				<?php }?>
				<?php }?>
				
				
	</div>
</div>
<div class="row hide" id="HI">
	<div class="span12">
				<?php if($model->type!='Gartner Crew'&&$model->type!='Crew'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo 'Hotel Information'?></h2>
						<?php 
							$total = 8;
							$fill = 0;
							if($model->type=='Operating Committee'){
								$attributes  = explode(',','room_type,hotel_arrival_date,hotel_departure_date,hotel_venue,hotel_confirmation_number');
							}else{
								$attributes  = explode(',','room_type,hotel_arrival_date,hotel_departure_date,hotel_venue,hotel_confirmation_number');
							}
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
							<tr><td><?php echo $model->getAttributeLabel($attribute)?></td><td><?php if($attribute=='credit_card_number'){$model->displayCreditCardNumber();}else{echo CHtml::encode($model->$attribute);}?></td></tr>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
	</div>
</div>
<div class="row hide" id="TI">
	<div class="span12">
		<?php if($model->type!='Operating Committee' && $model->type!='Crew' && $model->type!='Gartner Crew'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo 'Travel Information'?></h2>
						<?php 
							$total = 9;
							$fill = 0;
							$travelAttributes  = explode(',','departure_date,return_date,airport_name,destination_city,preferred_seat_request,preferred_airline,frequent_flyer_number,other,visa_letter,permanent_home_address,place_of_birth,visa_status');
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
						<tr><td><?php echo $model->getAttributeLabel('driving')?></td><td><?php echo CHtml::encode($model->driving)==0?'No':'Yes';?></td></tr>
						<?php if($model->driving==0){?>
						<?php foreach($travelAttributes as $attribute){?>
							<tr><td><?php echo $model->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($model->$attribute);?></td></tr>
						<?php }?>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
				<?php if($model->has_guest==1 && $model->type!='Operating Committee'){?>
				<table class="table table-bordered table-hover table-striped">
					<caption>
					<h2><?php echo 'Guest Travel Information'?></h2>
						<?php 
							$total = 9;
							$fill = 0;
							$travelAttributes  = explode(',','departure_date,return_date,airport_name,destination_city,preferred_seat_request,preferred_airline,frequent_flyer_number,other,visa_letter,permanent_home_address,place_of_birth');
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
						<tr><td><?php echo $guest->getAttributeLabel('driving')?></td><td><?php echo CHtml::encode($guest->driving)==0?'No':'Yes';?></td></tr>
						<?php if($guest->driving==0){?>
						<?php foreach($travelAttributes as $attribute){?>
							<tr><td><?php echo $guest->getAttributeLabel($attribute)?></td><td><?php echo CHtml::encode($guest->$attribute);?></td></tr>
						<?php }?>
						<?php }?>
					</tbody>
				</table>
				<?php }?>
			
			<?php if($model->fi_status=='ticketed'){?>
			   <table class="table table-bordered table-hover table-striped" width="40%">
			   	<caption>
					<h2><?php echo 'Winner Flight Information'?></h2>
					</caption>
					<thead>
						<tr>
							<th colspan="7"><i class="gwc-icon-arrival"></i>&nbsp;Arrival Flights to Sydney</th><th colspan="7"><i class="gwc-icon-depart"></i>&nbsp;Departure Flights from Sydney</th>
						</tr>
						<tr>
							<th>Flight Date</th><th>Flight No.</th><th>From.</th><th>To.</th><th>Departure Time</th><th>Arrival Time</th><th>Arrival Date into Sydney</th>
							<th>Departure Date from Sydney</th><th>Flight Date</th><th>Flight No.</th><th>From.</th><th>To.</th><th>Departure Time</th><th>Arrival Time</th>
						</tr>
						
					</thead>
					<tbody>
						
						<?php if($model->fi_adate1!=''){?>
						<tr>
						   <td><?php echo $model->fi_adate1?></td><td><?php echo $model->fi_aflight1?></td><td><?php echo $model->fi_afrom1?></td><td><?php echo $model->fi_ato1?></td><td><?php echo $model->fi_adep1?></td><td><?php echo $model->fi_aarr1?></td><td></td>
						   <td><?php echo $model->fi_ddate?></td>	
						   <td><?php echo $model->fi_ddate1?></td><td><?php echo $model->fi_dflight1?></td><td><?php echo $model->fi_dfrom1?></td><td><?php echo $model->fi_dto1?></td><td><?php echo $model->fi_ddep1?></td><td><?php echo $model->fi_darr1?></td>
						    </tr>	
						    <tr>
						    <td><?php echo $model->fi_adate2?></td><td><?php echo $model->fi_aflight2?></td><td><?php echo $model->fi_afrom2?></td><td><?php echo $model->fi_ato2?></td><td><?php echo $model->fi_adep2?></td><td><?php echo $model->fi_aarr2?></td><td></td>
						    <td></td>
						    <?php if($model->fi_ddate2!=''){?>
						    <td><?php echo $model->fi_ddate2?></td><td><?php echo $model->fi_dflight2?></td><td><?php echo $model->fi_dfrom2?></td><td><?php echo $model->fi_dto2?></td><td><?php echo $model->fi_ddep2?></td><td><?php echo $model->fi_darr2?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						    <tr>
						    <td><?php echo $model->fi_adate3?></td><td><?php echo $model->fi_aflight3?></td><td><?php echo $model->fi_afrom3?></td><td><?php echo $model->fi_ato3?></td><td><?php echo $model->fi_adep3?></td><td><?php echo $model->fi_aarr3?></td><td><?php echo $model->fi_adate?></td>
						    <td></td>
						    <?php if($model->fi_ddate3!=''){?>
						    <td><?php echo $model->fi_ddate3?></td><td><?php echo $model->fi_dflight3?></td><td><?php echo $model->fi_dfrom3?></td><td><?php echo $model->fi_dto3?></td><td><?php echo $model->fi_ddep3?></td><td><?php echo $model->fi_darr3?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						<?php } elseif($model->fi_adate2!=''){?>
						<tr>
						    <td><?php echo $model->fi_adate2?></td><td><?php echo $model->fi_aflight2?></td><td><?php echo $model->fi_afrom2?></td><td><?php echo $model->fi_ato2?></td><td><?php echo $model->fi_adep2?></td><td><?php echo $model->fi_aarr2?></td><td></td>
						    <td><?php echo $model->fi_ddate?></td>	
						    <td><?php echo $model->fi_ddate1?></td><td><?php echo $model->fi_dflight1?></td><td><?php echo $model->fi_dfrom1?></td><td><?php echo $model->fi_dto1?></td><td><?php echo $model->fi_ddep1?></td><td><?php echo $model->fi_darr1?></td>
						    </tr>	
						    <tr>
						    <td><?php echo $model->fi_adate3?></td><td><?php echo $model->fi_aflight3?></td><td><?php echo $model->fi_afrom3?></td><td><?php echo $model->fi_ato3?></td><td><?php echo $model->fi_adep3?></td><td><?php echo $model->fi_aarr3?></td><td><?php echo $model->fi_adate?></td>
						    <td></td>
						    <?php if($model->fi_ddate2!=''){?>
						    <td><?php echo $model->fi_ddate2?></td><td><?php echo $model->fi_dflight2?></td><td><?php echo $model->fi_dfrom2?></td><td><?php echo $model->fi_dto2?></td><td><?php echo $model->fi_ddep2?></td><td><?php echo $model->fi_darr2?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						    <tr>
						    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    <td></td>
						    <?php if($model->fi_ddate3!=''){?>
						    <td><?php echo $model->fi_ddate3?></td><td><?php echo $model->fi_dflight3?></td><td><?php echo $model->fi_dfrom3?></td><td><?php echo $model->fi_dto3?></td><td><?php echo $model->fi_ddep3?></td><td><?php echo $model->fi_darr3?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						<?php } elseif($model->fi_adate3!=''){?>
						<tr>
						     <td><?php echo $model->fi_adate3?></td><td><?php echo $model->fi_aflight3?></td><td><?php echo $model->fi_afrom3?></td><td><?php echo $model->fi_ato3?></td><td><?php echo $model->fi_adep3?></td><td><?php echo $model->fi_aarr3?></td><td><?php echo $model->fi_adate?></td>
							   <td><?php echo $model->fi_ddate?></td>	
						    <td><?php echo $model->fi_ddate1?></td><td><?php echo $model->fi_dflight1?></td><td><?php echo $model->fi_dfrom1?></td><td><?php echo $model->fi_dto1?></td><td><?php echo $model->fi_ddep1?></td><td><?php echo $model->fi_darr1?></td>
						    </tr>
					      <tr>
						    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    <td></td>
						    <?php if($model->fi_ddate2!=''){?>
						    <td><?php echo $model->fi_ddate2?></td><td><?php echo $model->fi_dflight2?></td><td><?php echo $model->fi_dfrom2?></td><td><?php echo $model->fi_dto2?></td><td><?php echo $model->fi_ddep2?></td><td><?php echo $model->fi_darr2?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						    <tr>
						    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    <td></td>
						    <?php if($model->fi_ddate3!=''){?>
						    <td><?php echo $model->fi_ddate3?></td><td><?php echo $model->fi_dflight3?></td><td><?php echo $model->fi_dfrom3?></td><td><?php echo $model->fi_dto3?></td><td><?php echo $model->fi_ddep3?></td><td><?php echo $model->fi_darr3?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						<?php }?>					

					</tbody>

				 </table>
			<?php }?>	
			
				<?php if($guest->fi_status=='ticketed'){?>
			   <table class="table table-bordered table-hover table-striped" width="40%">
			   	<caption>
					<h2><?php echo 'Guest Flight Information'?></h2>
					</caption>
					<thead>
						<tr>
							<th colspan="7">Arrival Flights to Sydney</th><th colspan="7">Departure Flights from Sydney</th>
						</tr>
						<tr>
							<th>Flight Date</th><th>Flight No.</th><th>From.</th><th>To.</th><th>Departure Time</th><th>Arrival Time</th><th>Arrival Date into Sydney</th>
							<th>Departure Date from Sydney</th><th>Flight Date</th><th>Flight No.</th><th>From.</th><th>To.</th><th>Departure Time</th><th>Arrival Time</th>
						</tr>
						
					</thead>
					<tbody>
						
						<?php if($guest->fi_adate1!=''){?>
						<tr>
						   <td><?php echo $guest->fi_adate1?></td><td><?php echo $guest->fi_aflight1?></td><td><?php echo $guest->fi_afrom1?></td><td><?php echo $guest->fi_ato1?></td><td><?php echo $guest->fi_adep1?></td><td><?php echo $guest->fi_aarr1?></td><td></td>
						   <td><?php echo $guest->fi_ddate?></td>	
						   <td><?php echo $guest->fi_ddate1?></td><td><?php echo $guest->fi_dflight1?></td><td><?php echo $guest->fi_dfrom1?></td><td><?php echo $guest->fi_dto1?></td><td><?php echo $guest->fi_ddep1?></td><td><?php echo $guest->fi_darr1?></td>
						    </tr>	
						    <tr>
						    <td><?php echo $guest->fi_adate2?></td><td><?php echo $guest->fi_aflight2?></td><td><?php echo $guest->fi_afrom2?></td><td><?php echo $guest->fi_ato2?></td><td><?php echo $guest->fi_adep2?></td><td><?php echo $guest->fi_aarr2?></td><td></td>
						    <td></td>
						    <?php if($guest->fi_ddate2!=''){?>
						    <td><?php echo $guest->fi_ddate2?></td><td><?php echo $guest->fi_dflight2?></td><td><?php echo $guest->fi_dfrom2?></td><td><?php echo $guest->fi_dto2?></td><td><?php echo $guest->fi_ddep2?></td><td><?php echo $guest->fi_darr2?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						    <tr>
						    <td><?php echo $guest->fi_adate3?></td><td><?php echo $guest->fi_aflight3?></td><td><?php echo $guest->fi_afrom3?></td><td><?php echo $guest->fi_ato3?></td><td><?php echo $guest->fi_adep3?></td><td><?php echo $guest->fi_aarr3?></td><td><?php echo $guest->fi_adate?></td>
						    <td></td>
						    <?php if($guest->fi_ddate3!=''){?>
						    <td><?php echo $guest->fi_ddate3?></td><td><?php echo $guest->fi_dflight3?></td><td><?php echo $guest->fi_dfrom3?></td><td><?php echo $guest->fi_dto3?></td><td><?php echo $guest->fi_ddep3?></td><td><?php echo $guest->fi_darr3?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						<?php } elseif($guest->fi_adate2!=''){?>
						<tr>
						    <td><?php echo $guest->fi_adate2?></td><td><?php echo $guest->fi_aflight2?></td><td><?php echo $guest->fi_afrom2?></td><td><?php echo $guest->fi_ato2?></td><td><?php echo $guest->fi_adep2?></td><td><?php echo $guest->fi_aarr2?></td><td></td>
						    <td><?php echo $guest->fi_ddate?></td>	
						    <td><?php echo $guest->fi_ddate1?></td><td><?php echo $guest->fi_dflight1?></td><td><?php echo $guest->fi_dfrom1?></td><td><?php echo $guest->fi_dto1?></td><td><?php echo $guest->fi_ddep1?></td><td><?php echo $guest->fi_darr1?></td>
						    </tr>	
						    <tr>
						    <td><?php echo $guest->fi_adate3?></td><td><?php echo $guest->fi_aflight3?></td><td><?php echo $guest->fi_afrom3?></td><td><?php echo $guest->fi_ato3?></td><td><?php echo $guest->fi_adep3?></td><td><?php echo $guest->fi_aarr3?></td><td><?php echo $guest->fi_adate?></td>
						    <td></td>
						    <?php if($guest->fi_ddate2!=''){?>
						    <td><?php echo $guest->fi_ddate2?></td><td><?php echo $guest->fi_dflight2?></td><td><?php echo $guest->fi_dfrom2?></td><td><?php echo $guest->fi_dto2?></td><td><?php echo $guest->fi_ddep2?></td><td><?php echo $guest->fi_darr2?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						    <tr>
						    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    <td></td>
						    <?php if($guest->fi_ddate3!=''){?>
						    <td><?php echo $guest->fi_ddate3?></td><td><?php echo $guest->fi_dflight3?></td><td><?php echo $guest->fi_dfrom3?></td><td><?php echo $guest->fi_dto3?></td><td><?php echo $guest->fi_ddep3?></td><td><?php echo $guest->fi_darr3?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						<?php } elseif($guest->fi_adate3!=''){?>
						<tr>
						     <td><?php echo $guest->fi_adate3?></td><td><?php echo $guest->fi_aflight3?></td><td><?php echo $guest->fi_afrom3?></td><td><?php echo $guest->fi_ato3?></td><td><?php echo $guest->fi_adep3?></td><td><?php echo $guest->fi_aarr3?></td><td><?php echo $guest->fi_adate?></td>
							   <td><?php echo $guest->fi_ddate?></td>	
						    <td><?php echo $guest->fi_ddate1?></td><td><?php echo $guest->fi_dflight1?></td><td><?php echo $guest->fi_dfrom1?></td><td><?php echo $guest->fi_dto1?></td><td><?php echo $guest->fi_ddep1?></td><td><?php echo $guest->fi_darr1?></td>
						    </tr>
					      <tr>
						    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    <td></td>
						    <?php if($guest->fi_ddate2!=''){?>
						    <td><?php echo $guest->fi_ddate2?></td><td><?php echo $guest->fi_dflight2?></td><td><?php echo $guest->fi_dfrom2?></td><td><?php echo $guest->fi_dto2?></td><td><?php echo $guest->fi_ddep2?></td><td><?php echo $guest->fi_darr2?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						    <tr>
						    <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
						    <td></td>
						    <?php if($guest->fi_ddate3!=''){?>
						    <td><?php echo $guest->fi_ddate3?></td><td><?php echo $guest->fi_dflight3?></td><td><?php echo $guest->fi_dfrom3?></td><td><?php echo $guest->fi_dto3?></td><td><?php echo $guest->fi_ddep3?></td><td><?php echo $guest->fi_darr3?></td>		
						    <?php } else {	?>
						     <td></td><td></td><td></td><td></td><td></td><td></td>
						    <?php }?>
						    </tr>
						<?php }?>					

					</tbody>

				 </table>
			<?php }?>	
	</div>
</div>


<div class="row hide" id="TOI">
	<div class="span12">
		<div class="row">
	<div class="span6" style="">
		<b>Winner's Schedule</b>
		<table class="table table-hover table-striped">
			
		    <?php 
		          $tmpTime="";
		          $tourTime="";
		          foreach($tour_users as $tour_user){
		          	$tourTime = $tour_user->order_date.$tour_user->seat->begin_time;
		          	if($tmpTime<'2014-04-1000:00' && $tourTime > '2014-04-1000:00'){ ?>
		          		<tr><td>Thursday</td><td>Arrivals</td><td></td></tr>
		          	<?php
		          	}  if($tmpTime<'2014-04-1011:00' && $tourTime > '2014-04-1011:00'&&($user->type=='Top Achievers'||$user->type=='Operating Committee')){ 
		          	?>
		          		<tr><td></td><td>11:00 - 15:00</td><td><b>Top Achiever Lunch</b></td></tr>
		          	<?php
		          	}  if($tmpTime<'2014-04-1018:00' && $tourTime > '2014-04-1018:00'){ ?>
		          		<tr><td></td><td>18:00 - 22:00</td><td><b>Welcome Reception</b></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1100:00' && $tourTime > '2014-04-1100:00'){ ?>
		          		<tr><td></td><td>22:30 - 24:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Friday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1108:00' && $tourTime > '2014-04-1108:00'){ ?>
		          		<tr><td></td><td>8:00 - 10:00</td><td><b>Welcome Kick Off</b></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1118:00' && $tourTime > '2014-04-1118:00'){ 
		          		echo "<tr><td></td><td>18:00 - 22:00</td><td><b>$night_f</b></td></tr>";  ?>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1200:00' && $tourTime > '2014-04-1200:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Saturday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1219:00' && $tourTime > '2014-04-1219:00'){ ?>
		          		<tr><td></td><td>19:00 - 23:00</td><td><b>Theme Party Fright Night</b></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1300:00' && $tourTime > '2014-04-1300:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Sunday</td><td></td><td></td></tr>
		          	<?php 
		          	
		          	}  if($tmpTime<'2014-04-1318:00' && $tourTime > '2014-04-1318:00'){ 
		          		echo "<tr><td></td><td>18:00 - 23:00</td><td><b>$night_s</b></td></tr>";   ?>
		          	<?php
		          	} ?>
		          	<tr><td></td><td>
		          	<?php echo $tour_user->seat->begin_time.' - '.$tour_user->seat->end_time
		          	;
		          	 ?></td><td><b><?php echo $tour_user->tour->name;?></b></td></tr>
		          	<?php $tmpTime=$tourTime;?>
		   <?php }?>
		   <?php if( $tourTime < '2014-04-1000:00'){ ?>
		          		<tr><td>Thursday</td><td>Arrivals</td><td></td></tr>
		          	<?php
		          	}  if($tourTime < '2014-04-1011:00'&&($user->type=='Top Achievers'||$user->type=='Operating Committee')){ 
		          	?>
		          		<tr><td></td><td>11:00 - 15:00</td><td><b>Top Achiever Lunch</b></td></tr>
		          	<?php
		          	}  if($tourTime < '2014-04-1018:00'){ ?>
		          		<tr><td></td><td>18:00 - 22:00</td><td><b>Welcome Reception</b></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1100:00'){ ?>
		          		<tr><td></td><td>22:30 - 24:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Friday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1108:00'){ ?>
		          		<tr><td></td><td>8:00 - 10:00</td><td><b>Welcome Kick Off</b></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1118:00'){ 
		          		echo "<tr><td></td><td>18:00 - 22:00</td><td><b>$night_f</b></td></tr>"; ?>
		          	<?php 
		          	}  if($tourTime < '2014-04-1200:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Saturday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1219:00'){ ?>
		          		<tr><td></td><td>19:00 - 23:00</td><td><b>Theme Party Fright Night</b></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1300:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Sunday</td><td></td><td></td></tr>
		          	<?php 
		          	
		          	}  if($tourTime < '2014-04-1318:00'){ 
		          		echo "<tr><td></td><td>18:00 - 23:00</td><td><b>$night_s</b></td></tr>"; ?>
		          	<?php
		          	} ?>
		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		</table>
	</div>
	<!-- guest -->
	<?php if($user->has_guest==1){?> 
	<div class="span6">
		<b>Guest's Schedule</b>
		<table class="table table-hover table-striped">
			
		    <?php 
		          $tmpTime="";
		          $tourTime="";
		          foreach($tour_guests as $tour_user){
		          	$tourTime = $tour_user->order_date.$tour_user->seat->begin_time;
		          	if($tmpTime<'2014-04-1000:00' && $tourTime > '2014-04-1000:00'){ ?>
		          		<tr><td>Thursday</td><td>Arrivals</td><td></td></tr>
		          	<?php
		          	}  if($tmpTime<'2014-04-1011:00' && $tourTime > '2014-04-1011:00'&&($user->type=='Top Achievers'||$user->type=='Operating Committee')){ 
		          	?>
		          		<tr><td></td><td>11:00 - 15:00</td><td><b>Top Achiever Lunch</b></td></tr>
		          	<?php
		          	}  if($tmpTime<'2014-04-1018:00' && $tourTime > '2014-04-1018:00'){ ?>
		          		<tr><td></td><td>18:00 - 22:00</td><td><b>Welcome Reception</b></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1100:00' && $tourTime > '2014-04-1100:00'){ ?>
		          		<tr><td></td><td>22:30 - 24:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Friday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1108:00' && $tourTime > '2014-04-1108:00'){ ?>
		          		<tr><td></td><td>8:00 - 10:00</td><td><b>Welcome Kick Off</b></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1118:00' && $tourTime > '2014-04-1118:00'){ 
		          		echo "<tr><td></td><td>18:00 - 22:00</td><td><b>$night_f</b></td></tr>";  ?>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1200:00' && $tourTime > '2014-04-1200:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Saturday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1219:00' && $tourTime > '2014-04-1219:00'){ ?>
		          		<tr><td></td><td>19:00 - 23:00</td><td><b>Theme Party Fright Night</b></td></tr>
		          	<?php 
		          	}  if($tmpTime<'2014-04-1300:00' && $tourTime > '2014-04-1300:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Sunday</td><td></td><td></td></tr>
		          	<?php 
		          	
		          	}  if($tmpTime<'2014-04-1318:00' && $tourTime > '2014-04-1318:00'){ 
		          		echo "<tr><td></td><td>18:00 - 23:00</td><td><b>$night_s</b></td></tr>";   ?>
		          	<?php
		          	} ?>
		          	<tr><td></td><td>
		          	<?php echo //($tour_user->seat->begin_time>'12:00'?(substr($tour_user->seat->begin_time,0,2)-12).substr($tour_user->seat->begin_time,2,3).'pm':$tour_user->seat->begin_time.'am')
		          		    //.' - '.($tour_user->seat->end_time>'12:00'?(substr($tour_user->seat->end_time,0,2)-12).substr($tour_user->seat->end_time,2,3).'pm':$tour_user->seat->end_time.'am')
		          	$tour_user->seat->begin_time.' - '.$tour_user->seat->end_time
		          	;
		          	 ?></td><td><b><?php echo $tour_user->tour->name;?></b></td></tr>
		          	<?php $tmpTime=$tourTime;?>
		   <?php }?>
		   <?php if( $tourTime < '2014-04-1000:00'){ ?>
		          		<tr><td>Thursday</td><td>Arrivals</td><td></td></tr>
		          	<?php
		          	}  if($tourTime < '2014-04-1011:00'&&($user->type=='Top Achievers'||$user->type=='Operating Committee')){ 
		          	?>
		          		<tr><td></td><td>11:00 - 15:00</td><td><b>Top Achiever Lunch</b></td></tr>
		          	<?php
		          	}  if($tourTime < '2014-04-1018:00'){ ?>
		          		<tr><td></td><td>18:00 - 22:00</td><td><b>Welcome Reception</b></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1100:00'){ ?>
		          		<tr><td></td><td>22:30 - 24:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Friday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1108:00'){ ?>
		          		<tr><td></td><td>8:00 - 10:00</td><td><b>Welcome Kick Off</b></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1118:00'){ 
		          		echo "<tr><td></td><td>18:00 - 22:00</td><td><b>$night_f</b></td></tr>";  ?>
		          	<?php 
		          	}  if($tourTime < '2014-04-1200:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Saturday</td><td></td><td></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1219:00'){ ?>
		          		<tr><td></td><td>19:00 - 23:00</td><td><b>Theme Party Fright Night</b></td></tr>
		          	<?php 
		          	}  if($tourTime < '2014-04-1300:00'){ ?>
		          		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		          		<tr><td>Sunday</td><td></td><td></td></tr>
		          	<?php 
		          	
		          	}  if($tourTime < '2014-04-1318:00'){ 
		          		echo "<tr><td></td><td>18:00 - 23:00</td><td><b>$night_s</b></td></tr>"; ?>
		          	<?php
		          	} ?>
		<tr><td></td><td>23:00 - 02:00</td><td><b>Circle Club</b></td></tr>
		</table>
	</div>
	<?php }?>
</div>
<div class="row">
	<div class="span6" style="width:630px;">
		<b>Winners Wish list:</b><br/>
		<table class="table table-hover table-striped">
		<?php foreach($wishlists as $wishlist){?>
		<tr>
		<td>
			<?php echo $wishlist->tour->name;?>
		</td>
		<td>
		<?php echo $tour_user->order_date.' '
		.($wishlist->seat->begin_time>'12:00'?(substr($wishlist->seat->begin_time,0,2)-12).substr($wishlist->seat->begin_time,2,3).'pm':$wishlist->seat->begin_time.'am')
	    .' - '.($wishlist->seat->end_time>'12:00'?(substr($wishlist->seat->end_time,0,2)-12).substr($wishlist->seat->end_time,2,3).'pm':$wishlist->seat->end_time.'am');?><br/>

		</td>
		</tr>
		<?php }?>
		</table>
	</div>
<!-- guest -->
	<?php if($user->has_guest==1){?>
	<div class="span6" style="width:630px;">
		<b>Guest Wish list:</b><br/>
		<table class="table table-hover table-striped">
		<?php foreach($guest_wishlists as $wishlist){?>
		<tr>
		<td>
			<?php echo $wishlist->tour->name;?>
		</td>
		<td>
		<?php echo $tour_user->order_date.' '
		.($wishlist->seat->begin_time>'12:00'?(substr($wishlist->seat->begin_time,0,2)-12).substr($wishlist->seat->begin_time,2,3).'pm':$wishlist->seat->begin_time.'am')
	    .' - '.($wishlist->seat->end_time>'12:00'?(substr($wishlist->seat->end_time,0,2)-12).substr($wishlist->seat->end_time,2,3).'pm':$wishlist->seat->end_time.'am');?><br/>

		</td>
		</tr>
		<?php }?>
		</table>
	</div>
	<?php }?>
</div>
	</div>
</div>



</div>
</div>
</div>
<script>
function showDiv(id){
	$("#RI").hide();
	$("#HI").hide();
	$("#TI").hide();
	$("#TOI").hide();
	$("#"+id).show();
}


</script>
