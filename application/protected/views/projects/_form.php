<?php
/* @var $this ProjectsController */
/* @var $model Project */
/* @var $form TbActiveForm */
?>

<div class="form">

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'project-form',
    'htmlOptions' => array('class' => 'well'),
));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span7')); ?>
<?php echo $form->textAreaRow($model, 'description', array('class' => 'span7', 'rows' => 12)); ?>

<div style='clear:both'></div>

<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => $model->isNewRecord ? 'Create' : 'Save')); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->