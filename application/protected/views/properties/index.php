<?php
/* @var $this PropertiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Properties',
);
$this->breadcrumbs = array(
	'Projects' => array('/projects'),
	$substance->project->name => array('/projects/view', 'id' => $substance->project->id),
	'Substances' => array('substances/index', 'projectId' => $substance->project->id),
	$substance->name => array('substances/view', 'id' => $substance->id),
	'Properties' => array('index', 'substanceId' => $substance->id),
	'Properties',
);

$this->menu = array(
	array('label' => 'Create Propertie', 'url' => array('create', 'substanceId' => $substance->id)),
	array('label' => 'Manage Propertie', 'url' => array('admin', 'substanceId' => $substance->id)),
);
?>

<h1>Properties</h1>

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
));
?>
