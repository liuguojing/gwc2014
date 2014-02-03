<table border=0 width="852px" style="word-wrap:break-word;font-family:arial;">
<tr>
<td style="width:852px">
<div style="width:852px;word-wrap: break-word;font-family:arial;">
<img src="<?php echo $this->domain?>img/logo.png" width="852px" height="138px" />
<p><b>Dear <?php echo $model->first_name;?></b></p>
<p style="word-wrap:break-word;font-family:arial;">During the Registration Process you selected that you needed assistance with the VISA application for your trip to Sydney.  Due to your passport nationality, you qualify for the on line VISA application process.  Please follow the link below to complete your application (If it states 'VISA Application letter in process - the letter will be emailed to you shortly):</p>

<p style="word-wrap:break-word;font-family:arial;"><b>WINNER: <?php echo $model->office_location;?><br/>
<?php 
if ($model->has_guest==1){ 
echo "GUEST: ".$model->telephone_number_desk;}?> 
</b>
</p>

<p style="word-wrap:break-word;font-family:arial;">Please refer to the  <a href="https://app.corporate-reg.com/gwc2013/travel_policy.pdf">Winners Circle Travel Policy</a> for further information on the application process.  Should you have any queries, please do not hesitate to contact us.
</p>

<p style="word-wrap:break-word;font-family:arial;">Kind Regards,</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners Circle Registration Team</p>

<div style="clear:both"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</td>
</tr>
</table>