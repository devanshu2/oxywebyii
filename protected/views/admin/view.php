<?php
/* @var $this AdminController */
/* @var $model VdRecipies */

$this->breadcrumbs=array(
	'Recipies'=>array('index'),
	$model->rp_id,
);

$this->menu=array(
	//array('label'=>'List Recipies', 'url'=>array('index')),
	array('label'=>'Create Recipies', 'url'=>array('create')),
	array('label'=>'Update Recipies', 'url'=>array('update', 'id'=>$model->rp_id)),
	array('label'=>'Delete Recipies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recipies', 'url'=>array('admin')),
);
?>

<h1>View Recipies #<?php echo $model->rp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rp_id',
		'rp_name',
		'rp_pretty_name',
		/*'rp_description',
		'rp_ingredients',*/
		'rp_youtube_url',
		'rp_min_cook_time',
		'rp_max_cook_time',
		'rp_min_preparation_time',
		'rp_max_preparation_time',
		'rp_temprature',
		/*'rp_quantity',
		'rp_type',
		'rp_category',
		'rp_image_url',
		'rp_created_on',
		'rp_created_by',
		'rp_modified_on',
		'rp_modified_by',
		'rp_deleted',*/
	),
)); ?>
