<div class="container top">
	<div class="row">
		<div class="span12">
			<h1>Onsite Registration Reports</h1>
			<?php $formatter = new CNumberFormatter('EN');?>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<table id="table" class="table table-bordered table-hover table-striped">
				<caption>
				</caption>
				<thead>
					<tr>
						<th width="120px;">Category</th><th>Registered</th><th>Attended</th><th>Percent</th><th>Guest Registered</th><th>Gueest Attended</th><th>Percent</th><th>Total Registered</th><th>Total Attended</th><th>Percent</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Top Achievers</td>
						<td><?php echo $users['Top Achievers']['r'];?></td>
						<td><?php echo $users['Top Achievers']['a'];?></td>
						<td><?php echo $users['Top Achievers']['r']==0?'':$formatter->format('#,##0.00',$users['Top Achievers']['a'] * 100/$users['Top Achievers']['r']);?>%</td>
						<td><?php echo $guests['Top Achievers']['r'];?></td>
						<td><?php echo $guests['Top Achievers']['a'];?></td>
						<td><?php echo $guests['Top Achievers']['r']==0?'':$formatter->format('#,##0.00',$guests['Top Achievers']['a'] * 100/$guests['Top Achievers']['r']);?>%</td>
						<td><?php echo $guests['Top Achievers']['r']+$users['Top Achievers']['r'];?></td>
						<td><?php echo $guests['Top Achievers']['a']+$users['Top Achievers']['a'];?></td>
						<td><?php echo $guests['Top Achievers']['r']+$users['Top Achievers']['r']==0?'':$formatter->format('#,##0.00',($users['Top Achievers']['a'] +$guests['Top Achievers']['a']) * 100/($users['Top Achievers']['r']+$guests['Top Achievers']['r']));?>%</td>
					<tr>
					<tr>
						<td>Eagles</td>
						<td><?php echo $users['Eagles']['r'];?></td>
						<td><?php echo $users['Eagles']['a'];?></td>
						<td><?php echo $users['Eagles']['r']==0?'':$formatter->format('#,##0.00',$users['Eagles']['a'] * 100/$users['Eagles']['r']);?>%</td>
						<td><?php echo $guests['Eagles']['r'];?></td>
						<td><?php echo $guests['Eagles']['a'];?></td>
						<td><?php echo $guests['Eagles']['r']==0?'':($guests['Eagles']['a'] * 100/$guests['Eagles']['r']);?>%</td>
						<td><?php echo $guests['Eagles']['r']+$users['Eagles']['r'];?></td>
						<td><?php echo $guests['Eagles']['a']+$users['Eagles']['a'];?></td>
						<td><?php echo $guests['Eagles']['r']+$users['Eagles']['r']==0?'':$formatter->format('#,##0.00',($users['Eagles']['a'] +$guests['Eagles']['a']) * 100/($users['Eagles']['r']+$guests['Eagles']['r']));?>%</td>
					<tr>
						<td>Winners</td>
						<td><?php echo $users['Winners']['r'];?></td>
						<td><?php echo $users['Winners']['a'];?></td>
						<td><?php echo $users['Winners']['r']==0?'':$formatter->format('#,##0.00',$users['Winners']['a'] * 100/$users['Winners']['r']);?>%</td>
						<td><?php echo $guests['Winners']['r'];?></td>
						<td><?php echo $guests['Winners']['a'];?></td>
						<td><?php echo $guests['Winners']['a']==0?'':$formatter->format('#,##0.00',$guests['Winners']['r'] * 100/$guests['Winners']['a']);?>%</td>
						<td><?php echo $guests['Winners']['r']+$users['Winners']['r'];?></td>
						<td><?php echo $guests['Winners']['a']+$users['Winners']['a'];?></td>
						<td><?php echo $guests['Winners']['r']+$users['Winners']['r']==0?'':$formatter->format('#,##0.00',($users['Winners']['a'] +$guests['Winners']['a']) * 100/($users['Winners']['r']+$guests['Winners']['r']));?>%</td>
					<tr>
						<td>Host GVP</td>
						<td><?php echo $users['Host GVP']['r'];?></td>
						<td><?php echo $users['Host GVP']['a'];?></td>
						<td><?php echo $users['Host GVP']['r']==0?'':$formatter->format('#,##0.00',$users['Host GVP']['a'] * 100/$users['Host GVP']['r']);?>%</td>
						<td><?php echo $guests['Host GVP']['r'];?></td>
						<td><?php echo $guests['Host GVP']['a'];?></td>
						<td><?php echo $guests['Host GVP']['r']==0?'':$formatter->format('#,##0.00',$guests['Host GVP']['a'] * 100/$guests['Host GVP']['r']);?>%</td>
						<td><?php echo $guests['Host GVP']['r']+$users['Host GVP']['r'];?></td>
						<td><?php echo $guests['Host GVP']['a']+$users['Host GVP']['a'];?></td>
						<td><?php echo $guests['Host GVP']['r']+$users['Host GVP']['r']==0?'':$formatter->format('#,##0.00',($users['Host GVP']['a'] +$guests['Host GVP']['a']) * 100/($users['Host GVP']['r']+$guests['Host GVP']['r']));?>%</td>
					<tr>
						<td>Host GEN</td>
						<td><?php echo $users['Host GEN']['r'];?></td>
						<td><?php echo $users['Host GEN']['a'];?></td>
						<td><?php echo $users['Host GEN']['a']==0?'':($users['Host GEN']['r'] * 100/$users['Host GEN']['a']);?>%</td>
						<td><?php echo $guests['Host GEN']['r'];?></td>
						<td><?php echo $guests['Host GEN']['a'];?></td>
						<td><?php echo $guests['Host GEN']['a']==0?'':($guests['Host GEN']['r'] * 100/$guests['Host GEN']['a']);?>%</td>
						<td><?php echo $guests['Host GEN']['r']+$users['Host GEN']['r'];?></td>
						<td><?php echo $guests['Host GEN']['a']+$users['Host GEN']['a'];?></td>
						<td><?php echo $guests['Host GEN']['a']+$users['Host GEN']['a']==0?'':($users['Host GEN']['r'] +$guests['Host GEN']['r']) * 100/($users['Host GEN']['a']+$guests['Host GEN']['a']);?>%</td>
						
					<tr>
						<td>Operating Committee</td>
						<td><?php echo $users['Operating Committee']['r'];?></td>
						<td><?php echo $users['Operating Committee']['a'];?></td>
						<td><?php echo $users['Operating Committee']['r']==0?'':$formatter->format('#,##0.00',$users['Operating Committee']['a'] * 100/$users['Operating Committee']['r']);?>%</td>
						<td><?php echo $guests['Operating Committee']['r'];?></td>
						<td><?php echo $guests['Operating Committee']['a'];?></td>
						<td><?php echo $guests['Operating Committee']['r']==0?'':$formatter->format('#,##0.00',$guests['Operating Committee']['a'] * 100/$guests['Operating Committee']['r']);?>%</td>
						<td><?php echo $guests['Operating Committee']['r']+$users['Operating Committee']['r'];?></td>
						<td><?php echo $guests['Operating Committee']['a']+$users['Operating Committee']['a'];?></td>
						<td><?php echo $guests['Operating Committee']['r']+$users['Operating Committee']['r']==0?'':$formatter->format('#,##0.00',($users['Operating Committee']['a'] +$guests['Operating Committee']['a']) * 100/($users['Operating Committee']['r']+$guests['Operating Committee']['r']));?>%</td>
						
					<tr>
						<td>Gartner Crew</td>
						<td><?php echo $users['Gartner Crew']['r'];?></td>
						<td><?php echo $users['Gartner Crew']['a'];?></td>
						<td><?php echo $users['Gartner Crew']['r']==0?'':$formatter->format('#,##0.00',$users['Gartner Crew']['a'] * 100/$users['Gartner Crew']['r']);?>%</td>
						<td><?php echo $guests['Gartner Crew']['r'];?></td>
						<td><?php echo $guests['Gartner Crew']['a'];?></td>
						<td><?php echo $guests['Gartner Crew']['r']==0?'':($guests['Gartner Crew']['a'] * 100/$guests['Gartner Crew']['r']);?>%</td>
						<td><?php echo $guests['Gartner Crew']['r']+$users['Gartner Crew']['r'];?></td>
						<td><?php echo $guests['Gartner Crew']['a']+$users['Gartner Crew']['a'];?></td>
						<td><?php echo $guests['Gartner Crew']['r']+$users['Gartner Crew']['r']==0?'':$formatter->format('#,##0.00',($users['Gartner Crew']['a'] +$guests['Gartner Crew']['a']) * 100/($users['Gartner Crew']['r']+$guests['Gartner Crew']['r']));?>%</td>
						
					<tr>
						<td>Crew</td>
						<td><?php echo $users['Crew']['r'];?></td>
						<td><?php echo $users['Crew']['a'];?></td>
						<td><?php echo $users['Crew']['r']==0?'':$formatter->format('#,##0.00',$users['Crew']['a'] * 100/$users['Crew']['r']);?>%</td>
						<td><?php echo $guests['Crew']['r'];?></td>
						<td><?php echo $guests['Crew']['a'];?></td>
						<td><?php echo $guests['Crew']['r']==0?'':($guests['Crew']['a'] * 100/$guests['Crew']['r']);?>%</td>
						<td><?php echo $guests['Crew']['r']+$users['Crew']['r'];?></td>
						<td><?php echo $guests['Crew']['a']+$users['Crew']['a'];?></td>
						<td><?php echo $guests['Crew']['r']+$users['Crew']['r']==0?'':$formatter->format('#,##0.00',($users['Crew']['a'] +$guests['Crew']['a']) * 100/($users['Crew']['r']+$guests['Crew']['r']));?>%</td>
						
					<tr>
						<td>TOTAL</td>
							<td><?php echo $users['Total']['r'];?></td>
						<td><?php echo $users['Total']['a'];?></td>
						<td><?php echo $users['Total']['r']==0?'':$formatter->format('#,##0.00',$users['Total']['a'] * 100/$users['Total']['r']);?>%</td>
						<td><?php echo $guests['Total']['r'];?></td>
						<td><?php echo $guests['Total']['a'];?></td>
						<td><?php echo $guests['Total']['r']==0?'':$formatter->format('#,##0.00',$guests['Total']['a'] * 100/$guests['Total']['r']);?>%</td>
						<td><?php echo $guests['Total']['r']+$users['Total']['r'];?></td>
						<td><?php echo $guests['Total']['a']+$users['Total']['a'];?></td>
						<td><?php echo $guests['Total']['r']+$users['Total']['r']==0?'':$formatter->format('#,##0.00',($users['Total']['a'] +$guests['Total']['a']) * 100/($users['Total']['r']+$guests['Total']['r']));?>%</td>
						
				</tbody>
			</table>
			
		</div>
	</div>
	
</div>
    
