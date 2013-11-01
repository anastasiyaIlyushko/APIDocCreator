<?php
/* @var $this PropertiesController */
/* @var $model Propertie */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Propertie', 'url'=>array('index')),
	array('label'=>'Manage Propertie', 'url'=>array('admin')),
);
?>

<h1>Create Propertie</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
