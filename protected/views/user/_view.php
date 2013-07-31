<?php
/* @var $this UserController */
/* @var $model User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('declien_reason')); ?>:</b>
	<?php echo CHtml::encode($data->declien_reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('office_location')); ?>:</b>
	<?php echo CHtml::encode($data->office_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department')); ?>:</b>
	<?php echo CHtml::encode($data->department); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_number_desk')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_number_desk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone_number_cell')); ?>:</b>
	<?php echo CHtml::encode($data->telephone_number_cell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dietary_requirements')); ?>:</b>
	<?php echo CHtml::encode($data->dietary_requirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport')); ?>:</b>
	<?php echo CHtml::encode($data->passport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('special_requests')); ?>:</b>
	<?php echo CHtml::encode($data->special_requests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($data->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('has_guest')); ?>:</b>
	<?php echo CHtml::encode($data->has_guest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departure_date')); ?>:</b>
	<?php echo CHtml::encode($data->departure_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('return_date')); ?>:</b>
	<?php echo CHtml::encode($data->return_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('airport_name')); ?>:</b>
	<?php echo CHtml::encode($data->airport_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('airport_code')); ?>:</b>
	<?php echo CHtml::encode($data->airport_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('travel_policy')); ?>:</b>
	<?php echo CHtml::encode($data->travel_policy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_policy')); ?>:</b>
	<?php echo CHtml::encode($data->visa_policy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_arrival_date')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_arrival_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_departure_date')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_departure_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hotel_venue')); ?>:</b>
	<?php echo CHtml::encode($data->hotel_venue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gala_dinner')); ?>:</b>
	<?php echo CHtml::encode($data->gala_dinner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_activity')); ?>:</b>
	<?php echo CHtml::encode($data->other_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('daytime_phone')); ?>:</b>
	<?php echo CHtml::encode($data->daytime_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evening_phone')); ?>:</b>
	<?php echo CHtml::encode($data->evening_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_address1')); ?>:</b>
	<?php echo CHtml::encode($data->work_address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_address2')); ?>:</b>
	<?php echo CHtml::encode($data->work_address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_city')); ?>:</b>
	<?php echo CHtml::encode($data->work_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_state')); ?>:</b>
	<?php echo CHtml::encode($data->work_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->work_zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_country')); ?>:</b>
	<?php echo CHtml::encode($data->work_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('managers_name')); ?>:</b>
	<?php echo CHtml::encode($data->managers_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_contact_name')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_contact_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emergency_contact_tel_number')); ?>:</b>
	<?php echo CHtml::encode($data->emergency_contact_tel_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relationship_with_the_emergency_contact')); ?>:</b>
	<?php echo CHtml::encode($data->relationship_with_the_emergency_contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_passport')); ?>:</b>
	<?php echo CHtml::encode($data->ga_passport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_dateofbirth')); ?>:</b>
	<?php echo CHtml::encode($data->ga_dateofbirth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_firstname')); ?>:</b>
	<?php echo CHtml::encode($data->ga_firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_lastname')); ?>:</b>
	<?php echo CHtml::encode($data->ga_lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_gender')); ?>:</b>
	<?php echo CHtml::encode($data->ga_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_card_number')); ?>:</b>
	<?php echo CHtml::encode($data->ga_card_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_card_country')); ?>:</b>
	<?php echo CHtml::encode($data->ga_card_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_card_expiration_date')); ?>:</b>
	<?php echo CHtml::encode($data->ga_card_expiration_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_card_issue_date')); ?>:</b>
	<?php echo CHtml::encode($data->ga_card_issue_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ga_redress_number')); ?>:</b>
	<?php echo CHtml::encode($data->ga_redress_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previous_winners')); ?>:</b>
	<?php echo CHtml::encode($data->previous_winners); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('times')); ?>:</b>
	<?php echo CHtml::encode($data->times); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('years')); ?>:</b>
	<?php echo CHtml::encode($data->years); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_city')); ?>:</b>
	<?php echo CHtml::encode($data->destination_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferred_seat_request')); ?>:</b>
	<?php echo CHtml::encode($data->preferred_seat_request); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferred_airline_frequent_flyer_number')); ?>:</b>
	<?php echo CHtml::encode($data->preferred_airline_frequent_flyer_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other')); ?>:</b>
	<?php echo CHtml::encode($data->other); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('need_visa')); ?>:</b>
	<?php echo CHtml::encode($data->need_visa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visa_letter')); ?>:</b>
	<?php echo CHtml::encode($data->visa_letter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checked')); ?>:</b>
	<?php echo CHtml::encode($data->checked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_type')); ?>:</b>
	<?php echo CHtml::encode($data->room_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('room_requirements')); ?>:</b>
	<?php echo CHtml::encode($data->room_requirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_card_number')); ?>:</b>
	<?php echo CHtml::encode($data->credit_card_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_card_expiration_date')); ?>:</b>
	<?php echo CHtml::encode($data->credit_card_expiration_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cardholders_name')); ?>:</b>
	<?php echo CHtml::encode($data->cardholders_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_card_type')); ?>:</b>
	<?php echo CHtml::encode($data->credit_card_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_dinner')); ?>:</b>
	<?php echo CHtml::encode($data->team_dinner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_dinner_menu')); ?>:</b>
	<?php echo CHtml::encode($data->team_dinner_menu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_dinner_dietary')); ?>:</b>
	<?php echo CHtml::encode($data->team_dinner_dietary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gala_dinner_menu')); ?>:</b>
	<?php echo CHtml::encode($data->gala_dinner_menu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gala_dinner_dietary')); ?>:</b>
	<?php echo CHtml::encode($data->gala_dinner_dietary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferred_name')); ?>:</b>
	<?php echo CHtml::encode($data->preferred_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requirements')); ?>:</b>
	<?php echo CHtml::encode($data->requirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cardholders_address')); ?>:</b>
	<?php echo CHtml::encode($data->cardholders_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('csv_number')); ?>:</b>
	<?php echo CHtml::encode($data->csv_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_diet_requirements')); ?>:</b>
	<?php echo CHtml::encode($data->crew_diet_requirements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_other_info')); ?>:</b>
	<?php echo CHtml::encode($data->crew_other_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_menu_choice')); ?>:</b>
	<?php echo CHtml::encode($data->crew_menu_choice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('crew_unifrom_size')); ?>:</b>
	<?php echo CHtml::encode($data->crew_unifrom_size); ?>
	<br />

	*/ ?>

</div>