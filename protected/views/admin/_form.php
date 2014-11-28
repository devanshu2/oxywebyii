<?php
/* @var $this AdminController */
/* @var $model VdRecipies */
/* @var $form CActiveForm */
?>

<?php

//$this->widget('application.extensions.redactorjs.Redactor', array('editorOptions' => array('autoresize' => true, 'fixed' => true), 'model' => $model, 'attribute' => 'rp_description'));

?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'vd-recipies-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	));
	?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_name'); ?>
		<?php echo $form->textField($model, 'rp_name', array('size' => 60, 'maxlength' => 256)); ?>
<?php echo $form->error($model, 'rp_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_pretty_name'); ?>
		<?php echo $form->textField($model, 'rp_pretty_name', array('size' => 60, 'maxlength' => 128)); ?>
<?php echo $form->error($model, 'rp_pretty_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_description'); ?>
		<?php 
		//echo $form->textArea($model, 'rp_description', array('rows' => 6, 'cols' => 50)); 
		$this->widget('application.extensions.redactorjs.Redactor', array('editorOptions' => array('autoresize' => true, 'fixed' => true), 'model' => $model, 'attribute' => 'rp_description'));
		?>
<?php echo $form->error($model, 'rp_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_ingredients'); ?>
		<?php 
			//echo $form->textArea($model, 'rp_ingredients', array('rows' => 6, 'cols' => 50)); 
		$this->widget('application.extensions.redactorjs.Redactor', array('editorOptions' => array('autoresize' => true, 'fixed' => true), 'model' => $model, 'attribute' => 'rp_ingredients'));
		?>
<?php echo $form->error($model, 'rp_ingredients'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_youtube_url'); ?>
		<?php echo $form->textField($model, 'rp_youtube_url', array('size' => 60, 'maxlength' => 256)); ?>
<?php echo $form->error($model, 'rp_youtube_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_min_cook_time'); ?>
		<?php echo $form->textField($model, 'rp_min_cook_time', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'rp_min_cook_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_max_cook_time'); ?>
		<?php echo $form->textField($model, 'rp_max_cook_time', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'rp_max_cook_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_min_preparation_time'); ?>
		<?php echo $form->textField($model, 'rp_min_preparation_time', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'rp_min_preparation_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_max_preparation_time'); ?>
		<?php echo $form->textField($model, 'rp_max_preparation_time', array('size' => 10, 'maxlength' => 10)); ?>
<?php echo $form->error($model, 'rp_max_preparation_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_temprature'); ?>
		<?php echo $form->textField($model, 'rp_temprature', array('size' => 60, 'maxlength' => 128)); ?>
<?php echo $form->error($model, 'rp_temprature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_quantity'); ?>
		<?php echo $form->textField($model, 'rp_quantity'); ?>
<?php echo $form->error($model, 'rp_quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_type'); ?>
		<?php 
		//echo $form->textField($model, 'rp_type', array('size' => 4, 'maxlength' => 4)); 
		echo $form->dropDownList($model, 'rp_type',array(1=>'Vegeterian',2=>'Non - Vegeterian'));
		?>
<?php echo $form->error($model, 'rp_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_category'); ?>
		<?php 
			//echo $form->textField($model, 'rp_category', array('size' => 4, 'maxlength' => 4)); 
			echo $form->dropDownList($model, 'rp_category',
											array(1=>'Starters',2=>'Main-Course', 3 => 'Dessert')
									);
		?>
<?php echo $form->error($model, 'rp_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_image_url'); ?>
		<?php echo $form->textField($model, 'rp_image_url', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'rp_image_url'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model, 'rp_created_on'); ?>
		<?php echo $form->textField($model, 'rp_created_on'); ?>
<?php echo $form->error($model, 'rp_created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_created_by'); ?>
		<?php echo $form->textField($model, 'rp_created_by', array('size' => 5, 'maxlength' => 5)); ?>
<?php echo $form->error($model, 'rp_created_by'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model, 'rp_modified_on'); ?>
		<?php echo $form->textField($model, 'rp_modified_on'); ?>
<?php echo $form->error($model, 'rp_modified_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_modified_by'); ?>
		<?php echo $form->textField($model, 'rp_modified_by', array('size' => 5, 'maxlength' => 5)); ?>
<?php echo $form->error($model, 'rp_modified_by'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model, 'rp_deleted'); ?>
		<?php 
			//echo $form->textField($model, 'rp_deleted'); 
			echo $form->dropDownList($model, 'rp_deleted',array(0=>'No',2=>'Yes'));
		?>
<?php echo $form->error($model, 'rp_deleted'); ?>
	</div>
-->

	<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	window.onload = function() {
  document.getElementById("VdRecipies_rp_name").focus();
};
	</script>