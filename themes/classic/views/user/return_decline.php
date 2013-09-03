<div class="jumbotron subhead bgbox" style="min-height:440px;min-width:400px;background:url(<?php echo Yii::app()->request->baseUrl;?>/img/bg2.jpg) no-repeat top;">
	<div class="container top" >
		<div class="row" style="color:#fff">
			<div class="span6"><h1></h1></div>
			<div class="span6" id="bgbox" style="min-height:300px;">
				<div class="row-fluid">
					<div class="span12">
						<p style="color:#fff;font-size:24px;line-height:30px;margin:10px;">
						<br/>
						Dear <?php echo $user->first_name;?>:
						<br/><br/>
						<?php if($user->type=='Top Achievers'||$user->type=='Eagles'){?>
						Thank you.  Your information for Winners Circle is now completed. <br/>
						If you have any questions regarding your registration please contact <a href="mailto:lauren.picart@gartner.com" >Lauren Picart</a>  in the Winners Circle Events Team.<br/><br/>
						<?php }elseif($user->type=='Host GEN'||$user->type=='Host GVP'||$user->type=='Host Winners'){?>
						Thank you.  Your information for Winners Circle is now completed. <br/>
						If you have any questions regarding your registration please do contact the <a href="mailto:winners@corporatereg.com">Winners Circle Events Team </a>.<br/><br/>
						<?php }elseif($user->type=='Operating Committee'){?>
						Thank you.  Your information for Winners Circle is now completed. <br/>
						If you have any questions regarding your registration please do contact the <a href="mailto:winners@corporatereg.com">Winners Circle Events Team </a>.<br/><br/>
						<?php }elseif($user->type=='Gartner Crew'||$user->type=='Crew'){?>
						Thank you.  Your information for Winners Circle is now completed. <br/>
						If you have any questions regarding your registration please do contact the <a href="mailto:winners@corporatereg.com">Winners Circle Events Team </a>.<br/><br/>
						<span style="color:#fff">Winners Circle Events Leadership Team</span>
						<?php }?>
						</p>
					</div>
				</div>
			</div>
				
		</div>
		<div class="row">
			<div class="span12">
			<br/><br/><br/><br/>
			
			</div>
		</div>
		
	</div>
</div>
