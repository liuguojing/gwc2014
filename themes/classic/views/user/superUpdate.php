<style>
#User_team_dinner_menu label{width:400px;} 
#Guest_team_dinner_menu label{width:400px;} 
.form-horizontal .control-label{width:440px;}
.form-horizontal .controls {margin-left: 460px;}
</style>
<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
if(in_array($model->type,array('Top Achievers','Eagles','Operating Committee'))){
	$minDate = 'Apr/16/2013';
	$maxDate = "Apr/21/2013";
}else{
	$minDate = 'Apr/17/2013';
	$maxDate = "Apr/21/2013";
}
$disabled = array('separator' => '','disabled'=>'disabled', 'template' => '<li class="q6" style="list-style: none outside none;display:block;margin:10px;">{input} {label} </li>', 'labelOptions' => array('style' => 'display:inline;'));
$undisabled = array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;margin:10px;">{input} {label} </li>', 'labelOptions' => array('style' => 'display:inline;'));

?>

<h1>Update User <?php echo $model->id; ?></h1>

<div class="row">
<div class="span12">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="row">
	<div class="span12">
		<div class="btn-group" data-toggle="buttons-radio">
		  <button type="button" class="btn btn-info active" onclick="showDiv('main')">Main</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('information')">Information</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('travel')">Travel</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('hotel')">Hotel</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('tours')">Additional</button>
		  <button type="button" class="btn btn-info" onclick="showDiv('onsite')">Onsite</button>
		  <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success','style'=>'')); ?>
		</div>
		<p class="alert alert-danger" style="margin-top:20px;">If you want change user's type,please save first and then update other infomation.</p>
		<?php foreach(Yii::app()->user->getFlashes() as $key => $message) {
		    echo '<p class="alert alert-' . $key . '"><button type="button" class="close" data-dismiss="alert">×</button>' . $message . "</p>\n";
		}?>
	</div>
</div>
<div class="row" id="main" style="margin-top:0px;">
	<div class="span12">
		<h1>main</h1>
		<div class="control-group">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->dropDownList($model,'status',User::model()->getStatusOptions()); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
		
		<div class="control-group">
		    <label class="control-label" for="User_headset"></label>
		    <div class="controls">
		    	<?php echo $form->CheckBoxList($model,'no_gala_dinner',array('1'=>"Winner No Gala Dinner"),$undisabled);?>
		       	<?php echo $form->CheckBoxList($guest,'no_gala_dinner',array('1'=>"Guest No Gala Dinner"),$undisabled);?>
		    </div>
		  </div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'comment'); ?>
			<?php echo $form->textArea($model,'comment'); ?>
			<?php echo $form->error($model,'comment'); ?>
		</div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'gala_dinner_vip'); ?>
			<?php echo $form->dropDownList($model,'gala_dinner_vip',$model->galaDinnerVipList()); ?>
			<?php echo $form->error($model,'gala_dinner_vip'); ?>
		</div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'table_no'); ?>
			<?php echo $form->textField($model,'table_no',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'table_no'); ?>
		</div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'hotel_confirmation_number'); ?>
			<?php echo $form->textField($model,'hotel_confirmation_number',array('size'=>60,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'hotel_confirmation_number'); ?>
		</div>
		
		
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'type'); ?>
			<?php echo $form->dropDownList($model,'type',$model->typeList()); ?>
			<?php echo $form->error($model,'type'); ?>
		</div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'gender'); ?>
			<?php echo $form->dropDownList($model,'gender',$model->genderList()); ?>
			<?php echo $form->error($model,'gender'); ?>
		</div>
	
		<div class="control-group">
			<?php echo $form->labelEx($model,'declien_reason'); ?>
			<?php echo $form->textField($model,'declien_reason',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'declien_reason'); ?>
		</div>
	</div>
