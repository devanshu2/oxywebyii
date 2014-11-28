<?php
/* @var $this NotificationFormController */
/* @var $model NotificationForm */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Notification'
);

$this->menu=array(
	//array('label'=>'List Recipies', 'url'=>array('index')),
	array('label'=>'Manage Recipies', 'url'=>array('admin')),
);
?>

<h1>Notifications</h1>





<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'notification-form-notifications-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'notificationType'); ?>
		<?php 
		//echo $form->radioButtonList($model, 'notificationType', array('0'=>'Health Tip', '1'=>'Link To Recipe'), array('onclick'=>"showHideRecipe();"));
		echo $form->radioButtonList($model, 'notificationType', array('0'=>'Health Tip', '1'=>'Link To Recipe'), array('onclick'=>"showHideRecipe();"));
		
		?>
        <?php //echo $form->textField($model,'notificationType'); ?>
        <?php echo $form->error($model,'notificationType'); ?>
    </div>
	
	<div class="row" id="target_recipe_div" style="display:none">
        <?php echo $form->labelEx($model,'targetRecipe'); ?>
        <?php echo $form->dropDownList($model, 'targetRecipe', $recipeArr); ?>
        <?php echo $form->error($model,'targetRecipe'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'message'); ?>
        <?php echo $form->textArea($model, 'message', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model,'message'); ?>
    </div>
	
	

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
function showHideRecipe() {
	var test = $("input[type='radio'][name='NotificationForm[notificationType]']:checked").val();
	if(test == '1') {
		$('#target_recipe_div').fadeIn(500);
	} else {
		$('#target_recipe_div').fadeOut(500);
	}
	//alert(test);
}	
	
</script>