<?php
/* @var $this AdminController */
/* @var $model VdRecipies */

$this->breadcrumbs=array(
	'Recipies'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Recipies', 'url'=>array('index')),
	array('label'=>'Create Recipies', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vd-recipies-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Recipies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vd-recipies-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'rp_id',
		'rp_name',
		//'rp_pretty_name',
		/*'rp_description',
		'rp_ingredients',*/
		//'rp_youtube_url',
		/*
		'rp_min_cook_time',
		'rp_max_cook_time',
		'rp_min_preparation_time',
		'rp_max_preparation_time',
		'rp_temprature',
		'rp_quantity',
		'rp_type',
		'rp_category',
		'rp_image_url',
		'rp_created_on',
		'rp_created_by',
		'rp_modified_on',
		'rp_modified_by',
		'rp_deleted',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
