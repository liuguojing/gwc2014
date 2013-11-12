<?php 
function formatCost($cost){
	$format = new CNumberFormatter('EN');
	return $format->format('#,##0.00', $cost);
}
?>
<div class="container top">
		<div class="row">
			<div class="span12">
				<p>
					<div class="btn-group" style="text-align:center">
					<?php echo CHtml::link('Summary',array('report/housing/summary'),array('class'=>'btn active'));?>
					<?php foreach(Hotel::model()->getHotelNames() as $hotelName){?>
					<?php echo CHtml::link($hotelName,array('report/housing','hotel'=>$hotelName),array('class'=>$hotel==$hotelName?'btn active':'btn'));?>
					<?php }?>
					</div>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover" style="max-width:2000px">
					<caption>
						<h1>Housing Summary Report</h1>
					</caption>
					<thead>
						<tr>
							<th>Hotel Name</th>
							<th>Total</th>
							<th>Pick-up Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Shangri-La</td>
							<td><?php echo "$".formatCost($ShangriLa_total1)?></td>
							<td><?php echo "$".formatCost($ShangriLa_total2)?></td>
						</tr>
						<tr>
							<td>Hilton</td>
							<td><?php echo "$".formatCost($Hilton_total1)?></td>
							<td><?php echo "$".formatCost($Hilton_total2)?></td>
						</tr>
						<tr>
							<td>Sheraton</td>
							<td><?php echo "$".formatCost($Sheraton_total1)?></td>
							<td><?php echo "$".formatCost($Sheraton_total2)?></td>
						</tr>
						<tr class="success">
							<td>Total</td>
							<td><?php echo "$".formatCost($total1)?></td>
							<td><?php echo "$".formatCost($total2)?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>