<?php 
$totalcount = array();
$totalcount1 = array();
$totalcount2 = array();
$totalcount3 = array();
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
						<h1>Team Dinner Dietary Report</h1>
					</caption>
					<thead>
						<tr>
							<th>Friday</th>
							<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
							<th><?php echo $dinner;?></th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($teamDinners as $team=>$teamDinner){
							if (!in_array($team,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
							{
							?>
						<tr>
							<td><?php echo $team?></td>
							<?php foreach($list as $dinner){?>
							<td><?php echo isset($teamDinner[$dinner])?CHtml::link($teamDinner[$dinner],array('report/exportTeamDietary','team_dinner'=>$team,'dietary'=>$dinner)):"0";
								if(isset($totalcount[$dinner])){
									$totalcount[$dinner]+=isset($teamDinner[$dinner])?$teamDinner[$dinner]:0;
								}else{
									$totalcount[$dinner]=isset($teamDinner[$dinner])?$teamDinner[$dinner]:0;
								}
								
								?></td>
							<?php }?>
						</tr>
						<?php }}?>
						<tr><td>Subtotal</td>
						<?php $list1 = User::model()->getDietaryOptions();
							foreach($list1 as $dinner1){?>
								<td><?php echo isset($totalcount[$dinner1])?CHtml::link($totalcount[$dinner1],array('report/exportTeamDietary','team_dinner'=>'Friday','dietary'=>$dinner1)):"0";?></td>
						<?php }?>		
					</tr>
					</tbody>
					<thead>
						<tr>
							<th>Sunday</th>
							<?php $list = User::model()->getDietaryOptions(); 
							
							foreach($list as $dinner){?>
							<th><?php echo $dinner;?></th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($teamDinners as $team=>$teamDinner){
							if (in_array($team,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales')))
							{
							?>
						<tr>
							<td><?php echo $team?></td>
							<?php foreach($list as $dinner){?>
							<td><?php echo isset($teamDinner[$dinner])?CHtml::link($teamDinner[$dinner],array('report/exportTeamDietary','team_dinner'=>$team,'dietary'=>$dinner)):"0";
								if(isset($totalcount1[$dinner])){
									$totalcount1[$dinner]+=isset($teamDinner[$dinner])?$teamDinner[$dinner]:0;
								}else{
									$totalcount1[$dinner]=isset($teamDinner[$dinner])?$teamDinner[$dinner]:0;
								}
								
								?></td>
							<?php }?>
						</tr>
						<?php }}?>
						<tr><td>Subtotal</td>
						<?php $list1 = User::model()->getDietaryOptions();
							foreach($list1 as $dinner1){?>
								<td><?php echo isset($totalcount1[$dinner1])?CHtml::link($totalcount1[$dinner1],array('report/exportTeamDietary','team_dinner'=>'Sunday','dietary'=>$dinner1)):"0";?></td>
						<?php }?>		
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<caption>
						<h1>Gala Dietary Report</h1>
					</caption>
					<thead>
						<tr>
							<th>Friday</th>
							<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
							<th><?php echo $dinner;?></th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($galaDinners as $team=>$galaDinner){
							if (in_array($team,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales'))){
							?>
						<tr>
							<td><?php echo $team?></td>
							<?php foreach($list as $dinner){?>
							<td><?php echo isset($galaDinner[$dinner])?CHtml::link($galaDinner[$dinner],array('report/exportGalaDietary','team_dinner'=>$team,'dietary'=>$dinner)):"0";?></td>
							<?php
							if(isset($totalcount2[$dinner])){
									$totalcount2[$dinner]+=isset($galaDinner[$dinner])?$galaDinner[$dinner]:0;
								}else{
									$totalcount2[$dinner]=isset($galaDinner[$dinner])?$galaDinner[$dinner]:0;
								}

							 }?>
						</tr>
						<?php }}?>
						<tr><td>VIP</td>
						<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
								<td><?php echo isset($galaDinners['VIP'][$dinner])?CHtml::link($galaDinners['VIP'][$dinner],array('report/exportGalaDietary','team_dinner'=>'VIP','dietary'=>$dinner)):"0";?></td>
						<?php 
						if(isset($totalcount2[$dinner])){
									$totalcount2[$dinner]+=isset($galaDinners['VIP'][$dinner])?$galaDinners['VIP'][$dinner]:0;
								}else{
									$totalcount2[$dinner]=isset($galaDinners['VIP'][$dinner])?$galaDinners['VIP'][$dinner]:0;
								}
						}?>		
					</tr>
						<tr><td>Subtotal</td>
						<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
								<td><?php echo isset($totalcount2[$dinner])?CHtml::link($totalcount2[$dinner],array('report/exportGalaDietary','team_dinner'=>'Friday','dietary'=>$dinner)):"0";?></td>
						<?php }?>		
					</tr>
					</tbody>
					<thead>
						<tr>
							<th>Sunday</th>
							<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
							<th><?php echo $dinner;?></th>
							<?php }?>
						</tr>
					</thead>
					<tbody>
						<?php foreach($galaDinners as $team=>$galaDinner){
							if (!in_array($team,array('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales','VIP','VIP1'))){
							?>
						<tr>
							<td><?php echo $team?></td>
							<?php foreach($list as $dinner){?>
							<td><?php echo isset($galaDinner[$dinner])?CHtml::link($galaDinner[$dinner],array('report/exportGalaDietary','team_dinner'=>$team,'dietary'=>$dinner)):"0";?></td>
							<?php
							if(isset($totalcount3[$dinner])){
									$totalcount3[$dinner]+=isset($galaDinner[$dinner])?$galaDinner[$dinner]:0;
								}else{
									$totalcount3[$dinner]=isset($galaDinner[$dinner])?$galaDinner[$dinner]:0;
								}

							 }?>
						</tr>
						<?php }}?>
						<tr><td>VIP</td>
						<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
								<td><?php echo isset($galaDinners['VIP1'][$dinner])?CHtml::link($galaDinners['VIP1'][$dinner],array('report/exportGalaDietary','team_dinner'=>'VIP1','dietary'=>$dinner)):"0";?></td>
						<?php 
						if(isset($totalcount3[$dinner])){
									$totalcount3[$dinner]+=isset($galaDinners['VIP1'][$dinner])?$galaDinners['VIP1'][$dinner]:0;
								}else{
									$totalcount3[$dinner]=isset($galaDinners['VIP1'][$dinner])?$galaDinners['VIP1'][$dinner]:0;
								}
						}?>		
					</tr>
						<tr><td>Subtotal</td>
						<?php $list = User::model()->getDietaryOptions();
							foreach($list as $dinner){?>
								<td><?php echo isset($totalcount3[$dinner])?CHtml::link($totalcount3[$dinner],array('report/exportGalaDietary','team_dinner'=>'Sunday','dietary'=>$dinner)):"0";?></td>
						<?php }?>		
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>