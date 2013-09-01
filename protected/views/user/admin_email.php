<table border=0 width="852px" style="word-wrap:break-word;">
<tr>
<td style="width:852px">
<div style="width:852px;font-family:arial;word-wrap: break-word;">
<img src="<?php echo $this->domain?>img/logo.png" width="852px" height="138px" />

<p><b>Dear admin </b><br/></p>
<p>Your username and password of Winner Circle 2013 is <?php echo $model->role;?> , <?php echo $model->password?>.<br/>
click <?php echo CHtml::link('here',$this->domain . CHtml::normalizeUrl(array('report/login')))?> 
to login and change your password.
</p>
<br/>
<p>Winners Circle Events Team</p>
</div>

</td>
</tr>
</table>