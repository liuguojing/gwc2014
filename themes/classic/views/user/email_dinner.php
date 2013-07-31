<style>
#User_team_dinner_menu label{width:400px;} 
#Guest_team_dinner_menu label{width:400px;} 

</style><div class="container top">
	<div class="row">
		<div class="span12">
			<h1>Additional Information</h1>
			<p></p>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'user-form',
				'enableAjaxValidation'=>false,
				'htmlOptions'=>array('class'=>'form-inline'),
			)); ?>	
			<div class="row">
				<div class="span12">
				  <p class="alert alert-warning">Thank you! Your Team Dinner option is finalized.</p>
				  </div>
				<?php
				foreach(Yii::app()->user->getFlashes() as $key => $message) {
					echo '<div class="span12"><p class="alert alert-' . $key . '">' . $message . "</p></div>\n";
				}
				?>
				<div class="span6" style="display:none">
				<legend><b>Winner Team Dinner</b></legend>
					<div class="control-group">
						<b>On Thursday April 18, 2013 you are invited to a team dinner.</b><br/>
						<b>To help us with the organization of this please indicate your menu choice below:</b><br/>
					</div>
					<div class="control-group <?php if($model->getError('team_dinner_menu')){ echo 'error';}?>">
						<label class="" for="User_team_dinner_menu">
						    Main Course Menu Choice:<span class="required">*</span>
						    <?php if($model->getError('team_dinner_menu')){?><span class="help-inline"><?php echo $model->getError('team_dinner_menu')?></span><?php }?>
						</label><br/>
						    <?php echo $form->radioButtonList($model,'team_dinner_menu',$model->menuList());?>
					</div>
						    		
				</div>
				<div class="span6 <?php if($model->has_guest != 1){ echo 'hide';}?>" id="guest_information" style="display:none">
					<legend><b>Guest Team Dinner</b></legend>
					<div class="control-group">
					<b></b><br/>
					<b></b><br/>
					</div>
					<div class="control-group <?php if($guest->getError('team_dinner_menu')){ echo 'error';}?>" style="min-height:80px;">
						<label class="" for="Guest_team_dinner_menu">
						    Main Course Menu Choice:<span class="required">*</span>
						    <?php if($guest->getError('gala_dinner_menu')){?><span class="help-inline"><?php echo $guest->getError('team_dinner_menu')?></span><?php }?>
						</label><br/>
						    <?php echo $form->radioButtonList($guest,'team_dinner_menu',$model->menuList())?>
					</div>
				</div>
			</div>
			
		</div>
		
			<div class="row">
				<div class="control-group">
					<div class="controls" style=" display:none">
						<label class="checkbox">
						</label>
						<button type="submit"  class="btn btn-large2 btn-warning">Save & Proceed</button>
					</div>
				</div>
			</div>
			<?php $this->endWidget(); ?>
	</div>
</div>