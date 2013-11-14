<?php
/* @var $this ProjectsController */
/* @var $model Project */

$this->breadcrumbs = array(
	'Projects' => array('index'),
	$model->name,
);

$this->menu = array(
	array('label' => 'Add new Substance', 'url' => array('/substances/create', 'projectId' => $model->id)),
	//array('label'=>'List Project', 'url'=>array('index')),
	//array('label'=>'Create Project', 'url'=>array('create')),
	array('label' => 'Update Project', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Project', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
		//array('label'=>'Manage Project', 'url'=>array('admin')),
);

$this->menuName = "Substances";

$array = array();
foreach ($substances->getData() as $value) {
	$array[] = array('label' => $value->name, 'url' => array('/substances/' . $value->id));
}

$this->substances = $array;
?>



<h1>View Project #<?php echo $model->id . "&nbsp;" . $model->name; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'name',
		'annotation',
		'description'
	),
));
?>

<h2>Substances of '<?php echo $model->name; ?>'</h2>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'type' => 'striped bordered condensed',
	'dataProvider' => $substances,
	'template' => "{items}",
	'columns' => array(
		array('name' => 'id', 'header' => '#'),
		array('name' => 'name', 'header' => 'Name'),
		array(
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'template' => '{view} {edit} {delete}',
			'buttons' => array(
				'view' => array(
					'label' => 'Просмотреть сущность',
					'icon' => 'search',
					'url' => 'Yii::app()->createUrl("substances/view", array("id" => $data->id))',
					'options' => array(
						'class' => 'btn btn-small',
					)
				),
				'edit' => array(
					'label' => 'Редактировать сущность',
					'icon' => 'edit',
					'url' => 'Yii::app()->createUrl("substances/update", array("id" => $data->id))',
					'options' => array(
						'class' => 'btn btn-small',
					)
				),
				'delete' => array(
					'label' => 'Удалить сущность',
					'icon' => 'trash',
					'url' => 'Yii::app()->createUrl("substances/delete", array("id" => $data->id))',
					'options' => array(
						'class' => 'btn btn-small btn-delete',
					)
				),
			),
			'htmlOptions' => array('style' => 'width: 78px;')
		)
	)
		)
);
?>
