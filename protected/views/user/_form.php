<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'declien_reason'); ?>
		<?php echo $form->textField($model,'declien_reason',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'declien_reason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'office_location'); ?>
		<?php echo $form->textField($model,'office_location',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'office_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department'); ?>
		<?php echo $form->textField($model,'department',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'department'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_number_desk'); ?>
		<?php echo $form->textField($model,'telephone_number_desk',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telephone_number_desk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_number_cell'); ?>
		<?php echo $form->textField($model,'telephone_number_cell',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telephone_number_cell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dietary_requirements'); ?>
		<?php echo $form->textField($model,'dietary_requirements',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dietary_requirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passport'); ?>
		<?php echo $form->textField($model,'passport',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'passport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'special_requests'); ?>
		<?php echo $form->textField($model,'special_requests',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'special_requests'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nationality'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'has_guest'); ?>
		<?php echo $form->textField($model,'has_guest'); ?>
		<?php echo $form->error($model,'has_guest'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departure_date'); ?>
		<?php echo $form->textField($model,'departure_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'departure_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'return_date'); ?>
		<?php echo $form->textField($model,'return_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'return_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_name'); ?>
		<?php echo $form->textField($model,'airport_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'airport_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'airport_code'); ?>
		<?php echo $form->textField($model,'airport_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'airport_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'travel_policy'); ?>
		<?php echo $form->textField($model,'travel_policy',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'travel_policy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_policy'); ?>
		<?php echo $form->textField($model,'visa_policy',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'visa_policy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_arrival_date'); ?>
		<?php echo $form->textField($model,'hotel_arrival_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hotel_arrival_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_departure_date'); ?>
		<?php echo $form->textField($model,'hotel_departure_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'hotel_departure_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_venue'); ?>
		<?php echo $form->textField($model,'hotel_venue',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'hotel_venue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gala_dinner'); ?>
		<?php echo $form->textField($model,'gala_dinner',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'gala_dinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_activity'); ?>
		<?php echo $form->textField($model,'other_activity'); ?>
		<?php echo $form->error($model,'other_activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
		<?php echo $form->error($model,'created_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by'); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'daytime_phone'); ?>
		<?php echo $form->textField($model,'daytime_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'daytime_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'evening_phone'); ?>
		<?php echo $form->textField($model,'evening_phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'evening_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_address1'); ?>
		<?php echo $form->textField($model,'work_address1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_address2'); ?>
		<?php echo $form->textField($model,'work_address2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_city'); ?>
		<?php echo $form->textField($model,'work_city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_state'); ?>
		<?php echo $form->textField($model,'work_state',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_zip_code'); ?>
		<?php echo $form->textField($model,'work_zip_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'work_country'); ?>
		<?php echo $form->textField($model,'work_country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'work_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'managers_name'); ?>
		<?php echo $form->textField($model,'managers_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'managers_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_contact_name'); ?>
		<?php echo $form->textField($model,'emergency_contact_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'emergency_contact_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emergency_contact_tel_number'); ?>
		<?php echo $form->textField($model,'emergency_contact_tel_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'emergency_contact_tel_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relationship_with_the_emergency_contact'); ?>
		<?php echo $form->textField($model,'relationship_with_the_emergency_contact',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'relationship_with_the_emergency_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_passport'); ?>
		<?php echo $form->textField($model,'ga_passport',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_passport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_dateofbirth'); ?>
		<?php echo $form->textField($model,'ga_dateofbirth',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_dateofbirth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_firstname'); ?>
		<?php echo $form->textField($model,'ga_firstname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_lastname'); ?>
		<?php echo $form->textField($model,'ga_lastname',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_gender'); ?>
		<?php echo $form->textField($model,'ga_gender',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_card_number'); ?>
		<?php echo $form->textField($model,'ga_card_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_card_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_card_country'); ?>
		<?php echo $form->textField($model,'ga_card_country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_card_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_card_expiration_date'); ?>
		<?php echo $form->textField($model,'ga_card_expiration_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_card_expiration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_card_issue_date'); ?>
		<?php echo $form->textField($model,'ga_card_issue_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_card_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ga_redress_number'); ?>
		<?php echo $form->textField($model,'ga_redress_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ga_redress_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'previous_winners'); ?>
		<?php echo $form->textField($model,'previous_winners',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'previous_winners'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'times'); ?>
		<?php echo $form->textField($model,'times',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'times'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'years'); ?>
		<?php echo $form->textField($model,'years',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'years'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destination_city'); ?>
		<?php echo $form->textField($model,'destination_city',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'destination_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferred_seat_request'); ?>
		<?php echo $form->textField($model,'preferred_seat_request',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'preferred_seat_request'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferred_airline_frequent_flyer_number'); ?>
		<?php echo $form->textField($model,'preferred_airline_frequent_flyer_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'preferred_airline_frequent_flyer_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other'); ?>
		<?php echo $form->textField($model,'other',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'other'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'need_visa'); ?>
		<?php echo $form->textField($model,'need_visa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'need_visa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visa_letter'); ?>
		<?php echo $form->textField($model,'visa_letter',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'visa_letter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checked'); ?>
		<?php echo $form->textField($model,'checked',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'checked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_requirements'); ?>
		<?php echo $form->textField($model,'room_requirements',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'room_requirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_card_number'); ?>
		<?php echo $form->textField($model,'credit_card_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'credit_card_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_card_expiration_date'); ?>
		<?php echo $form->textField($model,'credit_card_expiration_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'credit_card_expiration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cardholders_name'); ?>
		<?php echo $form->textField($model,'cardholders_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cardholders_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'credit_card_type'); ?>
		<?php echo $form->textField($model,'credit_card_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'credit_card_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_dinner'); ?>
		<?php echo $form->textField($model,'team_dinner',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'team_dinner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_dinner_menu'); ?>
		<?php echo $form->textField($model,'team_dinner_menu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'team_dinner_menu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_dinner_dietary'); ?>
		<?php echo $form->textField($model,'team_dinner_dietary',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'team_dinner_dietary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gala_dinner_menu'); ?>
		<?php echo $form->textField($model,'gala_dinner_menu',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'gala_dinner_menu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gala_dinner_dietary'); ?>
		<?php echo $form->textField($model,'gala_dinner_dietary',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'gala_dinner_dietary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferred_name'); ?>
		<?php echo $form->textField($model,'preferred_name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'preferred_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requirements'); ?>
		<?php echo $form->textArea($model,'requirements',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'requirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cardholders_address'); ?>
		<?php echo $form->textField($model,'cardholders_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'cardholders_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csv_number'); ?>
		<?php echo $form->textField($model,'csv_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'csv_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'crew_diet_requirements'); ?>
		<?php echo $form->textField($model,'crew_diet_requirements',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'crew_diet_requirements'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'crew_other_info'); ?>
		<?php echo $form->textField($model,'crew_other_info',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'crew_other_info'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'crew_menu_choice'); ?>
		<?php echo $form->textField($model,'crew_menu_choice',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'crew_menu_choice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'crew_unifrom_size'); ?>
		<?php echo $form->textField($model,'crew_unifrom_size',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'crew_unifrom_size'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->