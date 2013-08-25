<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Travel Comment';
$this->breadcrumbs=array(
	'Travel Comment',
);
?>
<div class="row">
<div class="form span10 offset1">
<h1>Travel Comment</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>

</p>


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="">
		Travel Comment:
		<?php echo $form->textArea($model,'other',array('style'=>'width:400px;')); ?>
		<?php echo $form->error($model,'other'); ?>

		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

</div>