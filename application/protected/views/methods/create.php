<?php
/* @var $this MethodsController */
/* @var $model Method */

$this->breadcrumbs=array(
	'Projects'=> array('/projects'),
	"$project->name" => array('/projects/'.$project->id),
	'Methods'=>array('index', 'projectId' => $project->id),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List Method', 'url'=>array('index')),
//	array('label'=>'Manage Method', 'url'=>array('admin')),
//);
?>

<h1>Create Method</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>