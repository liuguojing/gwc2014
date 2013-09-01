<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Room Type', 'url'=>array('create')),
	array('label'=>'Update Room Type', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Room Type', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Room Type', 'url'=>array('admin')),
);
?>

<h1>View Room Type #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'hotel_name',
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
