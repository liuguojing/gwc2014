<table border=0 width="852px" style="word-wrap:break-word;font-family:arial;">
<tr>
<td style="width:852px">
<div style="width:852px;word-wrap: break-word;font-family:arial;">
<img src="<?php echo $this->domain?>img/email_head.png" />
<p><b>Dear <?php echo $model->first_name . ' ' . $model->last_name;?></b></p>
<p style="word-wrap:break-word;font-family:arial;">You are invited to the <?php echo $model->team_dinner?> Team Dinner at <?php echo User::model()->getRestaurantByTeam($model->team_dinner)?> on Thursday, April 18, 2013.</p>

<p style="word-wrap:break-word;font-family:arial;">Whilst registering, you selected the following option for you and where appropriate, your guest based on a sample menu.  We are now pleased to offer the confirmed menu options for your Team Dinner.  </p>

<p style="word-wrap:break-word;font-family:arial;">Please see your original choice below and should you wish to change your selection, then you have the opportunity to do so by clicking ‘Amend’ and re-selecting.</p>
<?php 
	$dinnerString = User::model()->getDinnerByTeam($model->team_dinner);
	
	if(!empty($dinnerString)){
		$dinners = explode('|',$dinnerString);
		if(count($dinners)==3){?>
<p style="word-wrap:break-word;font-family:arial;">Meat Option:<?php echo $dinners[0];?></p>
<p style="word-wrap:break-word;font-family:arial;">Fish Option:<?php echo $dinners[1];?></p>
<p style="word-wrap:break-word;font-family:arial;">Vegetarian Option: <?php echo $dinners[2];?></p>
		<?php }
	
}?>
<p style="word-wrap:break-word;font-family:arial;">If we do not hear from you before Friday, <b>March 22, 2013</b>, we will assume that you are happy with your original choice.  No action is needed if you are happy with your original choice.</p>

<p style="word-wrap:break-word;font-family:arial;">Your Choice: <?php echo $model->team_dinner_menu;?></p> 
<?php if($model->has_guest == 1 && $model->guest){?>
<p style="word-wrap:break-word;font-family:arial;">Guest Choice: <?php echo $model->guest->team_dinner_menu;?></p>
<?php }?>
<p style="word-wrap:break-word;font-family:arial;">Do not hesitate to contact us if you have any queries regarding the above.</p>

<p style="word-wrap:break-word;font-family:arial;"><?php echo CHtml::link('Amend',array('user/emailDinner','email'=>$model->email));?></p>

<p style="word-wrap:break-word;font-family:arial;">Kind regards</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners Circle Registration Team</p>

<div style="clear:both"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</td>
</tr>
</table>