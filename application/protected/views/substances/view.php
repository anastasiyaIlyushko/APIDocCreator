<?php
/* @var $this SubstancesController */
/* @var $model Substance */
/* @var $project Project */

$this->breadcrumbs = array(
	'Projects' => array('/projects'),
	$model->project->name => array('/projects/view', 'id' => $model->project->id),
	'Substances' => array('index', 'projectId' => $model->project->id),
	$model->name,
);

$this->menu = array(
	array('label' => 'Add new Propertie', 'url' => array('/properties/create', 'substanceId' => $model->id)),
	//array('label'=>'List Substance', 'url'=>array('index')),
	//array('label'=>'Create Substance', 'url'=>array('create')),
	array('label' => 'Update Substance', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Substance', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
		//array('label'=>'Manage Substance', 'url'=>array('admin')),
);
?>

<h1>View Substance #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'name',
		'description',
		'projectId',
	),
));

?>
<h2>Properties of '<?php echo $model->name; ?>'</h2>

<?php
$this->widget('bootstrap.widgets.TbThumbnails', array(
	'dataProvider' => $properties,
	'template' => "{items}\n{pager}",
	'itemView' => '_thumb',
));


//$this->widget('zii.widgets.grid.CGridView', array(
//	'id' => 'substance-grid',
//	'dataProvider' => $properties,
//	'columns' => array(
//		'id',
//		'name',
//		'description',
//		'type',
//		array(
//			'class' => 'CButtonColumn',
//			'template' => '{view} {update} {delete}',
//			'buttons' => array(
//				'view' => array(
//					'url' => 'Yii::app()->createUrl("properties/".$data->id)',
//				),
//				'update' => array(
//					'url' => 'Yii::app()->createUrl("properties/".$data->id . "/update")',
//				),
//				'delete' => array(
//					'url' => 'Yii::app()->createUrl("properties/".$data->id . "/delete")',
//				),
//			),
//		),
//		)));
?>
