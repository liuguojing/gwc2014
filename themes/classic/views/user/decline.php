<div class="jumbotron subhead" style="min-height:440px;min-width:400px;background-color:red;background:url(<?php echo Yii::app()->request->baseUrl;?>/img/bg2.jpg) no-repeat bottom;">
	<div class="container top" >
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
		<div class="row" style="color:#fff">
			<div class="span6 offset6" id="bgbox" style="min-height:300px;">
				<div class="row-fluid">
					<div class="span12" style="margin:10px">
						<p style="color:#fff;font-size:20px;line-height:24px;">
						<br/>
						Dear <?php echo $user->first_name;?>
						<br/><br/>
						<p>We are sorry you are unable to join us at the Winners Circle 2013 Event in Sydney.  Please indicate your reason for declining below.</p>
						<p>Winners Circle Event Team</p>
						<div class="control-group <?php if($user->getError('declien_reason')){ echo 'error';}?>">
						
						<label for="User_declien_reason">Reason for decline:<span class="required">*</span></label>
						<?php if($user->getError('declien_reason')){?><span class="help-inline"><?php echo $user->getError('declien_reason')?></span><br/><?php }?>
						
						<?php echo $form->textArea($user,'declien_reason');?><br/>
						<?php echo CHtml::submitButton('Confirm',array('class'=>'btn btn-success btn-large2')); ?>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="span6 offset4">
			<br/><br/><br/><br/>
			
			</div>
		</div>
<?php $this->endWidget();?>		
	</div>
	</div>
	
	</div>