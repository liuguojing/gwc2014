<div class="container top">
	<h1>Guest Gift</h1>
	<div class="row">
		<?php
			foreach(Yii::app()->user->getFlashes() as $key => $message) {
				echo '<div class="span12"><p class="alert alert-' . $key . '">' . $message . "</p></div>\n";
			}
		?>
		</div>
		<div class="span12 form-horizontal" >
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('class'=>'form-inline'),
		)); ?>
		  <div class="control-group">
		    <label class="control-label" for="inputEmail">First Name</label>
		    <div class="controls">
		      <input type="text" id="inputEmail" placeholder="Email" readonly=readonly value="<?php echo $model->first_name;?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="inputEmail">Last Name</label>
		    <div class="controls">
		      <input type="text" id="inputEmail" placeholder="Email" readonly=readonly value="<?php echo $model->last_name;?>">
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="User_headset"></label>
		    <div class="controls">
		       <?php echo $form->dropDownList($model,'headset',User::model()->getHeadsetList($model->user->type));?>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for=""></label>
		    <div class="controls">
			  <?php echo $form->hiddenField($model,'id');?>
			  <button type="submit"  class="btn  btn-warning">Save</button>
		    </div>
		  </div>
		</div>
		<?php $this->endWidget(); ?>
</div>
<script>
	$('#User_id').focus();
</script>