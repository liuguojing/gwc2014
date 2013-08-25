<?php
/* @var $this RoomController */
/* @var $model Room */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_id'); ?>
		<?php echo $form->dropDownList($model,'hotel_id',CHtml::listData(Hotel::model()->findAll(),'id','name'),array('empty'=>'Select One')); ?>
		<?php echo $form->error($model,'hotel_id'); ?>
	</div>

		
	<div class="row">
		<?php echo $form->labelEx($model,'is_master'); ?>
		<?php echo $form->dropDownList($model,'is_master',array('no','yes')); ?>
		<?php echo $form->error($model,'is_master'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number'); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$(function() {
	
	$( "#Room_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
		onClose: function(dateText, inst) {
			try{
				if($.datepicker.formatDate('M/dd/yy',$( "#Room_date" ).datepicker("getDate"))!=dateText){
					$( "#Room_date" ).val("");
					alert("Please choose date from calendar.");
				}
			}catch(e){
				alert("Please choose date from calendar.");
			}
		}
	});
});
</script>