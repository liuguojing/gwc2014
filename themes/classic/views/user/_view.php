<?php
/* @var $this UserController */
/* @var $model User */
?>

<div class="row">
	<div class="span12">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->getStatusText()); ?>
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

	*/ ?>
	</div>
</div>