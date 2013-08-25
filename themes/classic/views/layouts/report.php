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

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="">
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
    <style>
	.btn-primary{
		color: #ffffff;
		  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		  background-color:#388cbb
		  *background-color: #388cbb;
		  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#2aabe2), to(#388cbb));
		  background-image: -webkit-linear-gradient(top, #2aabe2, #388cbb);
		  background-image: -o-linear-gradient(top, #2aabe2, #388cbb);
		  background-image: linear-gradient(to bottom, #2aabe2, #388cbb);
		  background-image: -moz-linear-gradient(top, #2aabe2, #388cbb);
		  background-repeat: repeat-x;
		  border-color: #0044cc #0044cc #002a80;
		  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
		  filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
		  filter: progid:dximagetransform.microsoft.gradient(enabled=false);
	}
	
	</style>
</head>

  <body style="padding-bottom: 0px;">
	<div class="jumbotron subhead customer" id="overview">
		<div id="header">
			<div class="l_box">
			</div>
			<div class="cl"></div>
		</div>
	</div>
			<div class="navbar">
				<div class="navbar-inner">
					<ul class="nav">
						<?php $active = Yii::app()->getController()->getAction()->id;?>
						<li<?php if(Yii::app()->getController()->id == 'report'){echo ' class="active"';}?>><?php echo CHtml::link('Home',array('report/index'));?></li>
						<?php if(!Yii::app()->user->isGuest && (Yii::app()->user->name=='Dickie' || Yii::app()->user->name=='Caroline')){?>
						<li<?php if(Yii::app()->getController()->id == 'user'){echo ' class="active"';}?>><?php echo CHtml::link('Users',array('user/admin'));?></li>
						<li<?php if(Yii::app()->getController()->id == 'hotel'){echo ' class="active"';}?>><?php echo CHtml::link('Hotels',array('hotel/admin'));?></li>
						<li<?php if(Yii::app()->getController()->id == 'room'){echo ' class="active"';}?>><?php echo CHtml::link('Rooms',array('room/admin'));?></li>
						<?php }?>
						<?php if(!Yii::app()->user->isGuest && Yii::app()->user->name =='onsite'){?>
						<li<?php if(Yii::app()->getController()->id == 'onsite' && in_array($active,array('index','search','guestCheckin','checkin'))){echo ' class="active"';}?>><?php echo CHtml::link('Check-in Portal',array('onsite/search'));?></li>
						<li<?php if(Yii::app()->getController()->id == 'onsite' && in_array($active,array('searchGift','guestGift','gift'))){echo ' class="active"';}?>><?php echo CHtml::link('Bose Gift Redemption',array('onsite/searchGift'));?></li>
						<li<?php if(Yii::app()->getController()->id == 'onsite' && in_array($active,array('searchIpad','ipad'))){echo ' class="active"';}?>><?php echo CHtml::link('Amex Card Redemption',array('onsite/searchIpad'));?></li>
						<?php }?>
						<?php if(!Yii::app()->user->isGuest && Yii::app()->user->name =='YYO'){?>
						<li<?php if(Yii::app()->getController()->id == 'onsite' && in_array($active,array('index','search','guestCheckin','checkin'))){echo ' class="active"';}?>><?php echo CHtml::link('Check-in Portal',array('onsite/search'));?></li>
						<?php }?>
						<?php if(!Yii::app()->user->isGuest && Yii::app()->user->name =='BOSE'){?>
						<li<?php if(Yii::app()->getController()->id == 'onsite' && in_array($active,array('searchGift','guestGift','gift'))){echo ' class="active"';}?>><?php echo CHtml::link('Bose Gift Redemption',array('onsite/searchGift'));?></li>
						<?php }?>
						<?php if(!Yii::app()->user->isGuest && in_array(Yii::app()->user->name ,array('Dickie','Caroline','Ramona','Heenal','Hope','Craig','Zoe','Charlene','Lauren','Lynne','Kerry','Cindy','Laura','Holly','Jackie','Nicole','Melissa','Sophie'))){?>
						<li<?php if(Yii::app()->getController()->id == 'onsite' && in_array($active,array('searchIpad','ipad'))){echo ' class="active"';}?>><?php echo CHtml::link('Amex Card Redemption',array('onsite/searchIpad'));?></li>
						<?php }?>
					</ul>
				</div>
			</div>
	<div style="clear:both;"></div>
	<?php echo $content;?>

  </body>
</html>
