<?php
/* @var $this ProjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Project', 'url'=>array('create')),
	array('label'=>'Manage Project', 'url'=>array('admin')),
);
?>

<h1>Projects</h1>

<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
		'dataProvider'=>$dataProvider,
		'template'=>"{items}",
		'columns' => array(
			array('name' => 'id', 'header' => '#'),
			array(
				'class' => 'application.views.widgets.DcValueWithDescriptionColumn',
				'name' => 'name',
				'header' => 'Project',
				'description' => 'annotation'),
			array(
				'class' => 'bootstrap.widgets.TbButtonColumn',
				'template' => '{edit}',
			    'buttons' => array(
					'edit' => array(
						'label'=>'Редактировать проект',
						'icon'=>'edit',
						'url'=>'Yii::app()->createUrl("projects/update", array("id"=>$data->id))',
						'options'=>array(
							'class'=>'btn btn-small',
						)
					),
			    ),
			)
		)
	)
); 
?>
