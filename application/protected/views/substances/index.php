<?php
/* @var $this SubstancesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Substances',
);

$this->menu=array(
	array('label'=>'Create Substance', 'url'=>array('create')),
	array('label'=>'Manage Substance', 'url'=>array('admin')),
);
?>

<h1>Substances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
