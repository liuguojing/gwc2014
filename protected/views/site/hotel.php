<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Hotel';
$this->breadcrumbs=array(
	'Hotel',
);
?>
<div class="row">
<div class="form span10 offset1">
<h1>Hotel</h1>

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
		Email:
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

</div>