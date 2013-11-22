<?php
/* @var $this PropertiesController */
/* @var $model Propertie */

$this->breadcrumbs = array(
	'Projects' => array('/projects'),
	$link->project->name => array('/projects/view', 'id' => $link->project->id),
	ucfirst($model->linkType).'s' => array($model->linkType.'/index', 'projectId' => $link->project->id),
	$link->name => array($model->linkType.'/view', 'id' => $link->id),
	'Properties' => array('index', $model->linkType.'Id' => $link->id),
	'Create',
);

$this->menu = array(
	array('label' => 'List Propertie', 'url' => array('index', $model->linkType.'Id' => $link->id)),
	//array('label' => 'Manage Propertie', 'url' => array('admin')),
);
//$this->beginWidget('StructureWidget', array('model' => $model->struct));
//$this->endWidget();
?>

<h1>Create Propertie</h1>

<!--<script type="text/x-handlebars" data-template-name="index">
	<h1>Ember</h1>

	<form  id="propertie-form" action="'+document.location.href+'" method="post">

		<label>Id</label>
			{{input valueBinding="model.id"}}    
		
		<label>Propertie name</label>
			{{input valueBinding="model.name"}}    
		
		<label>Propertie description</label>
			{{input valueBinding="model.description" disabled=1}}    

	</form>
	<ul>

	</ul>

<!--		<label>Id</label>
		{{input type="text" valueBinding="model.id"  disabled=disabled}}    

		<label>Propertie name</label>
		{{input type="text" valueBinding="model.name"  disabled=disabled}}    

		<label>Propertie description</label>
		{{input type="text" valueBinding="model.description" disabled=disabled}}    -->


</script>-->

<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/structure.css');
echo CHtml::errorSummary($model);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/structure.js');
//Yii::app()->clientScript->registerScriptFile('http://builds.emberjs.com/handlebars-1.0.0.js');
//Yii::app()->clientScript->registerScriptFile('http://builds.emberjs.com/tags/v1.1.2/ember.js');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/app.js');

//echo $this->renderPartial('_form', array('model' => $model)); 
?>
