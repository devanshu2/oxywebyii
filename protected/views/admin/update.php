<?php
/* @var $this AdminController */
/* @var $model VdRecipies */

$this->breadcrumbs=array(
	'Recipies'=>array('index'),
	$model->rp_id=>array('view','id'=>$model->rp_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Recipies', 'url'=>array('index')),
	array('label'=>'Create Recipies', 'url'=>array('create')),
	//array('label'=>'View Recipies', 'url'=>array('view', 'id'=>$model->rp_id)),
	array('label'=>'Manage Recipies', 'url'=>array('admin')),
);
?>

<h1>Update Recipies <?php echo $model->rp_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>