<style>
.form-horizontal .control-label{width:440px;}
.form-horizontal .controls {margin-left: 460px;}
</style>
<div class="container top">
	<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'user-form',
				'enableAjaxValidation'=>false,
				'htmlOptions'=>array('class'=>'form-inline'),
			)); ?>	
		<div class="row">
			<div class="span12">
				<h1>Travel Information</h1>
				<p class="alert alert-warning">Please note any fields with a <span class="required">*</span> are mandatory</p>
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
		<div class="row" id="content">
			<div class="span12"  id="content">
				<legend><b>Winner Travel</b></legend>
				<p class="alert alert-success"><?php echo $form->checkBoxList($model,'driving',array(1=>'I am driving to Winners Circle'),array('onclick'=>'driving("user")'));?></p>
				<div class="<?php if($model->driving==1){echo 'hide';}?>" id="user_content">
				
				<div class="span12 form-horizontal">
					<p>Please note if you have not yet applied for a passport, enter TBC below in the passport questions.</p>
					<div  class="control-group <?php if($model->getError('ga_passport')){ echo 'error';}?>">
						<label class="control-label" for="User_ga_passport"><?php echo $model->getAttributeLabel('ga_passport')?>:<span class="required">*</span></label>
						<div class="controls">
							<?php echo $form->textField($model,'ga_passport',array('placeholder'=>$model->getAttributeLabel('ga_passport'))); ?>
							<?php if($model->getError('ga_passport')){?><span class="help-inline"><?php echo $model->getError('ga_passport')?></span><?php }?>
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
						<?php echo $form->textField($model,'destination_city',array('readonly'=>'readonly')); ?>
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
			</div>
			<div class="span12 <?php if($model->has_guest != 1){ echo 'hide';}?>" id="guest_information">
				<legend><b>Guest Travel</b></legend>
				<p class="alert alert-success"><?php echo $form->checkBoxList($guest,'driving',array(1=>'I am driving to Winners Circle'),array('onclick'=>'driving("guest")'));?></p>
				<div class="<?php if($guest->driving==1){echo 'hide';}?>" id="guest_content">
					<div class="span12 form-horizontal">
						<div class="control-group <?php if($guest->getError('ga_passport')){ echo 'error';}?>">
							<label class="control-label" for="User_ga_passport"><?php echo $guest->getAttributeLabel('ga_passport')?>:<span class="required">*</span></label>
							<div class="controls">
								<?php echo $form->textField($guest,'ga_passport',array('placeholder'=>$guest->getAttributeLabel('ga_passport'))); ?>
								<?php if($guest->getError('ga_passport')){?><span class="help-inline"><?php echo $guest->getError('ga_passport')?></span><?php }?>
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
							    <input type="checkbox" id="freeDateCheckGuest" onclick="freeDate()" disabled=true>Below are the dates you are required to be at Winners Circle.  Please tick here if you would like to extend your dates.
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
							<?php echo $form->textField($guest,'destination_city',array('readonly'=>'readonly')); ?>
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
			<div class="row">
				
				<div class="control-group">
					<div class="controls" style="float:right;">
						<label class="checkbox">
						</label>
						<button type="submit"  class="btn btn-large2 btn-warning">Save & Proceed</button>
					</div>
				</div>
			</div>
		<?php $this->endWidget(); ?>
	</div>
    <script>
	$(function() {
		
		$( "#User_ga_card_expiration_date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			dateFormat: 'M/dd/yy',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#User_ga_card_expiration_date" ).datepicker("getDate"))!=dateText){
						$( "#User_ga_card_expiration_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#User_ga_card_issue_date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			dateFormat: 'M/dd/yy',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#User_ga_card_issue_date" ).datepicker("getDate"))!=dateText){
						$( "#User_ga_card_issue_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#Guest_ga_card_expiration_date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			dateFormat: 'M/dd/yy',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#Guest_ga_card_expiration_date" ).datepicker("getDate"))!=dateText){
						$( "#Guest_ga_card_expiration_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#Guest_ga_card_issue_date" ).datepicker({
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			dateFormat: 'M/dd/yy',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#Guest_ga_card_issue_date" ).datepicker("getDate"))!=dateText){
						$( "#Guest_ga_card_issue_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#User_departure_date" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'M/dd/yy',
			maxDate: '+12month',
			minDate: '+1day',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#User_departure_date" ).datepicker("getDate"))!=dateText){
						$( "#User_departure_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#User_return_date" ).datepicker({
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'M/dd/yy',
			maxDate: '+12month',
			minDate: '+1day',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#User_return_date" ).datepicker("getDate"))!=dateText){
						$( "#User_return_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#Guest_departure_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 2,
			disabled:false,
			dateFormat: 'M/dd/yy',
			maxDate: '+12month',
			minDate: '+1day',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#Guest_departure_date" ).datepicker("getDate"))!=dateText){
						$( "#Guest_departure_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#Guest_return_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 2,
			disabled:false,
			dateFormat: 'M/dd/yy',
			maxDate: '+12month',
			minDate: '+1day',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#Guest_return_date" ).datepicker("getDate"))!=dateText){
						$( "#Guest_return_date" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
	
		
	});
	function driving(){
		if($("#User_driving_0").is(':checked')){
			$("#user_content").hide();
		}else{
			$("#user_content").show();
		}
		if($("#Guest_driving_0").is(':checked')){
			$("#guest_content").hide();
		}else{
			$("#guest_content").show();
		}
	}
	function freeDate(){
	}
	</script>
