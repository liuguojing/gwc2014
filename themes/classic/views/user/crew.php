<div class="container top">
	<div class="row">
		<div class="span12">
			<h1>Crew</h1>
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
				<div class="span12"><p class="alert alert-warning">Please note any fields with a <span class="required">*</span> are mandatory</p></div>
				<div class="span12">
				<legend>Crew</legend>
					<div class="control-group">
					</div>
					<div class="control-group">
						<label class="" for="User_crew_diet_requirements">
						    Crew Diet Requirements:
						</label><br/>
						    <?php echo $form->dropDownList($model,'crew_diet_requirements',$model->getDietaryOptions())?>
					</div>
					<div class="control-group">
						<label class="" for="User_crew_other_info">
						    Crew other info:
						</label><br/>
						    <?php echo $form->textField($model,'crew_other_info')?>
					</div>
					<div class="control-group">
						<label class="" for="User_crew_menu_choice">
						    Crew menu choice:
						</label><br/>
						    <?php echo $form->dropDownList($model,'crew_menu_choice',$model->menuList())?>
					</div>
					<div class="control-group">
						<label class="" for="User_crew_unifrom_size">
						    Crew Unifrom Size:
						</label><br/>
						    <?php echo $form->dropDownList($model,'crew_unifrom_size',$model->menuList())?>
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
</div>