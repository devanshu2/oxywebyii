<?php
/* @var $this AdminController */
/* @var $data VdRecipies */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rp_id), array('view', 'id'=>$data->rp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_name')); ?>:</b>
	<?php echo CHtml::encode($data->rp_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_pretty_name')); ?>:</b>
	<?php echo CHtml::encode($data->rp_pretty_name); ?>
	<br />

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('rp_description')); ?>:</b>
	<?php echo CHtml::encode($data->rp_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_ingredients')); ?>:</b>
	<?php echo CHtml::encode($data->rp_ingredients); ?>
	<br />
	-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_youtube_url')); ?>:</b>
	<?php echo CHtml::encode($data->rp_youtube_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_min_cook_time')); ?>:</b>
	<?php echo CHtml::encode($data->rp_min_cook_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_max_cook_time')); ?>:</b>
	<?php echo CHtml::encode($data->rp_max_cook_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_min_preparation_time')); ?>:</b>
	<?php echo CHtml::encode($data->rp_min_preparation_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_max_preparation_time')); ?>:</b>
	<?php echo CHtml::encode($data->rp_max_preparation_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_temprature')); ?>:</b>
	<?php echo CHtml::encode($data->rp_temprature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->rp_quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_type')); ?>:</b>
	<?php echo CHtml::encode($data->rp_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_category')); ?>:</b>
	<?php echo CHtml::encode($data->rp_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_image_url')); ?>:</b>
	<?php echo CHtml::encode($data->rp_image_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_created_on')); ?>:</b>
	<?php echo CHtml::encode($data->rp_created_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->rp_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_modified_on')); ?>:</b>
	<?php echo CHtml::encode($data->rp_modified_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->rp_modified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rp_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->rp_deleted); ?>
	<br />

	*/ ?>

</div>