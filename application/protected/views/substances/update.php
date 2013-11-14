<?php
/* @var $this SubstancesController */
/* @var $model Substance */

$this->breadcrumbs=array(
	'Substances'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Substance', 'url'=>array('index')),
	array('label'=>'Create Substance', 'url'=>array('create')),
	array('label'=>'View Substance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Substance', 'url'=>array('admin')),
);
?>

<h1>Update Substance <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>