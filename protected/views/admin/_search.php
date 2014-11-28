<?php
/* @var $this AdminController */
/* @var $model VdRecipies */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'rp_id'); ?>
		<?php echo $form->textField($model,'rp_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_name'); ?>
		<?php echo $form->textField($model,'rp_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_pretty_name'); ?>
		<?php echo $form->textField($model,'rp_pretty_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_description'); ?>
		<?php echo $form->textArea($model,'rp_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_ingredients'); ?>
		<?php echo $form->textArea($model,'rp_ingredients',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_youtube_url'); ?>
		<?php echo $form->textField($model,'rp_youtube_url',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_min_cook_time'); ?>
		<?php echo $form->textField($model,'rp_min_cook_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_max_cook_time'); ?>
		<?php echo $form->textField($model,'rp_max_cook_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_min_preparation_time'); ?>
		<?php echo $form->textField($model,'rp_min_preparation_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_max_preparation_time'); ?>
		<?php echo $form->textField($model,'rp_max_preparation_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_temprature'); ?>
		<?php echo $form->textField($model,'rp_temprature',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_quantity'); ?>
		<?php echo $form->textField($model,'rp_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_type'); ?>
		<?php echo $form->textField($model,'rp_type',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_category'); ?>
		<?php echo $form->textField($model,'rp_category',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_image_url'); ?>
		<?php echo $form->textField($model,'rp_image_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_created_on'); ?>
		<?php echo $form->textField($model,'rp_created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_created_by'); ?>
		<?php echo $form->textField($model,'rp_created_by',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_modified_on'); ?>
		<?php echo $form->textField($model,'rp_modified_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_modified_by'); ?>
		<?php echo $form->textField($model,'rp_modified_by',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rp_deleted'); ?>
		<?php echo $form->textField($model,'rp_deleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->