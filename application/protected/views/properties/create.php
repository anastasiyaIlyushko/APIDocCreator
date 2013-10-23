<?php
/* @var $this PropertiesController */
/* @var $model Propertie */
/* @var $substance Substance */

$this->breadcrumbs=array(
	'Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Propertie', 'url'=>array('index')),
	array('label'=>'Manage Propertie', 'url'=>array('admin')),
);
?>

<h1>Create Propertie in '<?php echo $substance->name?>' substance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'substance'=>$substance)); ?>