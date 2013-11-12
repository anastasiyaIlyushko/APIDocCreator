<?php
/* @var $this PropertiesController */
/* @var $model Propertie */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'propertie-form',
	'enableAjaxValidation'=>false,
)); 
//var_dump($form);?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<!--	<div class="row" name="Propertie">
		<div class="row">
			<?php //echo $form->labelEx($model,'name'); ?>
			<?php //echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
			<?php //echo $form->error($model,'name'); ?>
		</div>

		<div class="row">
			<?php //echo $form->labelEx($model,'description'); ?>
			<?php //echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
			<?php //echo $form->error($model,'description'); ?>
		</div>
	</div>-->
	
<!--	<div class="row" name="PropertieStructure">
		<div class="row">
			<?php //echo $form->labelEx($model->struct,'type'); ?>
			<?php //echo $form->dropDownList($model->struct,'type', $model->struct->getTypesList(), array('prompt'=>'Выберите тип', 'class'=>'selectType')); ?>
			<?php //echo $form->error($model->struct,'type'); ?>
		</div>

		<div class="row">
			<?php //echo $form->labelEx($model->struct,'options'); ?>
			<?php //echo $form->textField($model->struct,'options', array('size'=>60,'maxlength'=>255)); ?>
			<?php //echo $form->error($model->struct,'options'); ?>
		</div>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/structure.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/structure.js'); 
?>
