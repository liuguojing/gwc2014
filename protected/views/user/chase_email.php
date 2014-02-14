

<table border=0 width="852px" style="word-wrap:break-word;font-family:arial;">
<tr>
<td style="width:852px">
<div style="width:852px;word-wrap: break-word;font-family:arial;">
<img src="<?php echo $this->domain?>img/email_head.png" />
<p><b>Dear <?php echo $model->first_name;?>,</b></p>

<p style="word-wrap:break-word;font-family:arial;">We have noticed that you still have not confirmed your acceptance for this year's Winners Circle.  The deadline to complete your registration for Winners Circle is <b>Friday February 21, 2014</b>.  It is essential you Accept or Decline by Friday so that we can secure your travel arrangements.</p>

<p style="word-wrap:break-word;font-family:arial;">If you need any assistance in completing the process, or need your invitation resent, please do let us know by contacting <a href="mailto:winners@corporate-reg.com">winners@corporate-reg.com</a>.</p>


<p style="word-wrap:break-word;font-family:arial;">Kind regards</p>

<p style="word-wrap:break-word;font-family:arial;">The Winners Circle Registration Team</p>

<a style="float:left;maring-left:500px;" href="<?php echo $this->domain;?>index.php/user/welcome?email=<?php echo $model->email;?>"><img src="https://app.corporate-reg.com/gwc2013/img/accept.jpg" alt="Accept"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php if(!($model->type=='Crew'||$model->type=="Gartner Crew")) {?>
<a style="float:left;maring-left:50px;"  href="<?php echo $this->domain;?>index.php/user/decline?email=<?php echo $model->email;?>"><img src="https://app.corporate-reg.com/gwc2013/img/decline.jpg" alt="Decline"/></a>
<?php }?>
<div style="clear:both"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

</td>
</tr>
</table>