</div>
<div class="row hide" id="information">
	<div class="span12">
		<h1>Information</h1>
				<p class="alert alert-warning">Please note any fields with a <span class="required">*</span> are mandatory</p>
				<div class="control-group <?php if($model->getError('first_name')){ echo 'error';}?>">
					<label class="control-label" for="User_first_name"><?php echo $model->getAttributeLabel('first_name')?>:</label>
					<div class="controls">
						<?php echo $form->textField($model,'first_name',array('placeholder'=>$model->getAttributeLabel('first_name'))); ?>
						<?php if($model->getError('first_name')){?><span class="help-inline"><?php echo $model->getError('first_name')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('last_name')){ echo 'error';}?>">
					<label class="control-label" for="User_last_name"><?php echo $model->getAttributeLabel('last_name')?>:</label>
					<div class="controls">
						<?php echo $form->textField($model,'last_name',array('placeholder'=>$model->getAttributeLabel('last_name'))); ?>
						<?php if($model->getError('last_name')){?><span class="help-inline"><?php echo $model->getError('last_name')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('preferred_name')){ echo 'error';}?>">
					<label class="control-label" for="User_preferred_name">Please state your preferred name.  This will appear on your badge.<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'preferred_name',array('placeholder'=>$model->getAttributeLabel('preferred_name'))); ?>
						<?php if($model->getError('preferred_name')){?><span class="help-inline"><?php echo $model->getError('preferred_name')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('email')){ echo 'error';}?>">
					<label class="control-label" for="User_email"><?php echo $model->getAttributeLabel('email')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'email',array('placeholder'=>$model->getAttributeLabel('email'))); ?>
						<?php if($model->getError('email')){?><span class="help-inline"><?php echo $model->getError('email')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('daytime_phone')){ echo 'error';}?>">
					<label class="control-label" for="User_daytime_phone"><?php echo $model->getAttributeLabel('daytime_phone')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'daytime_phone',array('placeholder'=>$model->getAttributeLabel('daytime_phone'))); ?>
						<?php if($model->getError('daytime_phone')){?><span class="help-inline"><?php echo $model->getError('daytime_phone')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('evening_phone')){ echo 'error';}?>">
					<label class="control-label" for="User_evening_phone"><?php echo $model->getAttributeLabel('evening_phone')?>:</label>
					<div class="controls">
						<?php echo $form->textField($model,'evening_phone',array('placeholder'=>$model->getAttributeLabel('evening_phone'))); ?>
						<?php if($model->getError('evening_phone')){?><span class="help-inline"><?php echo $model->getError('evening_phone')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('telephone_number_cell')){ echo 'error';}?>">
					<label class="control-label" for="User_telephone_number_cell"><?php echo $model->getAttributeLabel('telephone_number_cell')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'telephone_number_cell',array('placeholder'=>$model->getAttributeLabel('telephone_number_cell'))); ?>
						<?php if($model->getError('telephone_number_cell')){?><span class="help-inline"><?php echo $model->getError('telephone_number_cell')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('work_address1')){ echo 'error';}?>">
					<label class="control-label" for="User_work_address1"><?php echo $model->getAttributeLabel('work_address1')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'work_address1',array('placeholder'=>$model->getAttributeLabel('work_address1'))); ?>
						<?php if($model->getError('work_address1')){?><span class="help-inline"><?php echo $model->getError('work_address1')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('work_address2')){ echo 'error';}?>">
					<label class="control-label" for="User_work_address2"><?php echo $model->getAttributeLabel('work_address2')?>:</label>
					<div class="controls">
						<?php echo $form->textField($model,'work_address2',array('placeholder'=>$model->getAttributeLabel('work_address2'))); ?>
						<?php if($model->getError('work_address2')){?><span class="help-inline"><?php echo $model->getError('work_address2')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('work_city')){ echo 'error';}?>">
					<label class="control-label" for="User_work_city"><?php echo $model->getAttributeLabel('work_city')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'work_city',array('placeholder'=>$model->getAttributeLabel('work_city'))); ?>
						<?php if($model->getError('work_city')){?><span class="help-inline"><?php echo $model->getError('work_city')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('work_state')){ echo 'error';}?>">
					<label class="control-label" for="User_work_state"><?php echo $model->getAttributeLabel('work_state')?>:</label>
					<div class="controls">
						<?php echo $form->textField($model,'work_state',array('placeholder'=>$model->getAttributeLabel('work_state'))); ?>
						<?php if($model->getError('work_state')){?><span class="help-inline"><?php echo $model->getError('work_state')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('work_zip_code')){ echo 'error';}?>">
					<label class="control-label" for="User_work_zip_code"><?php echo $model->getAttributeLabel('work_zip_code')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'work_zip_code',array('placeholder'=>$model->getAttributeLabel('work_zip_code'))); ?>
						<?php if($model->getError('work_zip_code')){?><span class="help-inline"><?php echo $model->getError('work_zip_code')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('work_country')){ echo 'error';}?>">
					<label class="control-label" for="User_work_country"><?php echo $model->getAttributeLabel('work_country')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->dropDownList($model,'work_country',$model->countryList()); ?>
						<?php if($model->getError('work_country')){?><span class="help-inline"><?php echo $model->getError('work_country')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('managers_name')){ echo 'error';}?>">
					<label class="control-label" for="User_managers_name"><?php echo $model->getAttributeLabel('managers_name')?>:</label>
					<div class="controls">
						<?php echo $form->textField($model,'managers_name',array('placeholder'=>$model->getAttributeLabel('managers_name'))); ?>
						<?php if($model->getError('managers_name')){?><span class="help-inline"><?php echo $model->getError('managers_name')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('emergency_contact_name')){ echo 'error';}?>">
					<label class="control-label" for="User_emergency_contact_name"><?php echo $model->getAttributeLabel('emergency_contact_name')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'emergency_contact_name',array('placeholder'=>$model->getAttributeLabel('emergency_contact_name'),'onchance'=>'alert(1);')); ?>
						<?php if($model->getError('emergency_contact_name')){?><span class="help-inline"><?php echo $model->getError('emergency_contact_name')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('emergency_contact_tel_number')){ echo 'error';}?>">
					<label class="control-label" for="User_emergency_contact_tel_number"><?php echo $model->getAttributeLabel('emergency_contact_tel_number')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'emergency_contact_tel_number',array('placeholder'=>$model->getAttributeLabel('emergency_contact_tel_number'))); ?>
						<?php if($model->getError('emergency_contact_tel_number')){?><span class="help-inline"><?php echo $model->getError('emergency_contact_tel_number')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('relationship_with_the_emergency_contact')){ echo 'error';}?>">
					<label class="control-label" for="User_relationship_with_the_emergency_contact"><?php echo $model->getAttributeLabel('relationship_with_the_emergency_contact')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->dropDownList($model,'relationship_with_the_emergency_contact',$model->relationshipList(),array('placeholder'=>$model->getAttributeLabel('relationship_with_the_emergency_contact'))); ?>
						<?php if($model->getError('relationship_with_the_emergency_contact')){?><span class="help-inline"><?php echo $model->getError('relationship_with_the_emergency_contact')?></span><?php }?>
					</div>
				</div>
				<?php if($model->type!='Crew'){?>
				<div class="control-group<?php if($model->type=='Gartner Crew'){echo ' hidden';}?>  <?php if($model->getError('team_dinner')){ echo 'error';}?>">
					<?php if($model->type=='Gartner Crew'){?>
					<p style="font-style:italic;">you will be invited to attend the Event Sales team dinner on Thursday April 18, 2013. Later in the registration system you will be asked which main course you would like.</p>
					<?php }?>
					<label class="control-label" for="User_team_dinner">
					    Please indicate the team dinner you would like to attend (this should be the team you were in when you qualified):<span class="required">*</span>
					</label>
					<div class="controls">
					    <?php echo $form->dropDownList($model,'team_dinner',$model->teamDinnerList())?>
					    <?php if($model->getError('team_dinner')){?><span class="help-inline"><?php echo $model->getError('team_dinner')?></span><?php }?>
					</div>
				</div>
				<?php }?>
				<div class="control-group">
					<label class="control-label" for="User_team_dinner_dietary">
					    Do you have any dietary requirements?
					</label>
					<div class="controls">
					    <?php echo $form->dropDownList($model,'team_dinner_dietary',$model->getDietaryOptions(),array('onchange'=>'user_dietary(this.value)'))?>
					</div>
				</div>
				<div class="control-group<?php echo $model->team_dinner_dietary=='Other'?'':' hide';?>" id="user_dietary_comment_div">
					<label class="control-label" for="User_dietary_comment">
					    Other Dietary Comment
					</label>
					<div class="controls">
					    <?php echo $form->textField($model,'dietary_comment')?>
					</div>
				</div>
				<?php if($model->type =='Gartner Crew'){?>
				<div class="control-group">
					<label class="control-label" for="User_crew_unifrom_size">
					    Crew Unifrom Size:
					</label>
					<div class="controls">
					    <?php echo $form->textField($model,'crew_unifrom_size')?>
					</div>
				</div>
				<?php }?>
				<?php if($model->type != 'Crew' && $model->type != 'Gartner Crew'){?>
				<div class="control-group <?php if($model->getError('previous_winners')){ echo 'error';}?>">
					<label class="control-label" for="User_previous_winners"><?php echo $model->getAttributeLabel('previous_winners')?><br/>(this information will be used to obtain your year book photograph)<br/>Please select all that apply</label>
					<div class="controls">
						<?php echo $form->checkBoxList($model,'previous_winners',User::model()->previousList(),array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;margin:10px;">{input} {label} </li>', 'labelOptions' => array('style' => 'display:inline;'))); ?>
						<?php if($model->getError('previous_winners')){?><span class="help-inline"><?php echo $model->getError('previous_winners')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('times')){ echo 'error';}?>">
					<label class="control-label" for="User_times"><?php echo $model->getAttributeLabel('times')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->dropDownList($model,'times',User::model()->numberListPlus(),array('placeholder'=>$model->getAttributeLabel('times'))); ?>
						<?php if($model->getError('times')){?><span class="help-inline"><?php echo $model->getError('times')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('years')){ echo 'error';}?>">
					<label class="control-label" for="User_years"><?php echo $model->getAttributeLabel('years')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->dropDownList($model,'years',User::model()->numberList(),array('placeholder'=>$model->getAttributeLabel('years'))); ?>
						<?php if($model->getError('years')){?><span class="help-inline"><?php echo $model->getError('years')?></span><?php }?>
					</div>
				</div>
				<?php }?>
				<?php if($model->type != 'Crew' && $model->type !='Gartner Crew'){?>
				<div class="control-group">
					<label class="control-label">Are you Bringing a guest?:</label>
					<div class="controls">
					<label class="radio">
					  <input type="radio" name="User[has_guest]" <?php if($model->has_guest==1){echo 'checked';}?> id="optionsRadios1" value="1" onclick="$('#guest_information').removeClass('hidden')">
					  Yes - I will register a guest
					</label>
					<label class="radio">
					  <input type="radio" name="User[has_guest]" <?php if($model->has_guest==0){echo 'checked';}?> id="optionsRadios1" value="0"  onclick="$('#guest_information').addClass('hidden')">
					  No
					</label>
					</div>
				</div>
				<div class="row <?php if($model->has_guest !=1){ echo 'hidden';}?>" id="guest_information">
					<div class="span12">
						<legend><b>Guest Information</b></legend>
						<p><b>Guest Criteria				</b><br/><p>
		
						<p>Winners Circle is a business event to recognise Gartner's Top Performers. We appreciate the commitment your partner / significant other makes to support you to achieve success.  We would like to extend an invitation to them to join you on this trip.				<p>
						<p>If your partner / significant other is a Gartner quota-bearing associate who has also qualified for Winners Circle, we ask you to attend as a couple and not bring additional guests				<p>
						<p>All guests must be 21 years and older				<p>
						
						<div class="control-group <?php if($guest->getError('first_name')){ echo 'error';}?>">
							<label class="control-label" for="User_first_name"><?php echo $guest->getAttributeLabel('first_name')?>:<span class="required">*</span></label>
							<div class="controls">
								<?php echo $form->textField($guest,'first_name',array('placeholder'=>$guest->getAttributeLabel('first_name'))); ?>
								<?php if($guest->getError('first_name')){?><span class="help-inline"><?php echo $guest->getError('first_name')?></span><?php }?>
							</div>
						</div>
						<div class="control-group <?php if($guest->getError('last_name')){ echo 'error';}?>">
							<label class="control-label" for="User_last_name"><?php echo $guest->getAttributeLabel('last_name')?>:<span class="required">*</span></label>
							<div class="controls">
								<?php echo $form->textField($guest,'last_name',array('placeholder'=>$guest->getAttributeLabel('last_name'))); ?>
								<?php if($guest->getError('last_name')){?><span class="help-inline"><?php echo $guest->getError('last_name')?></span><?php }?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="User_team_dinner_dietary">
							    Does your guest have any dietary requirements
							</label>
							<div class="controls">
							    <?php echo $form->dropDownList($guest,'team_dinner_dietary',$model->getDietaryOptions(),array('onchange'=>'guest_dietary(this.value)'))?>
							</div>
						</div>
						<div class="control-group<?php echo $guest->team_dinner_dietary=='Other'?'':' hide';?>" id="guest_dietary_comment_div">
							<label class="control-label" for="Guest_dietary_comment">
							    Other Dietary Comment
							</label>
							<div class="controls">
							    <?php echo $form->textField($guest,'dietary_comment')?>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
	</div>
</div>
<div class="row hide" id="travel">
	<div class="span12">
		<div class="row">
			<div class="span12">
				<h1>Travel Information</h1>
				<p class="alert alert-warning">Please note any fields with a <span class="required">*</span> are mandatory</p>
				<p class="alert alert-success"><?php echo $form->checkBoxList($model,'driving',array(1=>'I am driving to Winners Circle'),array('onclick'=>'driving()'));?></p>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<p>Please ensure that you have read and understood the Winners Circle travel policy that applies.<br/>
<?php echo CHtml::link('Download',Yii::app()->request->baseUrl . '/travel_policy.pdf',array('target'=>'_blank'));?> the Winners Circle 2013 travel policy document.<br/><br/>

To expedite finalizing travel reservations, Winners are encouraged to utilize email when corresponding with our dedicated travel team at American Express Travel.  Should you have a concern and need to discuss your travel arrangements with an agent, a phone number with be provided with your itinerary.<br/>
Once registered, you will receive a suggested air itinerary within 5 working days.</p><br/>
				<div class="control-group <?php if($model->getError('read_policy')){ echo 'error';}?>" style="margin-top:10px;">
						<label class="">
							<?php echo $form->checkBoxList($model,'read_policy',array(1=>'I have read and accept the <a href="'.Yii::app()->request->baseUrl . '/travel_policy.pdf"' . ' target="_blank">Winners Circle travel policy</a>.'))?><span class="required">*</span>
						</label>
						<?php if($model->getError('read_policy')){?><span class="alert alert-error help-inline"><?php echo $model->getError('read_policy')?></span><?php }?>
				</div>
			</div>
		</div>
		<div class="row <?php if($model->driving==1){echo 'hide';}?>" id="content">
			<div class="span12">
				<legend><b>Winner Travel</b></legend>
				<div class="span12 form-horizontal">
					<div  class="control-group <?php if($model->getError('ga_passport')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_passport"><?php echo $model->getAttributeLabel('ga_passport')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_passport',array('placeholder'=>$model->getAttributeLabel('ga_passport'))); ?>
							<?php if($model->getError('ga_passport')){?><span class="help-inline"><?php echo $model->getError('ga_passport')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_dateofbirth')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_dateofbirth"><?php echo $model->getAttributeLabel('ga_dateofbirth')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_dateofbirth',array('placeholder'=>$model->getAttributeLabel('ga_dateofbirth'))); ?>
							<?php if($model->getError('ga_dateofbirth')){?><span class="help-inline"><?php echo $model->getError('ga_dateofbirth')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_firstname')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_firstname"><?php echo $model->getAttributeLabel('ga_firstname')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_firstname',array('placeholder'=>$model->getAttributeLabel('ga_firstname'))); ?>
							<?php if($model->getError('ga_firstname')){?><span class="help-inline"><?php echo $model->getError('ga_firstname')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_lastname')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_lastname"><?php echo $model->getAttributeLabel('ga_lastname')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_lastname',array('placeholder'=>$model->getAttributeLabel('ga_lastname'))); ?>
							<?php if($model->getError('ga_lastname')){?><span class="help-inline"><?php echo $model->getError('ga_lastname')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_gender')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_gender"><?php echo $model->getAttributeLabel('ga_gender')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->dropDownList($model,'ga_gender',User::model()->genderList()); ?>
							<?php if($model->getError('ga_gender')){?><span class="help-inline"><?php echo $model->getError('ga_gender')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_card_number')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_number"><?php echo $model->getAttributeLabel('ga_card_number')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_card_number',array('placeholder'=>$model->getAttributeLabel('ga_card_number'))); ?>
							<?php if($model->getError('ga_card_number')){?><span class="help-inline"><?php echo $model->getError('ga_card_number')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_card_country')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_country"><?php echo $model->getAttributeLabel('ga_card_country')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_card_country',array('placeholder'=>$model->getAttributeLabel('ga_card_country'))); ?>
							<?php if($model->getError('ga_card_country')){?><span class="help-inline"><?php echo $model->getError('ga_card_country')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_card_expiration_date')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_expiration_date"><?php echo $model->getAttributeLabel('ga_card_expiration_date')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_card_expiration_date',array('placeholder'=>$model->getAttributeLabel('ga_card_expiration_date'))); ?>
							<?php if($model->getError('ga_card_expiration_date')){?><span class="help-inline"><?php echo $model->getError('ga_card_expiration_date')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_card_issue_date')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_issue_date"><?php echo $model->getAttributeLabel('ga_card_issue_date')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_card_issue_date',array('placeholder'=>$model->getAttributeLabel('ga_card_issue_date'))); ?>
							<?php if($model->getError('ga_card_issue_date')){?><span class="help-inline"><?php echo $model->getError('ga_card_issue_date')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($model->getError('ga_redress_number')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_redress_number"><?php echo $model->getAttributeLabel('ga_redress_number')?>:</label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_redress_number',array('placeholder'=>$model->getAttributeLabel('ga_redress_number'))); ?>
							<?php if($model->getError('ga_redress_number')){?><span class="help-inline"><?php echo $model->getError('ga_redress_number')?></span><?php }?>
						</div>
					</div>
				</div>
				<div class="span12">
					<div class="control-group">
						<label class="checkbox">
						    <input type="checkbox" id="freeDateCheck" onclick="freeDate()"> Below are the dates you are required to be at Winners Circle.  Please tick here if you would like to extend your dates.
						</label>
					</div>
					<div class="control-group <?php if($model->getError('departure_date')||$model->getError('return_date')){ echo 'error';}?>">
						<label class="input" for="User_departure_date">Departure Date: <span class="required">*</span>
						<?php echo $form->textField($model,'departure_date',array('placeholder'=>$model->getAttributeLabel('departure_date'))); ?></label>
						<label class="input" for="User_return_date">Return Date: <span class="required">*</span>
						<?php echo $form->textField($model,'return_date',array('placeholder'=>$model->getAttributeLabel('return_date'))); ?></label>
						<?php if($model->getError('departure_date')||$model->getError('return_date')){?><span class="help-inline"><?php echo $model->getError('departure_date')?><?php echo $model->getError('return_date')?></span><?php }?>
					</div>
				</div>
				<div class="span12 form-horizontal">
					<div class="span12"><p></div>
					<div class="control-group <?php if($model->getError('airport_name')){ echo 'error';}?>">
						<label class="" for="User_airport_name"><?php echo $model->getAttributeLabel('airport_name')?>:<span class="required">*</span> </label>
						<?php echo $form->textField($model,'airport_name',array('placeholder'=>$model->getAttributeLabel('airport_name'))); ?>
						<?php if($model->getError('airport_name')){?><span class="help-inline"><?php echo $model->getError('airport_name')?></span><?php }?>
					</div>
					<div class="control-group <?php if($model->getError('destination_city')){ echo 'error';}?>">
						<label class="" for="User_destination_city"><?php echo $model->getAttributeLabel('destination_city')?>: <span class="required">*</span></label>
						<?php echo $form->textField($model,'destination_city',array('placeholder'=>$model->getAttributeLabel('destination_city'))); ?>
						<?php if($model->getError('destination_city')){?><span class="help-inline"><?php echo $model->getError('destination_city')?></span><?php }?>
					</div>
					<div class="control-group <?php if($model->getError('preferred_seat_request')){ echo 'error';}?>">
						<label class="" for="User_preferred_seat_request"><?php echo $model->getAttributeLabel('preferred_seat_request')?>:</label>
						<?php echo $form->textField($model,'preferred_seat_request',array('placeholder'=>$model->getAttributeLabel('preferred_seat_request'))); ?>
						<?php if($model->getError('preferred_seat_request')){?><span class="help-inline"><?php echo $model->getError('preferred_seat_request')?></span><?php }?>
					</div>
					<div class="control-group <?php if($model->getError('preferred_airline')){ echo 'error';}?>">
						<label class="" for="User_preferred_airline"><?php echo $model->getAttributeLabel('preferred_airline')?>: </label>
						<?php echo $form->textField($model,'preferred_airline',array('placeholder'=>$model->getAttributeLabel('preferred_airline'))); ?>
						<?php if($model->getError('preferred_airline')){?><span class="help-inline"><?php echo $model->getError('preferred_airline')?></span><?php }?>
					</div>
					<div class="control-group <?php if($model->getError('frequent_flyer_number')){ echo 'error';}?>">
						<label class="" for="User_frequent_flyer_number"><?php echo $model->getAttributeLabel('frequent_flyer_number')?>: </label>
						<?php echo $form->textField($model,'frequent_flyer_number',array('placeholder'=>$model->getAttributeLabel('frequent_flyer_number'))); ?>
						<?php if($model->getError('frequent_flyer_number')){?><span class="help-inline"><?php echo $model->getError('frequent_flyer_number')?></span><?php }?>
					</div>
					<div class="control-group <?php if($model->getError('other')){ echo 'error';}?>">
						<label class="" for="User_other"><?php echo $model->getAttributeLabel('other')?>: </label><br/>
						<?php echo $form->textarea($model,'other',array('placeholder'=>$model->getAttributeLabel('other'))); ?>
						<?php if($model->getError('other')){?><span class="help-inline"><?php echo $model->getError('other')?></span><?php }?>
					</div>
					<div class="control-group <?php if($model->getError('need_visa')){ echo 'error';}?>">
						<label class="" for="User_need_visa"><?php echo Chtml::link($model->getAttributeLabel('need_visa'),array('visa'),array('target'=>'_blank'));?> </label><br/>
					</div>
					<div style="clear:both;"></div>
					<div class="control-group <?php if($model->getError('visa_letter')){ echo 'error';}?>">
						<label class="" for="User_visa_letter"><?php echo $model->getAttributeLabel('visa_letter');?><span class="required">*</span> </label><br/>
						<?php echo $form->radioButtonList($model,'visa_letter',User::model()->yesNoList(),array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;float:left;margin:10px;">{input} {label} </li>&nbsp;&nbsp;', 'labelOptions' => array('style' => 'display:inline;'))); ?>
						<?php if($model->getError('visa_letter')){?><span class="help-inline"><?php echo $model->getError('visa_letter')?></span><?php }?>
					</div>
					<div style="clear:both;"></div>
					<div class="control-group <?php if($model->getError('checked')){ echo 'error';}?>">
						<label class="" for="User_checked"><?php echo $form->checkBoxList($model,'checked',array('Yes'=>'I confirm that I have read and understood the '.CHtml::link('VISA',array('user/visa'),array('target'=>'_blank')).' requirements for Winner Circle. '))?><span class="required">*</span></label><br/>
						<?php if($model->getError('checked')){?><span class="help-inline"><?php echo $model->getError('checked')?></span><?php }?>
					</div>
				</div>
			</div>
			<div class="span12 <?php if($model->has_guest != 1){ echo 'hide';}?>" id="guest_information">
				<legend><b>Guest Travel</b></legend>
				<div class="span12 form-horizontal">
					<div class="control-group <?php if($guest->getError('ga_passport')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_passport"><?php echo $guest->getAttributeLabel('ga_passport')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_passport',array('placeholder'=>$guest->getAttributeLabel('ga_passport'))); ?>
							<?php if($guest->getError('ga_passport')){?><span class="help-inline"><?php echo $guest->getError('ga_passport')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_dateofbirth')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_dateofbirth"><?php echo $guest->getAttributeLabel('ga_dateofbirth')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_dateofbirth',array('placeholder'=>$guest->getAttributeLabel('ga_dateofbirth'))); ?>
							<?php if($guest->getError('ga_dateofbirth')){?><span class="help-inline"><?php echo $guest->getError('ga_dateofbirth')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_firstname')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_firstname"><?php echo $guest->getAttributeLabel('ga_firstname')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_firstname',array('placeholder'=>$guest->getAttributeLabel('ga_firstname'))); ?>
							<?php if($guest->getError('ga_firstname')){?><span class="help-inline"><?php echo $guest->getError('ga_firstname')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_lastname')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_lastname"><?php echo $guest->getAttributeLabel('ga_lastname')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_lastname',array('placeholder'=>$guest->getAttributeLabel('ga_lastname'))); ?>
							<?php if($guest->getError('ga_lastname')){?><span class="help-inline"><?php echo $guest->getError('ga_lastname')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_gender')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_gender"><?php echo $guest->getAttributeLabel('ga_gender')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->dropDownList($guest,'ga_gender',User::model()->genderList()); ?>
							<?php if($guest->getError('ga_gender')){?><span class="help-inline"><?php echo $guest->getError('ga_gender')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_card_number')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_number"><?php echo $guest->getAttributeLabel('ga_card_number')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_card_number',array('placeholder'=>$guest->getAttributeLabel('ga_card_number'))); ?>
							<?php if($guest->getError('ga_card_number')){?><span class="help-inline"><?php echo $guest->getError('ga_card_number')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_card_country')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_country"><?php echo $guest->getAttributeLabel('ga_card_country')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_card_country',array('placeholder'=>$guest->getAttributeLabel('ga_card_country'))); ?>
							<?php if($guest->getError('ga_card_country')){?><span class="help-inline"><?php echo $guest->getError('ga_card_country')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_card_expiration_date')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_expiration_date"><?php echo $guest->getAttributeLabel('ga_card_expiration_date')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_card_expiration_date',array('placeholder'=>$guest->getAttributeLabel('ga_card_expiration_date'))); ?>
							<?php if($guest->getError('ga_card_expiration_date')){?><span class="help-inline"><?php echo $guest->getError('ga_card_expiration_date')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_card_issue_date')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_card_issue_date"><?php echo $guest->getAttributeLabel('ga_card_issue_date')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_card_issue_date',array('placeholder'=>$guest->getAttributeLabel('ga_card_issue_date'))); ?>
							<?php if($guest->getError('ga_card_issue_date')){?><span class="help-inline"><?php echo $guest->getError('ga_card_issue_date')?></span><?php }?>
						</div>
					</div>
					<div class="control-group <?php if($guest->getError('ga_redress_number')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_redress_number"><?php echo $guest->getAttributeLabel('ga_redress_number')?>:</label>
						<div class="controls">
							<?php echo $form->textField($guest,'ga_redress_number',array('placeholder'=>$guest->getAttributeLabel('ga_redress_number'))); ?>
							<?php if($guest->getError('ga_redress_number')){?><span class="help-inline"><?php echo $guest->getError('ga_redress_number')?></span><?php }?>
						</div>
					</div>
				</div>
				<div class="span12">
					<div class="control-group">
						<label class="checkbox">
						    <input type="checkbox" id="freeDateCheckGuest" onclick="freeDate()">Below are the dates you are required to be at Winners Circle.  Please tick here if you would like to extend your dates.
						</label>
					</div>
					<div class="control-group <?php if($guest->getError('departure_date')||$guest->getError('return_date')){ echo 'error';}?>">
						<label class="input" for="Guest_departure_date">Departure Date:<span class="required">*</span> 
						<?php echo $form->textField($guest,'departure_date',array('placeholder'=>$guest->getAttributeLabel('departure_date'))); ?></label>
						<label class="input" for="Guest_return_date">Return Date: <span class="required">*</span>
						<?php echo $form->textField($guest,'return_date',array('placeholder'=>$guest->getAttributeLabel('return_date'))); ?></label>
						<?php if($guest->getError('departure_date')||$guest->getError('return_date')){?><span class="help-inline"><?php echo $guest->getError('departure_date')?><?php echo $guest->getError('return_date')?></span><?php }?>
					</div>
				</div>
				<div class="span12 form-horizontal">
					<div class="span12"><p></div>
					<div class="control-group <?php if($guest->getError('airport_name')){ echo 'error';}?>">
						<label class="" for="User_airport_name"><?php echo $guest->getAttributeLabel('airport_name')?>: <span class="required">*</span></label>
						<?php echo $form->textField($guest,'airport_name',array('placeholder'=>$guest->getAttributeLabel('airport_name'))); ?>
						<?php if($guest->getError('airport_name')){?><span class="help-inline"><?php echo $guest->getError('airport_name')?></span><?php }?>
					</div>
					<div class="control-group <?php if($guest->getError('destination_city')){ echo 'error';}?>">
						<label class="" for="Guest_destination_city"><?php echo $guest->getAttributeLabel('destination_city')?>: <span class="required">*</span></label>
						<?php echo $form->textField($guest,'destination_city',array('placeholder'=>$guest->getAttributeLabel('destination_city'))); ?>
						<?php if($guest->getError('destination_city')){?><span class="help-inline"><?php echo $guest->getError('destination_city')?></span><?php }?>
					</div>
					<div class="control-group <?php if($guest->getError('preferred_seat_request')){ echo 'error';}?>">
						<label class="" for="Guest_preferred_seat_request"><?php echo $guest->getAttributeLabel('preferred_seat_request')?>:</label>
						<?php echo $form->textField($guest,'preferred_seat_request',array('placeholder'=>$guest->getAttributeLabel('preferred_seat_request'))); ?>
						<?php if($guest->getError('preferred_seat_request')){?><span class="help-inline"><?php echo $guest->getError('preferred_seat_request')?></span><?php }?>
					</div>
					<div class="control-group <?php if($guest->getError('preferred_airline')){ echo 'error';}?>">
						<label class="" for="Guest_preferred_airline"><?php echo $guest->getAttributeLabel('preferred_airline')?>: </label>
						<?php echo $form->textField($guest,'preferred_airline',array('placeholder'=>$guest->getAttributeLabel('preferred_airline'))); ?>
						<?php if($guest->getError('preferred_airline')){?><span class="help-inline"><?php echo $guest->getError('preferred_airline')?></span><?php }?>
					</div>
					<div class="control-group <?php if($guest->getError('frequent_flyer_number')){ echo 'error';}?>">
						<label class="" for="Guest_frequent_flyer_number"><?php echo $guest->getAttributeLabel('frequent_flyer_number')?>: </label>
						<?php echo $form->textField($guest,'frequent_flyer_number',array('placeholder'=>$guest->getAttributeLabel('frequent_flyer_number'))); ?>
						<?php if($guest->getError('frequent_flyer_number')){?><span class="help-inline"><?php echo $guest->getError('frequent_flyer_number')?></span><?php }?>
					</div>
					<div class="control-group <?php if($guest->getError('other')){ echo 'error';}?>">
						<label class="" for="Guest_other"><?php echo $guest->getAttributeLabel('other')?>: </label><br/>
						<?php echo $form->textarea($guest,'other',array('placeholder'=>$guest->getAttributeLabel('other'))); ?>
						<?php if($guest->getError('other')){?><span class="help-inline"><?php echo $guest->getError('other')?></span><?php }?>
					</div>
					<div class="control-group <?php if($guest->getError('need_visa')){ echo 'error';}?>">
						<label class="" for="Guest_need_visa"><?php echo Chtml::link($guest->getAttributeLabel('need_visa'),array('visa'));?> </label><br/>
					</div>
					<div style="clear:both;"></div>
					<div class="control-group <?php if($guest->getError('visa_letter')){ echo 'error';}?>">
						<label class="" for="Guest_visa_letter"><?php echo $guest->getAttributeLabel('visa_letter');?> <span class="required">*</span></label><br/>
						<?php echo $form->radioButtonList($guest,'visa_letter',User::model()->yesNoList(),array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;float:left;margin:10px;">{input} {label} </li>&nbsp;&nbsp;', 'labelOptions' => array('style' => 'display:inline;'))); ?>
						<?php if($guest->getError('visa_letter')){?><span class="help-inline"><?php echo $guest->getError('visa_letter')?></span><?php }?>
					</div>
					<div style="clear:both;"></div>
					<div class="control-group <?php if($guest->getError('checked')){ echo 'error';}?>">
						<label class="" for="Guest_checked"><?php echo $form->checkBoxList($guest,'checked',array('Yes'=>'I confirm that I have read and understood the '.CHtml::link('VISA',array('user/visa'),array('target'=>'_blank')).' requirements for Winner Circle. '))?><span class="required">*</span></label><br/>
						<?php if($guest->getError('checked')){?><span class="help-inline"><?php echo $guest->getError('checked')?></span><?php }?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="row hide" id="hotel">
	<div class="span12">
		<h1>Hotel Information</h1>
		<div style="clear:both" class="control-group <?php if($model->getError('room_type')){ echo 'error';}?>">
			<label class="input" for="User_room_type"><?php echo $model->getAttributeLabel('room_type')?>:<span class="required">*</span> 
			<?php echo $form->dropDownList($model,'room_type',array(''=>'') + $model->roomTypeList()); ?></label>
			<?php if($model->getError('room_type')){?><span class="help-inline"><?php echo $model->getError('room_type')?><?php echo $model->getError('room_type')?></span><?php }?>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('hotel_type')){ echo 'error';}?>">
			<label class="input" for="User_hotel_type"><?php echo $model->getAttributeLabel('hotel_type')?>:<span class="required">*</span> 
			<?php echo $form->dropDownList($model,'hotel_type',array(''=>'') + $model->getHotelTypeOptions()); ?></label>
			<?php if($model->getError('hotel_type')){?><span class="help-inline"><?php echo $model->getError('hotel_type')?><?php echo $model->getError('hotel_type')?></span><?php }?>
		</div>
		<div class="control-group">
			<label class="checkbox" style="width:400px;">
			    <input type="checkbox" id="freeDateCheckHotel" onclick="freeDateHotel()" >I would like to extend my hotel date.
			</label>
		</div>
		<div class="control-group <?php if($model->getError('hotel_arrival_date')||$model->getError('hotel_departure_date')){ echo 'error';}?>">
			<label class="input" for="User_hotel_arrival_date"><?php echo $model->getAttributeLabel('hotel_arrival_date')?>: 
			<?php echo $form->textField($model,'hotel_arrival_date',array('placeholder'=>$model->getAttributeLabel('hotel_arrival_date'))); ?></label>
			<label class="input" for="User_hotel_departure_date"><?php echo $model->getAttributeLabel('hotel_departure_date')?>: 
			<?php echo $form->textField($model,'hotel_departure_date',array('placeholder'=>$model->getAttributeLabel('hotel_departure_date'))); ?></label>
			<?php if($model->getError('hotel_arrival_date')||$model->getError('hotel_departure_date')){?><span class="help-inline"><?php echo $model->getError('hotel_departure_date')?></span><?php }?>
		</div>
		<div class="control-group">
			<label class="control-label">
			    Room Occupants:
			</label>
			<label class="controls">
			    <?php echo $model->first_name . ' ' .$model->last_name;?>
			    <?php echo ($model->has_guest == 1 && $guest)?' , '.$guest->first_name . ' ' . $guest->last_name:'';?>
			</label>
		</div>
		<div class="control-group <?php if(empty($user->hotel_venue)){echo ' hide';}?>"" id="U_hotel_venue">
		<p>registration team will request extension on your behalf and this will be subject to availability</p>
			<label class="radio" style="width:400px;">
			  <?php echo $form->radioButtonList($model,'hotel_venue',array('Please request with venue on my behalf'=>'Please request with venue on my behalf','I will be making my own arrangements'=>'I will be making my own arrangements'));?>
			</label>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('requirements')){ echo 'error';}?>">
			<label class="input" for="User_requirements"><?php echo $model->getAttributeLabel('requirements')?>: 
			<?php echo $form->textArea($model,'requirements',array('placeholder'=>$model->getAttributeLabel('requirements'))); ?></label>
			<?php if($model->getError('requirements')){?><span class="help-inline"><?php echo $model->getError('requirements')?></span><?php }?>
		</div>
		<?php if($model->type!="Operating Committee"){?>
		<div>
			<legend>Enter Credit Card to Guarantee your room.</legend>
			<p>Gartner will guarantee and pay for your room for the duration of the event.  Please provide your credit card information below to guarantee your personal room incidentals and any extended stays.  Your Card will not be charged at this time.</p>
			<p>Please provide the following information to use your Credit Card online:</p>
			<div><?php echo CHtml::image(Yii::app()->request->baseUrl . '/img/Credit_Card_Logos.jpg','',array('style'=>'width:533px;height:110px;'));?></div>
		</div>
		
		<div style="clear:both" class="control-group <?php if($model->getError('credit_card_number')){ echo 'error';}?>">
			<label class="input" for="User_credit_card_number"><?php echo $model->getAttributeLabel('credit_card_number')?>:<span class="required">*</span>
			<?php echo $form->textField($model,'credit_card_number',array('placeholder'=>$model->getAttributeLabel('credit_card_number'))); ?></label>
			<?php if($model->getError('credit_card_number')){?><span class="help-inline"><?php echo $model->getError('credit_card_number')?></span><?php }?>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('credit_card_type')){ echo 'error';}?>">
			<label class="input" for="User_credit_card_type"><?php echo $model->getAttributeLabel('credit_card_type')?>:<span class="required">*</span> 
			<?php echo $form->dropDownList($model,'credit_card_type',array(''=>'') + $model->creditCardType()); ?></label>
			<?php if($model->getError('credit_card_type')){?><span class="help-inline"><?php echo $model->getError('credit_card_type')?><?php echo $model->getError('credit_card_type')?></span><?php }?>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('credit_card_expiration_date')){ echo 'error';}?>">
			<label class="input" for="User_credit_card_expiration_date"><?php echo $model->getAttributeLabel('credit_card_expiration_date')?>:<span class="required">*</span> 
			<?php echo $form->textField($model,'credit_card_expiration_date',array('placeholder'=>$model->getAttributeLabel('credit_card_expiration_date'))); ?></label>
			<?php if($model->getError('credit_card_expiration_date')){?><span class="help-inline"><?php echo $model->getError('credit_card_expiration_date')?></span><?php }?>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('cardholders_name')){ echo 'error';}?>">
			<label class="input" for="User_cardholders_name"><?php echo $model->getAttributeLabel('cardholders_name')?>:<span class="required">*</span> 
			<?php echo $form->textField($model,'cardholders_name',$model->roomTypeList()); ?></label>
			<?php if($model->getError('cardholders_name')){?><span class="help-inline"><?php echo $model->getError('cardholders_name')?></span><?php }?>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('cardholders_address')){ echo 'error';}?>">
			<label class="input" for="User_cardholders_address"><?php echo $model->getAttributeLabel('cardholders_address')?>:<span class="required">*</span> 
			<?php echo $form->textField($model,'cardholders_address'); ?></label>
			<?php if($model->getError('cardholders_address')){?><span class="help-inline"><?php echo $model->getError('cardholders_address')?></span><?php }?>
		</div>
		<div style="clear:both" class="control-group <?php if($model->getError('User_csv_number')){ echo 'error';}?>">
			<label class="input" for="User_csv_number"><?php echo $model->getAttributeLabel('csv_number')?>:<span class="required">*</span> 
			<?php echo $form->textField($model,'csv_number'); ?></label>
			<?php if($model->getError('csv_number')){?><span class="help-inline"><?php echo $model->getError('csv_number')?></span><?php }?>
		</div>
		<?php }?>
	</div>
</div>
<div class="row hide" id="tours">
	<div class="span12">
		<h1>Additional Information</h1>
		<div class="row">
				<div class="span6">
				<legend><b>Winner Team Dinner</b></legend>
					<div class="control-group">
						<b>On Thursday April 18, 2013 you are invited to a team dinner.</b><br/>
						<b>To help us with the organization of this please indicate your menu choice below:</b><br/>
						Please <?php echo CHtml::link('click here',array('user/teamdinnermenu'),array('target'=>'_blank'));?> for a sample menu
					</div>
					<div class="control-group <?php if($model->getError('team_dinner_menu')){ echo 'error';}?>">
						<label class="" for="User_team_dinner_menu">
						    Main Course Menu Choice:<span class="required">*</span>
						    <?php if($model->getError('team_dinner_menu')){?><span class="help-inline"><?php echo $model->getError('team_dinner_menu')?></span><?php }?>
						</label><br/>
						    <?php echo $form->radioButtonList($model,'team_dinner_menu',$model->menuList());?>
					</div>
					<legend><b>Winner Gala Dinner</b></legend>
					<div class="control-group" style="min-height:80px;">
						<b>On Saturday April 20, 2013 you are invited to a gala dinner.</b><br/>
						<b>To help us with the organization of this please indicate your menu choice below:</b><br/>
						Please <?php echo CHtml::link('click here',array('user/galadinnermenu'),array('target'=>'_blank'));?> for a sample menu
					</div>
					
					<div class="control-group <?php if($model->getError('gala_dinner_menu')){ echo 'error';}?>" style="min-height:80px;">
						<label class="" for="">
						    Main Course Menu Choice:<span class="required">*</span>
						    <?php if($model->getError('gala_dinner_menu')){?><span class="help-inline"><?php echo $model->getError('gala_dinner_menu')?></span><?php }?>
						</label>
						    		<?php echo $form->radioButtonList($model,'gala_dinner_menu',$model->galaMenuList());?>
						    		
					</div>
						    		
				</div>
				<div class="span6 <?php if($model->has_guest != 1){ echo 'hide';}?>" id="guest_information">
					<legend><b>Guest Team Dinner</b></legend>
					<div class="control-group">
					<b></b><br/>
					<b></b><br/>
						Please <?php echo CHtml::link('click here',array('user/teamdinnermenu'),array('target'=>'_blank'));?> for a sample menu
					</div>
					<div class="control-group <?php if($guest->getError('team_dinner_menu')){ echo 'error';}?>" style="min-height:80px;">
						<label class="" for="Guest_team_dinner_menu">
						    Main Course Menu Choice:<span class="required">*</span>
						    <?php if($guest->getError('gala_dinner_menu')){?><span class="help-inline"><?php echo $guest->getError('team_dinner_menu')?></span><?php }?>
						</label><br/>
						    <?php echo $form->radioButtonList($guest,'team_dinner_menu',$model->menuList())?>
					</div>
					<legend><b>Guest Gala Dinner</b></legend>
					<div class="control-group" style="min-height:80px;">
					Please <?php echo CHtml::link('click here',array('user/galadinnermenu'),array('target'=>'_blank'));?> for a sample menu
					</div>
					<div class="control-group <?php if($guest->getError('gala_dinner_menu')){ echo 'error';}?>">
						<label class="input" for="">
						    Main Course Menu Choice:<span class="required">*</span>
						    <?php if($guest->getError('gala_dinner_menu')){?><span class="help-inline"><?php echo $guest->getError('gala_dinner_menu')?></span><?php }?>
						</label><br/>
						    <?php echo $form->radioButtonList($guest,'gala_dinner_menu',$model->galaMenuList())?>
						    		
					</div>
				</div>
			</div>
	</div>
</div>
<div class="row hide" id="onsite" style="margin-top:0px;">
	<div class="span12">
		<h1>Onsite</h1>
		<div class="control-group">
			<?php echo $form->labelEx($model,'has_checkin'); ?>
			<?php echo $form->dropDownList($model,'has_checkin',array(0=>'No-Show',1=>'Checked-in')); ?>
			<?php echo $form->error($model,'has_checkin'); ?>
		</div>
		<div class="control-group">
			<?php echo $form->labelEx($guest,'has_checkin'); ?>
			<?php echo $form->dropDownList($guest,'has_checkin',array(0=>'No-Show',1=>'Checked-in')); ?>
			<?php echo $form->error($guest,'has_checkin'); ?>
		</div>
		
		<div class="control-group">
			<?php echo $form->labelEx($model,'headset'); ?>
			<?php echo $form->dropDownList($model,'headset',Chtml::listData(Gift::model()->findAll(), 'id', 'name'),array('style'=>'width:400px;','empty'=>'')); ?>
			<?php echo $form->error($model,'headset'); ?>
		</div>
		<?php if($model->has_guest && $guest){?>
		<div class="control-group">
			<?php echo $form->labelEx($guest,'headset'); ?>
			<?php echo $form->dropDownList($guest,'headset',Chtml::listData(Gift::model()->findAll(), 'id', 'name'),array('style'=>'width:400px;','empty'=>'')); ?>
			<?php echo $form->error($guest,'headset'); ?>
		</div>
		<?php }?>
		<div class="control-group">
			<?php echo $form->labelEx($model,'amount'); ?>
			<?php echo $form->textField($model,'amount'); ?>
			<?php echo $form->error($model,'amount'); ?>
		</div>
		
		  <div class="control-group">
		    <label class="control-label" for="User_headset"></label>
		    <div class="controls">
		    	<?php 
		    	$coupon = $model->coupon == array(1)?$disabled:$undisabled;
		    	$travel = $model->travel_ticket == array(1)?$disabled:$undisabled;
		    	$guest_coupon = $model->guest_coupon == array(1)?$disabled:$undisabled;
		    	$guest_travel = $model->guest_travel_ticket == array(1)?$disabled:$undisabled;
		    	?>
		    	<?php echo $form->CheckBoxList($model,'coupon',array('1'=>"Winner Circle Lounge Voucher"),$undisabled);?>
		       	<?php echo $form->CheckBoxList($model,'travel_ticket',array('1'=>"Winner Transport Ticket"),$undisabled);?>
		       	<?php echo $form->CheckBoxList($model,'guest_coupon',array('1'=>"Guest Circle Lounge Voucher"),$undisabled);?>
		       	<?php echo $form->CheckBoxList($model,'guest_travel_ticket',array('1'=>"Guest Transport Ticket"),$undisabled);?>
		    </div>
		  </div>
		  <div class="control-group">
			<?php echo $form->labelEx($model,'has_ipad'); ?>
			<?php echo $form->dropDownList($model,'has_ipad',array(0=>'No',1=>'Yes')); ?>
			<?php echo $form->error($model,'has_ipad'); ?>
		</div>
		  
		
		
	</div>
</div>

<?php $this->endWidget(); ?>
</div>
</div>
<script>
function showDiv(id){
	$("#main").hide();
	$("#information").hide();
	$("#hotel").hide();
	$("#travel").hide();
	$("#tours").hide();
	$("#"+id).show();
}
$(function() {
	$( "#User_ga_dateofbirth" ).datepicker({
		defaultDate: "April/16/1992",
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
		maxDate: 'Apr/16/1992',
	});
	$( "#User_ga_card_expiration_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
	});
	$( "#User_ga_card_issue_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
	});
	$( "#Guest_ga_dateofbirth" ).datepicker({
		defaultDate: "01/01/1992",
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
		maxDate: 'Apr/16/1992',
	});
	$( "#Guest_ga_card_expiration_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
	});
	$( "#Guest_ga_card_issue_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
		numberOfMonths: 1,
		dateFormat: 'M/dd/yy',
	});

	$( "#User_credit_card_expiration_date" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		changeYear: true,
		dateFormat: 'M/dd/yy',
	});

	$( "#User_departure_date" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: 'M/dd/yy',
		maxDate: '<?php echo $minDate?>',
		minDate: '+1day',
		onSelect: function( selectedDate ) {
			$( "#User_return_date" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#User_return_date" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: 'M/dd/yy',
		maxDate: '+6month',
		minDate: '<?php echo $maxDate?>',
		onSelect: function( selectedDate ) {
			$( "#User_departure_date" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	$( "#Guest_departure_date" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		disabled:false,
		dateFormat: 'M/dd/yy',
		maxDate: '<?php echo $minDate?>',
		minDate: '+1day',
		onSelect: function( selectedDate ) {
			$( "#Guest_return_date" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#Guest_return_date" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		disabled:false,
		dateFormat: 'M/dd/yy',
		maxDate: '+6month',
		minDate: '<?php echo $maxDate?>',
		onSelect: function( selectedDate ) {
			$( "#Guest_departure_date" ).datepicker( "option", "maxDate", selectedDate );
		}
	});

	$( "#User_hotel_arrival_date" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: 'M/dd/yy',
		maxDate: '<?php echo $minDate?>',
		minDate: '+1day',
		onSelect: function( selectedDate ) {
			$( "#User_hotel_departure_date" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#User_hotel_departure_date" ).datepicker({
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: 'M/dd/yy',
		maxDate: '+6month',
		minDate: '<?php echo $maxDate?>',
		onSelect: function( selectedDate ) {
			$( "#User_hotel_arrival_date" ).datepicker( "option", "maxDate", selectedDate );
		}
	});

	$( "#Guest_hotel_arrival_date" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: 'M/dd/yy',
		maxDate: '<?php echo $minDate?>',
		minDate: '+1day',
		onSelect: function( selectedDate ) {
			$( "#Guest_hotel_departure_date" ).datepicker( "option", "minDate", selectedDate );
		}
	});
	$( "#Guest_hotel_departure_date" ).datepicker({
		defaultDate: "+1w",
		changeMonth: true,
		numberOfMonths: 2,
		dateFormat: 'M/dd/yy',
		maxDate: '+6month',
		minDate: '<?php echo $maxDate?>',
		onSelect: function( selectedDate ) {
			$( "#Guest_hotel_arrival_date" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
});
function driving(){
	if($("#User_driving_0").is(':checked')){
		$("#content").hide();
	}else{
		$("#content").show();
	}
}
function freeDate(){
	if($("#freeDateCheck").is(':checked')){
		$( "#User_departure_date" ).attr('readonly',false);
		$( "#User_return_date" ).attr('readonly',false);
		$( "#User_departure_date" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'M/dd/yy',
			maxDate: '<?php echo $minDate?>',
			minDate: '+1day',
			onSelect: function( selectedDate ) {
				$( "#User_return_date" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#User_return_date" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'M/dd/yy',
			maxDate: '+6month',
			minDate: '<?php echo $maxDate?>',
			onSelect: function( selectedDate ) {
				$( "#User_departure_date" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		$( "#User_departure_date" ).datepicker('enable');
		$( "#User_return_date" ).datepicker('enable');
	}else{
		$( "#User_departure_date" ).attr('readonly',true);
		$( "#User_return_date" ).attr('readonly',true);
		$( "#User_departure_date" ).datepicker('disable');
		$( "#User_return_date" ).datepicker('disable');
	}
	if($("#freeDateCheckGuest").is(':checked')){
		$( "#Guest_departure_date" ).datepicker( "option", "maxDate", "Apr/21/2014" );
		$( "#Guest_return_date" ).datepicker( "option", "maxDate", "Apr/21/2014" );
		$( "#Guest_departure_date" ).attr('readonly',false);
		$( "#Guest_return_date" ).attr('readonly',false);
		$( "#Guest_departure_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 2,
			disabled:false,
			dateFormat: 'M/dd/yy',
			maxDate: '<?php echo $minDate?>',
			minDate: '+1day',
			onSelect: function( selectedDate ) {
				$( "#Guest_return_date" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		$( "#Guest_return_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 2,
			disabled:false,
			dateFormat: 'M/dd/yy',
			maxDate: '+6month',
			minDate: '<?php echo $maxDate?>',
			onSelect: function( selectedDate ) {
				$( "#Guest_departure_date" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		$( "#Guest_departure_date" ).datepicker('enable');
		$( "#Guest_return_date" ).datepicker('enable');
	}else{
		$( "#Guest_departure_date" ).attr('readonly',true);
		$( "#Guest_return_date" ).attr('readonly',true);
		$( "#Guest_departure_date" ).datepicker('disable');
		$( "#Guest_return_date" ).datepicker('disable');
	}
}
	function freeDateHotel(){
		if($("#freeDateCheckHotel").is(':checked')){
			$( "#User_hotel_arrival_date" ).attr('readonly',false);
			$( "#User_hotel_departure_date" ).attr('readonly',false);
			$( "#User_hotel_arrival_date" ).datepicker({
				changeMonth: true,
				numberOfMonths: 2,
				disabled:true,
				dateFormat: 'M/dd/yy',
				maxDate: '<?php echo $minDate?>',
				minDate: '+1day',
				onSelect: function( selectedDate ) {
					$( "#User_hotel_departure_date" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			$( "#User_hotel_departure_date" ).datepicker({
				changeMonth: true,
				numberOfMonths: 2,
				disabled:true,
				dateFormat: 'M/dd/yy',
				maxDate: '+6month',
				minDate: '<?php echo $maxDate?>',
				onSelect: function( selectedDate ) {
					$( "#User_hotel_arrival_date" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
			$( "#User_hotel_arrival_date" ).datepicker('enable');
			$( "#User_hotel_departure_date" ).datepicker('enable');
			$("#U_hotel_venue").show();
		}else{
			$( "#User_hotel_arrival_date" ).attr('readonly',true);
			$( "#User_hotel_departure_date" ).attr('readonly',true);

			$( "#User_hotel_arrival_date" ).datepicker('disable');
			$( "#User_hotel_departure_date" ).datepicker('disable');
			$("#U_hotel_venue").hide();
		}
		if($("#freeDateCheckGuestHotel").is(':checked')){
			$( "#Guest_hotel_arrival_date" ).attr('readonly',false);
			$( "#Guest_hotel_departure_date" ).attr('readonly',false);
			$( "#Guest_hotel_arrival_date" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 2,
				dateFormat: 'M/dd/yy',
				maxDate: '<?php echo $minDate?>',
				minDate: '+1day',
				onSelect: function( selectedDate ) {
					$( "#Guest_hotel_departure_date" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			$( "#Guest_hotel_departure_date" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 2,
				dateFormat: 'M/dd/yy',
				maxDate: '+6month',
				minDate: '<?php echo $maxDate?>',
				onSelect: function( selectedDate ) {
					$( "#Guest_hotel_arrival_date" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
			$( "#Guest_hotel_arrival_date" ).datepicker('disable');
			$( "#Guest_hotel_departure_date" ).datepicker('disable');
			
		}else{
			$( "#Guest_hotel_arrival_date" ).attr('readonly',true);
			$( "#Guest_hotel_departure_date" ).attr('readonly',true);

			$( "#Guest_hotel_arrival_date" ).datepicker('disable');
			$( "#Guest_hotel_departure_date" ).datepicker('disable');
		}
	}
	<?php if($model->type!="Operating Committee"){?>
	function checkCsv(){
		if($("#User_credit_card_type").val()=="American Express"){
			if(!/^[0-9]{4}$/.test($("#User_csv_number").val())){
		        alert("Csv Number must be 4 digits");
		        //$("#User_csv_number").val('')
		        $("#User_csv_number").focus();
		        return false;
		    }
		}else{
			if(!/^[0-9]{3}$/.test($("#User_csv_number").val())){
		        alert("Csv Number must be 3 digits");
		        //$("#User_csv_number").val('')
		        $("#User_csv_number").focus();
		        return false;
		    }
		}
	}
	<?php }else{?>
	function checkCsv(){
		return true;
	}
	<?php }?>
	

</script>