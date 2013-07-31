<div class="container top">
	<h1>ipad</h1>
	<div id="ipad" class="row">
		<?php
			foreach(Yii::app()->user->getFlashes() as $key => $message) {
				echo '<div class="span12"><p class="alert alert-' . $key . '">' . $message . "</p></div>\n";
			}
		?>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'user-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('class'=>'form-horizontal','onsubmit'=>'test();'),
		)); ?>
		<div class="span12">
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
		    <label class="control-label" for="User_headset">Amount</label>
		    <div class="controls">
		       <?php if($model->has_ipad){
		       		echo $form->dropDownList($model,'amount',User::model()->getAmountList($model->type),array('disabled'=>'disabled'));
		       }else{
		       		echo $form->dropDownList($model,'amount',User::model()->getAmountList($model->type));
		       }?>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="User_headset"></label>
		    <div class="controls">
		    	<?php 
		    	$disabled = array('separator' => '','disabled'=>'disabled', 'template' => '<li class="q6" style="list-style: none outside none;display:block;margin:10px;">{input} {label} </li>', 'labelOptions' => array('style' => 'display:inline;'));
		    	$undisabled = array('separator' => '', 'template' => '<li class="q6" style="list-style: none outside none;display:block;margin:10px;">{input} {label} </li>', 'labelOptions' => array('style' => 'display:inline;'));
		    	$coupon = $model->coupon == array(1)?$disabled:$undisabled;
		    	$travel = $model->travel_ticket == array(1)?$disabled:$undisabled;
		    	?>
		       <?php echo $form->CheckBoxList($model,'coupon',array('1'=>"Coupon"),$coupon);?>
		       <?php echo $form->CheckBoxList($model,'travel_ticket',array('1'=>"Travel Ticket"),$travel);?>
		    </div>
		  </div>
		  <div class="control-group">
		    <label class="control-label" for="User_sign">Sign</label>
		    <?php $hide = '';
		    if($model->has_ipad){
		    	echo CHtml::image(Yii::app()->request->baseUrl . '/uploads/' . $model->id . '.png','')?>
		    <?php }else{?>
			<canvas class="<?php echo $hide;?>" id="colors_sketch" width="720px" height="400px" style="background-color: #eee;"></canvas>
		    <?php }?>
		  </div>
		  
		  <div class="control-group">
		    <label class="control-label" for=""></label>
		    <div class="controls">
			  <?php echo $form->hiddenField($model,'id');?>
			  <?php if($model->has_ipad){?>
			  <button type="submit"  class="btn  btn-warning">Save</button>
			  <?php }else{?>
			  <a id="clean" class="btn  btn-warning" data-clean="yes" href="#colors_sketch" style="margin-right:80px">Clean</a>
			  <a id="save" class="btn  btn-warning" data-save="<?php echo $model->id;?>" href="#colors_sketch" >Save</a>
			  <?php }?>
			  <?php echo CHtml::link('Back',array('searchIpad'),array('class'=>'btn btn-warning','style'=>"margin-left:80px"));?>
		    </div>
		  </div>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/sketch.js"></script>
<script type="text/javascript">
  $(function() {
    $.each(['#f00', '#ff0', '#0f0', '#0ff', '#00f', '#f0f', '#000', '#fff'], function() {
      $('#colors_demo .tools').append("<a href='#colors_sketch' data-color='" + this + "' style='width: 10px; background: " + this + ";'></a> ");
    });
    $.each([3, 5, 10, 15], function() {
      $('#colors_demo .tools').append("<a href='#colors_sketch' data-size='" + this + "' style='background: #ccc'>" + this + "</a> ");
    });
    $('#colors_sketch').sketch();
  });
  function test(){
      var canvas = document.createElement("canvas");
      alert(canvas.toDataUrl());
      return false;
  }
</script>