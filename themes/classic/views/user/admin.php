<?php
/* @var $this UserController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'statusName',
		'type',
		//'declien_reason',
		'first_name',
		'last_name',
		'email',
		'updated_at',
		//'office_location',
		/*
		'department',
		'telephone_number_desk',
		'telephone_number_cell',
		'email',
		'password',
		'date_of_birth',
		'dietary_requirements',
		'passport',
		'special_requests',
		'nationality',
		'has_guest',
		'departure_date',
		'return_date',
		'airport_name',
		'airport_code',
		'travel_policy',
		'visa_policy',
		'hotel_arrival_date',
		'hotel_departure_date',
		'hotel_venue',
		'gala_dinner',
		'other_activity',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}{email}{guest}',
			'buttons'=>array(
					'email' => array(
							'label'=>'send email',
							'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.jpg',
							'url'=>'Yii::app()->createUrl("user/email", array("id"=>$data->id))',
							'options'=>array('target'=>'_blank'),
					),
					'guest' => array(
							'label'=>'guest information',
							'imageUrl'=>Yii::app()->request->baseUrl.'/images/guest.jpg',
							'url'=>'Yii::app()->createUrl("user/view", array("id"=>$data->id,"#"=>"guest"))',
							'visible'=>'$data->has_guest == 1',
					),
			),
		),
	),
)); ?>
