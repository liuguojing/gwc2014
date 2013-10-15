<?php 
	if(in_array($model->type,array('Top Achievers','Eagles','Operating Committee'))){
		$minDate = 'Apr/09/2014';
		$maxDate = "Apr/14/2014";
	}else{
		$minDate = 'Apr/10/2014';
		$maxDate = "Apr/14/2014";
	}
	if(empty($model->hotel_arrival_date)){
		$model->hotel_arrival_date = $minDate;
	}
	if(empty($model->hotel_departure_date)){
		$model->hotel_departure_date = $maxDate;
	}
	if(empty($guest->hotel_arrival_date)){
		$guest->hotel_arrival_date = $minDate;
	}
	if(empty($guest->hotel_departure_date)){
		$guest->hotel_departure_date = $maxDate;
	}
?>
<div class="container top">
		<div class="row">
			<div class="span12">
				<h1>Hotel Information</h1>
				<p>
					<b>Specify room preferences by selecting from the options below:</b><br/>
					<?php if($model->type=="Operating Committee"){?>
					The cost of your hotel room, tax and incidentals will be covered for the duration of the event.
					<?php }else{?>
					The cost of your hotel room and tax will be covered by Gartner based on an arrival date of <?php echo $minDate;?> and departure date of <?php echo $maxDate?>.  If you require additional accommodation outside of these nights, they are subject to availability and you will be responsible for paying for these yourself.  Your personal credit card details are requested for any additional nights at your assigned hotel and for any incidentals incurred for the duration of your stay.
					<?php }?>
				</p>
			</div>
		</div>
		<div class="row">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'user-form',
				'enableAjaxValidation'=>false,
				'htmlOptions'=>array('class'=>'form-inline','onsubmit'=>'return checkCsv();'),
			)); ?>	
			<div class="span12">
				<p class="alert alert-warning">Please note any fields with a <span class="required">*</span> are mandatory</p>
				<div style="clear:both" class="control-group <?php if($model->getError('room_type')){ echo 'error';}?>">
					<label class="input" for="User_room_type"><?php echo $model->getAttributeLabel('room_type')?>:<span class="required">*</span> 
					<?php echo $form->dropDownList($model,'room_type',$model->roomTypeList()); ?></label>
					<?php if($model->getError('room_type')){?><span class="help-inline"><?php echo $model->getError('room_type')?></span><?php }?>
				</div>
				<div class="control-group">
					<label class="checkbox" style="width:400px;">
					    <input type="checkbox" id="freeDateCheck" onclick="freeDate()" >I would like to extend my hotel date.
					</label>
				</div>
				<div class="control-group <?php if($model->getError('hotel_arrival_date')||$model->getError('hotel_departure_date')){ echo 'error';}?>">
					<label class="input" for="User_hotel_arrival_date"><?php echo $model->getAttributeLabel('hotel_arrival_date')?>: 
					<?php echo $form->textField($model,'hotel_arrival_date',array('placeholder'=>$model->getAttributeLabel('hotel_arrival_date'),'readonly'=>'readonly')); ?></label>
					<label class="input" for="User_hotel_departure_date"><?php echo $model->getAttributeLabel('hotel_departure_date')?>: 
					<?php echo $form->textField($model,'hotel_departure_date',array('placeholder'=>$model->getAttributeLabel('hotel_departure_date'),'readonly'=>'readonly')); ?></label>
					<?php if($model->getError('hotel_arrival_date')||$model->getError('hotel_departure_date')){?><span class="help-inline"><?php echo $model->getError('hotel_arrival_date')?><?php echo $model->getError('hotel_departure_date')?></span><?php }?>
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
				<p>Registration team will request extension on your behalf and this will be subject to availability</p>
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
					<?php echo $form->dropDownList($model,'credit_card_type',$model->creditCardType()); ?></label>
					<?php if($model->getError('credit_card_type')){?><span class="help-inline"><?php echo $model->getError('credit_card_type')?></span><?php }?>
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
			<div class="row">
				<div class="control-group">
					<div class="controls" style="float:right;">
						<label class="checkbox">
						</label>
						<button type="submit"  class="btn btn-large2 btn-success">Save & Proceed</button>
					</div>
				</div>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	<script>
	$(function() {
		$( "#User_credit_card_expiration_date" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			changeYear: true,
			dateFormat: 'M/dd/yy',
		});
	});
	function freeDate(){
		if($("#freeDateCheck").is(':checked')){
			$( "#User_hotel_arrival_date" ).attr('readonly',false);
			$( "#User_hotel_departure_date" ).attr('readonly',false);
			$( "#User_hotel_arrival_date" ).datepicker({
				changeMonth: true,
				numberOfMonths: 2,
				disabled:true,
				dateFormat: 'M/dd/yy',
				maxDate: '<?php echo $minDate?>',
				minDate: '+1day',
				onClose: function(dateText, inst) {
					try{
						if($.datepicker.formatDate('M/dd/yy',$( "#User_hotel_arrival_date" ).datepicker("getDate"))!=dateText){
							$( "#User_hotel_arrival_date" ).val("");
							alert("Please choose date from calendar.");
						}
					}catch(e){
						alert("Please choose date from calendar.");
					}
				} 

			});
			$( "#User_hotel_departure_date" ).datepicker({
				changeMonth: true,
				numberOfMonths: 2,
				disabled:true,
				dateFormat: 'M/dd/yy',
				maxDate: '+12month',
				minDate: '<?php echo $maxDate?>',
				onClose: function(dateText, inst) {
					try{
						if($.datepicker.formatDate('M/dd/yy',$( "#User_hotel_departure_date" ).datepicker("getDate"))!=dateText){
							$( "#User_hotel_departure_date" ).val("");
							alert("Please choose date from calendar.");
						}
					}catch(e){
						alert("Please choose date from calendar.");
					}
				} 
			});
			$( "#User_hotel_arrival_date" ).datepicker('enable');
			$( "#User_hotel_departure_date" ).datepicker('enable');
			$("#U_hotel_venue").show();
		}else{
			$( "#User_hotel_arrival_date" ).val("<?php echo $minDate?>");
			$( "#User_hotel_departure_date" ).val("<?php echo $maxDate?>");
			$( "#User_hotel_arrival_date" ).attr('readonly',true);
			$( "#User_hotel_departure_date" ).attr('readonly',true);

			$( "#User_hotel_arrival_date" ).datepicker('disable');
			$( "#User_hotel_departure_date" ).datepicker('disable');
			$("#U_hotel_venue").hide();
		}
		if($("#freeDateCheckGuest").is(':checked')){
			$( "#Guest_hotel_arrival_date" ).attr('readonly',false);
			$( "#Guest_hotel_departure_date" ).attr('readonly',false);
			$( "#Guest_hotel_arrival_date" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 2,
				dateFormat: 'M/dd/yy',
				maxDate: '<?php echo $minDate?>',
				minDate: '+1day',
				onClose: function(dateText, inst) {
					try{
						if($.datepicker.formatDate('M/dd/yy',$( "#Guest_hotel_arrival_date" ).datepicker("getDate"))!=dateText){
							$( "#Guest_hotel_arrival_date" ).val("");
							alert("Please choose date from calendar.");
						}
					}catch(e){
						alert("Please choose date from calendar.");
					}
				}
			});
			$( "#Guest_hotel_departure_date" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 2,
				dateFormat: 'M/dd/yy',
				maxDate: '+12month',
				minDate: '<?php echo $maxDate?>',
				onClose: function(dateText, inst) {
					try{
						if($.datepicker.formatDate('M/dd/yy',$( "#Guest_hotel_departure_date" ).datepicker("getDate"))!=dateText){
							$( "#Guest_hotel_departure_date" ).val("");
							alert("Please choose date from calendar.");
						}
					}catch(e){
						alert("Please choose date from calendar.");
					}
				}
			});
			$( "#Guest_hotel_arrival_date" ).datepicker('disable');
			$( "#Guest_hotel_departure_date" ).datepicker('disable');
			
		}else{
			$( "#Guest_hotel_arrival_date" ).val("<?php echo $minDate?>");
			$( "#Guest_hotel_departure_date" ).val("<?php echo $maxDate?>");
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
		        alert("CSV Number must be 4 digits");
		        //$("#User_csv_number").val('')
		        $("#User_csv_number").focus();
		        return false;
		    }
		}else{
			if(!/^[0-9]{3}$/.test($("#User_csv_number").val())){
		        alert("CSV Number must be 3 digits");
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