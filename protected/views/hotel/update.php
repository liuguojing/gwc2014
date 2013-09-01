<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Room Type', 'url'=>array('create')),
	array('label'=>'View Room Type', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Room Type', 'url'=>array('admin')),
);
?>

<h1>Update Room Type <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>