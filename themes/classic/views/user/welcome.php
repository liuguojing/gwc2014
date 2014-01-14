<div class="jumbotron subhead" style="min-height:440px;min-width:400px;background:url(<?php echo Yii::app()->request->baseUrl;?>/img/bg2.jpg) no-repeat bottom;">
	<div class="container top" >
		<div class="row" style="color:#fff;clear:both;">
			<div class="span6" id="bgbox" style="min-height:300px;">
				<div class="row-fluid">
					<div class="span12">
						<h1 style="margin:10px;">Welcome Page</h1>
						<p style="color:#fff;font-size:24px;line-height:30px;margin:10px;">
						<br/>
						Dear <?php echo $user->first_name;?>:
						<br/><br/>
						<?php if($user->type=='Operating Committee'){?>
						Please press proceed to register for Winners Circle 2013. If you have any queries regarding your registration please email <a href="mailto:Amy.repik@gartner.com" style="color:#fff">Amy.repik@gartner.com</a>
						<?php }elseif($user->type=='Gartner Crew'){?>
						Please press proceed to register for Winners Circle 2013. If you have any queries regarding your registration please email <a href="mailto:zoe.venning-pridham@gartner.com" style="color:#fff">zoe.venning-pridham@gartner.com</a>
						<?php }elseif($user->type=='Crew'){?>
						Please press proceed to register for Winners Circle 2013. If you have any queries regarding your registration please email <a href="mailto:zoe.venning-pridham@gartner.com" style="color:#fff">zoe.venning-pridham@gartner.com</a>
						<?php }else{?>
						<p style="color:#fff;font-size:18px;line-height:20px;margin:10px;">
						Congratulations on qualifying for Winners Circle 2013 in Sydney<br><br>
						Please note that registration will take approximately 10 minutes to complete and you will need to enter passport and credit card details for yourself and your significant other in order to complete the registration process. <br/><br/>
						If you have any queries, please email <a href="mailto:winners@corporatereg.com" style="color:#fff">winners@corporatereg.com</a> <br><br>
						Please press proceed to start registering.<br><br>
						</p>
						<?php }?>
						</p>
						<?php
							echo CHtml::link('Proceed',array('user/winner'),array('class'=>'btn btn-success btn-large2','style'=>'margin:10px;'));
						?>
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
	
	</div>