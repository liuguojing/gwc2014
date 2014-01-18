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
{$hotel_assign='Shangri-La';
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
<p><b>Dear <?php echo $model->first_name;?>,</b></p>
<?php if($model->type=="Winners"){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Congratulations on qualifying for Winners Circle 2013!  You and your significant other are invited to celebrate your hard work and success in Sydney, Australia from April 10-14 2014.</b></p>

<p style="word-wrap:break-word;font-family:arial;">Below is your link to register for this exciting event.  Once you have registered you will be able to book your Tours and Activities. Please register as soon as possible to ensure you receive your first choice of Tours and Activities.  The booking system will close Friday February 21 2014.  It will take you approximately 10 minutes to register and you will need to enter passport and credit card details for you and your guest.</p>

<p style="word-wrap:break-word;font-family:arial;">If you are unable to attend please click on the decline button below and advise of the reason you are unable to attend.</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners group will be split between three hotels this year.  You and your guest will be staying with the <?php echo $model->team_dinner;?> team at the <?php echo $hotel_assign;?> hotel. </p>

<p style="word-wrap:break-word;font-family:arial;">This year's Gala Dinner will be held at the stylish Star Ballroom and to accommodate our exceptionally high number of Winners we will be splitting the group and running two Gala Dinners.  The <?php echo $model->team_dinner;?> team will attend the Gala Dinner on <?php echo $gala_dinner;?> and their team dinner on <?php echo $team_dinner;?>.</p> 

<p style="word-wrap:break-word;font-family:arial;">To learn more about this year's event and to view the agenda,, please click <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>

<p style="word-wrap:break-word;font-family:arial;">We look forward to seeing you in Sydney! </p>

<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>

<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>

<p style="word-wrap:break-word;font-family:arial;">To see Gartner's Winners Circle travel policy, please click <a href="<?php echo $this->domain;?>travel_policy.pdf">here.</a>
</p>
<?php }elseif($model->type=="Host GEN"){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Congratulations on qualifying for Winners Circle 2013!  You and your significant other are invited to celebrate your hard work and success in Sydney, Australia from April 10-14 2014.</b></p>

<p style="word-wrap:break-word;font-family:arial;">Below is your link to register for this exciting event.  Once you have registered you will be able to book your Tours and Activities. Please register as soon as possible to ensure you receive your first choice of Tours and Activities.  The booking system will close Friday February 21 2014.  It will take you approximately 10 minutes to register and you will need to enter passport and credit card details for you and your guest.</p>

<p style="word-wrap:break-word;font-family:arial;">If you are unable to attend please click on the decline button below and advise of the reason you are unable to attend.</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners group will be split between three hotels this year.  You and your guest will be staying with the <?php echo $model->team_dinner;?> team at the <?php echo $hotel_assign;?> hotel. </p>

<p style="word-wrap:break-word;font-family:arial;">This year's Gala Dinner will be held at the stylish Star Ballroom and to accommodate our exceptionally high number of Winners we will be splitting the group and running two Gala Dinners.  The <?php echo $model->team_dinner;?> team will attend the Gala Dinner on <?php echo $gala_dinner;?> and their team dinner on <?php echo $team_dinner;?>.</p> 

<p style="word-wrap:break-word;font-family:arial;">To learn more about this year's event and to view the agenda,, please click <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>

<p style="word-wrap:break-word;font-family:arial;">We look forward to seeing you in Sydney! </p>

<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>

<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>

<p style="word-wrap:break-word;font-family:arial;">To see Gartner's Winners Circle travel policy, please click <a href="<?php echo $this->domain;?>travel_policy.pdf">here.</a>
</p>

<?php }elseif($model->type=="Host GVP"){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Congratulations on qualifying for Winners Circle 2013!  You and your significant other are invited to celebrate your hard work and success in Sydney, Australia from April 10-14 2014.</b></p>

<p style="word-wrap:break-word;font-family:arial;">Below is your link to register for this exciting event.  Once you have registered you will be able to book your Tours and Activities. Please register as soon as possible to ensure you receive your first choice of Tours and Activities.  The booking system will close Friday February 21 2014.  It will take you approximately 10 minutes to register and you will need to enter passport and credit card details for you and your guest.</p>

<p style="word-wrap:break-word;font-family:arial;">If you are unable to attend please click on the decline button below and advise of the reason you are unable to attend.</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners group will be split between three hotels this year.  You and your guest will be staying with the <?php echo $model->team_dinner;?> team at the <?php echo $hotel_assign;?> hotel. </p>

<p style="word-wrap:break-word;font-family:arial;">This year's Gala Dinner will be held at the stylish Star Ballroom and to accommodate our exceptionally high number of Winners we will be splitting the group and running two Gala Dinners.  The <?php echo $model->team_dinner;?> team will attend the Gala Dinner on <?php echo $gala_dinner;?> and their team dinner on <?php echo $team_dinner;?>.</p> 

<p style="word-wrap:break-word;font-family:arial;">To learn more about this year's event and to view the agenda,, please click <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>

<p style="word-wrap:break-word;font-family:arial;">We look forward to seeing you in Sydney! </p>

<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>

<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>

<p style="word-wrap:break-word;font-family:arial;">To see Gartner's Winners Circle travel policy, please click <a href="<?php echo $this->domain;?>travel_policy.pdf">here.</a>
</p>

<?php }elseif($model->type=="Top Achievers"){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Congratulations on qualifying for Winners Circle 2013!  You and your significant other are invited to celebrate your hard work and success in Sydney, Australia.  As a Top Achiever you are invited to arrive on Wednesday, April 9 2014. This will give you an extra day to explore Sydney and also attend the Top Achievers Lunch on Thursday 10.</b></p>

<p style="word-wrap:break-word;font-family:arial;">Below is your link to register for this exciting event.  Once you have registered you will be able to book your Tours and Activities. Please register as soon as possible to ensure you receive your first choice of Tours and Activities.  The booking system will close Friday February 21 2014.  It will take you approximately 10 minutes to register and you will need to enter passport and credit card details for you and your guest.</p>

<p style="word-wrap:break-word;font-family:arial;">If you are unable to attend please click on the decline button below and advise of the reason you are unable to attend.</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners group will be split between three hotels this year.  You and your guest will be staying with the <?php echo $model->team_dinner;?> team at the <?php echo $hotel_assign;?> hotel. </p>

<p style="word-wrap:break-word;font-family:arial;">This year's Gala Dinner will be held at the stylish Star Ballroom and to accommodate our exceptionally high number of Winners we will be splitting the group and running two Gala Dinners.  The <?php echo $model->team_dinner;?> team will attend the Gala Dinner on <?php echo $gala_dinner;?> and their team dinner on <?php echo $team_dinner;?>.</p> 

<p style="word-wrap:break-word;font-family:arial;">If you have any questions regarding your registration please contact <a href="mailto:cindy.rosado@gartner.com">Cindy Rosado</a> in the Winners Circle Events Team. </p>

<p style="word-wrap:break-word;font-family:arial;">To learn more about this year's event and to view the agenda,, please click <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>

<p style="word-wrap:break-word;font-family:arial;">We look forward to seeing you in Sydney! </p>

<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>

<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>

<p style="word-wrap:break-word;font-family:arial;">To see Gartner's Winners Circle travel policy, please click <a href="<?php echo $this->domain;?>travel_policy.pdf">here.</a>
</p>

<?php }elseif($model->type=="Operating Committee"){?>
<p style="word-wrap:break-word;font-family:arial;">You and your significant other are invited to celebrate in Sydney, Australia.  As a member of the Operating Committee you are invited to arrive on Wednesday, April 9th 2014.  This will give you an extra day to explore Sydney and also attend the Top Achievers Lunch on Thursday, April 10th 2014.</p>

<p style="word-wrap:break-word;font-family:arial;"><b>You will need to complete your registration and housing requirements by clicking on the accept or decline options below by Friday, February 21st 2014. </b></p>

<p style="word-wrap:break-word;font-family:arial;">To book your travel to Winners Circle, please contact <a href="mailto:ax1gartnervip@aexp.com">Marisa Kazi</a> from American Express.</p>

<p style="word-wrap:break-word;font-family:arial;">If you have any questions regarding your registration or to book your tours and activities please contact <a href="mailto:Sophie.nealon@gartner.com">Sophie Nealon</a>. </p> 
<p style="word-wrap:break-word;font-family:arial;">We look forward to seeing you in Sydney! </p>
<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>
<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>
<p style="word-wrap:break-word;font-family:arial;">To see the agenda and learn more about the event, please <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">click here</a> for the Winners Circle website using: User Name - gartner; Password - winners<br/>
To see Gartner's Winners Circle travel policy, please <a href="<?php echo $this->domain;?>travel_policy.pdf">click here.</a></p>

<?php }elseif($model->type=="Eagles"){?>
<p style="word-wrap:break-word;font-family:arial;"><b>Congratulations on qualifying for Winners Circle 2013!  You and your significant other are invited to celebrate your hard work and success in Sydney, Australia.  As an Eagle Winner you are invited to arrive on April 9 2014. This will give you an extra day to explore Sydney.</b></p>

<p style="word-wrap:break-word;font-family:arial;">Below is your link to register for this exciting event.  Once you have registered you will be able to book your Tours and Activities. Please register as soon as possible to ensure you receive your first choice of Tours and Activities.  The booking system will close Friday February 21 2014.  It will take you approximately 10 minutes to register and you will need to enter passport and credit card details for you and your guest.</p>

<p style="word-wrap:break-word;font-family:arial;">If you are unable to attend please click on the decline button below and advise of the reason you are unable to attend.</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners group will be split between three hotels this year.  You and your guest will be staying with the <?php echo $model->team_dinner;?> team at the <?php echo $hotel_assign;?> hotel. </p>

<p style="word-wrap:break-word;font-family:arial;">This year's Gala Dinner will be held at the stylish Star Ballroom and to accommodate our exceptionally high number of Winners we will be splitting the group and running two Gala Dinners.  The <?php echo $model->team_dinner;?> team will attend the Gala Dinner on <?php echo $gala_dinner;?> and their team dinner on <?php echo $team_dinner;?>.</p> 

<p style="word-wrap:break-word;font-family:arial;">If you have any questions regarding your registration please contact <a href="mailto:cindy.rosado@gartner.com">Cindy Rosado</a> in the Winners Circle Events Team. </p>

<p style="word-wrap:break-word;font-family:arial;">To learn more about this year's event and to view the agenda,, please click <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>

<p style="word-wrap:break-word;font-family:arial;">We look forward to seeing you in Sydney! </p>

<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>

<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>

<p style="word-wrap:break-word;font-family:arial;">To see Gartner's Winners Circle travel policy, please click <a href="<?php echo $this->domain;?>travel_policy.pdf">here.</a>
</p>

<?php }elseif($model->type=='Crew'||$model->type=="Gartner Crew") {?>
<p style="word-wrap:break-word;font-family:arial;">Thank you for being a part of the Gartner Winners Circle Event Crew, Sydney April 2014.</p>
 
<p style="word-wrap:break-word;font-family:arial;">Please can you register for the event and advise your details. Your travel arrangements should already be either in progress or completed.  </p>

<p style="word-wrap:break-word;font-family:arial;"><b>All crew must be registered for Winners Circle. Please complete your details by clicking on the 'accept' option below no later than Friday, January 25th 2014.</b></p>
 
<p style="word-wrap:break-word;font-family:arial;">If you have any questions regarding your registration or the event then please contact <a href="mailto:zoe.venning-pridham@gartner.com">Zoe Venning-Pridham</a>.</p>
 

<p style="word-wrap:break-word;font-family:arial;">Thank you, </p>

<p style="word-wrap:break-word;font-family:arial;">Winners Circle Events Team</p>
<?php }?>
<a style="float:left;maring-left:500px;" href="<?php echo $this->domain;?>index.php/user/welcome?email=<?php echo $model->email;?>"><img src="https://app.corporate-reg.com/gwc2013/img/accept.jpg" alt="Accept"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(!($model->type=='Crew'||$model->type=="Gartner Crew")) {?>
<a style="float:left;maring-left:50px;"  href="<?php echo $this->domain;?>index.php/user/decline?email=<?php echo $model->email;?>"><img src="https://app.corporate-reg.com/gwc2013/img/decline.jpg" alt="Decline"/></a>
<?php }?>
<div style="clear:both"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</td>
</tr>
</table>
