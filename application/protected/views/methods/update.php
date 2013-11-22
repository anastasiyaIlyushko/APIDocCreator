<?php
/* @var $this MethodsController */
/* @var $model Method */

$this->breadcrumbs = array(
	'Projects' => array('/projects'),
	$model->project->name => array('/projects/view', 'id' => $model->project->id),
	'Methods' => array('index', 'projectId' => $model->project->id),
	$model->name => array('view', 'id' => $model->id),
	'Update',
);


$this->menu = array(
	array('label' => 'List Method', 'url' => array('index')),
	array('label' => 'Create Method', 'url' => array('create')),
	array('label' => 'View Method', 'url' => array('view', 'id' => $model->id)),
	array('label' => 'Manage Method', 'url' => array('admin')),
);
?>

<h1>Update Method <?php echo $model->id; ?></h1>

<div class="span3">
	<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</div>
<div class="span5">
	<h2>Properties</h2>
	<?php
	Yii::app()->clientScript->registerScript('displayDescription', "
  $('#status').live('change', function(e){
  

    if (e.target.tagName == 'A'){
      $(\".objects a[href='\"+$(e.target).attr('href')+\"']\").trigger('click');
    }else{
      $(this).children('.props').toggle();
    }
  });
", CClientScript::POS_READY);

	foreach ($responsesByStatus as $status => $propertie) {

		if ($status == 0) {
			echo '<h3> Requared Properties </h3>';
		} else {
			echo '<h3> Response status ' . $status . ' </h3>';
		}
		$href = Yii::app()->createUrl('properties/create', array('methodId' => $model->id, 'status' => $status));
		echo "<a href='$href'>Add propertie</a>";

		$dataProvider = new CActiveDataProvider('CollectPropertie');
		$dataProvider->setData($propertie);
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type' => 'TbHtml::GRID_TYPE_BORDERED',
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
				array(
					'class' => 'bootstrap.widgets.TbButtonColumn',
					'template' => '{view} {edit} {delete}',
					'buttons' => array(
						'edit' => array(
							'icon' => 'edit',
							'url' => 'Yii::app()->createUrl("properties/update", array("id"=>$data->id))',
						),
						'view' => array(
							'icon' => 'eye-open',
							'url' => 'Yii::app()->createUrl("properties/view", array("id"=>$data->id))',
						),
						'delete' => array(
							'icon' => 'trash',
							'url' => 'Yii::app()->createUrl("properties/delete", array("id"=>$data->id))',
						),
					),
				),
				)));
	}
	?>

	<h5>Add New Response</h4>
		<div>
			<input style="margin: 0;" id="status" type="text"><a href="" class="btn" id="addNewPropertie">Add</a>

		</div>


</div>

