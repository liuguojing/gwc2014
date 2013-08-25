<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Hotel', 'url'=>array('create')),
	array('label'=>'Update Hotel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Hotel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hotel', 'url'=>array('admin')),
);
?>

<h1>View Hotel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'name',
		'room_rate',
		'attriton_rate',
		'sell_rate',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
	),
)); ?>
