<div class="container top">
		<div class="row">
			<div class="span12" style="text-align:center">
				<h1>GALA DINNER MEAL OPTIONS</h1>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th></th>
							<th>Meat</th>
							<th>Fish</th>
							<th>Vegetarian</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($meals as $table_no=>$menu){
								$subTotal=0;?>
						<tr>
							<td><?php echo $table_no?></td>
							<td><?php if(isset($menu['Meat'])){$subTotal+=$menu['Meat'];echo $menu['Meat'];}else{echo '0';}?></td>
							<td><?php if(isset($menu['Fish'])){$subTotal+=$menu['Fish'];echo $menu['Fish'];}else{echo '0';}?></td>
							<td><?php if(isset($menu['Vegetarian'])){$subTotal+=$menu['Vegetarian'];echo $menu['Vegetarian'];}else{echo '0';}?></td>
							<td><?php echo CHtml::link($subTotal,array('exportGalaDietary','table_no'=>$table_no));?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>