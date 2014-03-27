<div>
<p>Query Form No#: <?php echo $model->id;?></p>
</div>
<table border=1  style="border-collapse:collapse;border-spacing:0;word-wrap:break-word;word-break:break-all;font-family:arial;max-width:960px;">
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('staff_name')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->staff_name?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('full_name')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->full_name?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('contact_telephone')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->contact_telephone?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('contact_email')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->contact_email?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('hotel')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->hotel?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('nature')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->nature?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('details')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->details?></td></tr>
	<tr><td style="padding:10px;width: 200px;background-color:#ccc"><?php echo $model->getAttributeLabel('outcome')?></td><td style="padding:10px;min_width:400px;"><?php echo $model->outcome?></td></tr>
</table>