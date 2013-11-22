<?php
/* @var $this MethodsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Methods',
);

$this->menu=array(
	array('label'=>'Create Method', 'url'=>array('create')),
	array('label'=>'Manage Method', 'url'=>array('admin')),
);
?>

<h1>Methods</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
