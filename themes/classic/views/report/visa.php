<div class="container top">
	<div class="row">
		<div class="span8 offset2" style="text-align:center;margin-bottom:10px;">
			<h1>Visa Report</h1>
			<div class="btn-group">
				<?php echo CHtml::link('Not applied',array('report/visa','status'=>'Not applied'),array('class'=>$status=='Not applied'?'btn active':'btn'));?>
				<?php echo CHtml::link('Applying',array('report/visa','status'=>'Applying'),array('class'=>$status=='Applying'?'btn active':'btn'));?>
				<?php echo CHtml::link('Pending',array('report/visa','status'=>'Pending'),array('class'=>$status=='Pending'?'btn active':'btn'));?>
				<?php echo CHtml::link('Completed',array('report/visa','status'=>'Completed'),array('class'=>$status=='Completed'?'btn active':'btn'));?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th>Type</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Date registered</th>
						<th>Reg ID</th>
						<th>Email</th>
						<th>Type</th>
						<th>Passport No</th>
						<th>Passport Nationality</th>
						<th>Date of Birth</th>
						<th>Passport Gender</th>
						<th>Passport Country of Issue</th>
						<th>Passport Expiration Date</th>
						<th>Passport Issue Date</th>
						<th>Permanent Home Address</th>
						<th>Place of Birth</th>
					</tr>
				</thead>
				<tr>
					
				
				<?php foreach($users as $user){?>
				<tr>
					<td>Winner</td>
					<td><?php echo $user->first_name;?></td>
					<td><?php echo $user->last_name;?></td>
					<td><?php echo $user->updated_at;?></td>
					<td>W<?php echo $user->id;?></td>
					<td><?php echo $user->email;?></td>
					<td><?php echo $user->type;?></td>
					<td><?php echo $user->ga_card_number;?></td>
					<td><?php echo $user->ga_passport;?></td>
					<td><?php echo $user->ga_dateofbirth;?></td>
					<td><?php echo $user->ga_gender;?></td>
					<td><?php echo $user->ga_card_country;?></td>
					<td><?php echo $user->ga_card_expiration_date;?></td>
					<td><?php echo $user->ga_card_issue_date;?></td>
					<td><?php echo $user->permanent_home_address;?></td>
					<td><?php echo $user->place_of_birth;?></td>
				</tr>
				<?php }?>
				<?php foreach($guests as $guest){?>
				<tr>
					<td>Guest</td>
					<td><?php echo $guest->first_name;?></td>
					<td><?php echo $guest->last_name;?></td>
					<td><?php echo $guest->updated_at;?></td>
					<td>W<?php echo $guest->user_id;?>G</td>
					<td><?php echo $guest->user->email;?></td>
					<td>Guest</td>
					<td><?php echo $guest->ga_card_number;?></td>
					<td><?php echo $guest->ga_passport;?></td>
					<td><?php echo $guest->ga_dateofbirth;?></td>
					<td><?php echo $guest->ga_gender;?></td>
					<td><?php echo $guest->ga_card_country;?></td>
					<td><?php echo $guest->ga_card_expiration_date;?></td>
					<td><?php echo $guest->ga_card_issue_date;?></td>
					<td><?php echo $guest->permanent_home_address;?></td>
					<td><?php echo $guest->place_of_birth;?></td>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>
</div>

