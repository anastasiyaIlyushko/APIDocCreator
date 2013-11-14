<?php
/* @var $this PropertiesController */
/* @var $model Propertie */

$this->breadcrumbs=array(
	'Projects'=> array('/projects'),
	$model->substances[0]->project->name => array('/projects/view', 'id' => $model->substances[0]->project->id),
	'Substances'=>array('substances/index', 'projectId' => $model->substances[0]->project->id),
	$model->substances[0]->name => array('substances/view', 'id' => $model->substances[0]->id),
	'Properties' => array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Propertie', 'url'=>array('index', 'substanceId' => $model->substances[0]->id)),
	array('label'=>'Create Propertie', 'url'=>array('create', 'substanceId' => $model->substances[0]->id)),
	array('label'=>'View Propertie', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Propertie', 'url'=>array('admin')),
);
?>

<h1>Update Propertie <?php echo $model->id; ?></h1>

<?php 
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/structure.css');
echo CHtml::errorSummary($model);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/structure.js'); 

//echo $this->renderPartial('_form', array('model'=>$model)); ?>