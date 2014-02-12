<?php 




$cottagePie = array();
$cod = array();
$ravioli = array();
$other = array();
$total = array();
foreach($users as $user){
	if($user->gala_dinner_menu == 'Meat'){
		if($user->gala_dinner_vip=='Gala Dinner VIP'){
			if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($cottagePie['VIP'])){
				$cottagePie['VIP']++;
			}else{
				$cottagePie['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($cottagePie['VIP1'])){
				$cottagePie['VIP1']++;
			}else{
				$cottagePie['VIP1']=1;
			}
		  	
		  	}
		}else{
			if($user->type == 'Gartner Crew'){
				if(isset($cottagePie['Gartner Crew'])){
					$cottagePie['Gartner Crew']++;
				}else{
					$cottagePie['Gartner Crew']=1;
				}
			}else{
				if(isset($cottagePie[$user->team_dinner])){
					$cottagePie[$user->team_dinner]++;
				}else{
					$cottagePie[$user->team_dinner]=1;
				}
			}
		}
	}elseif($user->gala_dinner_menu == 'Fish'){
		if($user->gala_dinner_vip=='Gala Dinner VIP'){
			
			if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($cod['VIP'])){
				$cod['VIP']++;
			}else{
				$cod['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($cod['VIP1'])){
				$cod['VIP1']++;
			}else{
				$cod['VIP1']=1;
			}
		  	
		  	}
		}else{
			if($user->type == 'Gartner Crew'){
				if(isset($cod['Gartner Crew'])){
					$cod['Gartner Crew']++;
				}else{
					$cod['Gartner Crew']=1;
				}
			}else{
				if(isset($cod[$user->team_dinner])){
					$cod[$user->team_dinner]++;
				}else{
					$cod[$user->team_dinner]=1;
				}
			}
		}
	}elseif($user->gala_dinner_menu == 'Vegetarian'){
		if($user->gala_dinner_vip=='Gala Dinner VIP'){
			if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($ravioli['VIP'])){
				$ravioli['VIP']++;
			}else{
				$ravioli['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($ravioli['VIP1'])){
				$ravioli['VIP1']++;
			}else{
				$ravioli['VIP1']=1;
			}
		  	
		  	}
		}else{
			if($user->type == 'Gartner Crew'){
				if(isset($ravioli['Gartner Crew'])){
					$ravioli['Gartner Crew']++;
				}else{
					$ravioli['Gartner Crew']=1;
				}
			}else{
				if(isset($ravioli[$user->team_dinner])){
					$ravioli[$user->team_dinner]++;
				}else{
					$ravioli[$user->team_dinner]=1;
				}
			}
		}
	}
	
	if($user->gala_dinner_vip=='Gala Dinner VIP'){
		if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($total['VIP'])){
				$total['VIP']++;
			}else{
				$total['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($total['VIP1'])){
				$total['VIP1']++;
			}else{
				$total['VIP1']=1;
			}
		  	
		  	}
	}else{
		if($user->type == 'Gartner Crew'){
			if(isset($total['Gartner Crew'])){
				$total['Gartner Crew']++;
			}else{
				$total['Gartner Crew']=1;
			}
		}else{
			if(isset($total[$user->team_dinner])){
				$total[$user->team_dinner]++;
			}else{
				$total[$user->team_dinner]=1;
			}
		}
	}
	
}

