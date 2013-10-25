<?php
/* @var $this ProjectsController */
/* @var $model Project */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->name,
);

$this->menu = array(
	array('label'=>'Add new Substance', 'url'=>array('/substances/create', 'projectId'=>$model->id)),
	
	//array('label'=>'List Project', 'url'=>array('index')),
	//array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Update Project', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Project', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Project', 'url'=>array('admin')),
	 
	 
);

$this->menuName = "Substances";

$array = array();

foreach ($substances->getData() as $value) {
	$array[] = array('label' => $value->name, 'url' => array('/substances/'.$value->id));
}

$this->substances=$array;

?>



<h1>View Project #<?php echo $model->id; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description'
	),
)); ?>

<h2>Substances of '<?php echo $model->name; ?>'</h2>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'substance-grid',
	'dataProvider'=>$substances,
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		array(
			'class'=>'CButtonColumn',
			'template' => '{view} {update} {delete}',
			'buttons'=>array(
				'view'=>array(
					'url'=>'Yii::app()->createUrl("substances/".$data->id)',
				),
				'update'=>array(
					'url'=>'Yii::app()->createUrl("substances/".$data->id . "/update")',
				),
				'delete'=>array(
					'url'=>'Yii::app()->createUrl("substances/".$data->id . "/delete")',
				),
			),
		),
	)));
?>
