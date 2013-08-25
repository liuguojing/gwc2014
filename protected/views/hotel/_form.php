<?php
/* @var $this HotelController */
/* @var $model Hotel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotel-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_rate'); ?>
		<?php echo $form->textField($model,'room_rate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'room_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attriton_rate'); ?>
		<?php echo $form->textField($model,'attriton_rate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'attriton_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sell_rate'); ?>
		<?php echo $form->textField($model,'sell_rate',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sell_rate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->