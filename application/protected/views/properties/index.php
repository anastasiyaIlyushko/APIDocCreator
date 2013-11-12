<?php
/* @var $this PropertiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Properties',
);

$this->menu=array(
	array('label'=>'Create Propertie', 'url'=>array('create')),
	array('label'=>'Manage Propertie', 'url'=>array('admin')),
);
?>

<h1>Properties</h1>

<?php 

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
