<div class="container top">
	<div class="row">
		<div class="span8 offset2" style="text-align:center;margin-bottom:10px;">
			<h1>Printers Report</h1>
			<span><?php echo CHtml::link('Download',array('report/printers','download'=>1),array('class'=>'btn btn-info btn-large','style'=>'float:right;'))?></span>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Participant Type</th><th>First Name</th><th>Last Name</th><th>Preferred Name</th><th>Gala Dinner</th>
					</tr>
				</thead>
				<tr>
					
				
				<?php foreach($users as $user){?>
				<tr>
					<td><?php echo $user->type;?></td>
					<td><?php echo $user->first_name;?></td>
					<td><?php echo $user->last_name;?></td>
					<td><?php echo $user->preferred_name;?></td>
					
					<?php 
					  $hotel_assign="Sheraton";
$team_dinner='Friday April 11 2014';
$gala_dinner='Sunday April 13 2014';

if (in_array($user->team_dinner,array('Americas Major Accounts - EU Public Sector','Americas Major Accounts - HTTP East','Americas Major Accounts - HTTP West','Americas Major Accounts - Northeast EU/Invest','Americas Major Accounts - Northwest EU','Americas Major Accounts - South EU','Americas Major Accounts - Brazil Sales','Americas Major Accounts - Supply Chain','Americas SAO')))
{
	$hotel_assign='Sheraton';
	$team_dinner='Friday April 11 2014';
	$gala_dinner='Sunday April 13 2014';
}

if (in_array($user->team_dinner,array('Europe Sales','Event Sales'))){
	$hotel_assign='Hilton'; 
	if ($user->team_dinner=='Europe Sales') {
	$team_dinner='Sunday April 13 2014';
	$gala_dinner='Friday April 11 2014';	
}else{
	$team_dinner='Friday April 11 2014';
	$gala_dinner='Sunday April 13 2014';

}
}


if (in_array($user->team_dinner,array('ANZ','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales','Specialists')))
{ $hotel_assign='Shangri-La';
	if (in_array($user->team_dinner,array('Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
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
					
					
					<td><?php echo $gala_dinner;?></td>
				</tr>
				<?php if($user->has_guest==1 && $user->guest){?>
				<tr>
					<td>Guest</td>
					<td><?php echo $user->guest->first_name;?></td>
					<td><?php echo $user->guest->last_name;?></td>
					<td><?php echo $user->guest->preferred_name;?></td>
					<td><?php echo $gala_dinner;?></td>
				</tr>
				<?php }}?>
			</table>
		</div>
	</div>
</div>

