<?php
$hotel_assign="Sheraton";
$team_dinner='Friday April 11 2014';
$gala_dinner='Sunday April 13 2014';

if (in_array($model->team_dinner,array('Americas Major Accounts - EU Public Sector','Americas Major Accounts - HTTP East','Americas Major Accounts - HTTP West','Americas Major Accounts - Northeast EU/Invest','Americas Major Accounts - Northwest EU','Americas Major Accounts - South EU','Americas Major Accounts - Brazil Sales','Americas Major Accounts - Supply Chain','Americas SAO')))
{
	$hotel_assign='Sheraton';
	$team_dinner='Friday April 11 2014';
	$gala_dinner='Sunday April 13 2014';
}

if (in_array($model->team_dinner,array('Europe Sales','Event Sales'))){
	$hotel_assign='Hilton'; 
	if ($model->team_dinner=='Europe Sales') {
	$team_dinner='Sunday April 13 2014';
	$gala_dinner='Friday April 11 2014';	
}else{
	$team_dinner='Friday April 11 2014';
	$gala_dinner='Sunday April 13 2014';

}
}


if (in_array($model->team_dinner,array('ANZ','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales','Specialists')))
{ $hotel_assign='Shangri-La';
	if (in_array($model->team_dinner,array('Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
	{
		$team_dinner='Sunday April 13 2014';
		$gala_dinner='Friday April 11 2014';
	}
	else
	{
		$team_dinner='Friday April 11 2014';
		$gala_dinner='Sunday April 13 2014';
	}


}
?>


<table border=0 width="852px" style="word-wrap:break-word;font-family:arial;">
<tr>
<td style="width:852px">
<div style="width:852px;word-wrap: break-word;font-family:arial;">
<img src="<?php echo $this->domain?>img/email_head.png" />
<p><b>Dear <?php echo $model->first_name;?></b></p>
<?php if($model->team_dinner=='Emerging Markets - India & CEEMEA') {?>
<p style="word-wrap:break-word;font-family:arial;">You are invited to the <b>Emerging Markets</b> Gala Dinner at <b>The Star, Pyrmont</b> on <?php echo $gala_dinner;?> and the Team Dinner at <b><?php echo User::model()->getRestaurantByTeam($model->team_dinner)?></b> on <?php echo $team_dinner;?>.</p>
<?php } else {?>
<p style="word-wrap:break-word;font-family:arial;">You are invited to the <b><?php echo $model->team_dinner?></b>  Gala Dinner at <b>The Star, Pyrmont</b> on <?php echo $gala_dinner;?> and the Team Dinner at <b><?php echo User::model()->getRestaurantByTeam($model->team_dinner)?></b> on <?php echo $team_dinner;?>.</p>
<?php }?>

<p style="word-wrap:break-word;font-family:arial;">Whilst registering, you selected the following option for you
	 <?php if($model->has_guest==1) { echo "and your guest";  } ?>
	 based on a sample menu. We are now pleased to offer the confirmed menu options for both events. Please see your original choice below and should you wish to change your selection, then you have the opportunity to do so by clicking 'Amend' and re-selecting.  </p>

<?php 
	$dinnerString = User::model()->getDinnerByTeam($model->team_dinner);
	
	if(!empty($dinnerString)){
		$dinners = explode('|',$dinnerString);
		if(count($dinners)==3){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Team Dinner Meat Option:</b> <?php echo $dinners[0];?></p>
<p style="word-wrap:break-word;font-family:arial;"><b>Team Dinner Fish Option:</b> <?php echo $dinners[1];?></p>
<p style="word-wrap:break-word;font-family:arial;"><b>Team Dinner Vegetarian Option:</b> <?php echo $dinners[2];?></p>
		<?php }
	
}?>
<p style="word-wrap:break-word;font-family:arial;">&nbsp;</p>

<p style="word-wrap:break-word;font-family:arial;"><b>Gala Dinner Meat Option:</b> Filet Beef with Crisp Mushroom Roll, Potato Puree and Gingerbread Carrots</p>
<p style="word-wrap:break-word;font-family:arial;"><b>Gala Dinner Vegetarian Option:</b> Buffalo Ricotta & Spinach Agnolotti, Wood Mushrooms, Sage Butter</p>




<p style="word-wrap:break-word;font-family:arial;">If we do not hear from you before Thursday, <b>March 27, 2014</b>, we will assume that you are happy with your original choice. </p>

<p style="word-wrap:break-word;font-family:arial;"><b>Team Dinner </b></p>
<p style="word-wrap:break-word;font-family:arial;"><b>Your Choice:</b> <?php echo $model->team_dinner_menu;?></p> 
<?php if($model->has_guest == 1 && $model->guest){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Guest Choice:</b> <?php echo $model->guest->team_dinner_menu;?></p>
<?php }?>

<p style="word-wrap:break-word;font-family:arial;"><b>Gala Dinner </b></p>
<p style="word-wrap:break-word;font-family:arial;"><b>Your Choice:</b> <?php echo $model->gala_dinner_menu;?> <?php echo $model->nationality;?></p> 
<?php if($model->has_guest == 1 && $model->guest){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Guest Choice:</b> <?php echo $model->gala->team_dinner_menu;?></p>
<?php }?>

<p style="word-wrap:break-word;font-family:arial;"><a style="float:left;maring-left:500px;" href="<?php echo $this->domain;?>index.php/user/emailDinner?email=<?php echo $model->email;?>"><img src="https://app.corporate-reg.com/gwc2013/img/Amend.jpg" alt="Amend"/></a><br/></p>

<p style="word-wrap:break-word;font-family:arial;">Do not hesitate to contact us if you have any queries regarding the above.</p>

<p style="word-wrap:break-word;font-family:arial;">Kind regards</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners Circle Registration Team</p>

<p style="word-wrap:break-word;font-family:arial;"><a href="mailto:winners@corporate-reg.com">winners@corporate-reg.com</a></p>

<div style="clear:both"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</td>
</tr>
</table>