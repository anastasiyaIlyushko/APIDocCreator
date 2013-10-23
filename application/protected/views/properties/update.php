<?php
/* @var $this PropertiesController */
/* @var $model Propertie */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Propertie', 'url'=>array('index')),
	array('label'=>'Create Propertie', 'url'=>array('create')),
	array('label'=>'View Propertie', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Propertie', 'url'=>array('admin')),
);
?>

<h1>Update Propertie <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>