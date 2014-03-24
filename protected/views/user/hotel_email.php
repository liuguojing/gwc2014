<table border=0 width="852px" style="word-wrap:break-word;font-family:arial;">
<tr>
<td style="width:852px">
<div style="width:852px;word-wrap: break-word;font-family:arial;">
<img src="<?php echo $this->domain?>img/logo.png" width="852px" height="138px" />
<p><b>Dear <?php echo $model->first_name;?></b></p>
<p style="word-wrap:break-word;font-family:arial;">Thank you for being part of the Winners Circle 2013 Team.  We are delighted to confirm your hotel information as follows: </p>
<p>Your accommodation has been arranged at the:</p>
<?php if(substr($model->hotel_type,0,strpos($model->hotel_type,' - '))=='Shangri-La'  ){?>
<p style="word-wrap:break-word;font-family:arial;">Shang-ri La Sydney,<br/>
176 Cumberland Street<br/>
The Rocks <br/>
NSW 2000 <br/>
Australia <br/>
Tel:  +61 2 9250 6000
</p>
<p style="word-wrap:break-word;font-family:arial;">For more information regarding the hotel, please visit their website <a href="http://www.shangri-la.com/sydney">http://www.shangri-la.com/sydney</a></p>

<p style="word-wrap:break-word;font-family:arial;">Check in: <?php echo $model->hotel_arrival_date;?><br/>
Check out: <?php echo $model->hotel_departure_date;?><br/>
Reservation number: <?php echo $model->hotel_confirmation_number;?><br/>
<?php echo $model->dietary_commnet;?>
</p>
<p style="word-wrap:break-word;font-family:arial;">Please be advised that check in time is 3.00pm on date of arrival, and check out is 11.00am on the day of departure. 
</p>

<?php }elseif(substr($model->hotel_type,0,strpos($model->hotel_type,' - '))=='Hilton'){?>
<p style="word-wrap:break-word;font-family:arial;">Hilton Sydney<br/>
488 George Street, Sydney, NSW 2000, Australia<br/>
Phone:  + 61 2 9266 2000
</p>
<p style="word-wrap:break-word;font-family:arial;">For more information regarding the hotel, please visit their website <a href="http://www.hiltonsydney.com.au/">http://www.hiltonsydney.com.au/</a></p>

<p style="word-wrap:break-word;font-family:arial;">Check in: <?php echo $model->hotel_arrival_date;?><br/>
Check out: <?php echo $model->hotel_departure_date;?><br/>
Reservation number: <?php echo $model->hotel_confirmation_number;?><br/>
<?php echo $model->dietary_commnet;?>
</p>
<p style="word-wrap:break-word;font-family:arial;">Please be advised that check in time is 3.00pm on date of arrival, and check out is 11.00am on the day of departure. 
</p>

<?php }else{?>
<p style="word-wrap:break-word;font-family:arial;">Sheraton on the Park<br/>
161 Elizabeth Street,<br/>
Sydney, <br/>
New South Wales, 2000, Australia<br/>
Phone:  + 61 2 9286 6000
</p>
<p style="word-wrap:break-word;font-family:arial;">For more information regarding the hotel, please visit their website <a href="www.sheratonontheparksydney.com">www.sheratonontheparksydney.com</a></p>

<p style="word-wrap:break-word;font-family:arial;">Check in: <?php echo $model->hotel_arrival_date;?><br/>
Check out: <?php echo $model->hotel_departure_date;?><br/>
Reservation number: <?php echo $model->hotel_confirmation_number;?><br/>
<?php echo $model->dietary_commnet;?>
</p>
<p style="word-wrap:break-word;font-family:arial;">Please be advised that check in time is 2.00pm on date of arrival, and check out is 12.00pm on the day of departure. 
</p>


<?php }?>

<p style="word-wrap:break-word;font-family:arial;">Transfers have been arranged to take you from the Airport to your hotel, and also return transfers have been arranged for all crew leaving up to and including the 15th April.</p>
<p style="word-wrap:break-word;font-family:arial;">Should you need to amend the above dates, or need any further assistance please email <a href="mailto:winners@corporate-reg.com">winners@corporate-reg.com</a> </p>
<p style="word-wrap:break-word;font-family:arial;">We look forward to welcoming you to Sydney,</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners Circle Team</p>

<div style="clear:both"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</td>
</tr>
</table>