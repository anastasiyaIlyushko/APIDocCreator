<?php
/* @var $this MethodsController */
/* @var $model Method */

$this->breadcrumbs = array(
	'Projects' => array('/projects'),
	$model->project->name => array('/projects/view', 'id' => $model->project->id),
	'Methods' => array('index', 'projectId' => $model->project->id),
	$model->name,
);

$this->menu = array(
	array('label' => 'Update Method', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Method', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

<h1>View Method #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'name',
		'description',
		'uri',
		'projectId',
		'type'
	),
));
?>

<?php

foreach ($responsesByStatus as $status => $propertie) {
	
	if($status == 0){
		echo '<h2> Requared Properties </h2>';
	}else{
		echo '<h2> Response status '.$status . ' </h2>';
	}
	$href = Yii::app()->createUrl('properties/create', array('methodId' => $model->id, 'status' => $status));
	//echo "<a href='$href'>Add propertie</a>";

	$dataProvider = new CActiveDataProvider('CollectPropertie');
	$dataProvider->setData($propertie);
	$this->widget('bootstrap.widgets.TbGridView', array(
		'id' => 'substance-grid',
		'dataProvider' => $dataProvider,
		'columns' => array(
			'name',
			'description',
			array(
				'name' => 'type',
				'header' => 'Type',
				'value' => 'PropertiesType::getName((int) $data->structure->type)',
			),
			)));
}
?>