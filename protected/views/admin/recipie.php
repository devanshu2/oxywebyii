<?php
/* @var $this VdRecipiesController */
/* @var $model VdRecipies */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vd-recipies-recipie-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_name'); ?>
		<?php echo $form->textField($model,'rp_name'); ?>
		<?php echo $form->error($model,'rp_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_pretty_name'); ?>
		<?php echo $form->textField($model,'rp_pretty_name'); ?>
		<?php echo $form->error($model,'rp_pretty_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_description'); ?>
		<?php echo $form->textField($model,'rp_description'); ?>
		<?php echo $form->error($model,'rp_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_ingredients'); ?>
		<?php echo $form->textField($model,'rp_ingredients'); ?>
		<?php echo $form->error($model,'rp_ingredients'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_youtube_url'); ?>
		<?php echo $form->textField($model,'rp_youtube_url'); ?>
		<?php echo $form->error($model,'rp_youtube_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_min_cook_time'); ?>
		<?php echo $form->textField($model,'rp_min_cook_time'); ?>
		<?php echo $form->error($model,'rp_min_cook_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_max_cook_time'); ?>
		<?php echo $form->textField($model,'rp_max_cook_time'); ?>
		<?php echo $form->error($model,'rp_max_cook_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_min_preparation_time'); ?>
		<?php echo $form->textField($model,'rp_min_preparation_time'); ?>
		<?php echo $form->error($model,'rp_min_preparation_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_max_preparation_time'); ?>
		<?php echo $form->textField($model,'rp_max_preparation_time'); ?>
		<?php echo $form->error($model,'rp_max_preparation_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_temprature'); ?>
		<?php echo $form->textField($model,'rp_temprature'); ?>
		<?php echo $form->error($model,'rp_temprature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_quantity'); ?>
		<?php echo $form->textField($model,'rp_quantity'); ?>
		<?php echo $form->error($model,'rp_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_type'); ?>
		<?php echo $form->textField($model,'rp_type'); ?>
		<?php echo $form->error($model,'rp_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_category'); ?>
		<?php echo $form->textField($model,'rp_category'); ?>
		<?php echo $form->error($model,'rp_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_image_url'); ?>
		<?php echo $form->textField($model,'rp_image_url'); ?>
		<?php echo $form->error($model,'rp_image_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_created_on'); ?>
		<?php echo $form->textField($model,'rp_created_on'); ?>
		<?php echo $form->error($model,'rp_created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_created_by'); ?>
		<?php echo $form->textField($model,'rp_created_by'); ?>
		<?php echo $form->error($model,'rp_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_modified_on'); ?>
		<?php echo $form->textField($model,'rp_modified_on'); ?>
		<?php echo $form->error($model,'rp_modified_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_modified_by'); ?>
		<?php echo $form->textField($model,'rp_modified_by'); ?>
		<?php echo $form->error($model,'rp_modified_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rp_deleted'); ?>
		<?php echo $form->textField($model,'rp_deleted'); ?>
		<?php echo $form->error($model,'rp_deleted'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->