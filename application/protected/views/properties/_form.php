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
$types = array_keys($model->getTypesList());
array_shift($types);?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>511)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type', array_combine($types,$types)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row hidden">
		<?php echo $form->labelEx($model,'substanceId'); ?>
		<?php echo $form->textField($model,'substanceId', array('value'=>$substance->id)); ?>
		<?php echo $form->error($model,'substanceId'); ?>
	</div>
	
	<div id ="stringType" class="row" style="display: none;">
		Привет я блок стринг
		
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	


<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
		$(document).ready(function () {
			$("select#Propertie_type").click(function () {
				var selectedValue = $("select#Propertie_type").val();
				switch(selectedValue){
					case 'string': $("div#stringType").show();
						break
					default: 
						alert('Я таких значений не знаю')
				}
				
			});
		});
</script>>