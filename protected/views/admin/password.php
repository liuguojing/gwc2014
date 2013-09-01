<h1>Change Password</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php foreach(Yii::app()->user->getFlashes() as $key => $message) { ?>
		<p class="alert alert-<?php echo $key;?>"><?php echo $message;?></p>
		<?php }?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->