<?php 
function formatCost($cost){
	$format = new CNumberFormatter('EN');
	return $format->format('#,##0.00', $cost);
}
$total1=0;
$total2=0;
?>
<div class="container top">
		<div class="row">
			<div class="span12">
				<p>
					<div class="btn-group" style="text-align:center">
					<a class="btn active" href="/gwc2014/index.php/report/housing?hotel=summary">Summary</a>
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
						<?php 
						echo $ShangriLa_total1."-".$ShangriLa_total2;?>
							<th>Total</th>
							<th>Attriton Rate</th>
							<th>Total</th>
							<th>Pick-up rate</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>