<div class="jumbotron subhead" style="min-height:440px;min-width:400px;background-color:#fff;">
	<div class="container top" >
		<div class="row">
			<div class="span12" style="min-height:300px;">
				<h1>Welcome Page</h1>
				<p style="font-size:24px;line-height:30px;">
				<br/>
				Dear <?php echo $user->first_name;?>:
				<br/><br/>
				Welcome to the Global Sales Leadership Meeting registration site.  Please proceed and complete the required information to confirm your registration.<br/><br>
				We look forward to seeing you in Naples Florida soon!<br/><br>
				Gartner Corporate Event Team <br/><br>
				</p>
				
		</div>
		<div class="row">
			<div class="span12">
			<?php
				echo CHtml::link('Proceed',array('user/winner'),array('class'=>'btn btn-warning btn-large2','style'=>'float:right;'));
			?>
			<br/><br/><br/><br/>
			
			</div>
		</div>
		
	</div>
	</div>
	
	</div>