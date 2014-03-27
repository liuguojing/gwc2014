<?php
/* @var $this SiteController */

$this->pageTitle="Onsite Query Form";
?>
<div class="container top">
<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'query-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('class'=>'form-horizontal'),
		)); ?>
<div class="row">
	<?php
		foreach(Yii::app()->user->getFlashes() as $key => $message) {
			echo '<div class="span12"><p class="alert alert-' . $key . '">' . $message . "</p></div>\n";
		}
	?>
	<div class="span12">
		<p class="alert alert-info">PERSONAL DETAILS</p>
		<div class="control-group <?php if($model->getError('full_name')){ echo 'error';}?>">
			<label class="control-label" for="User_full_name"><?php echo $model->getAttributeLabel('full_name')?>:<span class="required">*</span></label>
			<div class="controls">
				<?php echo $form->textField($model,'full_name',array('placeholder'=>$model->getAttributeLabel('full_name'))); ?>
				<?php if($model->getError('full_name')){?><span class="help-inline"><?php echo $model->getError('full_name')?></span><?php }?>
			</div>
		</div>
		<div class="control-group <?php if($model->getError('contact_telephone')){ echo 'error';}?>">
			<label class="control-label" for="User_contact_telephone"><?php echo $model->getAttributeLabel('contact_telephone')?>:</label>
			<div class="controls">
				<?php echo $form->textField($model,'contact_telephone',array('placeholder'=>$model->getAttributeLabel('contact_telephone'))); ?>
				<?php if($model->getError('contact_telephone')){?><span class="help-inline"><?php echo $model->getError('contact_telephone')?></span><?php }?>
			</div>
		</div>
		<div class="control-group <?php if($model->getError('contact_email')){ echo 'error';}?>">
			<label class="control-label" for="User_contact_email"><?php echo $model->getAttributeLabel('contact_email')?>:</label>
			<div class="controls">
				<?php echo $form->textField($model,'contact_email',array('placeholder'=>$model->getAttributeLabel('contact_email'))); ?>
				<?php if($model->getError('contact_email')){?><span class="help-inline"><?php echo $model->getError('contact_email')?></span><?php }?>
			</div>
		</div>
		<div class="control-group <?php if($model->getError('hotel')){ echo 'error';}?>">
			<label class="control-label" for="User_hotel"><?php echo $model->getAttributeLabel('hotel')?>:</label>
			<div class="controls">
				<?php echo $form->textField($model,'hotel',array('placeholder'=>$model->getAttributeLabel('hotel'))); ?>
				<?php if($model->getError('hotel')){?><span class="help-inline"><?php echo $model->getError('hotel')?></span><?php }?>
			</div>
		</div>
		<p class="alert alert-info">NATURE OF QUERY (please tick)<span class="required">*</span></p>
		<div class="control-group <?php if($model->getError('nature')){ echo 'error';}?>">
				<?php if($model->getError('nature')){?><div class="span12"><span class="help-inline"><?php echo $model->getError('nature')?></span></div><?php }?>
				<?php $undisabled = array('separator' => '', 'template' => '<li style="list-style: none outside none;display:block;margin:10px;float:left;">{input} {label} </li>', 'labelOptions' => array('style' => 'display:inline;'));
				      echo $form->CheckBoxList($model,'nature',$model->natureOptions(),$undisabled); ?>
				
		</div>
		<div class="control-group <?php if($model->getError('details')){ echo 'error';}?>">
			<label class="control-label" for="User_details"><?php echo $model->getAttributeLabel('details')?>:<span class="required">*</span></label>
			<div class="controls">
				<?php echo $form->textArea($model,'details',array('placeholder'=>$model->getAttributeLabel('details'),'style'=>'width:400px;height:80px;')); ?>
				<?php if($model->getError('details')){?><span class="help-inline"><?php echo $model->getError('details')?></span><?php }?>
			</div>
		</div>
		<div class="control-group <?php if($model->getError('outcome')){ echo 'error';}?>">
			<label class="control-label" for="User_outcome"><?php echo $model->getAttributeLabel('outcome')?>:</label>
			<div class="controls">
				<?php echo $form->textArea($model,'outcome',array('placeholder'=>$model->getAttributeLabel('outcome'),'style'=>'width:400px;height:80px;')); ?>
				<?php if($model->getError('outcome')){?><span class="help-inline"><?php echo $model->getError('outcome')?></span><?php }?>
			</div>
		</div>
		<div class="control-group <?php if($model->getError('staff_name')){ echo 'error';}?>">
			<label class="control-label" for="User_staff_name"><?php echo $model->getAttributeLabel('staff_name')?>:<span class="required">*</span></label>
			<div class="controls">
				<?php echo $form->textField($model,'staff_name',array('placeholder'=>$model->getAttributeLabel('staff_name'))); ?>
				<?php if($model->getError('staff_name')){?><span class="help-inline"><?php echo $model->getError('staff_name')?></span><?php }?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit"  class="btn btn-large btn-warning">Save</button>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
</div>