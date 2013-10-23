<?php
/* @var $this SubstancesController */
/* @var $model Substance */
/* @var $project Project */

$this->breadcrumbs=array(
	'Projects'=> array('/projects'),
	"$project->name" => array('/projects/'.$project->id),
	'Substances'=>array('index'),
	'Create',
);
/*
$this->menu=array(
	array('label'=>'List Substance', 'url'=>array('index')),
	array('label'=>'Manage Substance', 'url'=>array('admin')),
);

 
 */
?>
<h1>Create Substance in '<?php echo $project->name?>' project</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'project'=>$project)); ?>