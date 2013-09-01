<?php
/* @var $this HotelController */
/* @var $model Hotel */

$this->breadcrumbs=array(
	'Room Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Room Type', 'url'=>array('admin')),
);
?>

<h1>Create Room Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>