<?php
/* @var $this SubstancesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects'=> array('/projects'),
	"$project->name" => array('/projects/view', 'id' => $project->id),
	'Substances'
);

$this->menu=array(
	array('label'=>'Create Substance', 'url'=>array('create', 'projectId' => $project->id)),
	array('label'=>'Manage Substance', 'url'=>array('admin', 'projectId' => $project->id)),
);
?>

<h1>Substances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