foreach($guests as $guest){
	if($guest->gala_dinner_menu == 'Meat'){
		if($guest->user->gala_dinner_vip=='Gala Dinner VIP'){
			if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($cottagePie['VIP'])){
				$cottagePie['VIP']++;
			}else{
				$cottagePie['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($cottagePie['VIP1'])){
				$cottagePie['VIP1']++;
			}else{
				$cottagePie['VIP1']=1;
			}
		  	
		  	}
		}else{
			if(isset($cottagePie[$guest->user->team_dinner])){
				$cottagePie[$guest->user->team_dinner]++;
			}else{
				$cottagePie[$guest->user->team_dinner]=1;
			}
		}
	}elseif($guest->gala_dinner_menu == 'Fish'){
		if($guest->user->gala_dinner_vip=='Gala Dinner VIP'){
			if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($cod['VIP'])){
				$cod['VIP']++;
			}else{
				$cod['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($cod['VIP1'])){
				$cod['VIP1']++;
			}else{
				$cod['VIP1']=1;
			}
		  	
		  	}
		}else{
			if(isset($cod[$guest->user->team_dinner])){
				$cod[$guest->user->team_dinner]++;
			}else{
				$cod[$guest->user->team_dinner]=1;
			}
		}
	}elseif($guest->gala_dinner_menu == 'Vegetarian'){
		if($guest->user->gala_dinner_vip=='Gala Dinner VIP'){
			if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($ravioli['VIP'])){
				$ravioli['VIP']++;
			}else{
				$ravioli['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($ravioli['VIP1'])){
				$ravioli['VIP1']++;
			}else{
				$ravioli['VIP1']=1;
			}
		  	
		  	}
		}else{
			if(isset($ravioli[$guest->user->team_dinner])){
				$ravioli[$guest->user->team_dinner]++;
			}else{
				$ravioli[$guest->user->team_dinner]=1;
			}
		}
	}
	
	if($guest->user->gala_dinner_vip=='Gala Dinner VIP'){
		if (in_array($user->team_dinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
			{
			if(isset($total['VIP'])){
				$total['VIP']++;
			}else{
				$total['VIP']=1;
			}
		  }
		  else
		  {
		  	if(isset($total['VIP1'])){
				$total['VIP1']++;
			}else{
				$total['VIP1']=1;
			}
		  	
		  	}
	}else{
		if(isset($total[$guest->user->team_dinner])){
			$total[$guest->user->team_dinner]++;
		}else{
			$total[$guest->user->team_dinner]=1;
		}
	}
	
}
?>
<div class="container top">
		<div class="row">
			<div class="span12" style="text-align:center;">
				<h1>Gala Dinner</h1>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<caption>
						
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
						<?php foreach(User::model()->teamDinnerListI() as $key=>$teamdinner){
							if(!empty($key)){
							if (in_array($teamdinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales'))){ 	?>
						<tr>
							<td><?php echo $teamdinner?></td>
							<td><?php echo isset($total[$teamdinner])?CHtml::link($total[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($cottagePie[$teamdinner])?CHtml::link($cottagePie[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($cod[$teamdinner])?CHtml::link($cod[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($ravioli[$teamdinner])?CHtml::link($ravioli[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
						<?php }}}?>
						<tr>
							<td><?php echo "VIP"?></td>
							<td><?php echo isset($total['VIP'])?CHtml::link($total['VIP'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($cottagePie['VIP'])?CHtml::link($cottagePie['VIP'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($cod['VIP'])?CHtml::link($cod['VIP'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($ravioli['VIP'])?CHtml::link($ravioli['VIP'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
					<!--	<tr>
							<td><?php echo "Gartner Crew"?></td>
							<td><?php echo isset($total['Gartner Crew'])?CHtml::link($total['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($cottagePie['Gartner Crew'])?CHtml::link($cottagePie['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($cod['Gartner Crew'])?CHtml::link($cod['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($ravioli['Gartner Crew'])?CHtml::link($ravioli['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
							-->
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
						<?php foreach(User::model()->teamDinnerListI() as $key=>$teamdinner){
							if(!empty($key)){
							if (!in_array($teamdinner,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales'))){ 	?>
						<tr>
							<td><?php echo $teamdinner?></td>
							<td><?php echo isset($total[$teamdinner])?CHtml::link($total[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($cottagePie[$teamdinner])?CHtml::link($cottagePie[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($cod[$teamdinner])?CHtml::link($cod[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($ravioli[$teamdinner])?CHtml::link($ravioli[$teamdinner],array('report/exportGalaDietary','team_dinner'=>$teamdinner,'gala_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
						<?php }}}?>
						<tr>
							<td><?php echo "VIP"?></td>
							<td><?php echo isset($total['VIP1'])?CHtml::link($total['VIP1'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($cottagePie['VIP1'])?CHtml::link($cottagePie['VIP1'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($cod['VIP1'])?CHtml::link($cod['VIP1'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($ravioli['VIP1'])?CHtml::link($ravioli['VIP1'],array('report/exportGalaDietary','team_dinner'=>'VIP','gala_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
					<!--	<tr>
							<td><?php echo "Gartner Crew"?></td>
							<td><?php echo isset($total['Gartner Crew'])?CHtml::link($total['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'')):0?></td>
							<td><?php echo isset($cottagePie['Gartner Crew'])?CHtml::link($cottagePie['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'Meat')):0?></td>
							<td><?php echo isset($cod['Gartner Crew'])?CHtml::link($cod['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'Fish')):0?></td>
							<td><?php echo isset($ravioli['Gartner Crew'])?CHtml::link($ravioli['Gartner Crew'],array('report/exportGalaDietary','team_dinner'=>'Gartner Crew','gala_dinner_menu'=>'Vegetarian')):0?></td>
						</tr>
							-->
					</tbody>
				</table>
			</div>
		</div>
	</div>
