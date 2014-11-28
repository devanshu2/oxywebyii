<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recipies',
);

$this->menu=array(
	array('label'=>'Create Recipies', 'url'=>array('create')),
	array('label'=>'Manage Recipies', 'url'=>array('admin')),
);
?>

<h1>Vd Recipies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
