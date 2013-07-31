<div class="container top">
	<div class="row">
			<div class="span12" style="font-size:14px;">
				<br/>
				<p><b>Dear <?php echo $model->first_name;?></b><br/><br/></p>
				<p><b>Thank you for registering for Winners Circle 2013 in Sydney.</b></p>
				<?php if($model->type == 'Top Achievers' || $model->type =='Eagles'){?>
				<p>Your request for travel has been sent to the dedicated Winners Circle American Express team.</P>
				<p>American Express will send a receipt of request within 24 hours. A proposed itinerary will be e-mailed within 5 working days. All correspondence will be managed within the GMT time zone. Normal office working hours are between 9am and 5pm GMT</P>
				<p>Within the next 48 hours you will receive an e-mail from the Tours and Activities company, providing you with the website link and your username and password.</P>
				<p>For any <b>accommodation</b> or <b>registration</b> queries please email: <a href="mailto:winners@corporatereg.com">winners@corporatereg.com</a> </p>
				<p>For any <b>travel</b> related queries please email: <a href="mailto:winnerscircletravel@aexp.com">winnerscircletravel@aexp.com</a></p>
				<p>For all other queries please contact <a href="mailto:lauren.picart@gartner.com">Lauren Picart</a> </p>
				<p>We look forward to seeing you in Sydney!</p>
				<p style="margin-top:24px;">Winners Circle Events Team</P>
				<p style="margin-top:24px;">To see the agenda and learn more about the event, please <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">click here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>
				<p>To view your Information Summary please <?php echo CHtml::link('click here',Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/index.php/user/emailSummary?email='.$model->email)?>. </p>
				
				<?php }elseif($model->type == 'Host GEN' || $model->type == 'Host GVP' || $model->type =='Winners'){?>
				<p>Your request for travel has been sent to the dedicated Winners Circle American Express team.</P>
				<p>American Express will send a receipt of request within 24 hours. A proposed itinerary will be e-mailed within 5 working days. All correspondence will be managed within the GMT time zone. Normal office working hours are between 9am and 5pm GMT</P>
				<p>Within the next 48 hours you will receive an e-mail from the Tours and Activities company, providing you with the website link and your username and password.</P>
				<p>For any <b>accommodation</b> or <b>registration</b> queries please email: <a href="mailto:winners@corporatereg.com">winners@corporatereg.com</a> </p>
				<p>For any <b>travel</b> related queries please email: <a href="mailto:winnerscircletravel@aexp.com">winnerscircletravel@aexp.com</a></p>
				<p>We look forward to seeing you in Sydney!</p>
				<p style="margin-top:24px;">Winners Circle Events Team</P>
				<p style="margin-top:24px;">To see the agenda and learn more about the event, please <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">click here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>
				<p>To view your Information Summary please <?php echo CHtml::link('click here',Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/index.php/user/emailSummary?email='.$model->email)?>. </p>
				
				<?php }elseif($model->type == 'Operating Committee'){?>
				<p>Marisa Kazi from American Express will be in contact with you to understand your travel requirements.  Alternatively please contact her on: <a href="mailto:ax1gartnervip@aexp.com">ax1gartnervip@aexp.com</a>  telephone: 800-872-9952 option 6. </P>
				<p>For any <b>Accommodation, Registration or Tours and Activities</b> queries please email: <a href="mailto:amy.repik@gartner.com">Amy Repik</a> </p>
				<p>We look forward to seeing you in Sydney!</p>
				<p style="margin-top:24px;">Winners Circle Events Team</P>
				<p style="margin-top:24px;">To see the agenda and learn more about the event, please <a href="http://www.gartnerwinnerscircle.com/Sydney/agenda/">click here</a> for the Winners Circle website using: User Name - gartner; Password - winners</p>
				<p>To view your Information Summary please <?php echo CHtml::link('click here',Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/index.php/user/emailSummary?email='.$model->email)?>. </p>
				
				<?php }elseif($model->type == 'Crew' || $model->type == 'Gartner Crew'){?>
				<p>For any Accommodation or Registration queries please email <a href="mailto:charlene.johnson-crooks@gartner.com">Charlene Johnson-Crooks</a> </p>
				<p>We look forward to seeing you in Sydney!</p>
				<p>Winners Circle Events Team
				<?php }?>
			</div>
		</div>
</div>