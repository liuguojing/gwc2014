<div class="container top">
		<div class="row">
			<div class="span12" style="text-align:center">
				<h1>Query Comment</h1>
				<div class="btn-group">
					<?php foreach(Query::model()->getTravelCommentStatus() as $comment_status){?>
					<?php echo CHtml::link($comment_status,array('report/QueryComment','status'=>$comment_status),array('class'=>$status==$comment_status?'btn active':'btn'));?>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span12">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>Query Information</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($users as $user){?>
						<tr>
							<td>
							<table class="table table-bordered table-hover table-striped">
							<tr><td>Authorised By</td><td colspan=3><?php echo $user->staff_name?></td>
								
							</tr>	
							<tr><td>Full Name</td><td><?php echo $user->full_name?></td>
								<td>Contact Telephone</td><td><?php echo $user->contact_telephone?></td>
							</tr>
							<tr>
								<td>Contact Email</td><td><?php echo $user->contact_email?></td>
								<td>Hotel / Room Number</td><td><?php echo $user->hotel?></td>	
							</tr>
							<tr>
								<td>NATURE OF QUERY</td><td colspan=3><?php echo $user->nature?></td>								
							</tr>
							<tr>
								<td>Details Of Query</td><td colspan=3><?php echo $user->details?></td>								
							</tr>
							<tr>
								<td>Outcome Of Query</td><td colspan=3><?php echo $user->outcome?></td>								
							</tr>
							<tr>
								<td>Comment</td><td colspan=3><?php echo $user->comment?></td>								
							</tr>
							</table>	
						</td>
							<td><?php echo CHtml::link('update',array('report/updateQueryComment','id'=>$user->id));?>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>