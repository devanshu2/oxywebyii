<?php
/* @var $this AdminController */
/* @var $model VdRecipies */

$this->breadcrumbs=array(
	'Recipies'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Recipies', 'url'=>array('index')),
	array('label'=>'Manage Recipies', 'url'=>array('admin')),
);
?>

<h1>Create Recipies</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>