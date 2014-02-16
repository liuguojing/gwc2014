<?php 
function formatCost($cost){
	$format = new CNumberFormatter('EN');
	return $format->format('#,##0.00', $cost);
}
$date_number=0;
?>
<div class="container top">
		<div class="row">
			<div class="span12">
				<p>
					<div class="btn-group" style="text-align:center">
					
					<?php foreach(Hotel::model()->getHotelNames() as $hotelName){?>
					<?php echo CHtml::link($hotelName,array('report/housing','hotel'=>$hotelName),array('class'=>$hotel==$hotelName?'btn active':'btn'));?>
					<?php }?>
					</div>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped" style="max-width:2000px">
					<caption>
						<h1>Housing Report</h1>
					</caption>
					<thead>
						<tr>
							<th width="140px">Pickup</th>
							<?php foreach($dates as $date){?>
							<th><?php echo date('M/d/Y',strtotime($date));?></th>
							<?php }?>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($typeResult as $type=>$item){?>
						<tr class="success">
							<td><?php echo empty($type)?"untitled":$type;?></td>
							<?php foreach($dates as $date){?>
							<td></td>
							<?php }?>
							<td></td>
						</tr>
						
						<?php 
						foreach($item as $hotel_type=>$pickup){ 
							$tmpTotal = 0;
						?>
						<tr>
							<td><?php echo empty($hotel_type)?"untitled":$hotel_type;?></td>
							<?php foreach($dates as $date){?>
							<td>
								<?php 
								if (isset($pickup[$date])){ 
									echo CHtml::link($pickup[$date],array('report/housinguser','type'=>$type,'date'=>$date,'hotel_type'=>$hotel_type));
									$tmpTotal+=$pickup[$date];
								}else{
									echo 0;
								}?>
							</td>
							<?php }?>
							<td><?php echo $tmpTotal;?></td>
						</tr>
						<?php }?>
						
						<?php }?>
					</tbody>
				</table>
			</div>
			
			<div class="span12">
				<table class="table table-bordered table-hover" style="max-width:2000px">
					<caption>
						<h1>Housing Summary Report</h1>
					</caption>
					<thead>
						<tr>
							<th width="140px"></th>
							<?php foreach($dates as $date){?>
							<th><?php echo date('M/d/Y',strtotime($date));$date_number++;?></th>
							<?php }?>
							<th>Total</th>
							<th>Attriton Rate</th>
							<th>Total</th>
							<th>Pick-up rate</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$tmpPTotal = 0;
						$tmpOTotal = 0;
						
						 foreach($blocks as $type=>$block){?>
						<tr class="">
							<td><?php echo empty($type)?"untitled":$type;?></td>
							<?php 
							    $hotelType=$hotel.' - '.$type;
								$tmpTotal = 0;
								foreach($dates as $date){
									$date = date('M/d/Y',strtotime($date));
							?>
							<td><?php if (isset($block[$date])){ echo $block[$date];$tmpTotal+=$block[$date];}else{echo 0;};?></td>
							<?php }?>
							<td><?php echo $tmpTotal;?></td>
							<td><?php echo isset($attritonRates[$type])?"$".$attritonRates[$type]:0?></td>
							<td><?php echo isset($attritonRates[$type])?"$".formatCost($attritonRates[$type] * $tmpTotal):0?></td>
							<td></td>
							<td></td>
						</tr>
						<?php $tmpOTotal+= $attritonRates[$type] * $tmpTotal; ?>
						<tr class="">
							<td>Pickup</td>
							<?php 
								$tmpTotal = 0;
								foreach($dates as $date){?>
							<td><?php if (isset($totalResult[$hotelType][$date])){ echo $totalResult[$hotelType][$date];$tmpTotal+=$totalResult[$hotelType][$date];}else{echo 0;};?></td>
							<?php 
							
							}?>
							<td><?php echo $tmpTotal;?></td>
							<td></td>
							<td></td>
							<td><?php echo isset($sellRates[$type])?"$".$sellRates[$type]:0?></td>
							<td><?php echo isset($sellRates[$type])?"$".formatCost($sellRates[$type] * $tmpTotal):0?></td>
						</tr>
						<?php $tmpPTotal+= $sellRates[$type] * $tmpTotal; ?>
						<tr class="success">
							<td>Total +/-</td>
							<?php 
								$tmpTotal = 0;
								foreach($dates as $date){
									
							?>
							<td>
								<?php
								$block_number =  isset($block[date('M/d/Y',strtotime($date))])?$block[date('M/d/Y',strtotime($date))]:0;
								$pickup_number = isset($totalResult[$hotelType][$date])?$totalResult[$hotelType][$date]:0;
								$tmpTotal += $block_number - $pickup_number;
								echo $block_number - $pickup_number;
								
								?>
							</td>
							<?php }?>
							<td><?php echo $tmpTotal;?></td>
							<td><?php echo isset($attritonRates[$type])?"$".$attritonRates[$type]:0?></td>
							<td><?php echo isset($attritonRates[$type])?"$".formatCost($attritonRates[$type] * $tmpTotal):0?></td>
							<td></td>
							<td></td>
						</tr>
						<?php }?>
						<tr><td colspan=<?php echo $date_number+3 ?>>Total</td><td><?php echo "$".formatCost($tmpOTotal);?></td><td></td><td><?php echo "$".formatCost($tmpPTotal);?></td></tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>