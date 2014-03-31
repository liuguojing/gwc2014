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
<h1>Query Comment</h1>

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
		Query Comment:
		<?php echo $form->textArea($model,'comment',array('style'=>'width:400px;')); ?>
		<?php echo $form->error($model,'comment'); ?>
		<br/>
		<br/>
		Query Status:
		<?php echo $form->dropDownList($model,'status',$model->getTravelCommentStatus()); ?>

		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

</div>