<?php
/* @var $this PropertiesController */
/* @var $model Propertie */
$this->breadcrumbs = array(
	'Projects' => array('/projects'),
	$link->project->name => array('/projects/view', 'id' => $link->project->id),
	ucfirst($model->linkType).'s' => array($model->linkType.'/index', 'projectId' => $link->project->id),
	$link->name => array($model->linkType.'/view', 'id' => $link->id),
	'Properties' => array('index', $model->linkType.'Id' => $link->id),
	$model->name,
);

$this->menu = array(
	array('label' => 'List Propertie', 'url' => array('index', $model->linkType.'Id' => $link->id)),
	array('label' => 'Create Propertie', 'url' => array('create', $model->linkType.'Id' => $link->id, 'status' => $model->response->status)),
	array('label' => 'View Propertie', 'url' => array('view', 'id' => $model->id)),
	array('label'=>'Delete Propertie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label' => 'Manage Propertie', 'url' => array('admin')),
);
?>

<h1>Update Propertie <?php echo $model->id; ?></h1>
<form  id="propertie-form" method="post"></form>

<!--<script type="text/x-handlebars" data-template-name="index">
	<h1>Ember</h1>
	<script type="text/x-handlebars" data-template-name="main">

	</script>
	<ul>

	</ul>


</script>-->

<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/structure.css');
echo CHtml::errorSummary($model);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/structure.js');
//Yii::app()->clientScript->registerScriptFile('http://builds.emberjs.com/handlebars-1.0.0.js');
//Yii::app()->clientScript->registerScriptFile('http://builds.emberjs.com/tags/v1.1.2/ember.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/ember.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/app.js');

//echo $this->renderPartial('_form', array('model'=>$model)); ?>