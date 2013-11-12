<?php
/* @var $this PropertiesController */
/* @var $model Propertie */

$this->breadcrumbs = array(
	'Properties' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Propertie', 'url' => array('index')),
	array('label' => 'Manage Propertie', 'url' => array('admin')),
);
//$this->beginWidget('StructureWidget', array('model' => $model->struct));
//$this->endWidget();
?>

<h1>Create Propertie</h1>

<?php 
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/structure.css');
echo CHtml::errorSummary($model);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/structure.js'); 
//echo $this->renderPartial('_form', array('model' => $model)); ?>
