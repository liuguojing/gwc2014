<style>
.form-horizontal .control-label{width:440px;}
.form-horizontal .controls {margin-left: 460px;}
</style>
<?php 
	if($model->type == 'Gartner Crew'){
		$title = 'Gartner Crew Information';
		$model->team_dinner = 'Event Sales';
	}elseif($model->type =="Crew"){
		$title = 'Crew Information';		
	}elseif($model->type =='Operating Committee'){
		$title = 'Operating Committee Information';
		if(empty($model->team_dinner)){
			$model->team_dinner = 'Operating Committee';
		}
	}else{
		$title = 'Winner Information';
	}
	?>
<div class="container top">
		<div class="row">
			<div class="span12">
				<h1><?php echo $title;?></h1>
				<p></p>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'user-form',
					'enableAjaxValidation'=>false,
					'htmlOptions'=>array('class'=>'form-horizontal'),
				)); ?>
				<legend><b><?php echo $title;?></b></legend>
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
					<label class="control-label" for="User_preferred_name">Please state your preferred first name.  This will appear on your badge:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'preferred_name',array('placeholder'=>$model->getAttributeLabel('preferred_name'))); ?>
						<?php if($model->getError('preferred_name')){?><span class="help-inline"><?php echo $model->getError('preferred_name')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('ga_dateofbirth')){ echo 'error';}?>">
					<label class="control-label" for="User_ga_dateofbirth"><?php echo $model->getAttributeLabel('ga_dateofbirth')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'ga_dateofbirth',array('placeholder'=>'Gartner Winner Date of Birth')); ?>
						<?php if($model->getError('ga_dateofbirth')){?><span class="help-inline"><?php echo $model->getError('ga_dateofbirth')?></span><?php }?>
					</div>
				</div>
				<div class="control-group <?php if($model->getError('email')){ echo 'error';}?>">
					<label class="control-label" for="User_email"><?php echo $model->getAttributeLabel('email')?>:<span class="required">*</span></label>
					<div class="controls">
						<?php echo $form->textField($model,'email',array('placeholder'=>$model->getAttributeLabel('email'),'readonly'=>'readonly')); ?>
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
					    <?php $options = $model->type=='Gartner Crew'?array('readonly'=>'true'):array();
					    echo $form->dropDownList($model,'team_dinner',$model->teamDinnerList(),$options)?>
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
				
				
				
				<div class="control-group <?php if($model->getError('crew_unifrom_size')){ echo 'error';}?>" <?php if($model->type!='Gartner Crew'&&$model->type!='Crew'){echo ' hidden';}?> ">
					<label class="control-label" for="User_crew_unifrom_size">
					    Please advise your shirt size for your uniform:<span class="required">*</span>
					    
					</label>
					<div class="controls">
			            <?php echo $form->radioButtonList($model,'crew_menu_choice',$model->getSexOptions(),array('onchange'=>'user_sex(this.value)','separator' => '', 'template' => '<label class="checkbox">{input} {label} </label>', 'style'=>'float:left;margin-left:-20px;', 'labelOptions' => array('style' => 'display:inline;margin-bottom:5px'))); ?>
		            </div>
		         
					<div class="controls" id="user_ladies" <?php if($model->crew_menu_choice=="Mens"){echo 'hidden';}?>>
					    <?php echo $form->dropDownList($model,'crew_unifrom_size',$model->getLadiesOptions(),array('id'=>'La1'));?>
					    <?php if($model->getError('crew_unifrom_size')){?><span class="help-inline"><?php echo $model->getError('crew_unifrom_size')?></span><?php }?>
					</div>
					
					<div class="controls" id="user_mens" <?php if($model->crew_menu_choice!='Mens'){echo 'hidden';}?>>
					    <?php echo $form->dropDownList($model,'crew_unifrom_size',$model->getMensOptions(),array('id'=>'La2'));?>
					    <?php if($model->getError('crew_unifrom_size')){?><span class="help-inline"><?php echo $model->getError('crew_unifrom_size')?></span><?php }?>
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
				<?php if($model->type != 'Crew' && $model->type != 'Gartner Crew'){?>
				<div class="control-group <?php if($model->getError('previous_winners')){ echo 'error';}?>">
					<label class="control-label" for="User_previous_winners"><?php echo $model->getAttributeLabel('previous_winners')?><br/>(this information will be used to obtain your year book photograph)<br/>Please select all that apply:</label>
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
				<?php if($this->user->type != 'Crew' && $this->user->type !='Gartner Crew'){?>
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
						<div class="control-group <?php if($guest->getError('preferred_name')){ echo 'error';}?>">
							<label class="control-label" for="Guest_preferred_name">Please state your preferred first name.  This will appear on your badge:<span class="required">*</span></label>
							<div class="controls">
								<?php echo $form->textField($guest,'preferred_name',array('placeholder'=>$guest->getAttributeLabel('preferred_name'))); ?>
								<?php if($guest->getError('preferred_name')){?><span class="help-inline"><?php echo $guest->getError('preferred_name')?></span><?php }?>
							</div>
						</div>
						<div class="control-group <?php if($guest->getError('ga_dateofbirth')){ echo 'error';}?>">
							<label class="control-label" for="Guest_ga_dateofbirth"><?php echo $guest->getAttributeLabel('ga_dateofbirth')?>:<span class="required">*</span></label>
							<div class="controls">
								<?php echo $form->textField($guest,'ga_dateofbirth',array('placeholder'=>'Guest Date of Birth')); ?>
								<?php if($guest->getError('ga_dateofbirth')){?><span class="help-inline"><?php echo $guest->getError('ga_dateofbirth')?></span><?php }?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="User_team_dinner_dietary">
							    Does your guest have any dietary requirements:
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
				<div class="row">
					<div class="control-group">
						<div class="controls" style="float:right;">
							<label class="checkbox">
							</label>
							<button type="submit"  class="btn btn-large2 btn-success">Save & Proceed</button>
						</div>
					</div>
				</div>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	<script>
	$(function() {
		$( "#User_ga_dateofbirth" ).datepicker({
			defaultDate: '-74y',
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			dateFormat: 'M/dd/yy',
			yearRange: '1940:2004',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#User_ga_dateofbirth" ).datepicker("getDate"))!=dateText){
						$( "#User_ga_dateofbirth" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#User_ga_card_expiration_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
		});
		$( "#User_ga_card_issue_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
		});
		$( "#Guest_ga_dateofbirth" ).datepicker({
			defaultDate: '-74y',
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			dateFormat: 'M/dd/yy',
			yearRange: '1940:2004',
			onClose: function(dateText, inst) {
				try{
					if($.datepicker.formatDate('M/dd/yy',$( "#Guest_ga_dateofbirth" ).datepicker("getDate"))!=dateText){
						$( "#Guest_ga_dateofbirth" ).val("");
						alert("Please choose date from calendar.");
					}
				}catch(e){
					alert("Please choose date from calendar.");
				}
			}
		});
		$( "#Guest_ga_card_expiration_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
		});
		$( "#Guest_ga_card_issue_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
		});
		$("#User_emergency_contact_name").change(
				function(data){
					if(!/^[a-zA-Z ]*$/.test($("#User_emergency_contact_name").val())){
				        alert("Numbers aren't accepted in this box - Letters only!");
				        $("#User_emergency_contact_name").val('')
				        $("#User_emergency_contact_name").focus();
				    }
				}
		);
	});

	function guest_dietary(value){
		if(value =='Other'){
			$('#guest_dietary_comment_div').show();
		}else{
			$('#Guest_dietary_comment').val('');
			$('#guest_dietary_comment_div').hide();
		}
	}
	function user_dietary(value){
		if(value =='Other'){
			$('#user_dietary_comment_div').show();
		}else{
			$('#User_dietary_comment').val('');
			$('#user_dietary_comment_div').hide();
		}
	}
	function user_sex(value)
	{
		 if(value=='Ladies')
		 {
			 $('#user_ladies').show();
			 $("#La1").removeAttr("disabled", "disabled");
			 $('#user_mens').hide();
			 $("#La2").attr("disabled", "disabled");
		 }
		 else if(value=='Mens')
		 {
			 $('#user_mens').show();
			 $("#La2").removeAttr("disabled", "disabled");
			$('#user_ladies').hide();
			$("#La1").attr("disabled", "disabled");
			
			
		 }
	}
	$(document).ready(function() { 
		user_sex('<?php echo $model->crew_menu_choice;?>');
	}); 
	</script>
