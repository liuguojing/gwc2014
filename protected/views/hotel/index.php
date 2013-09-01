<?php
/* @var $this HotelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Types',
);

$this->menu=array(
	array('label'=>'Create Room Types', 'url'=>array('create')),
	array('label'=>'Manage Room Types', 'url'=>array('admin')),
);
?>

<h1>Room Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
