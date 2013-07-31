<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'declien_reason'); ?>
		<?php echo $form->textField($model,'declien_reason',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'office_location'); ?>
		<?php echo $form->textField($model,'office_location',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telephone_number_desk'); ?>
		<?php echo $form->textField($model,'telephone_number_desk',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telephone_number_cell'); ?>
		<?php echo $form->textField($model,'telephone_number_cell',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dietary_requirements'); ?>
		<?php echo $form->textField($model,'dietary_requirements',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passport'); ?>
		<?php echo $form->textField($model,'passport',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'special_requests'); ?>
		<?php echo $form->textField($model,'special_requests',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'has_guest'); ?>
		<?php echo $form->textField($model,'has_guest'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'departure_date'); ?>
		<?php echo $form->textField($model,'departure_date',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'return_date'); ?>
		<?php echo $form->textField($model,'return_date',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_name'); ?>
		<?php echo $form->textField($model,'airport_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'airport_code'); ?>
		<?php echo $form->textField($model,'airport_code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'travel_policy'); ?>
		<?php echo $form->textField($model,'travel_policy',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visa_policy'); ?>
		<?php echo $form->textField($model,'visa_policy',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_arrival_date'); ?>
		<?php echo $form->textField($model,'hotel_arrival_date',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_departure_date'); ?>
		<?php echo $form->textField($model,'hotel_departure_date',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hotel_venue'); ?>
		<?php echo $form->textField($model,'hotel_venue',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gala_dinner'); ?>
		<?php echo $form->textField($model,'gala_dinner',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_activity'); ?>
		<?php echo $form->textField($model,'other_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'daytime_phone'); ?>
		<?php echo $form->textField($model,'daytime_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'evening_phone'); ?>
		<?php echo $form->textField($model,'evening_phone',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_address1'); ?>
		<?php echo $form->textField($model,'work_address1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_address2'); ?>
		<?php echo $form->textField($model,'work_address2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_city'); ?>
		<?php echo $form->textField($model,'work_city',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_state'); ?>
		<?php echo $form->textField($model,'work_state',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_zip_code'); ?>
		<?php echo $form->textField($model,'work_zip_code',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_country'); ?>
		<?php echo $form->textField($model,'work_country',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'managers_name'); ?>
		<?php echo $form->textField($model,'managers_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emergency_contact_name'); ?>
		<?php echo $form->textField($model,'emergency_contact_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emergency_contact_tel_number'); ?>
		<?php echo $form->textField($model,'emergency_contact_tel_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relationship_with_the_emergency_contact'); ?>
		<?php echo $form->textField($model,'relationship_with_the_emergency_contact',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_passport'); ?>
		<?php echo $form->textField($model,'ga_passport',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_dateofbirth'); ?>
		<?php echo $form->textField($model,'ga_dateofbirth',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_firstname'); ?>
		<?php echo $form->textField($model,'ga_firstname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_lastname'); ?>
		<?php echo $form->textField($model,'ga_lastname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_gender'); ?>
		<?php echo $form->textField($model,'ga_gender',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_card_number'); ?>
		<?php echo $form->textField($model,'ga_card_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_card_country'); ?>
		<?php echo $form->textField($model,'ga_card_country',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_card_expiration_date'); ?>
		<?php echo $form->textField($model,'ga_card_expiration_date',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_card_issue_date'); ?>
		<?php echo $form->textField($model,'ga_card_issue_date',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ga_redress_number'); ?>
		<?php echo $form->textField($model,'ga_redress_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'previous_winners'); ?>
		<?php echo $form->textField($model,'previous_winners',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'times'); ?>
		<?php echo $form->textField($model,'times',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'years'); ?>
		<?php echo $form->textField($model,'years',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destination_city'); ?>
		<?php echo $form->textField($model,'destination_city',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferred_seat_request'); ?>
		<?php echo $form->textField($model,'preferred_seat_request',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferred_airline_frequent_flyer_number'); ?>
		<?php echo $form->textField($model,'preferred_airline_frequent_flyer_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other'); ?>
		<?php echo $form->textField($model,'other',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'need_visa'); ?>
		<?php echo $form->textField($model,'need_visa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'visa_letter'); ?>
		<?php echo $form->textField($model,'visa_letter',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'checked'); ?>
		<?php echo $form->textField($model,'checked',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'room_requirements'); ?>
		<?php echo $form->textField($model,'room_requirements',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_card_number'); ?>
		<?php echo $form->textField($model,'credit_card_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_card_expiration_date'); ?>
		<?php echo $form->textField($model,'credit_card_expiration_date',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cardholders_name'); ?>
		<?php echo $form->textField($model,'cardholders_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_card_type'); ?>
		<?php echo $form->textField($model,'credit_card_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_dinner'); ?>
		<?php echo $form->textField($model,'team_dinner',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_dinner_menu'); ?>
		<?php echo $form->textField($model,'team_dinner_menu',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_dinner_dietary'); ?>
		<?php echo $form->textField($model,'team_dinner_dietary',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gala_dinner_menu'); ?>
		<?php echo $form->textField($model,'gala_dinner_menu',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gala_dinner_dietary'); ?>
		<?php echo $form->textField($model,'gala_dinner_dietary',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preferred_name'); ?>
		<?php echo $form->textField($model,'preferred_name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requirements'); ?>
		<?php echo $form->textArea($model,'requirements',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cardholders_address'); ?>
		<?php echo $form->textField($model,'cardholders_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'csv_number'); ?>
		<?php echo $form->textField($model,'csv_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crew_diet_requirements'); ?>
		<?php echo $form->textField($model,'crew_diet_requirements',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crew_other_info'); ?>
		<?php echo $form->textField($model,'crew_other_info',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crew_menu_choice'); ?>
		<?php echo $form->textField($model,'crew_menu_choice',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'crew_unifrom_size'); ?>
		<?php echo $form->textField($model,'crew_unifrom_size',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->