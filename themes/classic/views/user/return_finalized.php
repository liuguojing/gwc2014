<div class="jumbotron subhead" style="min-height:440px;min-width:400px;background-color:red;background:url(<?php echo Yii::app()->request->baseUrl;?>/img/bg2.jpeg) no-repeat top;">
	<div class="container top" >
		<div class="row" style="color:#fff">
			<div class="span6"><h1></h1></div>
			<div class="span6" style="min-height:300px;">
				<p style="color:#000;font-size:24px;line-height:30px;">
				<br/>
				Dear <?php echo $user->first_name;?>:
				<br/><br/>
				<?php if($user->type=='Top Achievers'||$user->type=='Eagles'){?>
				Thank you.  Your registration to Winners Circle is now finalized.  To view your Information Summary please <?php echo CHtml::link('click here',array('user/emailSummary','email'=>$user->email))?><br/>
				If you have any questions regarding your registration please contact <a href="mailto:lauren.picart@gartner.com" >Lauren Picart</a>  in the Winners Circle Events Team.<br/><br/>
				<span style="color:#fff">See you in Miami!<br/>
				Winners Circle Events Team</span>
				<?php }elseif($user->type=='Host GEN'||$user->type=='Host GVP'||$user->type=='Winners'){?>
				Thank you.  Your registration to Winners Circle is now finalized.  To view your Information Summary please <?php echo CHtml::link('click here',array('user/emailSummary','email'=>$user->email))?><br/>
				If you have any questions regarding your registration please do contact the <a href="mailto:winners@corporatereg.com">Winners Circle Events Team </a>.<br/><br/>
				<span style="color:#fff">See you in Miami!<br/>
				Winners Circle Events Team</span>
				<?php }elseif($user->type=='Operating Committee'){?>
				Thank you.  Your registration to Winners Circle is now finalized.  To view your Information Summary please <?php echo CHtml::link('click here',array('user/emailSummary','email'=>$user->email))?><br/>
				If you have any questions regarding your registration please do contact the <a href="mailto:winners@corporatereg.com">Winners Circle Events Team </a>.<br/><br/>
				<span style="color:#fff">We very much look forward to seeing you in Miami!<br/>
				Winners Circle Events Team</span>
				<?php }elseif($user->type=='Gartner Crew'||$user->type=='Crew'){?>
				Thank you.  Your registration to Winners Circle is now finalized.  To view your Information Summary please <?php echo CHtml::link('click here',array('user/emailSummary','email'=>$user->email))?><br/>
				If you have any questions regarding your registration please do contact the <a href="mailto:winners@corporatereg.com">Winners Circle Events Team </a>.<br/><br/>
				<span style="color:#fff">Winners Circle Events Leadership Team</span>
				<?php }?>
				</p>
				
		</div>
		<div class="row">
			<div class="span12">
			<br/><br/><br/><br/>
			
			</div>
		</div>
		
	</div>
	</div>
	
	</div>