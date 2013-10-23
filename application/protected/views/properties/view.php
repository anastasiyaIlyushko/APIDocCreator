<?php
/* @var $this PropertiesController */
/* @var $model Propertie */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Propertie', 'url'=>array('index')),
	array('label'=>'Create Propertie', 'url'=>array('create')),
	array('label'=>'Update Propertie', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Propertie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Propertie', 'url'=>array('admin')),
);
?>

<h1>View Propertie #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'type',
		'substanceId',
	),
)); ?>
