<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GARTNER WINNERS CIRCLE 2013</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/main.css" rel="stylesheet">
    <!-- Le styles -->
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/excite-bike/jquery-ui-1.8.23.custom.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons 
    <link rel="shortcut icon" href="">-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->request->baseUrl;?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl;?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl;?>/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->request->baseUrl;?>/ico/apple-touch-icon-57-precomposed.png">
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-1.7.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-transition.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-alert.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-modal.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-tab.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-popover.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-button.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-collapse.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-carousel.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-ui-1.8.23.custom.min.js"></script>
</head>

  <body style="padding-bottom: 0px;max-width:1280px;margin:auto;">
	<div class="jumbotron subhead customer" id="overview">
		<div id="header">
			<div class="l_box" style="margin-left:0px;">
			</div>
			<div class="cl"></div>
			<div class="navbar">
				<div class="navbar-inner">
					<ul class="nav" style="font-family: Arial;">
					<?php if(isset($this->user) && $this->user->status == 0){?>
					<?php if(isset($this->user) && $this->user->type=='Gartner Crew'){
								$active = Yii::app()->getController()->getAction()->id;
								$step=1;
								if($active == 'welcome'){
									$step = 1;
								}elseif($active == 'winner'){
									$step = 2;
								}elseif($active == 'tours'){
									$step = 4;
								}elseif($active == 'summary'){
							  		$step = 5;
							  	}?>
						<li<?php if($active == 'welcome'){echo ' class="active"';}?>><?php echo CHtml::link('Welcome',array('user/welcome'));?></li>
						<li<?php if($active == 'winner'){ echo ' class="active"';}?>><?php echo $step>1?CHtml::link('Gartner Crew Information',array('user/winner')):CHtml::link('Gartner Crew Information','###');?></li>
						<li<?php if($active == 'tours'){  echo ' class="active"';}?>><?php echo $step>3?CHtml::link('Additional Information',array('user/tours')):CHtml::link('Additional Information','###');?></li>
						<li<?php if($active == 'summary'){echo ' class="active"';}?>><?php echo $step>4?CHtml::link('Review',array('user/summary')):CHtml::link('Review','###');?></li>
					<?php }elseif(isset($this->user) && $this->user->type=='Operating Committee'){
							  	$active = Yii::app()->getController()->getAction()->id;
							  	$step=1;
							  	if($active == 'welcome'){
							  		$step = 1;
							  	}elseif($active == 'winner'){
							  		$step = 2;
							  	}elseif($active == 'hotel'){
							  		$step = 3;
							  	}elseif($active == 'tours'){
							  		$step = 4;
							  	}elseif($active == 'summary'){
									$step = 5;
								}?>
						<li<?php if($active == 'welcome'){echo ' class="active"';}?>><?php echo CHtml::link('Welcome',array('user/welcome'));?></li>
						<li<?php if($active == 'winner'){ echo ' class="active"';}?>><?php echo $step>1?CHtml::link('Operating Committee Information',array('user/winner')):CHtml::link('Operating Committee Information','###');?></li>
						<li<?php if($active == 'hotel'){  echo ' class="active"';}?>><?php echo $step>2?CHtml::link('Hotel Information',array('user/hotel')):CHtml::link('Hotel Information','###');?></li>
				   		<li<?php if($active == 'tours'){  echo ' class="active"';}?>><?php echo $step>3?CHtml::link('Additional Information',array('user/tours')):CHtml::link('Additional Information','###');?></li>
						<li<?php if($active == 'summary'){echo ' class="active"';}?>><?php echo $step>4?CHtml::link('Review',array('user/summary')):CHtml::link('Review','###');?></li>
					<?php }elseif(isset($this->user) && $this->user->type=='Crew'){
							  	$active = Yii::app()->getController()->getAction()->id;
							  	$step=1;
							  	if($active == 'welcome'){
							  		$step = 1;
							  	}elseif($active == 'winner'){
							  		$step = 2;
							  	}elseif($active == 'summary'){
							  		$step = 3;
							  	}?>
						<li<?php if($active == 'welcome'){echo ' class="active"';}?>><?php echo CHtml::link('Welcome',array('user/welcome'));?></li>
						<li<?php if($active == 'winner'){ echo ' class="active"';}?>><?php echo $step>1?CHtml::link('Crew Information',array('user/winner')):CHtml::link('Crew Information','###');?></li>
						<li<?php if($active == 'summary'){echo ' class="active"';}?>><?php echo $step>2?CHtml::link('Review',array('user/summary')):CHtml::link('Review','###');?></li>
				    <?php  }else{?>
						<?php 
							$active = Yii::app()->getController()->getAction()->id;
							$step=1;
							if($active == 'welcome'){
								$step = 1;
							}elseif($active == 'winner'){
								$step = 2;
							}elseif($active == 'travel'){
								$step = 3;
							}elseif($active == 'hotel'){
								$step = 4;
							}elseif($active == 'tours'){
								$step = 5;
							}elseif($active == 'summary'){
								$step = 6;
							}
						?>
						<li<?php if($active == 'welcome'){echo ' class="active"';}?>><?php echo CHtml::link('Welcome',array('user/welcome'));?></li>
						<li<?php if($active == 'winner'){ echo ' class="active"';}?>><?php echo $step>1?CHtml::link('Winner Information',array('user/winner')):CHtml::link('Winner Information','###');?></li>
						<li<?php if($active == 'travel'){ echo ' class="active"';}?>><?php echo $step>2?CHtml::link('Travel Information',array('user/travel')):CHtml::link('Travel Information','###');?></li>
						<li<?php if($active == 'hotel'){  echo ' class="active"';}?>><?php echo $step>3?CHtml::link('Hotel Information',array('user/hotel')):CHtml::link('Hotel Information','###');?></li>
						<li<?php if($active == 'tours'){  echo ' class="active"';}?>><?php echo $step>4?CHtml::link('Additional Information',array('user/tours')):CHtml::link('Additional Information','###');?></li>
						<li<?php if($active == 'summary'){echo ' class="active"';}?>><?php echo $step>5?CHtml::link('Review',array('user/summary')):CHtml::link('Review','###');?></li>
						<?php }}?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php echo $content;?>

  </body>
</html>
