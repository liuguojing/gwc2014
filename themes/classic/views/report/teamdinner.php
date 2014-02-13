<?php 
$meat = array();
$fish = array();
$vegetarian = array();
$other = array();
$total = array();
foreach($users as $user){
	if($user->team_dinner_menu == 'Meat'){
		if(isset($meat[$user->team_dinner])){
			$meat[$user->team_dinner]++;
		}else{
			$meat[$user->team_dinner]=1;
		}
	}elseif($user->team_dinner_menu == 'Fish'){
		if(isset($fish[$user->team_dinner])){
			$fish[$user->team_dinner]++;
		}else{
			$fish[$user->team_dinner]=1;
		}
	}elseif($user->team_dinner_menu == 'Vegetarian'){
		if(isset($vegetarian[$user->team_dinner])){
			$vegetarian[$user->team_dinner]++;
		}else{
			$vegetarian[$user->team_dinner]=1;
		}
	}
	
	if(isset($total[$user->team_dinner])){
		$total[$user->team_dinner]++;
	}else{
		$total[$user->team_dinner]=1;
	}
	
}
foreach($guests as $guest){
	if($guest->team_dinner_menu == 'Meat'){
		if(isset($meat[$guest->user->team_dinner])){
			$meat[$guest->user->team_dinner]++;
		}else{
			$meat[$guest->user->team_dinner]=1;
		}
	}elseif($guest->team_dinner_menu == 'Fish'){
		if(isset($fish[$guest->user->team_dinner])){
			$fish[$guest->user->team_dinner]++;
		}else{
			$fish[$guest->user->team_dinner]=1;
		}
	}elseif($guest->team_dinner_menu == 'Vegetarian'){
		if(isset($vegetarian[$guest->user->team_dinner])){
			$vegetarian[$guest->user->team_dinner]++;
		}else{
			$vegetarian[$guest->user->team_dinner]=1;
		}
	}
	
	if(isset($total[$guest->user->team_dinner])){
		$total[$guest->user->team_dinner]++;
	}else{
		$total[$guest->user->team_dinner]=1;
	}
	
}
?>
<div class="container top">
		<div class="row">
			<div class="span8 offset2">
				<p>
				
				</p>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<caption>
						<h1>Team Dinner</h1>
					</caption>
					<thead>
						<tr>
							<th colspan=5>Friday</th>
						</tr>
						<tr>
							<th>Type</th><th>Total</th><th>Meat</th><th>Fish</th><th>Vegetarian</th>
						</tr>
					</thead>
					<tbody>
						<?php 
									$total1=0;
							  	$total2=0;
							  	$total3=0;
							  	$total4=0;
						
						foreach(User::model()->teamDinnerListI() as $key=>$teamdinner){
								if(!empty($key)){
							  if (!in_array($teamdinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales'))){ 
							  	$total1+=isset($total[$teamdinner])?$total[$teamdinner]:0;
							  	$total2+=isset($meat[$teamdinner])?$meat[$teamdinner]:0;
							  	$total3+=isset($fish[$teamdinner])?$fish[$teamdinner]:0;
							  	$total4+=isset($vegetarian[$teamdinner])?$vegetarian[$teamdinner]:0;
							  			?>
						<tr>
							<td><?php echo $teamdinner?>
							</td><td><?php echo isset($total[$teamdinner])?CHtml::link($total[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($meat[$teamdinner])?CHtml::link($meat[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($fish[$teamdinner])?CHtml::link($fish[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($vegetarian[$teamdinner])?CHtml::link($vegetarian[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
						<?php }}}?>
						<tr>
							<td>Subtotal
							</td><td><?php echo isset($total1)?CHtml::link($total1,array('report/exportTeamDietary','team_dinner'=>'Friday','team_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($total2)?CHtml::link($total2,array('report/exportTeamDietary','team_dinner'=>'Friday','team_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($total3)?CHtml::link($total3,array('report/exportTeamDietary','team_dinner'=>'Friday','team_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($total4)?CHtml::link($total4,array('report/exportTeamDietary','team_dinner'=>'Friday','team_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
						
						
					</tbody>
					
					<thead>
						<tr>
							<th colspan=5>Sunday</th>
						</tr>
						<tr>
							<th>Type</th><th>Total</th><th>Meat</th><th>Fish</th><th>Vegetarian</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$total1=0;
							  	$total2=0;
							  	$total3=0;
							  	$total4=0;
						
						 foreach(User::model()->teamDinnerListI() as $key=>$teamdinner){
								if(!empty($key)){
							  if (in_array($teamdinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales'))){ 
							  	$total1+=isset($total[$teamdinner])?$total[$teamdinner]:0;
							  	$total2+=isset($meat[$teamdinner])?$meat[$teamdinner]:0;
							  	$total3+=isset($fish[$teamdinner])?$fish[$teamdinner]:0;
							  	$total4+=isset($vegetarian[$teamdinner])?$vegetarian[$teamdinner]:0;
							  	
							  	
							  			?>
						<tr>
							<td><?php echo $teamdinner?>
							</td><td><?php echo isset($total[$teamdinner])?CHtml::link($total[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($meat[$teamdinner])?CHtml::link($meat[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($fish[$teamdinner])?CHtml::link($fish[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($vegetarian[$teamdinner])?CHtml::link($vegetarian[$teamdinner],array('report/exportTeamDietary','team_dinner'=>$teamdinner,'team_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
						
						<?php }}}
						
						
						
						
						?>
						<tr>
							<td>Subtotal
							</td><td><?php echo isset($total1)?CHtml::link($total1,array('report/exportTeamDietary','team_dinner'=>'Sunday','team_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($total2)?CHtml::link($total2,array('report/exportTeamDietary','team_dinner'=>'Sunday','team_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($total3)?CHtml::link($total3,array('report/exportTeamDietary','team_dinner'=>'Sunday','team_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($total4)?CHtml::link($total4,array('report/exportTeamDietary','team_dinner'=>'Sunday','team_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
