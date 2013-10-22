<?php
/* @var $this SubstancesController */
/* @var $model Substance */

$this->breadcrumbs=array(
	'Substances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Substance', 'url'=>array('index')),
	array('label'=>'Manage Substance', 'url'=>array('admin')),
);
?>

<h1>Create Substance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>