<div class="container top">
		<div class="row">
			<div class="span12" style="text-align:center">
				<h1>Travel Comment</h1>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Travel Comment</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $user){?>
						<tr>
							<td><?php echo $user->first_name?></td>
							<td><?php echo $user->last_name?></td>
							<td><?php echo $user->other?></td>
							<td><?php echo CHtml::link('update',array('report/updateTravelComment','id'=>$user->id));?>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>